<?php

namespace App\Controllers;
use App\Libraries\Ssp;
use App\Models\PacienteModel;

class Paciente extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PacienteModel();
        $this->fecha = new \DateTime();
    }

    
	public function index()
	{
        $this->data['ocupaciones'] = $this->model->listar_ocupaciones();
		return $this->templater->view("paciente/index", $this->data);
	}

    // Listado de pacientes
    public function ajaxListarPacientes()
	{
        if ($this->request->isAJAX()) {		
            $table = 'sp_view_paciente';
            $primaryKey = 'id_persona';
            $where = "estado=1";

            $columns = array(
                array('db' => 'id_persona', 'dt'        => 0),
                array('db' => 'ci_exp', 'dt'            => 1),
                array('db' => 'nombre_completo', 'dt'   => 2),
                array('db' => 'telefono_celular', 'dt'  => 3),
                array('db' => 'fecha_nacimiento', 'dt'  => 4),
                array('db' => 'domicilio', 'dt'         => 5),
                array('db' => 'ocupacion', 'dt'         => 6),
                array('db' => 'creado_en', 'dt'         => 7)
            );

            $sql_details = array(
                'user' => $this->db->username, 
                'pass' => $this->db->password, 
                'db'   => $this->db->database, 
                'host' => $this->db->hostname
            );

            return $this->response->setJSON(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
	}

    // Insertar o Actualizar Un Paciente
    public function guardar_paciente()
    {
        $data  = null;

        if ($this->request->isAJAX()) {

            if ($this->request->getPost("accion") == "in" && $this->request->getPost("id_paciente") == "") {
                // Se verifica el registro de CI del estudiante
                $condicion = array(
                    'ci'       => trim($this->request->getPost("ci")),
                    'expedido' => trim($this->request->getPost("expedido"))
                );

                $respuesta = $this->model->verificar_ci($condicion);
                
                if (count($respuesta) == 0) {
                    //validación de formulario
                    $validation = \Config\Services::validation();

                    $val = $this->validate(
                        [ // rules
                            "ci"                => "required|alpha_numeric|min_length[5]",
                            "expedido"          => "required|max_length[2]|alpha",
                            "nombres"           => "required|alpha_space",
                            "paterno"           => "required|alpha_space",
                            "materno"           => "alpha_space",
                            "celular"           => 'required|numeric',
                            "fecha_nacimiento"  => "required|max_length[10]",
                            "id_ocupacion"      => "required",
                            "domicilio"         => "required|alpha_numeric_space"
                        ],
                        [ // errors
                            "ci" => [
                                "required" => "El CI del paciente es requerido",
                                "alpha_numeric" => "El CI del usuario no debe llevar caracteres especiales",
                                "min_length" => "El CI del paciente debe tener al menos 6 caracteres"
                            ],
                            "expedido" => [
                                "required" => "La expedición del ci es requerido",
                                "max_length" => "La expedición del ci debe llevar máximo 2 caracteres",
                                "alpha" => "La expedición del ci no debe llevar caracteres especiales"
                            ],
                            "nombres" => [
                                "required" => "El nombre es requerido",
                                "alpha_space" => "El nombre debe llevar caracteres alfabéticos o espacios."
                            ]
                            ,
                            "paterno" => [
                                "required" => "El apellido paterno es requerido",
                                "alpha_space" => "El apellido paterno debe llevar caracteres alfabéticos o espacios."
                            ],
                            "materno" => [
                                "alpha_space" => "El apellido materno debe llevar caracteres alfabéticos o espacios."
                            ],
                            "fecha_nacimiento" => [
                                "required"  => "La fecha de nacimiento es requerido",
                                "max_length"=> "La fecha de nacimiento debe llevar como maximo 10 caracteres"
                            ],
                            "celular" => [
                                "required"   => "El telefono es requerido",
                                "numeric"    => "El telefono debe llevar caracteres numéricos."
                            ],
                            "id_ocupacion" => [
                                "required" => "La ocupacion del paciente es requerido"
                            ],
                            "domicilio" => [
                                "required" => "El domicilio del paciente es requerido",
                                "alpha_numeric_space" => "EL Domicilio no puede llevar caracteres especiales"
                            ]
                        ]
                    );

                    if (!$val) {
                        // se devuelve todos los errores si falla la validacion
                        return $this->response->setJSON(json_encode(array(
                            "form" => $validation->listErrors()
                        )));

                    } else {
                        // Insertar datos

                        // Formateo de datos
                        $data = array(
                            "ci"                => trim($this->request->getPost("ci")),
                            "expedido"          => trim($this->request->getPost("expedido")),
                            "nombres"           => ucwords(strtolower(trim($this->request->getPost("nombres")))),
                            "paterno"           => ucwords(strtolower(trim($this->request->getPost("paterno")))),
                            "materno"           => ucwords(strtolower(trim($this->request->getPost("materno")))),
                            "telefono_celular"  => trim($this->request->getPost("celular")),
                            "fecha_nacimiento"  => $this->request->getPost("fecha_nacimiento"),
                            "domicilio"         => $this->request->getPost("domicilio"),                            
                            "creado_en"         => $this->fecha->format('Y-m-d H:i:s')
                        );                        

                        $respuesta = $this->model->persona("insert", $data, null, null);

                        if (is_numeric($respuesta)) {
                            // Insertar paciente
                            $data1 = array(
                                "id_paciente"   => $respuesta,
                                "id_ocupacion"  => $this->request->getPost("id_ocupacion"),                            
                                "creado_en"     => $this->fecha->format('Y-m-d H:i:s')
                            );

                            $respuesta1 = $this->model->paciente("insert", $data1, null, null);

                            // Insertar usuario
                            $nombre = explode(" ", strtoupper(trim($this->request->getPost("nombres"))));
                            $data2 = array(
                                "id_usuario"  => $respuesta,
                                "usuario"     => $nombre[0].'_'.trim($this->request->getPost("ci")),
                                "clave"       => hash("sha512", trim($this->request->getPost("fecha_nacimiento"))),                            
                                "creado_en"   => $this->fecha->format('Y-m-d H:i:s')
                            );

                            $respuesta2 = $this->model->usuario("insert", $data2, null, null);

                            // Insertar Grupo Usuario
                            $id_grupo = $this->model->verificar_id_grupo('PACIENTE'); //verificar id_grupo con rol PACIENTE
                            $data3 = array(
                                "id_grupo"    => $id_grupo[0]['id_grupo'],
                                "id_usuario"  => $respuesta,
                                "ip_usuario"  => $this->getIP(), 
                                "navegador"   => $_SERVER["HTTP_USER_AGENT"],                       
                                "creado_en"   => $this->fecha->format('Y-m-d H:i:s')
                            );

                            $respuesta3 = $this->model->grupo_usuario("insert", $data3, null, null);

                            if(is_numeric($respuesta1) && is_numeric($respuesta2) && is_numeric($respuesta3))
                            {
                                return $this->response->setJSON(json_encode(array(
                                    'exito' => "Paciente registrado correctamente"
                                )));
                            }


                        }
                    }
                } else {
                    return $this->response->setJSON(json_encode(array(
                        'warning' => "El ci ingresado ya  se encuentra registrado"
                    )));
                }
            } else {
                // actualizar formulario
                //validación de formulario
                $validation = \Config\Services::validation();
                helper(['form', 'url']);
                $val = $this->validate(
                    [ // rules
                        "id"                => "required",
                        "ci"                => "required|alpha_numeric|min_length[5]",
                        "expedido"          => "required|max_length[2]|alpha",
                        "nombres"           => "required|alpha_space",
                        "paterno"           => "required|alpha_space",
                        "materno"           => "alpha_space",
                        "celular"           => 'required|numeric',
                        "fecha_nacimiento"  => "required|max_length[10]",
                        "id_ocupacion"      => "required",
                        "domicilio"         => "required|alpha_numeric_space"
                    ],
                    [ // errors
                        "id" => [
                            "required" => "El id es requerido"
                        ],
                        "ci" => [
                            "required" => "El CI del paciente es requerido",
                            "alpha_numeric" => "El CI del usuario no debe llevar caracteres especiales",
                            "min_length" => "El CI del paciente debe tener al menos 6 caracteres"
                        ],
                        "expedido" => [
                            "required" => "La expedición del ci es requerido",
                            "max_length" => "La expedición del ci debe llevar máximo 2 caracteres",
                            "alpha" => "La expedición del ci no debe llevar caracteres especiales"
                        ],
                        "nombres" => [
                            "required" => "El nombre es requerido",
                            "alpha_space" => "El nombre debe llevar caracteres alfabéticos o espacios."
                        ]
                        ,
                        "paterno" => [
                            "required" => "El apellido paterno es requerido",
                            "alpha_space" => "El apellido paterno debe llevar caracteres alfabéticos o espacios."
                        ],
                        "materno" => [
                            "alpha_space" => "El apellido materno debe llevar caracteres alfabéticos o espacios."
                        ],
                        "fecha_nacimiento" => [
                            "required"  => "La fecha de nacimiento es requerido",
                            "max_length"=> "La fecha de nacimiento debe llevar como maximo 10 caracteres"
                        ],
                        "celular" => [
                            "required"   => "El telefono es requerido",
                            "numeric"    => "El telefono debe llevar caracteres numéricos."
                        ],
                        "id_ocupacion" => [
                            "required" => "La ocupacion del paciente es requerido"
                        ],
                        "domicilio" => [
                            "required" => "El domicilio del paciente es requerido",
                            "alpha_numeric_space" => "EL Domicilio no puede llevar caracteres especiales"
                        ]
                    ]
                );

                if (!$val) {
                    // se devuelve todos los errores
                    return $this->response->setJSON(json_encode(array(
                        "form" => $validation->listErrors()
                    )));
                } else {

                    // Actualizar datos
                    $data = array(
                        "ci"                => trim($this->request->getPost("ci")),
                        "expedido"          => trim($this->request->getPost("expedido")),
                        "nombres"           => ucwords(strtolower(trim($this->request->getPost("nombres")))),
                        "paterno"           => ucwords(strtolower(trim($this->request->getPost("paterno")))),
                        "materno"           => ucwords(strtolower(trim($this->request->getPost("materno")))),
                        "telefono_celular"  => trim($this->request->getPost("celular")),
                        "fecha_nacimiento"  => $this->request->getPost("fecha_nacimiento"),
                        "domicilio"         => $this->request->getPost("domicilio"),                            
                        "actualizado_en"    => $this->fecha->format('Y-m-d H:i:s')
                    ); 

                    $respuesta = $this->model->persona("update", $data,
                        array(
                            "id_persona" => $this->request->getPost("id")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar paciente
                        $data1 = array(
                            "id_ocupacion"   => $this->request->getPost("id_ocupacion"),                            
                            "actualizado_en" => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta1 = $this->model->paciente("update", $data1,
                            array(
                                "id_paciente" => $this->request->getPost("id")
                            ),
                            null
                        );

                        // Actualizar usuario
                        $nombre = explode(" ", strtoupper(trim($this->request->getPost("nombres"))));
                        $data2 = array(
                            "usuario"       => $nombre[0].'_'.trim($this->request->getPost("ci")),
                            "clave"         => hash("sha512", trim($this->request->getPost("fecha_nacimiento"))),                            
                            "actualizado_en"=> $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta2 = $this->model->usuario("update", $data2,
                            array(
                                "id_usuario" => $this->request->getPost("id")
                            ),
                            null
                        );

                        // Actualizar Grupo Usuario
                        $id_grupo_usuario = $this->model->verificar_id_grupo_usuario($this->request->getPost("id")); //verificar id_grupo con rol PACIENTE
                        $data3 = array(
                            "ip_usuario"     => $this->getIP(), 
                            "navegador"      => $_SERVER["HTTP_USER_AGENT"],                       
                            "actualizado_en" => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta3 = $this->model->grupo_usuario("update", $data3,
                            array(
                                "id_grupo_usuario" => $id_grupo_usuario[0]['id_grupo_usuario'],
                            ),
                            null
                        );

                        if($respuesta1 && $respuesta2 && $respuesta3)
                        {
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "Paciente editado correctamente"
                            )));
                        }
                    }
                }
            }
        }
    }

    // Editar Paciente
    public function editar_paciente()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_paciente(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }

    // Eliminar Paciente
    public function eliminar_paciente()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {

            $data = array(
                "estado" => '0'
            );

            $respuesta = $this->model->persona("update", $data, array(
                "id_persona" => trim($this->request->getPost("id"))
            ), null);

            if ($respuesta) {
                return $this->response->setJSON(json_encode(array(
                    'exito' => "Paciente Eliminado correctamente"
                )));
            }
        }
    }

    //Obtener el IP real del usuario
    public function getIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
    }

}