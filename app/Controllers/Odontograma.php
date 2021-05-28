<?php 
namespace App\Controllers;

use App\Libraries\Ssp;

class Odontograma extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        return $this->templater->view("odontograma/index", $this->data);
    }
}