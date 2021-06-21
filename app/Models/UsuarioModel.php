<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\BaseBuilder;

class UsuarioModel extends Database
{

    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // CRUD USUARIO
    public function usuario($accion, $datos, $condicion = null, $busqueda = null)
    {

        $builder = $this->db->table("usuario");

        switch ($accion) {
            case 'select':
                if (is_array($condicion)) {
                    return $builder->getWhere($condicion);
                } else {
                    return $builder->get();
                }
                break;
            case 'insert':
                return $builder->insert($datos) ? $this->db->insertID() : $this->db->error();
                break;
            case 'update':
                return $builder->update($datos, $condicion) ? true : $this->db->error();
                break;
            case 'search':
                return $builder->like('nombres', $busqueda)->get()->getResultArray();
                break;
        }

        return null;
    }

    public function data_user($id = null)
    {
        $builder = $this->db->table("usuario as u");
        $builder->select('u.usuario, u.id_usuario');
        $builder->where("u.id_usuario", $id);
        return $builder->get()->getResult();
    }
    
}
