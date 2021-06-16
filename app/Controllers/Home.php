<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return $this->templater->view("home/index", $this->data);
	}
	public function reporteCitas()
	{
		if ($this->request->isAJAX()) {
			$datos = [];
			foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] as $key => $value) {
				$estadoCita = [];
				foreach ($this->db->table('cita')->select('estatus')->distinct()->get()->getResultArray() as $k => $v) {
					$estadoCita[$v['estatus']] = count($this->db->table('cita')->getWhere(['estatus' => $v['estatus'], 'MONTH(fecha)' => $value])->getResultArray());
				}
				$datos[mes_literal($value)] = $estadoCita;
			}
			return $this->response->setJSON(json_encode($datos));
		}
	}
}
