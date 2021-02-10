<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return $this->templater->view("home/index");
	}
}
