<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\FisicoModel;

class Fisico extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new FisicoModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['paciente'] = $this->model->listar_paciente();
        return $this->templater->view("tratamiento/index", $this->data);
    }

    // Listado de tratamiento fisico
    public function ajaxListarFisico()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_tratamiento_fisico';
            $primaryKey = 'id_fisico';
            $where = " ";

            $columns = array(
                array('db' => 'id_fisico', 'dt'                 => 0),
                array('db' => 'presion_alterial', 'dt'          => 1),
                array('db' => 'pulso', 'dt'                     => 2),
                array('db' => 'temperatura', 'dt'               => 3),
                array('db' => 'frecuencia_cardiaca', 'dt'       => 4),
                array('db' => 'frecuencia_respiratoria', 'dt'   => 5),
                array('db' => 'peso', 'dt'                      => 6),
                array('db' => 'talla', 'dt'                     => 7),
                array('db' => 'masa_corporal', 'dt'             => 8),
                array('db' => 'nombre_paciente', 'dt'           => 9),
                array('db' => 'creado_en', 'dt'                 => 10)
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

    // Insertar o Actualizar un tratamiento fisico
    public function guardar_fisico()
    {
        $data  = null;

        if ($this->request->isAJAX()) {

            if ($this->request->getPost("accion") == "in" && $this->request->getPost("id") == "") {

                if (true) {
                    //validación de formulario
                    $validation = \Config\Services::validation();

                    $val = $this->validate(
                        [ // rules
                            "presion_alterial"          => 'required|numeric',
                            "pulso"                     => 'required|numeric',
                            "temperatura"               => 'required|numeric',
                            "frecuencia_cardiaca"       => 'required|numeric',
                            "frecuencia_respiratoria"   => 'required|numeric',
                            "peso"                      => 'required|numeric',
                            "talla"                     => 'required|numeric',
                            "masa_corporal"             => 'required|numeric',
                        ],
                        [ // errors
                            "presion_alterial" => [
                                "required"   => "la presion arterial es requerido",
                                "numeric"    => "la presion arterial debe llevar caracteres numéricos."
                            ],
                            "pulso" => [
                                "required"   => "El pulso es requerido",
                                "numeric"    => "El El pulso debe llevar caracteres numéricos."
                            ],
                            "temperatura" => [
                                "required"   => "La temperatura es requerido",
                                "numeric"    => "La temperatura debe llevar caracteres numéricos."
                            ],
                            "frecuencia_cardiaca" => [
                                "required"   => "La frecuencia cardiaca es requerido",
                                "numeric"    => "La frecuencia cardiaca debe llevar caracteres numéricos."
                            ],
                            "frecuencia_respiratoria" => [
                                "required"   => "La frecuencia respiratoria es requerido",
                                "numeric"    => "La frecuencia respiratoria debe llevar caracteres numéricos."
                            ],
                            "peso" => [
                                "required"   => "El peso es requerido",
                                "numeric"    => "El peso debe llevar caracteres numéricos."
                            ],
                            "talla" => [
                                "required"   => "La talla es requerido",
                                "numeric"    => "La talla debe llevar caracteres numéricos."
                            ],
                            "masa_corporal" => [
                                "required"   => "La masa muscular es requerido",
                                "numeric"    => "La masa muscular debe llevar caracteres numéricos."
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
                            "presion_alterial"          => $this->request->getPost("presion_alterial"),
                            "pulso"                     => $this->request->getPost("pulso"),
                            "temperatura"               => $this->request->getPost("temperatura"),
                            "frecuencia_cardiaca"       => $this->request->getPost("frecuencia_cardiaca"),
                            "frecuencia_respiratoria"   => $this->request->getPost("frecuencia_respiratoria"),
                            "peso"                      => $this->request->getPost("peso"),
                            "talla"                     => $this->request->getPost("talla"),
                            "masa_corporal"             => $this->request->getPost("masa_corporal"),
                            "id_paciente"               => "id_paciente",
                            "creado_en"                 => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta = $this->model->cita("insert", $data, null, null);
                        if (is_numeric($respuesta)) {
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "Tratamiento fisico registrado correctamente"
                            )));
                        }
                    }
                }
            } else {
                // actualizar tratamiento fisico
                //validación de formulario
                $validation = \Config\Services::validation();
                helper(['form', 'url']);
                $val = $this->validate(
                    [ // rules
                        'id'                        => 'required',
                        "presion_alterial"          => 'required|numeric',
                        "pulso"                     => 'required|numeric',
                        "temperatura"               => 'required|numeric',
                        "frecuencia_cardiaca"       => 'required|numeric',
                        "frecuencia_respiratoria"   => 'required|numeric',
                        "peso"                      => 'required|numeric',
                        "talla"                     => 'required|numeric',
                        "masa_corporal"             => 'required|numeric',
                    ],
                    [ // errors
                        "id" => [
                            "required"  => "Error al editar el tratamiento fisico por favor vuelve a empezar"
                        ],
                        "presion_alterial" => [
                            "required"   => "la presion arterial es requerido",
                            "numeric"    => "la presion arterial debe llevar caracteres numéricos."
                        ],
                        "pulso" => [
                            "required"   => "El pulso es requerido",
                            "numeric"    => "El El pulso debe llevar caracteres numéricos."
                        ],
                        "temperatura" => [
                            "required"   => "La temperatura es requerido",
                            "numeric"    => "La temperatura debe llevar caracteres numéricos."
                        ],
                        "frecuencia_cardiaca" => [
                            "required"   => "La frecuencia cardiaca es requerido",
                            "numeric"    => "La frecuencia cardiaca debe llevar caracteres numéricos."
                        ],
                        "frecuencia_respiratoria" => [
                            "required"   => "La frecuencia respiratoria es requerido",
                            "numeric"    => "La frecuencia respiratoria debe llevar caracteres numéricos."
                        ],
                        "peso" => [
                            "required"   => "El peso es requerido",
                            "numeric"    => "El peso debe llevar caracteres numéricos."
                        ],
                        "talla" => [
                            "required"   => "La talla es requerido",
                            "numeric"    => "La talla debe llevar caracteres numéricos."
                        ],
                        "masa_corporal" => [
                            "required"   => "La masa muscular es requerido",
                            "numeric"    => "La masa muscular debe llevar caracteres numéricos."
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
                        "presion_alterial"          => $this->request->getPost("presion_alterial"),
                        "pulso"                     => $this->request->getPost("pulso"),
                        "temperatura"               => $this->request->getPost("temperatura"),
                        "frecuencia_cardiaca"       => $this->request->getPost("frecuencia_cardiaca"),
                        "frecuencia_respiratoria"   => $this->request->getPost("frecuencia_respiratoria"),
                        "peso"                      => $this->request->getPost("peso"),
                        "talla"                     => $this->request->getPost("talla"),
                        "masa_corporal"             => $this->request->getPost("masa_corporal"),
                        "id_paciente"               => "id_paciente",
                        "actualizado_en"    => $this->fecha->format('Y-m-d H:i:s')
                    );

                    $respuesta = $this->model->enfermedad(
                        "update",
                        $data,
                        array(
                            "id_fisico" => $this->request->getPost("id")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar tratamiento fisico

                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Tratamiento fisico editado correctamente"
                        )));
                    }
                }
            }
        }
    }

    // Editar enfermedad
    public function editar_fisico()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_fisico(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }
}
