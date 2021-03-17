<?php

namespace App\Controllers;

class ListarOdontologo extends BaseController
{
	public function index()
	{
		return $this->templater->view("listarOdontologo/index");
	}
}