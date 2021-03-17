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

    // Crud Paciente
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

    // Crud Usuario
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

    // Crud Grupo Usuario
    public function grupo_usuario($accion, $datos, $condicion = null, $busqueda = null)
    {

        $builder = $this->db->table("grupo_usuario");

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

    public function verificar_ci($condicion)
    {
        $builder = $this->db->table('persona');
        $builder->select('ci, nombres');
        $builder->where($condicion);
        return $builder->get()->getResultArray();
    }

    public function editar_paciente($id)
    {
        $builder = $this->db->table('persona as p');
        $builder->select('p.id_persona, p.ci, p.expedido, p.nombres, p.paterno, p.materno, p.telefono_celular, p.fecha_nacimiento, p.domicilio, o.id_ocupacion, o.nombre, p.estado');
        $builder->join('paciente as pa', 'p.id_persona = pa.id_paciente');
        $builder->join('ocupacion as o', 'o.id_ocupacion = pa.id_ocupacion');
        $builder->where('p.id_persona', $id);
        return $builder->get()->getResultArray();
    }

    public function listar_ocupaciones()
    {
        $builder = $this->db->table("ocupacion as o");
        $builder->select('o.id_ocupacion, o.nombre');
        return $builder->get()->getResultArray();
    }

    public function verificar_id_grupo($nombre)
    {
        $builder = $this->db->table("grupo as g");
        $builder->select('g.id_grupo');
        $builder->where("g.nombre_grupo", $nombre);
        return $builder->get()->getResultArray();
    }

    public function verificar_id_grupo_usuario($id)
    {
        $builder = $this->db->table("grupo_usuario as gu");
        $builder->select('gu.id_grupo_usuario');
        $builder->where("gu.id_usuario", $id);
        return $builder->get()->getResultArray();
    }
    

}