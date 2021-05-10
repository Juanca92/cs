<?php

namespace App\Controllers;
use App\Libraries\Ssp;
use App\Models\TratamientoModel;

class Tratamiento extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TratamientoModel();
        $this->fecha = new \DateTime();
    }

    
	public function index()
	{
        $this->data['ocupaciones'] = $this->model->listar_ocupaciones();
		return $this->templater->view("tratamiento/index", $this->data);
	}
    public function datos_tratamiento()
    {
        $respuesta = $this->model->datos_usuario_tratamiento($_SESSION['id_persona']);
        return $this->response->setJSON(json_encode($respuesta));
    }

 
     

}