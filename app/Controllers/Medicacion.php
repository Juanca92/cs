<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\MedicacionModel;

class Medicacion extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MedicacionModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['paciente'] = $this->model->listar_paciente();
        return $this->templater->view("tratamiento/index", $this->data);
    }

    // Listado de citas
    public function ajaxListarMedicacion()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_medicacion';
            $primaryKey = 'id_medicacion';
            $where = "";

            $columns = array(
                array('db' => 'id_medicacion', 'dt'         => 0),
                array('db' => 'entrega_medicamento', 'dt'   => 1),
                array('db' => 'receta_medica', 'dt'         => 2),
                array('db' => 'recomendaciones', 'dt'       => 3),
                array('db' => 'id_paciente', 'dt'           => 4)
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
    
    public function guardar_medicacion()
    {
        $data  = null;

        if ($this->request->isAJAX()) {
            if(empty($this->request->getPost('id_medicacion')))
            {
                        //validación de formulario
                        $validation = \Config\Services::validation();
    
                        $val = $this->validate(
                            [ // rules
                                "entrega_medicamento"   => "required|alpha_numeric_space",
                                "receta_medica"         => "required|alpha_numeric_space",
                                "recomendaciones"       => "required|alpha_numeric_space",
                                "id_persona9"           => "required"
                            ],
                            [ // errors
                                "entrega_medicamento" => [
                                    "required" => " la entrega de medicamentos es requerido",
                                    "alpha_numeric_space" => "la entrega de medicamentos debe llevar caracteres alfabéticos, numeros o espacios."
                                ],
                                "receta_medica" => [
                                    "required" => " La receta medica es requerido",
                                    "alpha_numeric_space" => "La receta medica debe llevar caracteres alfabéticos, numeros o espacios."
                                ],
                                "recomendaciones" => [
                                    "required" => " Las recomendaciones es requerido",
                                    "alpha_numeric_space" => "Las recomendaciones debe llevar caracteres alfabéticos, numeros o espacios."
                                ],
                                "id_persona9" => [
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
                                "entrega_medicamento"   => $this->request->getPost("entrega_medicamento"),
                                "receta_medica"         => $this->request->getPost("receta_medica"),
                                "recomendaciones"       => $this->request->getPost("recomendaciones"),
                                "id_paciente"           => $this->request->getPost("id_persona9")
                            );
    
                            $respuesta = $this->model->medicacion("insert", $data, null, null);
                            if (is_numeric($respuesta)) {
                                return $this->response->setJSON(json_encode(array(
                                    'exito' => "La medicacion fue registrado correctamente", 
                                    "id_medicacion"=> $respuesta
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
                            'id_medicacion'        => 'required',
                            "entrega_medicamento"   => "required|alpha_numeric_space",
                            "receta_medica"         => "required|alpha_numeric_space",
                            "recomendaciones"       => "required|alpha_numeric_space",
                            "id_persona9"           => "required"
                        ],
                        [ // errors
                            "id_medicacion" => [
                                "required"  => "Error al editar el diagnostico por favor vuelve a empezar"
                            ],
                            "entrega_medicamento" => [
                                "required" => " la entrega de medicamentos es requerido",
                                "alpha_numeric_space" => "la entrega de medicamentos debe llevar caracteres alfabéticos, numeros o espacios."
                            ],
                            "receta_medica" => [
                                "required" => " La receta medica es requerido",
                                "alpha_numeric_space" => "La receta medica debe llevar caracteres alfabéticos, numeros o espacios."
                            ],
                            "recomendaciones" => [
                                "required" => " Las recomendaciones es requerido",
                                "alpha_numeric_space" => "Las recomendaciones debe llevar caracteres alfabéticos, numeros o espacios."
                            ],
                            "id_persona9" => [
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
                            "entrega_medicamento"   => $this->request->getPost("entrega_medicamento"),
                            "receta_medica"         => $this->request->getPost("receta_medica"),
                            "recomendaciones"       => $this->request->getPost("recomendaciones"),
                            "id_paciente"           => $this->request->getPost("id_persona9")
                        );
    
                        $respuesta = $this->model->medicacion(
                            "update",
                            $data,
                            array(
                                "id_medicacion" => $this->request->getPost("id_medicacion")
                            ),
                            null
                        );
    
                        if ($respuesta) {
                            // Actualizar cita
    
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "La Receta medica ah sido guardado en la base de datos correctamente",
                                "id_medicacion"=> $respuesta
                            )));
                        }
                    }
                
            }
        }
    }
    public function editar_medicacion()
    {
    // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_medicacion(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }
}