<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\AccionesDecesivasModel;

class AccionesDecesivas extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new AccionesDecesivasModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['paciente'] = $this->model->listar_paciente();
        return $this->templater->view("tratamiento/index", $this->data);
    }

    // Listado de citas
    public function ajaxListarAccionesDecesivas()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_acciones_decesivas';
            $primaryKey = 'id_acciones_decesivas';
            $where = "";

            $columns = array(
                array('db' => 'id_acciones_decesivas', 'dt' => 0),
                array('db' => 'subjetivo', 'dt'            => 1),
                array('db' => 'objetivo', 'dt'             => 2),
                array('db' => 'analisis', 'dt'              => 3),
                array('db' => 'plan_accion', 'dt'           => 4),
                array('db' => 'id_paciente', 'dt'           => 5)
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

    public function guardar_accionesDecesivas()
    {
        $data  = null;

        if ($this->request->isAJAX()) {
            if (empty($this->request->getPost('id_acciones_decesivas'))) {
                //validación de formulario
                $validation = \Config\Services::validation();

                $val = $this->validate(
                    [ // rules
                        "subjetivo"     => "required|alpha_space",
                        "objetivo"      => "required|alpha_space",
                        "analisis"      => "required|alpha_space",
                        "plan_accion"  => "required|alpha_space",
                        "id_persona10"    => "required"
                    ],
                    [ // errors
                        "subjetivo" => [
                            "required" => " El subjetivo es requerido",
                            "alpha_space" => "El tipo de diagnostico debe llevar caracteres alfabéticos o espacios."
                        ],
                        "objetivo" => [
                            "required" => " La objetivo es requerido",
                            "alpha_space" => "La pieza dentaria debe llevar caracteres alfabéticos o espacios."
                        ],
                        "analisis" => [
                            "required" => " Analisis es requerido",
                            "alpha_space" => "Analisis debe llevar caracteres alfabéticos o espacios."
                        ],
                        "plan_accion" => [
                            "required" => " Las acciones  es requerido",
                            "alpha_space" => "Las acciones  debe llevar caracteres alfabéticos o espacios."
                        ],
                        "id_persona10" => [
                            "required"   => "el id del paciente es requerido"
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
                        "subjetivo"     => $this->request->getPost("subjetivo"),
                        "objetivo"      => $this->request->getPost("objetivo"),
                        "analisis"      => $this->request->getPost("analisis"),
                        "plan_accion"   => $this->request->getPost("plan_accion"),
                        "id_cita"   => $this->request->getPost("id_cita")
                    );

                    $respuesta = $this->model->accionesDecesivas("insert", $data, null, null);
                    if (is_numeric($respuesta)) {
                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Acciones decesivas fue registrado correctamente",
                            "id_acciones_decesivas" => $respuesta
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
                        'id_acciones_decesivas' => 'required',
                        "subjetivo"             => "required|alpha_space",
                        "objetivo"              => "required|alpha_space",
                        "analisis"              => "required|alpha_space",
                        "plan_accion"           => "required|alpha_space",
                        "id_persona10"          => "required"
                    ],
                    [ // errors
                        "id_acciones_decesivas" => [
                            "required"  => "Error al editar el diagnostico por favor vuelve a empezar"
                        ],
                        "subjetivo" => [
                            "required" => " El subjetivo es requerido",
                            "alpha_space" => "El tipo de diagnostico debe llevar caracteres alfabéticos o espacios."
                        ],
                        "objetivo" => [
                            "required" => " La objetivo es requerido",
                            "alpha_space" => "La pieza dentaria debe llevar caracteres alfabéticos o espacios."
                        ],
                        "analisis" => [
                            "required" => " Analisis es requerido",
                            "alpha_space" => "Analisis debe llevar caracteres alfabéticos o espacios."
                        ],
                        "plan_accion" => [
                            "required" => " Las acciones  es requerido",
                            "alpha_space" => "Las acciones  debe llevar caracteres alfabéticos o espacios."
                        ],
                        "id_persona10" => [
                            "required"   => "el id del paciente es requerido"
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
                        "subjetivo"     => $this->request->getPost("subjetivo"),
                        "objetivo"      => $this->request->getPost("objetivo"),
                        "analisis"      => $this->request->getPost("analisis"),
                        "plan_accion"   => $this->request->getPost("plan_accion"),
                        "id_cita"   => $this->request->getPost("id_cita")
                    );

                    $respuesta = $this->model->accionesDecesivas(
                        "update",
                        $data,
                        array(
                            "id_acciones_decesivas" => $this->request->getPost("id_acciones_decesivas")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar cita

                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Acciones decesivas ah sido editado correctamente",
                            "id_acciones_decesivas" => $respuesta
                        )));
                    }
                }
            }
        }
    }
    public function editar_accionesDecesivas()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_accionesDecesivas(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }
}
