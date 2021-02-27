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
            $table = 'sp_view_agenda';
            $primaryKey = 'id_agenda';
            $where = " "; 

            $columns = array(
                array('db' => 'id_agenda', 'dt'       => 0),
                array('db' => 'title', 'dt'      	  => 1),
                array('db' => 'start', 'dt' 		  => 2),
                array('db' => 'end', 'dt'      	  => 3),
                array('db' => 'creado_en', 'dt'       => 4)
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

	function insert()
	{
		if($this->input->post('title'))
		{
			$data = array(
			'title'  => $this->input->post('title'),
			'start_event'=> $this->input->post('start'),
			'end_event' => $this->input->post('end')
			);
			$this->model->agenda->insert($data);
		}
	}

	function update()
	{
		if($this->input->post('id'))
		{
			$data = array(
			'title'   => $this->input->post('title'),
			'start_event' => $this->input->post('start'),
			'end_event'  => $this->input->post('end')
			);

			$this->fullcalendar_model->update_event($data, $this->input->post('id'));
		}
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			$this->fullcalendar_model->delete_event($this->input->post('id'));
		}
	}

}