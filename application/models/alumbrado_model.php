<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumbrado_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function distrito_3($id) {
         $this->db->where('luminarias.id', $id);
        //  $this->db->join('area', 'area.id ', 'luminarias.area');
          $this->db->join('area', 'area.id = luminarias.area');
        $productos = $this->db->get('luminarias');
        return $productos->result();
    }

    function distrito_1_villaBolivar() {
        $this->db->select('*');
        $this->db->where('id_policial', '10');

        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_1_tejada_rectangular() {
        $this->db->select('*');

        $this->db->where('id_policial', '8');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_1_villa_exaltacion() {
        $this->db->select('*');

        $this->db->where('id_policial', '20');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_1_plan_45() {
        $this->db->select('*');

        $this->db->where('id_policial', '16');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_1_plan_405B() {
        $this->db->select('*');

        $this->db->where('id_policial', '40');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_1_tejada_alpacoma() {
        $this->db->select('*');

        $this->db->where('id_policial', '7');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_1_plan_561() {
        $this->db->select('*');

        $this->db->where('id_policial', '106');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_21_diciembre() {
        $this->db->select('*');

        $this->db->where('id_policial', '18');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_6_junio() {
        $this->db->select('*');

        $this->db->where('id_policial', '12');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_cupilupaca() {
        $this->db->select('*');

        $this->db->where('id_policial', '17');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_eduardo_avaroa() {
        $this->db->select('*');

        $this->db->where('id_policial', '56');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_kenko() {
        $this->db->select('*');

        $this->db->where('id_policial', '13');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_convifacg() {
        $this->db->select('*');

        $this->db->where('id_policial', '11');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_horizontes() {
        $this->db->select('*');

        $this->db->where('id_policial', '21');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_santiago_ii() {
        $this->db->select('*');

        $this->db->where('id_policial', '19');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_copacabana() {
        $this->db->select('*');

        $this->db->where('id_policial', '22');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_bolivar() {
        $this->db->select('*');

        $this->db->where('id_policial', '14');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_elizardo() {
        $this->db->select('*');

        $this->db->where('id_policial', '9');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_santiago_milluni() {
        $this->db->select('*');

        $this->db->where('id_policial', '104');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_2_luisa() {
        $this->db->select('*');

        $this->db->where('id_policial', '54');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_1_de_marzo() {
        $this->db->select('*');

        $this->db->where('id_policial', '92');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        //  $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_1_de_mayo() {
        $this->db->select('*');

        $this->db->where('id_policial', '42');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_3_de_mayo() {
        $this->db->select('*');

        $this->db->where('id_policial', '48');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_cosmos() {
        $this->db->select('*');

        $this->db->where('id_policial', '51');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_cruz_del_sur() {
        $this->db->select('*');

        $this->db->where('id_policial', '49');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_jaime_paz_zamora() {
        $this->db->select('*');

        $this->db->where('id_policial', '52');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_pacajes_caluyo() {
        $this->db->select('*');

        $this->db->where('id_policial', '43');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_paraiso_1() {
        $this->db->select('*');

        $this->db->where('id_policial', '97');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_primavera() {
        $this->db->select('*');

        $this->db->where('id_policial', '94');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_romero_pampa() {
        $this->db->select('*');

        $this->db->where('id_policial', '93');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_san_luis_pampa() {
        $this->db->select('*');

        $this->db->where('id_policial', '41');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_san_luis_taza() {
        $this->db->select('*');

        $this->db->where('id_policial', '95');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_san_pablo() {
        $this->db->select('*');

        $this->db->where('id_policial', '46');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_villa_adela_yunguyo() {
        $this->db->select('*');

        $this->db->where('id_policial', '91');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_villa_alemania() {
        $this->db->select('*');

        $this->db->where('id_policial', '98');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_villa_doleres_f() {
        $this->db->select('*');

        $this->db->where('id_policial', '45');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_3_villa_kiswaras() {
        $this->db->select('*');

        $this->db->where('id_policial', '50');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_16_febrero() {
        $this->db->select('*');

        $this->db->where('id_policial', '64');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_6_agosto() {
        $this->db->select('*');

        $this->db->where('id_policial', '59');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_25_julio() {
        $this->db->select('*');

        $this->db->where('id_policial', '61');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_barrio_municipal() {
        $this->db->select('*');

        $this->db->where('id_policial', '63');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_brasil() {
        $this->db->select('*');

        $this->db->where('id_policial', '67');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_lotes_servicios() {
        $this->db->select('*');

        $this->db->where('id_policial', '65');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_mercedario() {
        $this->db->select('*');

        $this->db->where('id_policial', '58');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_nueva_marca() {
        $this->db->select('*');

        $this->db->where('id_policial', '60');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_pdm_2_seccion() {
        $this->db->select('*');

        $this->db->where('id_policial', '103');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_pdm_4_seccion() {
        $this->db->select('*');

        $this->db->where('id_policial', '102');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_4_plan_192() {
        $this->db->select('*');

        $this->db->where('id_policial', '66');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_5_ingenio() {
        $this->db->select('*');

        $this->db->where('id_policial', '36');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_5_villa_ingenio() {
        $this->db->select('*');

        $this->db->where('id_policial', '37');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_5_mejillones() {
        $this->db->select('*');

        $this->db->where('id_policial', '38');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_5_german() {
        $this->db->select('*');

        $this->db->where('id_policial', '68');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_5_ingavi() {
        $this->db->select('*');

        $this->db->where('id_policial', '69');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_5_mercurio() {
        $this->db->select('*');

        $this->db->where('id_policial', '70');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_5_policial() {
        $this->db->select('*');

        $this->db->where('id_policial', '100');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    //// 6 ////
    function distrito_6_ferropetrol() {
        $this->db->select('*');

        $this->db->where('id_policial', '24');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_interpol() {
        $this->db->select('*');

        $this->db->where('id_policial', '25');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_ballivian() {
        $this->db->select('*');

        $this->db->where('id_policial', '26');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_julio() {
        $this->db->select('*');

        $this->db->where('id_policial', '27');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_futecra() {
        $this->db->select('*');

        $this->db->where('id_policial', '28');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_alto_lima() {
        $this->db->select('*');

        $this->db->where('id_policial', '105');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_los_andes() {
        $this->db->select('*');

        $this->db->where('id_policial', '30');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_adrian() {
        $this->db->select('*');

        $this->db->where('id_policial', '31');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_lima_iii() {
        $this->db->select('*');

        $this->db->where('id_policial', '32');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_lima_ii() {
        $this->db->select('*');

        $this->db->where('id_policial', '33');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_salvador() {
        $this->db->select('*');

        $this->db->where('id_policial', '34');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_epi_alto() {
        $this->db->select('*');

        $this->db->where('id_policial', '29');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_6_loreto() {
        $this->db->select('*');

        $this->db->where('id_policial', '73');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    /////6///
    function distrito_7_21_octubre() {
        $this->db->select('*');

        $this->db->where('id_policial', '71');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_7_progreso() {
        $this->db->select('*');

        $this->db->where('id_policial', '72');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_8_villa_mercedes() {
        $this->db->select('*');

        $this->db->where('id_policial', '74');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_8_unificada_potosi() {
        $this->db->select('*');

        $this->db->where('id_policial', '75');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_8_senkata() {
        $this->db->select('*');

        $this->db->where('id_policial', '76');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_8_santicima_trinidad() {
        $this->db->select('*');

        $this->db->where('id_policial', '77');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_8_septiembre() {
        $this->db->select('*');

        $this->db->where('id_policial', '78');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_8_cristal() {
        $this->db->select('*');

        $this->db->where('id_policial', '79');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_8_villa_mercedes_l() {
        $this->db->select('*');

        $this->db->where('id_policial', '101');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_8_villa_mercedes_f() {
        $this->db->select('*');

        $this->db->where('id_policial', '99');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_12_alto_chijini() {
        $this->db->select('*');

        $this->db->where('id_policial', '80');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_12_san_martin() {
        $this->db->select('*');

        $this->db->where('id_policial', '81');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_12_sedor_exaltacion() {
        $this->db->select('*');

        $this->db->where('id_policial', '82');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_14_saavedra_f() {
        $this->db->select('*');

        $this->db->where('id_policial', '83');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_14_franz_tamayo() {
        $this->db->select('*');

        $this->db->where('id_policial', '84');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_14_savedra_ch() {
        $this->db->select('*');

        $this->db->where('id_policial', '85');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    function distrito_14_villa_cooperativa() {
        $this->db->select('*');

        $this->db->where('id_policial', '86');
        $this->db->join('estado_vehiculo', 'estado_vehiculo.id = modulo_policial.estado_vehiculo');
        $this->db->join('estado_motocicleta', 'estado_motocicleta.id = modulo_policial.estado_motocicleta');
        $this->db->join('estado_bicicletas', 'estado_bicicletas.id = modulo_policial.estado_bicicletas');
        $this->db->join('estado_computadora', 'estado_computadora.id = modulo_policial.estado_computadora');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $this->db->join('muro_perimetral_seguridad', 'muro_perimetral_seguridad.id = modulo_policial.muro_perimetral_seguridad');
        $this->db->join('estado_telefono', 'estado_telefono.id = modulo_policial.estado_telefono');

        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function get_markers($distrito) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        //    $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('salud.id_distrito', $distrito);
        // $this->db->where('turno', $turno);

        $this->db->join('zona', 'zona.id = salud.id_zona');
        //   $this->db->join('calle', 'calle.id = operativo.id_calle');
        //  $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

        $markers = $this->db->get('salud');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    function opt1() {
        $this->db->from('modulo_policial');
        $this->db->where('cantidad_vehiculos <>', 0);
        return $this->db->count_all_results();
    }

    function opt2() {
        $this->db->from('modulo_policial');
        $this->db->where('cantidad_vehiculos ', 0);
        return $this->db->count_all_results();
    }

    function optm1() {
        $this->db->from('modulo_policial');
        $this->db->where('cantidad_motocicleta <>', 0);
        return $this->db->count_all_results();
    }

    function optm2() {
        $this->db->from('modulo_policial');
        $this->db->where('cantidad_motocicleta ', 0);
        return $this->db->count_all_results();
    }

    function opta1() {

        $this->db->where('origen_agua', 1);
        $this->db->from('modulo_policial');
        return $this->db->count_all_results();
    }

    function opta2() {

        $this->db->where('origen_agua', 2);
        $this->db->from('modulo_policial');
        return $this->db->count_all_results();
    }

    function opta3() {

        $this->db->where('origen_agua', 3);
        $this->db->from('modulo_policial');
        return $this->db->count_all_results();
    }

    function opi1() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 1);
        return $this->db->count_all_results();
    }

    function opi2() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 2);
        return $this->db->count_all_results();
    }

    function opi3() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 3);
        return $this->db->count_all_results();
    }

    function opi4() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 4);
        return $this->db->count_all_results();
    }

    function opi5() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 5);
        return $this->db->count_all_results();
    }

    function opi6() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 7);
        return $this->db->count_all_results();
    }

    function opi7() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 8);
        return $this->db->count_all_results();
    }

    function opi8() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 10);
        return $this->db->count_all_results();
    }

    function opi9() {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 11);
        return $this->db->count_all_results();
    }

    function total_modulo_policial() {
        $this->db->from('modulo_policial');

        return $this->db->count_all_results();
    }

    function op1($distrito) {
        $this->db->from('educacion');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        //   $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //     $this->db->where('id_distrito ', $distrito);
        $this->db->where('turno', '1');
        return $this->db->count_all_results();
    }

    function op2($distrito) {
        $this->db->from('educacion');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        //   $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        // $this->db->where('id_distritos', $distrito);
        $this->db->where('turno', '2');
        return $this->db->count_all_results();
    }

    public function tipo_operativo($tipo_operativo) {

        $this->db->where('id', $tipo_operativo);

        //  $this->db->join('zona', 'zona.id = operativo.id_zona');
        //   $this->db->join('calle', 'calle.id = operativo.id_calle');
        //    $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

        $markers2 = $this->db->get('tipo_operativo');

        return $markers2->result();
    }

    public function guardar_hoja($lat, $lng, $infowindow) {
        $this->db->set('pos_y', $lat);
        $this->db->set('pos_x', $lng);
        $this->db->set('sub_distrito', $infowindow);
        $this->db->insert('operativo');
    }

    public function busqueda_pdf_operativo($distrito) {

        //   $this->db->where('fecha_inicio ' , date('Y-m-d', strtotime($fecha)));
        //    $this->db->where('fecha_inicio BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito', $distrito);
        //  $this->db->where('id_tipo_operativo ', $tipo_operativo);


        $query = $this->db->get('reporte_pdf_educacion');
        return $query->result();
    }

    function tipd1() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '1');

        //    $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd2() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '2');

        //    $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd3() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '3');

        //     $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd4() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '4');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd5() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '5');

        // $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd6() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '6');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd7() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '7');

        return $this->db->count_all_results();
    }

    function tipd8() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '8');

        return $this->db->count_all_results();
    }

    function tipd9() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '9');

        return $this->db->count_all_results();
    }

    function tipd10() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '10');

        return $this->db->count_all_results();
    }

    function tipd11() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '11');

        return $this->db->count_all_results();
    }

    function tipd12() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '12');

        return $this->db->count_all_results();
    }

    function tipd13() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '13');

        return $this->db->count_all_results();
    }

    function tipd14() {
        $this->db->from('modulo_policial');
        $this->db->where('id_distrito ', '14');

        return $this->db->count_all_results();
    }

    public function get_markers_general_modulo_policial() {
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $markers = $this->db->get('modulo_policial');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_general_modulo_policial_efectivos() {
        $this->db->group_by('id_distrito');
        $this->db->join('infraestructura', 'infraestructura.id = modulo_policial.infraestructura');
        $markers = $this->db->get('modulo_policial');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    function tipdm1() {
        $query = mysql_query('SELECT SUM(cantidad_motocicleta)  FROM modulo_policial WHERE cantidad_motocicleta <>  "0" and id_distrito = "1"');
        $rows = mysql_result($query, 0);
        return $rows;
    }

    function optai1() {

        $this->db->where('origen_agua', 1);
        $this->db->from('modulo_policial');
        return $this->db->count_all_results();
    }

    function optai2() {

        $this->db->where('origen_agua', 2);
        $this->db->from('modulo_policial');

        return $this->db->count_all_results();
    }

    function optai3() {

        $this->db->where('origen_agua', 3);
        $this->db->from('modulo_policial');
        return $this->db->count_all_results();
    }

    function opte1() {

        $this->db->where('origen_energia', 1);
        $this->db->from('modulo_policial');
        return $this->db->count_all_results();
    }

    function opte2() {

        $this->db->where('origen_energia ', 2);
        $this->db->from('modulo_policial');
        return $this->db->count_all_results();
    }

    function opte3() {

        $this->db->where('origen_energia ', 3);
        $this->db->from('modulo_policial');
        return $this->db->count_all_results();
    }

    function optait1($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 1);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function optait2($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 2);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function optait3($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 3);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function optait4($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 4);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function optait5($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 5);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function optait6($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 7);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function optait7($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 8);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function optait8($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 10);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function optait9($distrito) {
        $this->db->from('modulo_policial');
        $this->db->where('infraestructura', 11);
        $this->db->where('id_distrito', $distrito);
        return $this->db->count_all_results();
    }

    function vehiculos($id) {
     //   $this->db->select('cantidad_vehiculos');
        $this->db->where('id_policial', $id);
        $this->db->from('modulo_policial');
        $productos = $this->db->get();
        return $productos->row();
    }

}
