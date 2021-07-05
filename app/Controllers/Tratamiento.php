<?php

namespace App\Controllers;

use App\Controllers\Reportes\ImprimirHistoriaClinica;
use App\Libraries\Ssp;
use App\Models\TratamientoModel;

class Tratamiento extends BaseController
{
    public $model = null;
    public $fecha = null;
    public $reporte;

    public function __construct()
    {
        parent::__construct();
        $this->model = new TratamientoModel();
        $this->fecha = new \DateTime();
        $this->reporte = new ImprimirHistoriaClinica();
    }


    public function index()
    {
        $this->data['ocupaciones'] = $this->model->listar_ocupaciones();
        return $this->templater->view("tratamiento/index", $this->data);
    }
    public function datos_tratamiento()
    {
        $respuesta = $this->model->datos_usuario_tratamiento($_SESSION['id_persona']);
        return $this->response->setJSON(json_encode($respuesta));
    }

    public function imprimir()
    {
        $fecha_inicial = $this->request->getPost("fechaInicial");
        $fecha_final = $this->request->getPost("fechaFinal");
        $id_persona = $this->request->getPost('id');
        $this->response->setContentType('application/pdf');
        $header = array(
            'sedes'           => 'La Paz',
            'red'             => '12',
            'municipio'       => 'San Pedro de Curahuara',
            'establecimiento' => 'San Pedro de Curahuara',
        );

        $data_paciente = $this->model->data_paciente($id_persona);

        //verificar atenciones
        $citas_medicas = $this->model->verificar_atendidos($id_persona, $fecha_final, $fecha_final);

        $this->reporte->imprimir($header, $citas_medicas, $data_paciente, $fecha_inicial, $fecha_final, $id_persona);
    }
}
