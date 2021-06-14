<?php

namespace App\Controllers;

class Respaldo extends BaseController
{
	public function index()
	{
		return $this->templater->view("respaldo/index");
	}
}
