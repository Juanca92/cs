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
        $builder->select('p.id_persona, p.ci, p.expedido, p.nombres, p.paterno, p.materno, p.sexo, p.lugar_nacimiento, p.telefono_celular, 
        p.fecha_nacimiento, p.domicilio, o.id_ocupacion, o.nombre, p.estatus, p.estado');
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

    public function editar_enfermedad($id)
    {
        $builder = $this->db->table('view_tratamiento_enfermedad as te');
        $builder->select('*');
        $builder->where('id_paciente', $id);
        return $builder->get()->getResultArray();
    }
    public function editar_consulta($id)
    {
        $builder = $this->db->table('tratamiento_consulta as tc');
        $builder->select('*');
        $builder->where('id_paciente', $id);
        return $builder->get()->getResultArray();
    }
    public function editar_fisico($id)
    {
        $builder = $this->db->table('tratamiento_fisico as tf');
        $builder->select('*');
        $builder->join('cita c', 'c.id_cita = tf.id_cita', 'right');
        $builder->where('c.id_cita', $id);
        return $builder->get()->getResultArray();
    }
    public function editar_alergia($id)
    {
        $builder = $this->db->table('view_tratamiento_alergias as ta');
        $builder->select('*');
        $builder->where('id_paciente', $id);
        return $builder->get()->getResultArray();
    }
    public function Mostrar_tratamientos($id)
    {
        $builder = $this->db->table('view_cita as c');
        $builder->select('c.tipo_tratamiento, c.fecha, c.hora_inicio, c.estatus');
        $builder->where('id_paciente', $id);
        return $builder->get()->getResultArray();
    }
    public function datos_usuario_perfil($id)
    {
        $builder = $this->db->table('view_users as u');
        $builder->select('CONCAT(u.nombres, " ", u.paterno," ", u.materno) AS nombre_completo, u.telefono_celular, u.domicilio, u.fecha_nacimiento, u.foto');
        $builder->where('id_persona', $id);
        return $builder->get()->getResultArray();
    }
    public function editar_accionesDecesivas($id)
    {
        $builder = $this->db->table('sp_acciones_decesivas as ad');
        $builder->select('*');
        $builder->join('cita c', 'c.id_cita = ad.id_cita', 'right');
        $builder->where('c.id_cita', $id);
        return $builder->get()->getResultArray();
    }
    public function editar_diagnostico($id)
    {
        $builder = $this->db->table('sp_diagnostico as d');
        $builder->select('*');
        $builder->where('id_diagnostico', $id);
        return $builder->get()->getResultArray();
    }
    public function editar_medicacion($id)
    {
        $builder = $this->db->table('sp_medicacion as m');
        $builder->select('*');
        $builder->where('id_medicacion', $id);
        return $builder->get()->getResultArray();
    }

    public function list_paciente()
    {
        $builder = $this->db->table('sp_view_paciente');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
}
