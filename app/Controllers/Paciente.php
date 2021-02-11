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
		return $this->templater->view("paciente/index", $this->data);
	}

    // Listado de pacientes
    public function ajaxListarPacientes()
	{
        if ($this->request->isAJAX()) {		
            $table = 'sp_paciente';
            $primaryKey = 'id_paciente';
            $where = "activo=1";

            $columns = array(
                array('db' => 'id_paciente', 'dt' => 0),
                array('db' => 'p_ci', 'dt'        => 1),
                array('db' => 'p_nombre', 'dt'    => 2),
                array('db' => 'p_domicilio', 'dt' => 3),
                array('db' => 'p_cel', 'dt'       => 4),
                array('db' => 'p_fechaNac', 'dt'  => 5),
                array('db' => 'p_ocupacion', 'dt' => 6),
                array('db' => 'feha_alta', 'dt'   => 7)
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
                $res = $this->model->verificar_ci(trim($this->request->getPost("ci")).' '.trim($this->request->getPost("expedido")));
                // var_dump(count($res));
                if (count($res) == 0 ) {
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
                            "ocupacion"         => "required|alpha_space",
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
                            "nacimiento" => [
                                "required"  => "La fecha de nacimiento es requerido",
                                "max_length"=> "La fecha de nacimiento debe llevar como maximo 10 caracteres"
                            ],
                            "celular" => [
                                "required"   => "El telefono es requerido",
                                "numeric"    => "El telefono debe llevar caracteres numéricos."
                            ],
                            "ocupacion" => [
                                "required" => "La ocupacion del paciente es requerido",
                                "alpha" => "La ocupacion del paciente no debe llevar caracteres especiales."
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
                        // Insertar datos
                        $data = array(
                            "p_ci"           => trim($this->request->getPost("ci")).' '.$this->request->getPost("expedido"),
                            "p_nombre"       => ucfirst(strtolower(trim($this->request->getPost("nombres")))).' '.ucfirst(strtolower(trim($this->request->getPost("paterno")))).' '.ucfirst(strtolower(trim($this->request->getPost("materno")))),
                            "p_domicilio"    => trim($this->request->getPost("domicilio")),
                            "p_cel"          => trim($this->request->getPost("celular")),
                            "p_fechaNac"     => $this->request->getPost("fecha_nacimiento"),
                            "p_ocupacion"    => $this->request->getPost("ocupacion"),                            
                            "feha_alta"     => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta = $this->model->paciente("insert", $data, null, null);

                        if (is_numeric($respuesta)) {
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "Paciente registrado correctamente"
                            )));
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
                        "ci"                => "required|alpha_numeric|min_length[5]",
                        "expedido"          => "required|max_length[2]|alpha",
                        "nombres"           => "required|alpha_space",
                        "paterno"           => "required|alpha_space",
                        "materno"           => "alpha_space",
                        "celular"           => 'required|numeric',
                        "fecha_nacimiento"  => "required|max_length[10]",
                        "ocupacion"         => "required|alpha_space",
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
                        "nacimiento" => [
                            "required"  => "La fecha de nacimiento es requerido",
                            "max_length"=> "La fecha de nacimiento debe llevar como maximo 10 caracteres"
                        ],
                        "celular" => [
                            "required"   => "El telefono es requerido",
                            "numeric"    => "El telefono debe llevar caracteres numéricos."
                        ],
                        "ocupacion" => [
                            "required" => "La ocupacion del paciente es requerido",
                            "alpha" => "La ocupacion del paciente no debe llevar caracteres especiales."
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
                        "p_ci"           => trim($this->request->getPost("ci")).' '.$this->request->getPost("expedido"),
                        "p_nombre"       => ucfirst(strtolower(trim($this->request->getPost("nombres")))).' '.ucfirst(strtolower(trim($this->request->getPost("paterno")))).' '.ucfirst(strtolower(trim($this->request->getPost("materno")))),
                        "p_domicilio"    => trim($this->request->getPost("domicilio")),
                        "p_cel"          => trim($this->request->getPost("celular")),
                        "p_fechaNac"     => $this->request->getPost("fecha_nacimiento"),
                        "p_ocupacion"    => $this->request->getPost("ocupacion"),                            
                        "fecha_edit"     => $this->fecha->format('Y-m-d H:i:s')
                    );

                    $respuesta = $this->model->paciente(
                        "update",
                        $data,
                        array(
                            "id_paciente" => $this->request->getPost("id_paciente")
                        ),
                        null
                    );

                    if ($respuesta) {
                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Paciente editado correctamente"
                        )));
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
            $respuesta = $this->model->buscar_paciente(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }

    // Eliminar Paciente
    public function eliminar_paciente()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {

            $data = array(
                "activo" => '0'
            );

            $respuesta = $this->model->paciente("update", $data, array(
                "id_paciente" => trim($this->request->getPost("id"))
            ), null);

            if ($respuesta) {
                return $this->response->setJSON(json_encode(array(
                    'exito' => "Paciente Eliminado correctamente"
                )));
            }
        }
    }

}