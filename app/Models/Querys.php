<?php

namespace App\Models;

use CodeIgniter\Database\Database;

class Querys extends Database
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    
    public function view_users($condicion = null, $busqueda = null)
    {
        $builder = $this->db->table('view_users');
        if (is_array($condicion)) {
            return $builder->getWhere($condicion)->getResultArray();
        } else {
            return $builder->get()->getResultArray();
        }
    }

    public function verifyUser($condition)
    {
        $builder = $this->db->table('view_users');
        if (is_array($condition)) {
            $builder->where($condition);
            $builder->where('estado_grupo_usuario', 'ACTIVO');
            return $builder->get();
        } else {
            return null;
        }
    }

    public function verifyRol($condition)
    {
        $builder = $this->db->table('view_users');
        if (is_array($condition)) {
            $builder->select("GROUP_CONCAT(nombre_grupo) AS nombre_grupo");
            $builder->where($condition);
            $builder->where('estado_grupo_usuario', 'ACTIVO');
            return $builder->get();
        } else {
            return null;
        }
    }

}
