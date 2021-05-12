<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\BaseBuilder;

class HorarioModel extends Database
{

    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Crud horario
    public function horario($accion, $datos, $condicion = null, $busqueda = null)
    {

        $builder = $this->db->table("horario");

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
    public function listar_fecha()
    {
        $builder = $this->db->table("view_cita ");
        $builder->select('fecha');
        return $builder->get()->getResultArray();
    }
}
