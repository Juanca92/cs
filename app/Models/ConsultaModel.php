<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\BaseBuilder;

class ConsultaModel extends Database
{

    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Crud consulta
    public function consulta($accion, $datos, $condicion = null, $busqueda = null)
    {

        $builder = $this->db->table("tratamiento_consulta");

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
    // CRUD PERSONA
    public function persona($accion, $datos, $condicion = null, $busqueda = null)
    {

        $builder = $this->db->table("persona");

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

    public function editar_consulta($id)
    {
        $builder = $this->db->table('tratamiento_consulta as tc');
        $builder->select('*');
        $builder->where('id_consulta', $id);
        return $builder->get()->getResultArray();
    }

    public function listar_paciente()
    {
        $builder = $this->db->table("view_paciente as p");
        $builder->select('p.id_persona, p.nombre_completo');
        return $builder->get()->getResultArray();
    }
}
