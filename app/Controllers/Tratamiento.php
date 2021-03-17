<?php

namespace App\Controllers;

class Tratamiento extends BaseController
{
	public function index()
	{
		return $this->templater->view("tratamiento/index");
	}
}