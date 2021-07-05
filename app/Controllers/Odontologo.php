<?php

namespace App\Controllers;

use App\Libraries\Ssp;
use App\Models\OdontologoModel;
use App\Controllers\Reportes\ImprimirOdontologo;

class Odontologo extends BaseController
{
    public $model = null;
    public $fecha = null;
    public $reporte;

    public function __construct()
    {
        parent::__construct();
        $this->model = new OdontologoModel();
        $this->fecha = new \DateTime();
        $this->reporte = new ImprimirOdontologo();
    }

    public function index()
    {
        return $this->templater->view("odontologo/index", $this->data);
    }

    // Listado de Odontologos
    public function ajaxListarOdontologos()
    {
        if ($this->request->isAJAX()) {
            $table = 'sp_view_odontologo';
            $primaryKey = 'id_persona';
            $where = "estado=1";

            $columns = array(
                array('db' => 'id_persona', 'dt'        => 0),
                array('db' => 'ci_exp', 'dt'            => 1),
                array('db' => 'nombre_completo', 'dt'   => 2),
                array('db' => 'telefono_celular', 'dt'  => 3),
                array('db' => 'fecha_nacimiento', 'dt'  => 4),
                array('db' => 'domicilio', 'dt'         => 5),
                array('db' => 'turno', 'dt'             => 6),
                array('db' => 'gestion_ingreso', 'dt'   => 7),
                array('db' => 'estatus', 'dt'           => 8),
                array('db' => 'creado_en', 'dt'         => 9)
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

    // Insertar o Actualizar Un Odontologo
    public function guardar_odontologo()
    {
        $data  = null;

        if ($this->request->isAJAX()) {

            if ($this->request->getPost("accion") == "in" && $this->request->getPost("id") == "") {
                // Se verifica el registro de CI del estudiante
                $condicion = array(
                    'ci'       => trim($this->request->getPost("ci")),
                    'expedido' => trim($this->request->getPost("expedido"))
                );

                $respuesta = $this->model->verificar_ci($condicion);

                if (count($respuesta) == 0) {
                    //validación de formulario
                    $validation = \Config\Services::validation();

                    $val = $this->validate(
                        [ // rules
                            "ci"                => "required|alpha_numeric|min_length[5]",
                            "expedido"          => "required|max_length[2]|alpha",
                            "nombres"           => "required|alpha_space",
                            "paterno"           => "required|alpha_space",
                            "materno"           => "alpha_space",
                            "celular"           => 'required|numeric',
                            "fecha_nacimiento"  => "required|max_length[10]",
                            "turno"             => "required",
                            "gestion"           => "required|numeric|max_length[4]",
                            "estatus"           => "required|alpha_numeric_space"
                        ],
                        [ // errors
                            "ci" => [
                                "required"      => "El CI del paciente es requerido",
                                "alpha_numeric" => "El CI del usuario no debe llevar caracteres especiales",
                                "min_length"    => "El CI del paciente debe tener al menos 6 caracteres"
                            ],
                            "expedido" => [
                                "required"      => "La expedición del ci es requerido",
                                "max_length"    => "La expedición del ci debe llevar máximo 2 caracteres",
                                "alpha"         => "La expedición del ci no debe llevar caracteres especiales"
                            ],
                            "nombres" => [
                                "required"    => "El nombre es requerido",
                                "alpha_space" => "El nombre debe llevar caracteres alfabéticos o espacios."
                            ],
                            "paterno" => [
                                "required"    => "El apellido paterno es requerido",
                                "alpha_space" => "El apellido paterno debe llevar caracteres alfabéticos o espacios."
                            ],
                            "materno" => [
                                "alpha_space" => "El apellido materno debe llevar caracteres alfabéticos o espacios."
                            ],
                            "fecha_nacimiento" => [
                                "required"   => "La fecha de nacimiento es requerido",
                                "max_length" => "La fecha de nacimiento debe llevar como maximo 10 caracteres"
                            ],
                            "celular" => [
                                "required"   => "El telefono es requerido",
                                "numeric"    => "El telefono debe llevar caracteres numéricos."
                            ],
                            "turno" => [
                                "required" => "El turno del odontologo es requerido"
                            ],
                            "gestion_ingreso" => [
                                "required"   => "La gestion de ingreso del odontologo es requerido",
                                "numeric"    => "La gestion debe llevar caracteres numericos",
                                "max_length" => "La gestion debe llevar como maximo 4 caracteres"
                            ],
                            "estatus" => [
                                "required" => "El estatus del paciente es requerido",
                                "alpha_numeric_space" => "EL estatus no puede llevar caracteres especiales"
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
                            "ci"                => trim($this->request->getPost("ci")),
                            "expedido"          => trim($this->request->getPost("expedido")),
                            "nombres"           => ucwords(strtolower(trim($this->request->getPost("nombres")))),
                            "paterno"           => ucwords(strtolower(trim($this->request->getPost("paterno")))),
                            "materno"           => ucwords(strtolower(trim($this->request->getPost("materno")))),
                            "telefono_celular"  => trim($this->request->getPost("celular")),
                            "fecha_nacimiento"  => $this->request->getPost("fecha_nacimiento"),
                            "domicilio"         => $this->request->getPost("domicilio"),
                            "estatus"           => $this->request->getPost("estatus"),
                            "creado_en"         => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta = $this->model->persona("insert", $data, null, null);

                        if (is_numeric($respuesta)) {
                            // Insertar odontologo
                            $data1 = array(
                                "id_odontologo"    => $respuesta,
                                "turno"            => $this->request->getPost("turno"),
                                "gestion_ingreso"  => $this->request->getPost("gestion"),
                                "creado_en"        => $this->fecha->format('Y-m-d H:i:s')
                            );

                            $respuesta1 = $this->model->odontologo("insert", $data1, null, null);

                            // Insertar usuario
                            $nombre = explode(" ", strtoupper(trim($this->request->getPost("nombres"))));
                            $data2 = array(
                                "id_usuario"  => $respuesta,
                                "usuario"     => $nombre[0] . '_' . trim($this->request->getPost("ci")),
                                "clave"       => hash("sha512", trim($this->request->getPost("fecha_nacimiento"))),
                                "creado_en"   => $this->fecha->format('Y-m-d H:i:s')
                            );

                            $respuesta2 = $this->model->usuario("insert", $data2, null, null);

                            // Insertar Grupo Usuario
                            $id_grupo = $this->model->verificar_id_grupo('ODONTOLOGO'); //verificar id_grupo con rol PACIENTE
                            $data3 = array(
                                "id_grupo"    => $id_grupo[0]['id_grupo'],
                                "id_usuario"  => $respuesta,
                                "ip_usuario"  => $this->getIP(),
                                "navegador"   => $_SERVER["HTTP_USER_AGENT"],
                                "creado_en"   => $this->fecha->format('Y-m-d H:i:s')
                            );

                            $respuesta3 = $this->model->grupo_usuario("insert", $data3, null, null);

                            if (is_numeric($respuesta1) && is_numeric($respuesta2) && is_numeric($respuesta3)) {
                                return $this->response->setJSON(json_encode(array(
                                    'exito' => "Odontologo registrado correctamente"
                                )));
                            }
                        }
                    }
                } else {
                    return $this->response->setJSON(json_encode(array(
                        'warning' => "El ci ingresado ya  se encuentra registrado"
                    )));
                }
            } else {
                // Actualizar Odontologo
                //validación de formulario
                $validation = \Config\Services::validation();
                helper(['form', 'url']);
                $val = $this->validate(
                    [ // rules
                        "id"                => "required",
                        "ci"                => "required|alpha_numeric|min_length[5]",
                        "expedido"          => "required|max_length[2]|alpha",
                        "nombres"           => "required|alpha_space",
                        "paterno"           => "required|alpha_space",
                        "materno"           => "alpha_space",
                        "celular"           => 'required|numeric',
                        "fecha_nacimiento"  => "required|max_length[10]",
                        "turno"             => "required",
                        "gestion"           => "required|numeric|max_length[4]",
                        "estatus"           => "required|alpha_numeric_space"
                    ],
                    [ // errors
                        "id" => [
                            "required" => "El id es requerido"
                        ],
                        "ci" => [
                            "required"      => "El CI del paciente es requerido",
                            "alpha_numeric" => "El CI del usuario no debe llevar caracteres especiales",
                            "min_length"    => "El CI del paciente debe tener al menos 6 caracteres"
                        ],
                        "expedido" => [
                            "required"      => "La expedición del ci es requerido",
                            "max_length"    => "La expedición del ci debe llevar máximo 2 caracteres",
                            "alpha"         => "La expedición del ci no debe llevar caracteres especiales"
                        ],
                        "nombres" => [
                            "required"    => "El nombre es requerido",
                            "alpha_space" => "El nombre debe llevar caracteres alfabéticos o espacios."
                        ],
                        "paterno" => [
                            "required"    => "El apellido paterno es requerido",
                            "alpha_space" => "El apellido paterno debe llevar caracteres alfabéticos o espacios."
                        ],
                        "materno" => [
                            "alpha_space" => "El apellido materno debe llevar caracteres alfabéticos o espacios."
                        ],
                        "fecha_nacimiento" => [
                            "required"   => "La fecha de nacimiento es requerido",
                            "max_length" => "La fecha de nacimiento debe llevar como maximo 10 caracteres"
                        ],
                        "celular" => [
                            "required"   => "El telefono es requerido",
                            "numeric"    => "El telefono debe llevar caracteres numéricos."
                        ],
                        "turno" => [
                            "required" => "El turno del odontologo es requerido"
                        ],
                        "gestion_ingreso" => [
                            "required"   => "La gestion de ingreso del odontologo es requerido",
                            "numeric"    => "La gestion debe llevar caracteres numericos",
                            "max_length" => "La gestion debe llevar como maximo 4 caracteres"
                        ],
                        "estatus" => [
                            "required" => "El estatus del paciente es requerido",
                            "alpha_numeric_space" => "EL estatus no puede llevar caracteres especiales"
                        ]
                    ]
                );

                if (!$val) {
                    // se devuelve todos los errores
                    return $this->response->setJSON(json_encode(array(
                        "form" => $validation->listErrors()
                    )));
                } else {

                    // Actualizar datos
                    $data = array(
                        "ci"                => trim($this->request->getPost("ci")),
                        "expedido"          => trim($this->request->getPost("expedido")),
                        "nombres"           => ucwords(strtolower(trim($this->request->getPost("nombres")))),
                        "paterno"           => ucwords(strtolower(trim($this->request->getPost("paterno")))),
                        "materno"           => ucwords(strtolower(trim($this->request->getPost("materno")))),
                        "telefono_celular"  => trim($this->request->getPost("celular")),
                        "fecha_nacimiento"  => $this->request->getPost("fecha_nacimiento"),
                        "domicilio"         => $this->request->getPost("domicilio"),
                        "estatus"           => $this->request->getPost("estatus"),
                        "actualizado_en"    => $this->fecha->format('Y-m-d H:i:s')
                    );

                    $respuesta = $this->model->persona(
                        "update",
                        $data,
                        array(
                            "id_persona" => $this->request->getPost("id")
                        ),
                        null
                    );

                    if ($respuesta) {
                        // Actualizar Odontologo
                        $data1 = array(
                            "turno"             => $this->request->getPost("turno"),
                            "gestion_ingreso"   => $this->request->getPost("gestion"),
                            "actualizado_en"    => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta1 = $this->model->odontologo(
                            "update",
                            $data1,
                            array(
                                "id_odontologo" => $this->request->getPost("id")
                            ),
                            null
                        );

                        // Actualizar usuario
                        $nombre = explode(" ", strtoupper(trim($this->request->getPost("nombres"))));
                        $data2 = array(
                            "usuario"       => $nombre[0] . '_' . trim($this->request->getPost("ci")),
                            "clave"         => hash("sha512", trim($this->request->getPost("fecha_nacimiento"))),
                            "actualizado_en" => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta2 = $this->model->usuario(
                            "update",
                            $data2,
                            array(
                                "id_usuario" => $this->request->getPost("id")
                            ),
                            null
                        );

                        // Actualizar Grupo Usuario
                        $id_grupo_usuario = $this->model->verificar_id_grupo_usuario($this->request->getPost("id")); //verificar id_grupo con rol PACIENTE
                        $data3 = array(
                            "ip_usuario"     => $this->getIP(),
                            "navegador"      => $_SERVER["HTTP_USER_AGENT"],
                            "actualizado_en" => $this->fecha->format('Y-m-d H:i:s')
                        );

                        $respuesta3 = $this->model->grupo_usuario(
                            "update",
                            $data3,
                            array(
                                "id_grupo_usuario" => $id_grupo_usuario[0]['id_grupo_usuario'],
                            ),
                            null
                        );

                        if ($respuesta1 && $respuesta2 && $respuesta3) {
                            return $this->response->setJSON(json_encode(array(
                                'exito' => "Odontologo editado correctamente"
                            )));
                        }
                    }
                }
            }
        }
    }

    //Obtener el IP real del usuario
    public function getIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        return $_SERVER['REMOTE_ADDR'];
    }

    // Editar Odontologo
    public function editar_odontologo()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {
            $respuesta = $this->model->editar_odontologo(trim($this->request->getPost("id")));
            return $this->response->setJSON(json_encode($respuesta));
        }
    }

    // Eliminar Odontologo
    public function eliminar_odontologo()
    {
        // se Verifica si es petición ajax
        if ($this->request->isAJAX()) {

            $data = array(
                "estado" => '0'
            );

            $respuesta = $this->model->persona("update", $data, array(
                "id_persona" => trim($this->request->getPost("id"))
            ), null);

            if ($respuesta) {
                return $this->response->setJSON(json_encode(array(
                    'exito' => "Odontologo Eliminado correctamente"
                )));
            }
        }
    }

    public function imprimir()
    {
        $data = null;
        $this->response->setContentType('application/pdf');
        $data = $this->model->list_odontologo();
        $this->reporte->imprimir($data);
    }

    public function imprimir_historial()
    {
        $data = null;
        $this->response->setContentType('application/pdf');
        $fecha_inicial = $this->request->getPost("fecha_inicial");
        $fecha_final = $this->request->getPost("fecha_final");
        $odo = $this->model->list_odontologo();
        $paciente = array();
        foreach ($odo as $key => $value) {
            $response = $this->model->verificar_paciente($value['id_persona'], $fecha_inicial, $fecha_final);
            array_push($paciente, $response);
        }

        $this->reporte->imprimir_historial($odo, $paciente);
    }
}
