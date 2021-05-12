<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\BaseBuilder;

class ListarCitaModel extends Database
{

    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Crud horario
    public function cita($accion, $datos, $condicion = null, $busqueda = null)
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
    public function listar_paciente()
    {
        $builder = $this->db->table("view_paciente as p");
        $builder->select('p.id_persona, p.nombre_completo');
        return $builder->get()->getResultArray();
    }
    public function listar_odontologo()
    {
        $builder = $this->db->table("view_odontologo as o");
        $builder->select('o.id_persona, o.nombre_completo');
        return $builder->get()->getResultArray();
    }
    public function listar_odontologo1()
    {
        $builder = $this->db->table("view_cita");
        $builder->select('*');
        $builder->where('id_odontologo = 2');
        return $builder->get()->getResultArray();
    }
}
