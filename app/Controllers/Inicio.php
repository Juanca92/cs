<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Inicio extends Controller
{
	public function index()
	{
		echo view("inicio/index");
	}

	public function acercaDelcentro()
	{
		echo view("inicio/acercaDelcentro");
	}

	public function nuestrosDoctores()
	{
		echo view("inicio/nuestrosDoctores");
	}

	public function servicioOdontologico()
	{
		echo view("inicio/servicioOdontologico");
	}

	public function contactos()
	{
		echo view("inicio/contactos");
	}
}
