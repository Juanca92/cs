<?php

namespace App\Controllers;

use App\Libraries\Ssp;

class Roles extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        return $this->templater->view("roles/index", $this->data);
    }

    public function ajaxListarRoles()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_grupo';
            $primaryKey = 'id_grupo';
            $where = "";

            $columns = array(
                array('db' => 'id_grupo', 'dt'  => 0),
                array('db' => 'nombre_grupo', 'dt'    => 1),
                array('db' => 'estado_grupo', 'dt'    => 2),
                array('db' => 'creado_en', 'dt' => 3)
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
