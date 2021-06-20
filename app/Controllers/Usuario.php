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

}
