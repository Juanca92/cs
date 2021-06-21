<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\PacienteModel;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    public $model = null;
    public $fecha = null;
    public $paciente_model = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new UsuarioModel();
        $this->paciente_model = new PacienteModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['ocupaciones'] = $this->paciente_model->listar_ocupaciones();
        return $this->templater->view("usuario/index", $this->data);
    }

    // Listado de pacientes
    public function ajaxListarUsuarios()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_users';
            $primaryKey = 'id_usuario';
            $where = "estado=1";

            $columns = array(
                array('db' => 'id_usuario', 'dt'        => 0),
                array('db' => 'nombres', 'dt'           => 1),
                array('db' => 'paterno', 'dt'           => 2),
                array('db' => 'materno', 'dt'           => 3),
                array('db' => 'ci', 'dt'                => 4),
                array('db' => 'expedido', 'dt'          => 5),
                array('db' => 'telefono_celular', 'dt'  => 6),
                array('db' => 'foto', 'dt'              => 7),
                array('db' => 'nombre_grupo', 'dt'      => 8),
                array('db' => 'usuario', 'dt'           => 9),
                array('db' => 'id_usuario', 'dt'        => 10)
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

    public function editar_usuario()
    {
        $id = $this->request->getPost("id");
        $response = $this->model->data_user($id);
        return $this->response->setJSON(json_encode(array(
            'exito' => $response
        )));
    }

    public function cambiar_password_username()
    {
        $validation = \Config\Services::validation();
        helper(['form', 'url']);
        $val = $this->validate(
            [ // rules
                "id"        => "required",
                "usuario"   => "required|min_length[6]",
                "clave"     => "required|min_length[8]",
            ],
            [ // errors
                "id" => [
                    "required" => "El id es requerido"
                ],
                "usuario" => [
                    "required"      => "El nombre de usuario es requerido",
                    "min_length"    => "El nombre de usuario debe tener al menos 6 caracteres"
                ],
                "clave" => [
                    "required"      => "El password del usuario es requerido",
                    "min_length"    => "El password de usuario debe tener al menos 8 caracteres",
                ]
            ]
        );

        if (!$val) {
            // se devuelve todos los errores
            return $this->response->setJSON(json_encode(array(
                "warning" => $validation->listErrors()
            )));
        } else {
            $data = array(
                "usuario"       => trim($this->request->getPost("usuario")),
                "clave"         => hash("sha512", trim($this->request->getPost("clave"))),
                "actualizado_en"=> $this->fecha->format('Y-m-d H:i:s')
            );

            $respuesta = $this->model->usuario(
                "update",
                $data,
                array(
                    "id_usuario" => $this->request->getPost("id")
                ),
                null
            );

            if ($respuesta) {
                return $this->response->setJSON(json_encode(array(
                    'exito' => "Usuario cambiado de password correctamente"
                )));
            }else{
                return $this->response->setJSON(json_encode(array(
                    'warning' => "Error al editar los datos del usuario"
                )));
            }
        }
    }

}
