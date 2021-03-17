<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\BaseBuilder;

class AgendaModel extends Database
{
    
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Crud agenda
    public function agenda($accion, $datos, $condicion = null, $busqueda = null)
    {

        $builder = $this->db->table("cita");

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
    public function get_events()
    {
        $builder = $this->db->table("cita");
        $builder->select('id_cita AS id, nombre_paciente AS title, fecha AS start');
        return $builder->get()->getResultArray();
    }
}