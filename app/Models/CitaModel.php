<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\BaseBuilder;

class CitaModel extends Database
{

    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Crud Cita
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

    public function editar_cita($id)
    {
        $builder = $this->db->table('cita as c');
        $builder->select('*');
        $builder->where('id_cita', $id);
        return $builder->get()->getResultArray();
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
    public function getEvents()
    {
        $builder = $this->db->table("view_cita ");
        $builder->select('id_cita AS id, nombre_paciente AS title, CONCAT(fecha," ",hora_inicio) AS start, CONCAT(fecha," ",hora_final) AS end,observacion AS description');

        return $builder->get()->getResultArray();
    }

    public function verificar_numero_cita($id)
    {
        if (!is_null($id)) {
            $builder = $this->db->table('cita');
            $builder->select('numero_cita');
            $builder->where('id_paciente', $id);
            $builder->orderBy('numero_cita', 'DESC');
            $builder->limit(1);
            return $builder->get()->getResultArray();
        }
        return null;
    }
    /*
     public function verificar_numero_cita($id)
     {
        if(!is_null($id)){
            $builder = $this->db->table('cita');
            $builder->select('fecha','hora_inicio', 'hora_final');
            $builder->where()

        }
     }*/
}
