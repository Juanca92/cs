<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\DiagnosticoModel;

class Diagnostico extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new DiagnosticoModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['paciente'] = $this->model->listar_paciente();
        return $this->templater->view("tratamiento/index", $this->data);
    }

    // Listado de citas
    public function ajaxListarDiagnostico()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_diagnostico';
            $primaryKey = 'id_diagnostico';
            $where = "";

            $columns = array(
                array('db' => 'id_diagnostico', 'dt'        => 0),
                array('db' => 'tipo_diagnostico', 'dt'      => 1),
                array('db' => 'pieza_dentaria', 'dt'        => 2),
                array('db' => 'medida_preventiva', 'dt' => 3),
                array('db' => 'acciones_curativas', 'dt'    => 4),
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
    
    public function guardar_diagnostico()
    {
        $data  = null;

        if ($this->request->isAJAX()) {
            if(empty($this->request->getPost('id_diagnostico')))
            {
                        //validación de formulario
                        $validation = \Config\Services::validation();
    
                        $val = $this->validate(
                            [ // rules
                                "tipo_diagnostico"     => "required|alpha_space",
                                "pieza_dentaria"       => "required|alpha_numeric_space",
                                "medida_preventiva"    => "required|alpha_space",
                                "acciones_curativas"   => "required|alpha_space",
                                "id_persona8"           => "required"
                            ],
                            [ // errors
                                "tipo_diagnostico" => [
                                    "required" => " El tipo de diagnostico es requerido",
                                    "alpha_space" => "El tipo de diagnostico debe llevar caracteres alfabéticos o espacios."
                                ],
                                "pieza_dentaria" => [
                                    "required" => " La pieza dentaria es requerido",
                                    "alpha_numeric_space" => "La pieza dentaria debe llevar caracteres alfabéticos,numericos o espacios."
                                ],
                                "medida_preventiva" => [
                                    "required" => " Las medidas preventivas es requerido",
                                    "alpha_space" => "Las medidas preventivas debe llevar caracteres alfabéticos o espacios."
                                ],
                                "acciones_curativas" => [
                                    "required" => " Las acciones curativas es requerido",
                                    "alpha_space" => "Las acciones curativas debe llevar caracteres alfabéticos o espacios."
                                ],
                                "id_persona8" => [
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
                                "tipo_diagnostico"       => $this->request->getPost("tipo_diagnostico"),
                                "pieza_dentaria"       => $this->request->getPost("pieza_dentaria"),
                                "medida_preventiva"  => $this->request->getPost("medida_preventiva"),
                                "acciones_curativas"   => $this->request->getPost("acciones_curativas"),
                                "id_paciente"           => $this->request->getPost("id_persona8")
                            );
    
                            $respuesta = $this->model->diagnostico("insert", $data, null, null);
                            if (is_numeric($respuesta)) {
                                return $this->response->setJSON(json_encode(array(
                                    'exito' => "El diagnostico fue registrado correctamente", 
                                    "id_diagnostico"=> $respuesta
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
                            'id_diagnostico'        => 'required',
                            "tipo_diagnostico"     => "required|alpha_space",
                            "pieza_dentaria"       => "required|alpha_numeric_space",
                            "medida_preventiva"    => "required|alpha_space",
                            "acciones_curativas"   => "required|alpha_space",
                            "id_persona8"           => "required"
                        ],
                        [ // errors
                            "id_diagnostico" => [
                                "required"  => "Error al editar el diagnostico por favor vuelve a empezar"
                            ],
                            "tipo_diagnostico" => [
                                "required" => " El tipo de diagnostico es requerido",
                                "alpha_space" => "El tipo de diagnostico debe llevar caracteres alfabéticos o espacios."
                            ],
                            "pieza_dentaria" => [
                                "required" => " La pieza dentaria es requerido",
                                "alpha_numeric_space" => "La pieza dentaria debe llevar caracteres alfabéticos, numericos o espacios."
                            ],
                            "medida_preventiva" => [
                                "required" => " Las medidas preventivas es requerido",
                                "alpha_space" => "Las medidas preventivas debe llevar caracteres alfabéticos o espacios."
                            ],
                            "acciones_curativas" => [
                                "required" => " Las acciones curativas es requerido",
                                "alpha_space" => "Las acciones curativas debe llevar caracteres alfabéticos o espacios."
                            ],
                            "id_persona8" => [
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
                            "tipo_diagnostico"       => $this->request->getPost("tipo_diagnostico"),
                            "pieza_dentaria"       => $this->request->getPost("pieza_dentaria"),
                            "medida_preventiva"  => $this->request->getPost("medida_preventiva"),
                            "acciones_curativas"   => $this->request->getPost("acciones_curativas"),
                            "id_paciente"           => $this->request->getPost("id_persona8")
                        );
    
                        $respuesta = $this->model->diagnostico(
                            "update",
                            $data,
                            array(
                                "id_diagnostico" => $this->request->getPost("id_diagnostico")
                            ),
                            null
                        );
    
                        if ($respuesta) {
                            // Actualizar cita
    
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "El diagnostico ah sido Guardado en la base de datos correctamente",
                                "id_diagnostico"=> $respuesta
                            )));
                        }
                    }
                
            }
        }
    }
    public function editar_diagnostico()
    {
    // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_diagnostico(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }
}