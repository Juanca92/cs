<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\AlergiaModel;

class Alergia extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new AlergiaModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        return $this->templater->view("tratamiento/index", $this->data);
    }
    // Listado de alergias
    public function ajaxListarAlergias()
    {
        //return var_dump($_REQUEST);
        if ($this->request->isAJAX()) {
            $table = 'sp_view_tratamiento_alergias';
            $primaryKey = 'id_alergia';
            $where = 'id_paciente=' . $this->request->getGet('id_persona');

            $columns = array(
                array('db' => 'id_alergia', 'dt'        => 0),
                array('db' => 'nombre_alergia', 'dt'    => 1),
                array('db' => 'detalle', 'dt'           => 2),
                array('db' => 'nombre_paciente', 'dt'   => 3),
                array('db' => 'creado_en', 'dt'         => 4)
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

    // Insertar o Actualizar Una alergia
    public function guardar_alergia()
    {
        $data  = null;

        if ($this->request->isAJAX()) {

            if (empty($this->request->getPost('id_alergia'))) {
                //validación de formulario
                $validation = \Config\Services::validation();

                $val = $this->validate(
                    [ // rules
                        "nombre_alergia"    => "required|alpha_space",
                        "detalle"           => "required|alpha_space",
                        "id_persona3"        => "required"
                    ],
                    [ // errors
                        "nombre_alergia" => [
                            "required" => " El nombre_alergia es requerido",
                            "alpha_space" => "El nombre_alergia debe llevar caracteres alfabéticos o espacios."
                        ],
                        "detalle" => [
                            "required" => " El detalle es requerido",
                            "alpha_space" => "El detalle debe llevar caracteres alfabéticos o espacios."
                        ],
                        "id_persona3" => [
                            "required" => " El id del paciente es requerido"
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
                        "nombre_alergia"        => $this->request->getPost("nombre_alergia"),
                        "detalle"               => $this->request->getPost("detalle"),
                        "id_paciente"           => $this->request->getPost("id_persona3"),
                        "creado_en"             => $this->fecha->format('Y-m-d H:i:s')
                    );

                    $respuesta = $this->model->alergia("insert", $data, null, null);
                    if (is_numeric($respuesta)) {
                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Alergia registrado correctamente",
                            "id_alergia" => $respuesta
                        )));
                    }
                }
            } else {
                // actualizar alergia
                //validación de formulario
                $validation = \Config\Services::validation();
                helper(['form', 'url']);
                $val = $this->validate(
                    [ // rules
                        'id_alergia'        => 'required',
                        "nombre_alergia"    => "required|alpha_space",
                        "detalle"           => "required|alpha_space",
                        'id_persona3'       => 'required',
                    ],
                    [ // errors
                        "id_alergia" => [
                            "required"  => "Error al editar alergia por favor vuelve a empezar"
                        ],
                        "nombre_alergia" => [
                            "required" => " El nombre_alergia es requerido",
                            "alpha_space" => "El nombre_alergia debe llevar caracteres alfabéticos o espacios."
                        ],
                        "detalle" => [
                            "required" => " El detalle es requerido",
                            "alpha_space" => "El detalle debe llevar caracteres alfabéticos o espacios."
                        ],
                        "id_persona3" => [
                            "required" => " El id del paciente es requerido",
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
                        "nombre_alergia"        => $this->request->getPost("nombre_alergia"),
                        "detalle"               => $this->request->getPost("detalle"),
                        "id_paciente"           => $this->request->getPost("id_persona3"),
                        "actualizado_en"        => $this->fecha->format('Y-m-d H:i:s')
                    );

                    $respuesta = $this->model->alergia(
                        "update",
                        $data,
                        array(
                            "id_alergia" => $this->request->getPost("id_alergia")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar cita

                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Alergia editado correctamente",
                            "id_alergia" => $respuesta
                        )));
                    }
                }
            }
        }
    }

    // Editar alergia
    public function editar_alergia()
    {
        // var_dump($_REQUEST);
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_alergia(trim($this->request->getPost("id_alergia")));
            return $this->response->setJSON(json_encode($respuesta));
            // var_dump($respuesta);
        }
    }

    // Eliminar Paciente
    public function eliminar_alergia()
    {
        // se Verifica si es petición ajax
        // return var_dump($_REQUEST);
        if ($this->request->isAJAX()) {

            $data = array(
                "estado" => '0'
            );

            $this->db->table('tratamiento_alergias')->delete(["id_alergia" => $this->request->getPost("id")]);
            if (is_numeric($this->db->affectedRows())) {
                return $this->response->setJSON(['exito' => "Paciente Eliminado correctamente"]);
            }
        }
    }
}
