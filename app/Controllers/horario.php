<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\HorarioModel;

class Horario extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new HorarioModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['fecha'] = $this->model->listar_fecha();
        return $this->templater->view("cita/index", $this->data);
    }

    // Listado de citas
    public function ajaxListarHorarios()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_horario';
            $primaryKey = 'id_horario';
            $where = "";

            $columns = array(
                array('db' => 'id_horario', 'dt'    => 0),
                array('db' => 'entrada', 'dt'       => 1),
                array('db' => 'salida', 'dt'        => 2)
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
