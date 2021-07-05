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

    public function data_paciente($id_persona)
    {
        $builder = $this->db->table('persona');
        $builder->select('*');
        $builder->where('id_persona', $id_persona);
        return $builder->get()->getResult();
    }

    public function verificar_atendidos($id_persona, $fecha_inicial, $fecha_final)
    {
        $query = $this->db->query("
        SELECT 
            sc.fecha,
            sc.hora_inicio,
            sp.fecha_nacimiento, 
            stf.presion_arterial,
            stf.frecuencia_cardiaca,
            stf.frecuencia_respiratoria,
            stf.temperatura,
            stf.peso,
            sad.subjetivo,
            sad.objetivo,
            sad.analisis,
            sad.plan_accion,
            (SELECT CONCAT_WS(' ', sp2.nombres, sp2.paterno, sp2.materno) as nombre_paciente FROM sp_persona sp2 where sp2.id_persona = sc.id_paciente) as paciente,
            (SELECT CONCAT_WS(' ', sp3.nombres, sp3.paterno, sp3.materno) as nombre_paciente FROM sp_persona sp3 where sp3.id_persona = sc.id_odontologo) as odontologo
        FROM sp_tratamiento_fisico stf inner join sp_acciones_decesivas sad on stf.id_cita = sad.id_cita 
        INNER JOIN sp_cita sc on sc.id_cita  = stf.id_cita 
        inner join sp_persona sp on sp.id_persona  = sc.id_paciente and sp.id_persona  = '$id_persona'");

        return  $query->getResultObject();
    }
}
