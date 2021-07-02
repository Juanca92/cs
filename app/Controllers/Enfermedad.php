<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\EnfermedadModel;

class Enfermedad extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new EnfermedadModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['paciente'] = $this->model->listar_paciente();
        return $this->templater->view("tratamiento/index", $this->data);
    }

    // Listado de citas
    public function ajaxListarEnfermedades()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_tratamiento_enfermedad';
            $primaryKey = 'id_enfermedad';
            $where = "";

            $columns = array(
                array('db' => 'id_enfermedad', 'dt'           => 0),
                array('db' => 'tiempo_consulta', 'dt'         => 1),
                array('db' => 'motivo_consulta', 'dt'         => 2),
                array('db' => 'sintomas_principales', 'dt'    => 3),
                array('db' => 'tomando_medicamentos', 'dt'     => 4),
                array('db' => 'nombre_medicamento', 'dt'      => 5),
                array('db' => 'motivo_medicamento', 'dt'      => 6),
                array('db' => 'dosis_medicamento', 'dt'       => 7),
                array('db' => 'nombre_paciente', 'dt'         => 8)
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
    
    public function guardar_enfermedad()
    {
        $data  = null;

        if ($this->request->isAJAX()) {
            if(empty($this->request->getPost('id_enfermedad')))
            {
                        //validación de formulario
                        $validation = \Config\Services::validation();
    
                        $val = $this->validate(
                            [ // rules
                                "tiempo_consulta"       => "required|alpha_numeric_space",
                                "motivo_consulta"       => "required|alpha_numeric_space",
                                "sintomas_principales"  => "required|alpha_numeric_space",
                                "tomando_medicamento"   => "required",
                                "nombre_medicamento"    => "alpha_space",
                                "motivo_medicamento"    => "alpha_space",
                                "dosis_medicamento"     => "alpha_numeric_space",
                                "id_persona"            => "required"
                            ],
                            [ // errors
                                "tiempo_consulta" => [
                                    "required" => " El tiempo de enfermedad es requerido",
                                    "alpha_numeric_space" => "el tiempo de enfermedad debe llevar letras espacios y numeros"
                                ],
                                "motivo_consulta" => [
                                    "required" => " El motivo de la consulta es requerido",
                                    "alpha_numeric_space" => "El motivo de la consulta debe llevar caracteres alfabéticos, numericos o espacios."
                                ],
                                "sintomas_principales" => [
                                    "required" => " Las sintomas principales es requerido",
                                    "alpha_numeric_space" => "Las sintomas principales debe llevar caracteres alfabéticos, numericos o espacios."
                                ],
                                "tomando_medicamento" => [
                                    "required"   => "tomando algun medicamento es requerido"
                                ],
                                "nombre_medicamento" => [
                                    "alpha_space" => "El nombre del medicamento debe llevar caracteres alfabéticos o espacios."
                                ],
                                "motivo_medicamento" => [
                                    "required" => " El motivo de la consulta es requerido",
                                    "alpha_space" => "El motivo de la consulta debe llevar caracteres alfabéticos o espacios."
                                ],
                                "dosis_medicamento" => [
                                    "alpha_numeric_space"    => "Dosis de medicamento debe llevar caracteres numericos."
                                ],
                                "id_persona" => [
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
                                "tiempo_consulta"       => $this->request->getPost("tiempo_consulta"),
                                "motivo_consulta"       => $this->request->getPost("motivo_consulta"),
                                "sintomas_principales"  => $this->request->getPost("sintomas_principales"),
                                "tomando_medicamentos"   => $this->request->getPost("tomando_medicamento"),
                                "nombre_medicamento"    => $this->request->getPost("nombre_medicamento"),
                                "motivo_medicamento"    => $this->request->getPost("motivo_medicamento"),
                                "dosis_medicamento"     => $this->request->getPost("dosis_medicamento"),
                                "id_paciente"           => $this->request->getPost("id_persona")
                            );
    
                            $respuesta = $this->model->enfermedad("insert", $data, null, null);
                            if (is_numeric($respuesta)) {
                                return $this->response->setJSON(json_encode(array(
                                    'exito' => "enfermedad registrado correctamente", 
                                    "id_enfermedad"=> $respuesta
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
                            'id_enfermedad'         => 'required',
                            "tiempo_consulta"       => "required|alpha_numeric_space",
                            "motivo_consulta"       => "required|alpha_space",
                            "sintomas_principales"  => "required|alpha_space",
                            "tomando_medicamento"   => "required",
                            "nombre_medicamento"    => "alpha_space",
                            "motivo_medicamento"    => "alpha_space",
                            "dosis_medicamento"     => "alpha_numeric_space",
                            "id_persona"           => "required"
                        ],
                        [ // errors
                            "id_enfermedad" => [
                                "required"  => "Error al editar enfermedad por favor vuelve a empezar"
                            ],
                            "tiempo_consulta" => [
                                "required" => " El tiempo de enfermedad es requerido",
                                "alpha_numeric_space" => "el tiempo de enfermedad debe llevar letras espacios y numeros"
                            ],
                            "motivo_consulta" => [
                                "required" => " El motivo de la consulta es requerido",
                                "alpha_numeric_space" => "El motivo de la consulta debe llevar caracteres alfabéticos, numericos o espacios."
                            ],
                            "sintomas_principales" => [
                                "required" => " Las sintomas principales es requerido",
                                "alpha_numeric_space" => "Las sintomas principales debe llevar caracteres alfabéticos, numericos o espacios."
                            ],
                            "tomando_medicamento" => [
                                "required"   => "tomando algun medicamento es requerido"
                            ],
                            "nombre_medicamento" => [
                                "alpha_space" => "El nombre del medicamento debe llevar caracteres alfabéticos o espacios."
                            ],
                            "motivo_medicamento" => [
                                "alpha_space" => "El motivo de la consulta debe llevar caracteres alfabéticos o espacios."
                            ],
                            "dosis_medicamento" => [
                                "alpha_numeric_space"    => "Dosis de medicamento debe llevar caracteres numericos."
                            ],
                            "id_persona" => [
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
                            "tiempo_consulta"       => $this->request->getPost("tiempo_consulta"),
                            "motivo_consulta"       => $this->request->getPost("motivo_consulta"),
                            "sintomas_principales"  => $this->request->getPost("sintomas_principales"),
                            "tomando_medicamentos"   => $this->request->getPost("tomando_medicamento"),
                            "nombre_medicamento"    => $this->request->getPost("nombre_medicamento"),
                            "motivo_medicamento"    => $this->request->getPost("motivo_medicamento"),
                            "dosis_medicamento"     => $this->request->getPost("dosis_medicamento"),
                            "id_paciente"           => $this->request->getPost("id_persona")
                        );
    
                        $respuesta = $this->model->enfermedad(
                            "update",
                            $data,
                            array(
                                "id_enfermedad" => $this->request->getPost("id_enfermedad")
                            ),
                            null
                        );
    
                        if ($respuesta) {
                            // Actualizar cita
    
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "El formulario de preguntas de la enfermedad actual que tiene el paciente ah sido guradado correctamente",
                                "id_enfermedad"=> $respuesta
                            )));
                        }
                    }
                
            }
        }
    }
    public function editar_enfermedad()
    {
    // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_enfermedad(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }
}
