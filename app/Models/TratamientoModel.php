<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\BaseBuilder;

class TratamientoModel extends Database
{
    
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

   
    public function tratamiento($accion, $datos, $condicion = null, $busqueda = null)
    {

        $builder = $this->db->table("tratamiento");

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

    // Datos del usuario en tratamiento
    public function datos_usuario_tratamiento($id)
    {
        $builder = $this->db->table('view_users as u');
        $builder->select('CONCAT(u.nombres, " ", u.paterno," ", u.materno) AS nombre_completo, u.telefono_celular, u.domicilio, u.fecha_nacimiento, u.foto');
        $builder->where('id_persona', $id);
        return $builder->get()->getResultArray();
    }
    public function editar_alergia($id)
    {
        $builder = $this->db->table('tratamiento_alergias as t');
        $builder->select('*');
        $builder->where('id_alergia', $id);
        return $builder->get()->getResultArray();
    }

    public function listar_paciente()
    {
        $builder = $this->db->table("view_paciente as p");
        $builder->select('p.id_persona, p.nombre_completo');
        return $builder->get()->getResultArray();
    }
    public function listar_ocupaciones()
    {
        $builder = $this->db->table("ocupacion as o");
        $builder->select('o.id_ocupacion, o.nombre');
        return $builder->get()->getResultArray();
    }
}