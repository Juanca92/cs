<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\BaseBuilder;

class PacienteModel extends Database
{
    
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // CRUD PACIENTE
    public function paciente($accion, $datos, $condicion = null, $busqueda = null)
    {

        $builder = $this->db->table("paciente");

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

    public function verificar_ci($ci)
    {
        $builder = $this->db->table('paciente');
        $builder->select('p_ci, p_nombre');
        $builder->where('p_ci', $ci);
        return $builder->get()->getResultArray();
    }

    public function buscar_paciente($id)
    {
        $builder = $this->db->table("paciente as p");
        $builder->select('*');
        $builder->where("p.id_paciente", $id);
        return $builder->get()->getResultArray();
    }

}