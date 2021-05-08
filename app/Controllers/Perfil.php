<?php

namespace App\Controllers;

use App\Models\PerfilModel;

class Perfil extends BaseController
{
    public $model = null;
    public $fecha = null;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PerfilModel();
        $this->fecha = new \DateTime();
    }


    public function index()
    {
        return $this->templater->view("perfil/index", $this->data);
    }

    public function datos_usuario()
    {
        $respuesta = $this->model->datos_usuario_perfil($_SESSION['id_persona']);
        return $this->response->setJSON(json_encode($respuesta));
    }

    // Actualizar telefono y direccion
    public function actualizar_datos()
    {

        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();

            $val = $this->validate(
                [ // rules
                    "telefono"           => 'required|numeric',
                    "domicilio"         => "required|alpha_numeric_space"
                ],
                [ // errors

                    "telefono" => [
                        "required"   => "El telefono es requerido",
                        "numeric"    => "El telefono debe llevar caracteres numéricos."
                    ],
                    "domicilio" => [
                        "required" => "El domicilio es requerido",
                        "alpha_numeric_space" => "EL Domicilio no puede llevar caracteres especiales"
                    ]
                ]
            );

            if (!$val) {
                // se devuelve todos los errores si falla la validacion
                return $this->response->setJSON(json_encode(array(
                    "form" => $validation->listErrors()
                )));
            } else {
                // Formateo de datos
                $data = array(
                    "telefono_celular"  => trim($this->request->getPost("telefono")),
                    "domicilio"         => $this->request->getPost("domicilio"),
                    "actualizado_en"         => $this->fecha->format('Y-m-d H:i:s')
                );

                $respuesta = $this->model->persona(
                    "update",
                    $data,
                    array(
                        "id_persona" => $_SESSION['id_persona']
                    ),
                    null
                );

                if ($respuesta) {
                    return $this->response->setJSON(json_encode(array(
                        'exito' => "Datos actualizados correctamente"
                    )));
                }
            }
        }
    }

    // cambiar contrasenia
    public function cambiar_password()
    {
        if ($this->request->isAJAX()) {
            // se verifica si la contrasenia actual iguala con lo ingresado

            $res = $this->model->verificarPasswordActual();

            if (hash("sha512", $this->request->getPost("password_actual")) == $res[0]["clave"]) {
                // igual la contrasenia actual y el confirmar
                if ($this->request->getPost("password_nuevo") != $this->request->getPost("confirmar_password")) {
                    return $this->response->setJSON(json_encode(array(
                        "rep" => "Repita la contraseña"
                    )));
                } else {
                    // actualizar
                    $data = array(
                        "clave" => hash("sha512", $this->request->getPost("password_nuevo"))
                    );

                    $res = $this->model->usuario("update", $data, array("id_usuario" => $_SESSION["id_persona"]), null);
                    if ($res) {
                        return $this->response->setJSON(json_encode(array(
                            "success" => "Contraseña cambiada correctemente"
                        )));
                    } else {
                        return $this->response->setJSON(json_encode(array(
                            "error" => "Error al cambiar la Contraseña"
                        )));
                    }
                }
            } else {
                //retorna el error
                return $this->response->setJSON(json_encode(array(
                    "pass" => "Ingrese la contraseña actual correctamente"
                )));
            }
        }
    }

    // Subir foto
    public function subir_foto()
    {
        if ($this->request->isAJAX()) {
            $file = $this->request->getFile('foto');
            if ($file->isValid()) {
                $dir = base_url('/img/users');
                if (!is_dir($dir)) {
                    mkdir($dir, 755, true);
                }
                $originalName = $file->getRandomName();
                $file->move('./img/users/', $originalName);
                $respuesta = $this->model->usuario(
                    "update",
                    ['foto' => "img/users/" . $originalName],
                    ['id_usuario' => $_SESSION["id_persona"]]
                );
                if ($respuesta) {
                    return $this->response->setJSON(json_encode(array(
                        "success" => "Fotografia actualizado correctamente"
                    )));
                } else {
                    return $this->response->setJSON(json_encode(array(
                        "error" => "Error al subir la fotografia"
                    )));
                }
            } else {
                return $this->response->setJSON(json_encode(array(
                    "warning" => "Fotografia no valida"
                )));
            }
        }
    }
}