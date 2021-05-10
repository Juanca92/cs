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
    public function ajaxListarConsulta()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_tratamiento_consulta';
            $primaryKey = 'id_consulta';
            $where = " ";

            $columns = array(
                array('db' => 'id_consulta', 'dt'           => 0),
                array('db' => 'tratamiento', 'dt'           => 1),
                array('db' => 'motivo_tratamiento', 'dt'    => 2),
                array('db' => 'tomando_medicamentos', 'dt'  => 3),
                array('db' => 'porque_tiempo', 'dt'         => 4),
                array('db' => 'alergico_medicamento', 'dt'  => 5),
                array('db' => 'cual_medicamento', 'dt'      => 6),
                array('db' => 'alguna_cirugia', 'dt'        => 7),
                array('db' => 'porque', 'dt'                => 8),
                array('db' => 'alguna_enfermedad', 'dt'     => 9),
                array('db' => 'cepilla_diente', 'dt'        => 10),
                array('db' => 'cuanto_dia', 'dt'            => 11),
                array('db' => 'nombre_paciente', 'dt'       => 12),
                array('db' => 'creado_en', 'dt'             => 13)
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

            if ($this->request->getPost("accion") == "in" && $this->request->getPost("id") == "") {

                if (true) {
                    //validación de formulario
                    $validation = \Config\Services::validation();

                    $val = $this->validate(
                        [ // rules
                            "tratamiento"           => 'required|alpha_space',
                            "motivo_tratamiento"    => "alpha_space",
                            "tomando_medicamentos"  => "required|alpha_space",
                            "porque_tiempo"         => "alpha_space",
                            "alergico_medicamento"  => "required|alpha_space",
                            "cual_medicamento"      => "alpha_space",
                            "alguna_cirugia"        => "required|alpha_space",
                            "porque"                => "alpha_space",
                            "saranpion"             => "alpha_space",
                            "varicela"              => "alpha_space",
                            "tuberculosis"          => "alpha_space",
                            "diabetes"              => "alpha_space",
                            "asma"                  => "alpha_space",
                            "epatitis"              => "alpha_space",
                            "otras"                 => "alpha_space",
                            "cepilla_diente"        => "required|alpha_space",
                            "cuanto_dia"            => "alpha_space",
                            
                        ],
                        [ // errors
                            "tratamiento" => [
                                "required" => " El tratamiento es requerido",
                                "alpha_space" => "El tratamiento debe llevar caracteres alfabéticos o espacios."
                            ],
                            "motivo_tratamiento" => [
                                "alpha_space" => "El motivo del tratamiento debe llevar caracteres alfabéticos o espacios."
                            ],
                            "tomando_medicamentos" => [
                                "required" => " Esta tomando medicamentos? es requerido",
                                "alpha_space" => "Las sintomas principales debe llevar caracteres alfabéticos o espacios."
                            ],
                            "porque_tiempo" => [
                                "alpha_space" => "El por que y cuanto tiempo debe llevar caracteres alfabéticos o espacios."
                            ],
                            "alergico_medicamento" => [
                                "required" => " El alergico a medicamento es requerido",
                                "alpha_space" => "El alergico a medicamento debe llevar caracteres alfabéticos o espacios."
                            ],
                            "cual_medicamento" => [
                                "alpha_space" => "Cual medicamento debe llevar caracteres alfabéticos o espacios."
                            ],
                            "alguna_cirugia" => [
                                "required" => " La cirugia es requerido",
                                "alpha_space" => "La cirugia debe llevar caracteres alfabéticos o espacios."
                            ],
                            "porque" => [
                                "alpha_space" => "El por que  debe llevar caracteres alfabéticos o espacios."
                            ],
                            "saranpion" => [
                                "alpha_space" => "Saranpion  debe llevar caracteres alfabéticos o espacios."
                            ],
                            "varicela" => [
                                "alpha_space" => "Varicela debe llevar caracteres alfabéticos o espacios."
                            ],
                            "tuberculosis" => [
                                "alpha_space" => "Tuberculosis debe llevar caracteres alfabéticos o espacios."
                            ],
                            "diabetes" => [
                                "alpha_space" => "Diabetes debe llevar caracteres alfabéticos o espacios."
                            ],
                            "asma" => [
                                "alpha_space" => "Asma debe llevar caracteres alfabéticos o espacios."
                            ],
                            "epatitis" => [
                                "alpha_space" => "Epatitis debe llevar caracteres alfabéticos o espacios."
                            ],
                            "otras" => [
                                "alpha_space" => "Otras debe llevar caracteres alfabéticos o espacios."
                            ],
                            "cepilla_diente" => [
                                "required" => " El cepilla diente es requerido",
                                "alpha_space" => "El cepilla diente debe llevar caracteres alfabéticos o espacios."
                            ],
                            "cuanto_dia" => [
                                "alpha_space" => "Cuanto al dia debe llevar caracteres alfabéticos o espacios."
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
                            "tomando_medicamento"       => $this->request->getPost("tomando_medicamento"),
                            "porque_tiempo"             => $this->request->getPost("porque_tiempo"),
                            "alergico_medicamento"      => $this->request->getPost("alergico_medicamento"),
                            "cual_medicamento"          => $this->request->getPost("cual_medicamento"),
                            "alguna_cirugia"            => $this->request->getPost("alguna_cirugia"),
                            "porque"                    => $this->request->getPost("porque"),
                            "saranpion"                 => ucwords(strtolower(trim($this->request->getPost("saranpion")))),
                            "varicela"                  => ucwords(strtolower(trim($this->request->getPost("varicela")))),
                            "tuberculosis"              => ucwords(strtolower(trim($this->request->getPost("tuberculosis")))),
                            "diabetes"                  => ucwords(strtolower(trim($this->request->getPost("diabetes")))),
                            "asma"                      => ucwords(strtolower(trim($this->request->getPost("asma")))),
                            "epatitis"                  => ucwords(strtolower(trim($this->request->getPost("epatitis")))),
                            "otras"                     => ucwords(strtolower(trim($this->request->getPost("otras")))),
                            "cepilla_dientes"           => $this->request->getPost("cepilla_dientes"),
                            "cuanto_dia"                => $this->request->getPost("cuanto_dia"),
                            "id_paciente"               => "id_paciente"
                            "creado_en"                 => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta = $this->model->cita("insert", $data, null, null);
                        if (is_numeric($respuesta)) {
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "Consulta registrado correctamente"
                            )));
                        }
                    }
                }
            } else {
                // actualizar enfermedad
                //validación de formulario
                $validation = \Config\Services::validation();
                helper(['form', 'url']);
                $val = $this->validate(
                    [ // rules
                        'id'                    => 'required',
                        "tratamiento"           => 'required|alpha_space',
                        "motivo_tratamiento"    => "alpha_space",
                        "tomando_medicamentos"  => "required|alpha_space",
                        "porque_tiempo"         => "alpha_space",
                        "alergico_medicamento"  => "required|alpha_space",
                        "cual_medicamento"      => "alpha_space",
                        "alguna_cirugia"        => "required|alpha_space",
                        "porque"                => "alpha_space",
                        "saranpion"             => "alpha_space",
                        "varicela"              => "alpha_space",
                        "tuberculosis"          => "alpha_space",
                        "diabetes"              => "alpha_space",
                        "asma"                  => "alpha_space",
                        "epatitis"              => "alpha_space",
                        "otras"                 => "alpha_space",
                        "cepilla_diente"        => "required|alpha_space",
                        "cuanto_dia"            => "alpha_space",
                    ],
                    [ // errors
                        "id" => [
                            "required"  => "Error al editar la enfermedad por favor vuelve a empezar"
                        ],
                        "tratamiento" => [
                            "required" => " El tratamiento es requerido",
                            "alpha_space" => "El tratamiento debe llevar caracteres alfabéticos o espacios."
                        ],
                        "motivo_tratamiento" => [
                            "alpha_space" => "El motivo del tratamiento debe llevar caracteres alfabéticos o espacios."
                        ],
                        "tomando_medicamentos" => [
                            "required" => " Esta tomando medicamentos? es requerido",
                            "alpha_space" => "Las sintomas principales debe llevar caracteres alfabéticos o espacios."
                        ],
                        "porque_tiempo" => [
                            "alpha_space" => "El por que y cuanto tiempo debe llevar caracteres alfabéticos o espacios."
                        ],
                        "alergico_medicamento" => [
                            "required" => " El alergico a medicamento es requerido",
                            "alpha_space" => "El alergico a medicamento debe llevar caracteres alfabéticos o espacios."
                        ],
                        "cual_medicamento" => [
                            "alpha_space" => "Cual medicamento debe llevar caracteres alfabéticos o espacios."
                        ],
                        "alguna_cirugia" => [
                            "required" => " La cirugia es requerido",
                            "alpha_space" => "La cirugia debe llevar caracteres alfabéticos o espacios."
                        ],
                        "porque" => [
                            "alpha_space" => "El por que  debe llevar caracteres alfabéticos o espacios."
                        ],
                        "saranpion" => [
                            "alpha_space" => "Saranpion  debe llevar caracteres alfabéticos o espacios."
                        ],
                        "varicela" => [
                            "alpha_space" => "Varicela debe llevar caracteres alfabéticos o espacios."
                        ],
                        "tuberculosis" => [
                            "alpha_space" => "Tuberculosis debe llevar caracteres alfabéticos o espacios."
                        ],
                        "diabetes" => [
                            "alpha_space" => "Diabetes debe llevar caracteres alfabéticos o espacios."
                        ],
                        "asma" => [
                            "alpha_space" => "Asma debe llevar caracteres alfabéticos o espacios."
                        ],
                        "epatitis" => [
                            "alpha_space" => "Epatitis debe llevar caracteres alfabéticos o espacios."
                        ],
                        "otras" => [
                            "alpha_space" => "Otras debe llevar caracteres alfabéticos o espacios."
                        ],
                        "cepilla_diente" => [
                            "required" => " El cepilla diente es requerido",
                            "alpha_space" => "El cepilla diente debe llevar caracteres alfabéticos o espacios."
                        ],
                        "cuanto_dia" => [
                            "alpha_space" => "Cuanto al dia debe llevar caracteres alfabéticos o espacios."
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
                    $data = array(
                        "tratamiento"               => $this->request->getPost("tratamiento"),
                        "motivo_tratamiento"        => $this->request->getPost("motivo_tratamiento"),
                        "tomando_medicamento"       => $this->request->getPost("tomando_medicamento"),
                        "porque_tiempo"             => $this->request->getPost("porque_tiempo"),
                        "alergico_medicamento"      => $this->request->getPost("alergico_medicamento"),
                        "cual_medicamento"          => $this->request->getPost("cual_medicamento"),
                        "alguna_cirugia"            => $this->request->getPost("alguna_cirugia"),
                        "porque"                    => $this->request->getPost("porque"),
                        "saranpion"                 => ucwords(strtolower(trim($this->request->getPost("saranpion")))),
                        "varicela"                  => ucwords(strtolower(trim($this->request->getPost("varicela")))),
                        "tuberculosis"              => ucwords(strtolower(trim($this->request->getPost("tuberculosis")))),
                        "diabetes"                  => ucwords(strtolower(trim($this->request->getPost("diabetes")))),
                        "asma"                      => ucwords(strtolower(trim($this->request->getPost("asma")))),
                        "epatitis"                  => ucwords(strtolower(trim($this->request->getPost("epatitis")))),
                        "otras"                     => ucwords(strtolower(trim($this->request->getPost("otras")))),
                        "cepilla_dientes"           => $this->request->getPost("cepilla_dientes"),
                        "cuanto_dia"                => $this->request->getPost("cuanto_dia"),
                        "id_paciente"               => "id_paciente"
                        "actualizado_en"    => $this->fecha->format('Y-m-d H:i:s')
                    );

                    $respuesta = $this->model->consulta(
                        "update",
                        $data,
                        array(
                            "id_consulta" => $this->request->getPost("id")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar cita

                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Consulta editado correctamente"
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