<?php

namespace App\Controllers;
use App\Libraries\Ssp;
use App\Models\AgendaModel;

class Agenda extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
		parent::__construct();
        $this->model = new AgendaModel();
        $this->fecha = new \DateTime();
    }

    
	public function index()
	{
		return $this->templater->view("agenda/index", $this->data);
	}

    // Listado de agenda
   public function ajaxListarAgenda()
	{
        if ($this->request->isAJAX()) {		
            $table = 'sp_view_cita';
            $primaryKey = 'id_cita';
            $where = ""; 

            $columns[] = array(
                            'id_cita' 	=> intval($val->id), 
                            'nombre_paciente' => $val->title, 
                            'fecha' => date_format( date_create($val->start_date) ,"Y-m-d H:i:s"),
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

	public function get_events()
	{
		// se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->get_events($this->request->getPost("id"));
            return $this->response->setJSON(json_encode($respuesta));
        }
	}
}