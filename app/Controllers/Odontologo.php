<?php

namespace App\Controllers;
use App\Libraries\Ssp;
use App\Models\OdontologoModel;

class Odontologo extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new OdontologoModel();
        $this->fecha = new \DateTime();
    }

    public function index()
	{
		return $this->templater->view("odontologo/index", $this->data);
	}
}