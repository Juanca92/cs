<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\GestionarCitaModel;

class GestionarCita extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new GestionarCitaModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        $this->data['paciente'] = $this->model->listar_paciente();
        $this->data['odontologo'] = $this->model->listar_odontologo();
        return $this->templater->view("gestionarCita/index", $this->data);
    }

    // Listado de citas
    public function ajaxListarCitasPendientes()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_cita';
            $primaryKey = 'id_cita';
            $where = "estatus=1";

            $columns = array(
                array('db' => 'id_cita', 'dt'           => 0),
                array('db' => 'numero_cita', 'dt'       => 1),
                array('db' => 'nombre_paciente', 'dt'   => 2),
                array('db' => 'tipo_tratamiento', 'dt'  => 3),
                array('db' => 'observacion', 'dt'       => 4),
                array('db' => 'fecha', 'dt'             => 5),
                array('db' => 'hora_inicio', 'dt'       => 6),
                array('db' => 'hora_final', 'dt'        => 7),
                array('db' => 'costo', 'dt'             => 8),
                array('db' => 'nombre_odontologo', 'dt' => 9),
                array('db' => 'estatus', 'dt'           => 10),
                array('db' => 'creado_en', 'dt'         => 11)
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

    public function ajaxListarCitasAtendidas()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_cita';
            $primaryKey = 'id_cita';
            $where = "estatus=3";

            $columns = array(
                array('db' => 'id_cita', 'dt'           => 0),
                array('db' => 'numero_cita', 'dt'       => 1),
                array('db' => 'nombre_paciente', 'dt'   => 2),
                array('db' => 'tipo_tratamiento', 'dt'  => 3),
                array('db' => 'observacion', 'dt'       => 4),
                array('db' => 'fecha', 'dt'             => 5),
                array('db' => 'hora_inicio', 'dt'       => 6),
                array('db' => 'hora_final', 'dt'        => 7),
                array('db' => 'costo', 'dt'             => 8),
                array('db' => 'nombre_odontologo', 'dt' => 9),
                array('db' => 'estatus', 'dt'           => 10),
                array('db' => 'creado_en', 'dt'         => 11)
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
    public function ajaxListarCitasCanceladas()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_cita';
            $primaryKey = 'id_cita';
            $where = "estatus=2";

            $columns = array(
                array('db' => 'id_cita', 'dt'           => 0),
                array('db' => 'numero_cita', 'dt'       => 1),
                array('db' => 'nombre_paciente', 'dt'   => 2),
                array('db' => 'tipo_tratamiento', 'dt'  => 3),
                array('db' => 'observacion', 'dt'       => 4),
                array('db' => 'fecha', 'dt'             => 5),
                array('db' => 'hora_inicio', 'dt'       => 6),
                array('db' => 'hora_final', 'dt'        => 7),
                array('db' => 'costo', 'dt'             => 8),
                array('db' => 'nombre_odontologo', 'dt' => 9),
                array('db' => 'estatus', 'dt'           => 10),
                array('db' => 'creado_en', 'dt'         => 11)
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
