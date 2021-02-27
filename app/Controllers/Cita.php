<?php

namespace App\Controllers;
use App\Libraries\Ssp;
use App\Models\CitaModel;

class Cita extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new CitaModel();
        $this->fecha = new \DateTime();
    }

    
	public function index()
	{
       $this->data['paciente'] = $this->model->listar_paciente();
       $this->data['odontologo'] = $this->model->listar_odontologo();
		return $this->templater->view("cita/index", $this->data);
	}

    // Listado de citas
   public function ajaxListarCitas()
	{
        if ($this->request->isAJAX()) {		
            $table = 'sp_view_cita';
            $primaryKey = 'id_cita';
            $where = "estado=1"; 

            $columns = array(
                array('db' => 'id_cita', 'dt'           => 0),
                array('db' => 'numero_cita', 'dt'       => 1),
                array('db' => 'tipo_tratamiento', 'dt'  => 2),
                array('db' => 'observacion', 'dt'       => 3),
                array('db' => 'fecha', 'dt'             => 4),
                array('db' => 'hora', 'dt'              => 5),
                array('db' => 'costo', 'dt'             => 6),
                array('db' => 'nombre_paciente', 'dt'   => 7),
                array('db' => 'nombre_odontologo', 'dt' => 8),
                array('db' => 'creado_en', 'dt'         => 9)
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

    // Insertar o Actualizar Una Cita
    public function guardar_cita()
    {
        $data  = null;

        if ($this->request->isAJAX()) {

            if ($this->request->getPost("accion") == "in" && $this->request->getPost("id") == "") {
                
               if (true) {
                    //validación de formulario
                    $validation = \Config\Services::validation();

                    $val = $this->validate(
                        [ // rules
                            "numero_cita"       => 'required|numeric',
                            "tipo_tratamiento"  => "required|alpha_space",
                            "fecha"             => "required|max_length[10]",
                            "hora"              => "required",
                            "costo"             => "required|alpha_space",
                            "id_paciente"       => "required",
                            "id_odontologo"     => "required",
                            "observacion"       => "required|alpha_space" 
                        ],
                        [ // errors
                            "numero_cita" => [
                                "required"   => "El numero de cita es requerido",
                                "numeric"    => "El numero de cita debe llevar caracteres numéricos."
                            ],
                            "tipo_tratamiento" => [
                                "required" => " El tipo_tratamiento es requerido",
                                "alpha_space" => "El tipo_tratamiento debe llevar caracteres alfabéticos o espacios."
                            ],
                            "fecha" => [
                                "required"   => "La fecha de cita es requerido",
                                "max_length"=> "La fecha debe llevar como maximo 10 caracteres"
                            ],
                            "hora" => [
                                "required"   => "La Hora de cita es requerido"
                            ],
                            "costo" => [
                                "required" => "El Costo es requerido",
                                "alpha_space" => "El costo debe llevar caracteres alfabéticos o espacios."
                            ],
                            "id_paciente" => [
                                "required" => "El Nombre del paciente es requerido"
                            ],
                            "id_odontologo" => [
                                "required" => "El Nombre del odontologo es requerido"
                            ],
                            "observacion" => [
                                "required" => "Observacion es requerido",
                                "alpha_space" => "Observacion debe llevar caracteres alfabéticos o espacios."
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
                                "numero_cita"       => $this->request->getPost("numero_cita"),
                                "tipo_tratamiento"  => $this->request->getPost("tipo_tratamiento"),
                                "fecha"             => $this->request->getPost("fecha"),
                                "hora"              => $this->request->getPost("hora"),
                                "costo"             => $this->request->getPost("costo"),
                                "id_paciente"       => $this->request->getPost('id_paciente'),
                                "id_odontologo"     => $this->request->getPost('id_odontologo'),
                                "observacion"       => trim($this->request->getPost("observacion")),                           
                                "creado_en"         => $this->fecha->format('Y-m-d H:i:s')
                            );                        

                            $respuesta = $this->model->cita("insert", $data, null, null);
                            if(is_numeric($respuesta))
                            {
                                return $this->response->setJSON(json_encode(array(
                                    'exito' => "Cita registrado correctamente"
                                )));
                            }
                        }
                    } 
                } else {
                // actualizar cita
                //validación de formulario
                $validation = \Config\Services::validation();
                helper(['form', 'url']);
                $val = $this->validate(
                    [ // rules
                        "numero_cita"       => 'required|numeric',
                        "tipo_tratamiento"  => "required|alpha_space",
                        "fecha"             => "required|max_length[10]",
                        "hora"              => "required",
                        "costo"             => "required|alpha_space",
                        "id_paciente"       => "required",
                        "id_odontologo"     => "required",
                        "observacion"       => "required|alpha_space",
                    ],
                    [ // errors
                        
                        "numero_cita" => [
                            "required"   => "El numero de cita es requerido",
                            "numeric"    => "El numero de cita debe llevar caracteres numéricos."
                        ],
                        "tipo_tratamiento" => [
                            "required" => " El tipo_tratamiento es requerido",
                            "alpha_space" => "El tipo_tratamiento debe llevar caracteres alfabéticos o espacios."
                        ],
                        "fecha" => [
                            "required"   => "La fecha de cita es requerido",
                            "max_length"=> "La fecha  debe llevar como maximo 10 caracteres"
                        ],
                        "hora" => [
                            "required"   => "La hora de cita es requerido"
                        ],
                        "costo" => [
                            "required" => "El Costo es requerido",
                            "alpha_space" => "El costo debe llevar caracteres alfabéticos o espacios."
                        ],
                        "id_paciente" => [
                            "required" => "El Nombre del paciente es requerido"
                        ],
                        "id_odontologo" => [
                            "required" => "El Nombre del odontologo es requerido"
                        ],
                        "observacion" => [
                            "required" => "Observacion es requerido",
                            "alpha_space" => "Observacion debe llevar caracteres alfabéticos o espacios."
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
                        "numero_cita"       => $this->request->getPost("numero_cita"),
                        "tipo_tratamiento"  => $this->request->getPost("tipo_tratamiento"),
                        "fecha"             => $this->request->getPost("fecha"),
                        "hora"              => $this->request->getPost("hora"),
                        "costo"             => $this->request->getPost("costo"),
                        "id_paciente"       => $this->request->getPost('id_paciente'),
                        "id_odontologo"     => $this->request->getPost('id_odontologo'),
                        "observacion"       => trim($this->request->getPost("observacion")),                            
                        "actualizado_en"    => $this->fecha->format('Y-m-d H:i:s')
                    ); 

                    $respuesta = $this->model->cita("update", $data,
                        array(
                            "id_cita" => $this->request->getPost("id")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar cita
                        
                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Cita editado correctamente"
                        )));
                    } 
                }
            }
        }
    }

    // Editar Cita
    public function editar_cita()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_cita(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }

    // Eliminar Cita
    public function eliminar_cita()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {

            $data = array(
                "estado" => '0'
            );

            $respuesta = $this->model->cita("update", $data,
                array(
                    "id_cita" => $this->request->getPost("id")
                ),
                null
            );

            if ($respuesta) {
                return $this->response->setJSON(json_encode(array(
                    'exito' => "Cita Eliminado correctamente"
                )));
            }
        }
    }
    

}