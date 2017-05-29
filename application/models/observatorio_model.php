<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Observatorio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function consiguiendo_id_distrito($id_zona) {
        //$id='';
        $this->db->select("id_distrito");
        $this->db->where("id", $id_zona);
        $query = $this->db->get("zona");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row):
                $id_distrito[] = $row->id_distrito;
            endforeach;
            return $id_distrito;
        }
    }

    function consiguiendo_parametros_zona($id_zona) {
        $this->db->select('*');
        $this->db->where('id', $id_zona);
        $this->db->from('zona');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function consiguiendo_parametros_calle($id_calle) {
        $this->db->select('*');
        $this->db->where('id', $id_calle);
        $this->db->from('calle');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function lista_operativos() {
        $this->db->select('*');
        //    $this->db->where('id');
        $this->db->from('operativo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function lista_operativos_colegios() {
        $this->db->select('*');
        $this->db->where("id_tipo_operativo", 4);
        $this->db->or_where("id_tipo_operativo", 7);
        $this->db->or_where("id_tipo_operativo", 3);
        $this->db->from('operativo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function lista_tipo_operativos() {
        $this->db->select('*');
        //    $this->db->where('id');
        $this->db->from('operativo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function get_data($item, $match) {
        // $db_prueba = $this->load->database('prueba', TRUE);
        $this->db->limit('5');
        //      $this->db->like('ItemCode', $match);
        $this->db->or_like('nombre', $match);
        // $db_prueba->like($item, $match);
        $query = $this->db->get('zona');
        return $query->result();
    }

    function op1m($caso_monitoreo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $caso_monitoreo);
        return $this->db->count_all_results();
    }

    public function consiguiendo_id_definicion($id_usuario) {
        //$id='';
        $this->db->select("fecha");
        //   $this->db->where("idUsuario", $id_usuario);
        $query = $this->db->get("definicion_planificacion");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row):
                $fecha[] = $row->fecha;
            endforeach;
            return $fecha;
        }
    }

    function lista_tipo_operativos_semana($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->select('*');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->from('operativo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function opd1($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        //   $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function lunes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('operativo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 1);

        return $this->db->count_all_results();
    }

    function martes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('operativo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 2);

        return $this->db->count_all_results();
    }

    function miercoles($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('operativo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 3);

        return $this->db->count_all_results();
    }

    function jueves($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('operativo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 4);

        return $this->db->count_all_results();
    }

    function viernes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('operativo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 5);

        return $this->db->count_all_results();
    }

    function sabado($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('operativo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 6);

        return $this->db->count_all_results();
    }

    function domingo($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('operativo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 0);

        return $this->db->count_all_results();
    }

    function lunes_g() {
        $this->db->from('operativo');
        //    $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //       $this->db->where('id_distrito_operativo ', $distrito);
        //       $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 1);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function martes_g() {
        $this->db->from('operativo');
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        //   $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 2);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function miercoles_g() {
        $this->db->from('operativo');
        //   $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        //     $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function jueves_g() {
        $this->db->from('operativo');
        //   $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //     $this->db->where('id_distrito_operativo ', $distrito);
        //     $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function viernes_g() {
        $this->db->from('operativo');
        //   $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //    $this->db->where('id_distrito_operativo ', $distrito);
        //   $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 5);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function sabado_g() {
        $this->db->from('operativo');
        //$this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        //   $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 6);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function domingo_g() {
        $this->db->from('operativo');
        //    $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //    $this->db->where('id_distrito_operativo ', $distrito);
        //    $this->db->where('id_tipo_operativo ', $tipo_operativo);
        $this->db->where('nro_dia ', 0);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function op1($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op2($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('03:01:00') . '" and "' . date(('05:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op3($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('05:01:00') . '" and "' . date(('07:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op4($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('07:01:00') . '" and "' . date(('09:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op5($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('09:01:00') . '" and "' . date(('11:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op6($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('11:01:00') . '" and "' . date(('13:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op7($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('13:01:00') . '" and "' . date(('15:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op8($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('15:01:00') . '" and "' . date(('17:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op9($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('17:01:00') . '" and "' . date(('19:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op10($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('19:01:00') . '" and "' . date(('21:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op11($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('21:01:00') . '" and "' . date(('23:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op12($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('operativo')->where('hora BETWEEN "' . date('23:01:00') . '" and "' . date(('24:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function tip_general_1() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        //  $this->db->where('id_tipo_operativo ', '2');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip_general_2() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('03:01:00') . '" and "' . date(('05:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_3() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('05:01:00') . '" and "' . date(('07:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_4() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('07:01:00') . '" and "' . date(('09:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_5() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('09:01:00') . '" and "' . date(('11:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_6() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('11:01:00') . '" and "' . date(('13:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_7() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('13:01:00') . '" and "' . date(('15:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_8() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('15:01:00') . '" and "' . date(('17:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_9() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('17:01:00') . '" and "' . date(('19:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_10() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('19:01:00') . '" and "' . date(('21:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_11() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('21:01:00') . '" and "' . date(('23:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_12() {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('23:01:00') . '" and "' . date(('24:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_fecha_1($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);

        return $this->db->count_all_results();
    }

    function tip_general_fecha_2($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('03:01:00') . '" and "' . date(('05:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_3($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('05:01:00') . '" and "' . date(('07:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_4($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('07:01:00') . '" and "' . date(('09:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_5($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('09:01:00') . '" and "' . date(('11:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_6($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('11:01:00') . '" and "' . date(('13:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_7($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('13:01:00') . '" and "' . date(('15:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_8($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('15:01:00') . '" and "' . date(('17:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_9($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('17:01:00') . '" and "' . date(('19:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_10($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('19:01:00') . '" and "' . date(('21:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_11($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('21:01:00') . '" and "' . date(('23:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tip_general_fecha_12($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('hora BETWEEN "' . date('23:01:00') . '" and "' . date(('24:00:00')) . '"');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipTotal_fecha() {
        $this->db->from('operativo');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //      $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tip_fecha_1($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '2');

        return $this->db->count_all_results();
    }

    function tip_fecha_2($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '6');

        return $this->db->count_all_results();
    }

    function tip_fecha_3($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '16');

        return $this->db->count_all_results();
    }

    function tip_fecha_4($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '14');

        return $this->db->count_all_results();
    }

    function tip_fecha_5($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '18');

        return $this->db->count_all_results();
    }

    function tip_fecha_6($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '15');

        return $this->db->count_all_results();
    }

    function tip_fecha_7($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '4');

        return $this->db->count_all_results();
    }

    function tip_fecha_8($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '13');

        return $this->db->count_all_results();
    }

    function tip_fecha_9($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '11');

        return $this->db->count_all_results();
    }

    function tip_fecha_10($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '3');

        return $this->db->count_all_results();
    }

    function tip_fecha_11($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '5');

        return $this->db->count_all_results();
    }

    function tip_fecha_12($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '7');

        return $this->db->count_all_results();
    }

    function tip_fecha_13($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '8');

        return $this->db->count_all_results();
    }

    function tip_fecha_14($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '9');

        return $this->db->count_all_results();
    }

    function tip_fecha_15($fecha_inicio, $fecha_fin) {
        $this->db->from('operativo');
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('id_tipo_operativo ', '10');

        return $this->db->count_all_results();
    }

    function tip1() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        ///   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '2');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip2() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '6');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip3() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //     $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '16');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip4() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '14');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip5() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //    $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '18');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip6() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '15');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip7() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //    $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '4');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip8() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '13');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip9() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        // $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '11');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip10() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '3');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip11() {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '5');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip12() {
        $this->db->from('operativo');

        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '7');
        return $this->db->count_all_results();
    }

    function tip13() {
        $this->db->from('operativo');

        //       $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '8');
        return $this->db->count_all_results();
    }

    function tip14() {
        $this->db->from('operativo');

        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '9');
        return $this->db->count_all_results();
    }

    function tip15() {
        $this->db->from('operativo');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '10');
        return $this->db->count_all_results();
    }

    function tipatotal1($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        ///   $this->db->where('id_distrito_operativo ', $distrito);
        /// $this->db->where('id_tipo_operativo ', '2');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipa1($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        ///   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '2');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipa2($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('mes ', $var);
        $this->db->where('id_tipo_operativo ', '6');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa3($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //     $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('mes ', $var);
        $this->db->where('id_tipo_operativo ', '16');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa4($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('mes ', $var);
        $this->db->where('id_tipo_operativo ', '14');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa5($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //    $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '18');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa6($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '15');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa7($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //    $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '4');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa8($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '13');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa9($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        // $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '11');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa10($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '3');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa11($var) {
        $this->db->from('operativo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '5');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tipa12($var) {
        $this->db->from('operativo');

        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '7');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipa13($var) {
        $this->db->from('operativo');

        //       $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '8');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipa14($var) {
        $this->db->from('operativo');

        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '9');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipa15($var) {
        $this->db->from('operativo');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_operativo ', '10');
        $this->db->where('mes ', $var);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipd1() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '1');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //    $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd2() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '2');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //    $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd3() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '3');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //     $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd4() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '4');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd5() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '5');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        // $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd6() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '6');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd7() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '7');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd8() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '8');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd9() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '9');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd10() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '10');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd11() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '11');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd12() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '12');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        // $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd13() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '13');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd14() {
        $this->db->from('operativo');
        $this->db->where('id_distrito_operativo ', '14');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipm1() {
        $this->db->from('operativo');

        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        $this->db->where('mes', '1');
        return $this->db->count_all_results();
    }

    function tipm2() {
        $this->db->from('operativo');
        $this->db->where('mes ', '2');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm3() {
        $this->db->from('operativo');
        $this->db->where('mes ', '3');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm4() {
        $this->db->from('operativo');
        $this->db->where('mes ', '4');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm5() {
        $this->db->from('operativo');
        $this->db->where('mes ', '5');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm6() {
        $this->db->from('operativo');
        $this->db->where('mes ', '6');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm7() {
        $this->db->from('operativo');
        $this->db->where('mes ', '7');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm8() {
        $this->db->from('operativo');
        $this->db->where('mes ', '8');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm9() {
        $this->db->from('operativo');
        $this->db->where('mes ', '9');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm10() {
        $this->db->from('operativo');
        $this->db->where('mes ', '10');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm11() {
        $this->db->from('operativo');
        $this->db->where('mes ', '11');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipm12() {
        $this->db->from('operativo');
        $this->db->where('mes ', '12');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        return $this->db->count_all_results();
    }

    function tipTotal() {
        $this->db->from('operativo');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //      $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipTotal_b($var) {
        $this->db->from('operativo');
        $this->db->where('id_tipo_operativo ', $var);
        return $this->db->count_all_results();
    }

    function tipTotal_2() {
        $this->db->from('operativo');
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    public function guardar_operativos($guardar_operativos, $id_distrito) {
        $this->db->set('id_distrito_operativo', $id_distrito);


        $this->db->insert('operativo', $guardar_operativos);
    }

    public function guardar_monitoreo($guardar_monitoreo) {
        $this->db->insert('monitoreo', $guardar_monitoreo);
    }

    public function guardar_vias($guardar_vias) {
        $this->db->insert('vias', $guardar_vias);
    }

    public function guardar_decomisos($guardar_decomisos) {
        //   $this->db->set('id_distrito_operativo', $id_distrito);


        $this->db->insert('decomiso', $guardar_decomisos);
    }

    function eliminar_operativo($id) {
        $this->db->where('id', $id);
        return $this->db->delete('imagenes');
    }

    function eliminar_monitoreo($id) {
        $this->db->where('id_monitoreo', $id);
        return $this->db->delete('monitoreo');
    }

    function eliminar_operativo_decomiso($id) {
        $this->db->where('id_operativo', $id);
        return $this->db->delete('decomiso');
    }

    function aprobar_operativo($id) {
        $this->db->where('id_operativo', $id);
        $this->db->set('decomiso', 1);
        return $this->db->update('operativo');
    }

    function aprobar_monitoreo($id) {
        $this->db->where('id_monitoreo', $id);
        $this->db->set('estado_aprobacion', 1);
        return $this->db->update('monitoreo');
    }

    public function busqueda_pdf_operativo($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {

        //   $this->db->where('fecha_inicio ' , date('Y-m-d', strtotime($fecha)));
        $this->db->where('fecha_inicio BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito', $distrito);
        $this->db->where('id_tipo_operativo ', $tipo_operativo);


        $query = $this->db->get('reporte_pdf_operativos');
        return $query->result();
    }

    function tipologia_principal($id_tipologia_principal) {
        $this->db->select('nombre_tipologia_primaria');
        $this->db->where('id ', $id_tipologia_principal);
        //    $this->db->limit('1');
        $this->db->from('tipologia_primaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica() {
        $this->db->select('nombre_tipologia_especifica');
        //  $this->db->where('id ', $id_tipologia_principal);
        //    $this->db->limit('1');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mes($id_mes) {
        // $this->db->select('nombre_tipologia_primaria');
        $this->db->where('id ', $id_mes);
        //    $this->db->limit('1');
        $this->db->from('mes');
        $productos = $this->db->get();
        return $productos->result();
    }

    function gestion($id_gestion) {
        // $this->db->select('nombre_tipologia_primaria');
        $this->db->where('id ', $id_gestion);
        //    $this->db->limit('1');
        $this->db->from('gestion');
        $productos = $this->db->get();
        return $productos->result();
    }

    //// Especifica
    function tipologia_especifica_1() {
        $this->db->limit('1');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_2() {
        $this->db->limit('2');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_3() {
        $this->db->limit('3');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_4() {
        $this->db->limit('4');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_5() {
        $this->db->limit('5');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_6() {
        $this->db->limit('6');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_7() {
        $this->db->limit('7');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_8() {
        $this->db->limit('8');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_9() {
        $this->db->limit('9');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_10() {
        $this->db->limit('10');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_11() {
        $this->db->limit('11');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_12() {
        $this->db->limit('12');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_13() {
        $this->db->limit('13');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_14() {
        $this->db->limit('14');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_15() {
        $this->db->limit('15');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_especifica_16() {
        $this->db->limit('16');
        $this->db->from('tipologia_especifica');
        $productos = $this->db->get();
        return $productos->result();
    }

///// Secundaria
    function tipologia_secundaria_1($id_tipologia_principal) {
        //   $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('1');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_2($id_tipologia_principal) {
        ///  $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('2');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_3($id_tipologia_principal) {
        //    $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('3');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_4($id_tipologia_principal) {
        //   $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('4');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_5($id_tipologia_principal) {
        //    $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('5');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_6($id_tipologia_principal) {
        //    $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('6');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_7($id_tipologia_principal) {
        //   $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('7');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_8($id_tipologia_principal) {
        //    $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('8');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_9($id_tipologia_principal) {
        //     $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('9');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipologia_secundaria_10($id_tipologia_principal) {
        //    $this->db->select('nombre_tipologia_secundaria');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->limit('10');
        $this->db->from('tipologia_secundaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_1($id_tipologia_principal, $id_mes, $id_primero, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_primero);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_2($id_tipologia_principal, $id_mes, $id_segundo, $id_gestion) {

        //    $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_segundo);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_3($id_tipologia_principal, $id_mes, $id_tercero, $id_gestion) {

        //   $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_tercero);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_4($id_tipologia_principal, $id_mes, $id_cuarto, $id_gestion) {

        //   $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_cuarto);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_5($id_tipologia_principal, $id_mes, $id_quinto, $id_gestion) {

        //  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_quinto);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_6($id_tipologia_principal, $id_mes, $id_sexto, $id_gestion) {

        //   $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_sexto);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_7($id_tipologia_principal, $id_mes, $id_septimo, $id_gestion) {

        //   $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_septimo);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_8($id_tipologia_principal, $id_mes, $id_octavo, $id_gestion) {

        //  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_octavo);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_9($id_tipologia_principal, $id_mes, $id_noveno, $id_gestion) {

        // $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_noveno);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_10($id_tipologia_principal, $id_mes, $id_decimo, $id_gestion) {

        //  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        $this->db->where('id_tipologia_secundaria ', $id_decimo);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_01($id_mes, $id_primero, $id_gestion) {
        ///  $this->db->select('sexo_mas');

        $this->db->where('id_tipologia_especifica ', $id_primero);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_02($id_mes, $id_segundo, $id_gestion) {
        ///  $this->db->select('sexo_mas');

        $this->db->where('id_tipologia_especifica ', $id_segundo);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_03($id_mes, $id_tercero, $id_gestion) {
        ///  $this->db->select('sexo_mas');

        $this->db->where('id_tipologia_especifica ', $id_tercero);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_04($id_mes, $id_quarto, $id_gestion) {
        ///  $this->db->select('sexo_mas');

        $this->db->where('id_tipologia_especifica ', $id_quarto);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_05($id_mes, $id_quinto, $id_gestion) {
        ///  $this->db->select('sexo_mas');

        $this->db->where('id_tipologia_especifica ', $id_quinto);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_06($id_mes, $id_sexto, $id_gestion) {
        ///  $this->db->select('sexo_mas');

        $this->db->where('id_tipologia_especifica ', $id_sexto);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_07($id_mes, $id_septimo, $id_gestion) {
        ///  $this->db->select('sexo_mas');

        $this->db->where('id_tipologia_especifica ', $id_septimo);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_08($id_mes, $id_octavo, $id_gestion) {
        ///  $this->db->select('sexo_mas');

        $this->db->where('id_tipologia_especifica ', $id_octavo);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_09($id_mes, $id_noveno, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_especifica ', $id_noveno);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_010($id_mes, $id_decimo, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_especifica ', $id_decimo);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_011($id_mes, $id_once, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_especifica ', $id_once);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_012($id_mes, $id_doce, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_especifica ', $id_doce);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_013($id_mes, $id_trece, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_especifica ', $id_trece);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_014($id_mes, $id_catorce, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_especifica ', $id_catorce);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_015($id_mes, $id_quince, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_especifica ', $id_quince);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function mas_016($id_mes, $id_dieciseis, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_especifica ', $id_dieciseis);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('slim');
        $productos = $this->db->get();
        return $productos->result();
    }

    function observaciones_dna($id_tipologia_principal, $id_mes, $id_gestion) {
        ///  $this->db->select('sexo_mas');
        $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        //      $this->db->where('id_tipologia_secundaria ', $id_primero);
        $this->db->where('id_mes ', $id_mes);
        $this->db->where('id_gestion ', $id_gestion);
        //  $this->db->limit('1');
        $this->db->from('defensoria_na');
        $productos = $this->db->get();
        return $productos->result();
    }

    function seleccion_tipologia_principal() {
        ///  $this->db->select('sexo_mas');
        //      $this->db->where('id_tipologia_principal ', $id_tipologia_principal);
        //      $this->db->where('id_tipologia_secundaria ', $id_primero);
        //  $this->db->where('id_mes ', $id_mes);
        //  $this->db->limit('1');
        $this->db->from('tipologia_primaria');
        $productos = $this->db->get();
        return $productos->result();
    }

    function seleccion_mes() {
        // $this->db->select('nombre_tipologia_primaria');
        //    $this->db->where('id ', $id_mes);
        //    $this->db->limit('1');
        $this->db->from('mes');
        $productos = $this->db->get();
        return $productos->result();
    }

    function seleccion_gestion() {
        // $this->db->select('nombre_tipologia_primaria');
        //    $this->db->where('id ', $id_mes);
        //    $this->db->limit('1');
        $this->db->from('gestion');
        $productos = $this->db->get();
        return $productos->result();
    }

}
