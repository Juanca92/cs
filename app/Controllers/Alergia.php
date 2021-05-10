<?php

namespace App\Controllers;
use App\Libraries\Ssp;
use App\Models\AlergiaModel;

class Alergia extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new AlergiaModel();
        $this->fecha = new \DateTime();
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

    // Listado de pacientes
    public function ajaxListarAlergias()
	{
        if ($this->request->isAJAX()) {		
            $table = 'sp_view_tratamiento_alergias';
            $primaryKey = 'id_alergia';
            $where = " ";

            $columns = array(
                array('db' => 'id_alergia', 'dt'        => 0),
                array('db' => 'nombre_alergia', 'dt'    => 1),
                array('db' => 'detalle', 'dt'           => 2),
                array('db' => 'nombre_paciente', 'dt'   => 3),
                array('db' => 'creado_en', 'dt'         => 4)
            );

            $sql_details = array(
                'user' => $this->db->username, 
                'pass' => $this->db->password, 
                'db'   => $this->db->database, 
                'host' => $this->db->hostname
            );

            return $this->response->setJSON(json_encode(SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)));
        }
	}

    // Insertar o Actualizar Una alergia
    public function guardar_alergia()
    {
        $data  = null;

        if ($this->request->isAJAX()) {

            if ($this->request->getPost("accion") == "in" && $this->request->getPost("id") == "") {
                
               if (true) {
                    //validación de formulario
                    $validation = \Config\Services::validation();

                    $val = $this->validate(
                        [ // rules
                            "nombre_alergia"    => "required|alpha_space",
                            "detalle"           => "required|alpha_space",
                        ],
                        [ // errors
                           "nombre_alergia" => [
                                "required" => " El nombre_alergia es requerido",
                                "alpha_space" => "El nombre_alergia debe llevar caracteres alfabéticos o espacios."
                            ],
                            "detalle" => [
                                "required" => " El detalle es requerido",
                                "alpha_space" => "El detalle debe llevar caracteres alfabéticos o espacios."
                            ]
                        ]
                    );

                    if (!$val) {
                        // se devuelve todos los errores si falla la validacion
                        return $this->response->setJSON(json_encode(array(
                            "form" => $validation->listErrors()
                        )));

                    } else {
                        // Insertar datos

                        // Formateo de datos
                        $data = array(
                            "nombre_alergia"        => $this->request->getPost("nombre_alergia"),
                            "detalle"               => $this->request->getPost("detalle"),                          
                            "creado_en"             => $this->fecha->format('Y-m-d H:i:s')
                        );                        

                        $respuesta = $this->model->cita("insert", $data, null, null);
                        if(is_numeric($respuesta))
                        {
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "Alergia registrado correctamente"
                            )));
                        }
                    }
                } 
            } else {
                // actualizar alergia
                //validación de formulario
                $validation = \Config\Services::validation();
                helper(['form', 'url']);
                $val = $this->validate(
                    [ // rules
                        'id'                => 'required',
                        "nombre_alergia"    => "required|alpha_space",
                        "detalle"           => "required|alpha_space",
                    ],
                    [ // errors
                        "id" => [
                            "required"  => "Error al editar alergia por favor vuelve a empezar"
                        ],
                        "nombre_alergia" => [
                            "required" => " El nombre_alergia es requerido",
                            "alpha_space" => "El nombre_alergia debe llevar caracteres alfabéticos o espacios."
                        ],
                        "detalle" => [
                            "required" => " El detalle es requerido",
                            "alpha_space" => "El detalle debe llevar caracteres alfabéticos o espacios."
                        ]
                    ]
                );

                if (!$val) {
                    // se devuelve todos los errores si falla la validacion
                    return $this->response->setJSON(json_encode(array(
                        "form" => $validation->listErrors()
                    )));

                } else {
                    // Actualizar datos
                    $data = array(
                        "nombre_alergia"        => $this->request->getPost("nombre_alergia"),
                        "detalle"               => $this->request->getPost("detalle"),                         
                        "actualizado_en"        => $this->fecha->format('Y-m-d H:i:s')
                    ); 

                    $respuesta = $this->model->cita("update", $data,
                        array(
                            "id_alergia" => $this->request->getPost("id")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar cita
                        
                        return $this->response->setJSON(json_encode(array(
                            'exito' => "Alergia editado correctamente"
                        )));
                    } 
                }
               
            }
        }
    }

     // Editar Cita
     public function editar_alergia()
     {
         // se Verifica si es petición ajax
         if ($this->request->isAJAX()) {
             $respuesta = $this->model->editar_alergia(trim($this->request->getPost("id")));
             return $this->response->setJSON(json_encode($respuesta));
         }
     }
 
     

}