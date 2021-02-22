<?php

namespace App\Controllers;
use App\Models\PerfilModel;

class Perfil extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PerfilModel();
        $this->fecha = new \DateTime();
    }

    
	public function index()
	{
		return $this->templater->view("perfil/index", $this->data);
	}

}