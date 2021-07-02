<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\ConsultaModel;

class Consulta extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ConsultaModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['paciente'] = $this->model->listar_paciente();
        return $this->templater->view("tratamiento/index", $this->data);
    }

    // Listado de citas
    public function ajaxListarConsultas()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_tratamiento_consulta';
            $primaryKey = 'id_consulta';
            $where = "";

            $columns = array(
                array('db' => 'id_consulta', 'dt'           => 0),
                array('db' => 'tratamiento', 'dt'           => 1),
                array('db' => 'motivo_tratamiento', 'dt'    => 2),
                array('db' => 'alergico_medicamento', 'dt'  => 3),
                array('db' => 'cual_medicamento', 'dt'      => 4),
                array('db' => 'alguna_cirugia', 'dt'        => 5),
                array('db' => 'porque', 'dt'                => 6),
                array('db' => 'alguna_enfermedad', 'dt'     => 7),
                array('db' => 'cepilla_diente', 'dt'        => 8),
                array('db' => 'cuanto_dia', 'dt'            => 9),
                array('db' => 'nombre_paciente', 'dt'       => 10),
                array('db' => 'creado_en', 'dt'             => 11)
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
    public function guardar_consulta()
    {
        $data  = null;

        if ($this->request->isAJAX()) {

            if(empty($this->request->getPost('id_consulta')))
            {
                    //validación de formulario
                    $validation = \Config\Services::validation();

                    $val = $this->validate(
                        [ // rules
                            "tratamiento"           => 'required',
                            "motivo_tratamiento"    => "alpha_space",
                            "alergico_medicamento"  => "required",
                            "cual_medicamento"      => "alpha_space",
                            "alguna_cirugia"        => "required",
                            "porque"                => "alpha_space",
                            "cepilla_diente"        => "required",
                            "cuanto_dia"            => "alpha_numeric_space",
                            "id_persona1"           => "required",

                        ],
                        [ // errors
                            "tratamiento" => [
                                "required" => " El tratamiento es requerido"
                            ],
                            "motivo_tratamiento" => [
                                "alpha_space" => "El motivo del tratamiento debe llevar caracteres alfabéticos o espacios."
                            ],
                            "alergico_medicamento" => [
                                "required" => " El alergico a medicamento es requerido"
                            ],
                            "cual_medicamento" => [
                                "alpha_space" => "Cual medicamento debe llevar caracteres alfabéticos o espacios.",
                            ],
                            "alguna_cirugia" => [
                                "required" => " La cirugia es requerido"
                            ],
                            "porque" => [
                                "alpha_space" => "El por que  debe llevar caracteres alfabéticos o espacios."
                            ],
                            "cepilla_diente" => [
                                "required" => " El cepilla diente es requerido"
                            ],
                            "cuanto_dia" => [
                                "alpha_numeric_space" => "Cuanto al dia debe llevar caracteres alfabéticos, numericpos o espacios."
                            ],
                            "id_persona1" => [
                                "required" => "el id del paciente es requerido."
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
                            "tratamiento"               => $this->request->getPost("tratamiento"),
                            "motivo_tratamiento"        => $this->request->getPost("motivo_tratamiento"),
                            "alergico_medicamento"      => $this->request->getPost("alergico_medicamento"),
                            "cual_medicamento"          => $this->request->getPost("cual_medicamento"),
                            "alguna_cirugia"            => $this->request->getPost("alguna_cirugia"),
                            "porque"                    => $this->request->getPost("porque"),
                            "alguna_enfermedad"         => implode(',',empty($this->request->getPost("alguna_enfermedad[]"))?[]: $this->request->getPost("alguna_enfermedad[]")),
                            "cepilla_diente"           => $this->request->getPost("cepilla_diente"),
                            "cuanto_dia"                => $this->request->getPost("cuanto_dia"),
                            "id_paciente"               => $this->request->getPost("id_persona1"),
                            "creado_en"                 => $this->fecha->format('Y-m-d H:i:s')
                        );
                       
                        $respuesta = $this->model->consulta("insert", $data, null, null);
                        if (is_numeric($respuesta)) {
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "Consulta registrado correctamente",
                                "id_consulta"=> $respuesta
                            )));
                        }
                    }
            } else {
                // actualizar enfermedad
                //validación de formulario
                $validation = \Config\Services::validation();
                helper(['form', 'url']);
                $val = $this->validate(
                    [ // rules
                        'id_consulta'           => 'required',
                        "tratamiento"           => 'required',
                        "motivo_tratamiento"    => "alpha_space",
                        "alergico_medicamento"  => "required",
                        "cual_medicamento"      => "alpha_space",
                        "alguna_cirugia"        => "required",
                        "porque"                => "alpha_space",
                        "cepilla_diente"        => "required",
                        "cuanto_dia"            => "alpha_numeric_space",
                        'id_persona1'           => 'required',
                    ],
                    [ // errors
                        "id_consulta" => [
                            "required"  => "Error al editar la consulta por favor vuelve a empezar"
                        ],
                        "tratamiento" => [
                            "required" => " El tratamiento es requerido"
                        ],
                        "motivo_tratamiento" => [
                            "alpha_space" => "El motivo del tratamiento debe llevar caracteres alfabéticos o espacios."
                        ],
                        "alergico_medicamento" => [
                            "required" => " El alergico a medicamento es requerido"
                        ],
                        "cual_medicamento" => [
                            "alpha_space" => "Cual medicamento debe llevar caracteres alfabéticos o espacios."
                        ],
                        "alguna_cirugia" => [
                            "required" => " La cirugia es requerido"
                        ],
                        "porque" => [
                            "alpha_space" => "El por que  debe llevar caracteres alfabéticos o espacios."
                        ],
                        "cepilla_diente" => [
                            "required" => " El cepilla diente es requerido"
                        ],
                        "cuanto_dia" => [
                            "alpha_numeric_space" => "Cuanto al dia debe llevar caracteres alfabéticos, numericos o espacios."
                        ],
                        "id_persona1" => [
                            "required"  => "el id del paciente es requerido"
                    ]
                  ]
                );

                if (!$val) {
                    // se devuelve todos los errores si falla la validacion
                    return $this->response->setJSON(json_encode(array(
                        "form" => $validation->listErrors()
                    )));
                } else {
                    // Actualizar datos
                    $alguna_enfermedad = 
                    $data = array(
                        "tratamiento"               => $this->request->getPost("tratamiento"),
                        "motivo_tratamiento"        => $this->request->getPost("motivo_tratamiento"),
                        "alergico_medicamento"      => $this->request->getPost("alergico_medicamento"),
                        "cual_medicamento"          => $this->request->getPost("cual_medicamento"),
                        "alguna_cirugia"            => $this->request->getPost("alguna_cirugia"),
                        "porque"                    => $this->request->getPost("porque"),
                        "alguna_enfermedad"         => implode(',', empty($this->request->getPost("alguna_enfermedad[]"))?[]: $this->request->getPost("alguna_enfermedad[]")),
                        "cepilla_diente"            => $this->request->getPost("cepilla_diente"),
                        "cuanto_dia"                => $this->request->getPost("cuanto_dia"),
                        "id_paciente"               => $this->request->getPost("id_persona1"),
                        "actualizado_en"            => $this->fecha->format('Y-m-d H:i:s')
                    );
                    //var_dump($this->request->getPost("id_consulta"));
                   // return var_dump($data);
                    //return var_dump(implode(',',empty($this->request->getPost("alguna_enfermedad[]"))?[]: $this->request->getPost("alguna_enfermedad[]")));
                    $respuesta = $this->model->consulta(
                        "update",
                        $data,
                        array(
                            "id_consulta" => $this->request->getPost("id_consulta")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar cita

                        return $this->response->setJSON(json_encode(array(
                            'exito' => "El formulario de la consulta ha sido guardado correctamente",
                            "id_consulta"=> $respuesta
                        )));
                    }
                }
            }
        }
    }

    // Editar enfermedad
    public function editar_Consulta()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_consulta(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }
}
