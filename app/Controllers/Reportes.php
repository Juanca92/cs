<?php

namespace App\Controllers;

class Reportes extends BaseController
{
	public function index()
	{
		return $this->templater->view("reportes/index");
	}
}