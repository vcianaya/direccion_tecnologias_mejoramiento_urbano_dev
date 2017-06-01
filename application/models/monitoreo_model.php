<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Monitoreo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
 public function tipo_operativo_general($tipo_operativo) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        //   $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }
    public function tipo_operativo_mes($mes) {
        $db_prueba = $this->load->database('intendencia', TRUE);

        $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }
  public function tipo_operativo_mes_general() {
        $db_prueba = $this->load->database('intendencia', TRUE);
      
        //  $db_prueba->where('id_distrito_operativo', $distrito);
     //   $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }
     public function tipo_operativo_distrito($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);

        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }
    function lunes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('monitoreo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        $this->db->where('nro_dia ', 1);

        return $this->db->count_all_results();
    }

    function martes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('monitoreo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        $this->db->where('nro_dia ', 2);

        return $this->db->count_all_results();
    }

    function miercoles($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('monitoreo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        $this->db->where('nro_dia ', 3);

        return $this->db->count_all_results();
    }

    function jueves($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('monitoreo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        $this->db->where('nro_dia ', 4);

        return $this->db->count_all_results();
    }

    function viernes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('monitoreo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        $this->db->where('nro_dia ', 5);

        return $this->db->count_all_results();
    }

    function sabado($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('monitoreo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        $this->db->where('nro_dia ', 6);

        return $this->db->count_all_results();
    }

    function domingo($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat) {
        $this->db->from('monitoreo');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        $this->db->where('nro_dia ', 0);

        return $this->db->count_all_results();
    }

    function op1($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op2($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('03:01:00') . '" and "' . date(('05:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op3($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('05:01:00') . '" and "' . date(('07:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op4($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('07:01:00') . '" and "' . date(('09:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op5($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('09:01:00') . '" and "' . date(('11:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op6($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('11:01:00') . '" and "' . date(('13:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op7($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('13:01:00') . '" and "' . date(('15:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op8($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('15:01:00') . '" and "' . date(('17:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op9($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('17:01:00') . '" and "' . date(('19:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op10($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('19:01:00') . '" and "' . date(('21:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op11($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('21:01:00') . '" and "' . date(('23:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function op12($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->from('monitoreo')->where('hora BETWEEN "' . date('23:01:00') . '" and "' . date(('24:00:00')) . '"');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        return $this->db->count_all_results();
    }

    function lista_tipo_monitoreo_semana($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        $this->db->select('*');
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');

        $this->db->where('id_distrito_monitoreo ', $distrito);
        $this->db->where('id_tipo_caso ', $tipo_operativo);
        $this->db->from('monitoreo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tip_general_1() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        //  $this->db->where('id_tipo_operativo ', '2');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip_general_2() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('03:01:00') . '" and "' . date(('05:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_3() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('05:01:00') . '" and "' . date(('07:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_4() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('07:01:00') . '" and "' . date(('09:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_5() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('09:01:00') . '" and "' . date(('11:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_6() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('11:01:00') . '" and "' . date(('13:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_7() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('13:01:00') . '" and "' . date(('15:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_8() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('15:01:00') . '" and "' . date(('17:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_9() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('17:01:00') . '" and "' . date(('19:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_10() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('19:01:00') . '" and "' . date(('21:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_11() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('21:01:00') . '" and "' . date(('23:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_12() {
        $this->db->from('monitoreo');
        $this->db->where('hora BETWEEN "' . date('23:01:00') . '" and "' . date(('24:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip1() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        ///   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '33');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip2() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '30');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip3() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //     $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '28');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip4() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '26');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip5() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //    $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '25');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip6() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '24');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip7() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //    $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '21');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip8() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '18');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip9() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        // $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '16');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip10() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '42');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip11() {
        $this->db->from('monitoreo');
        // $this->db->where('hora BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        /// $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '31');
        //  $this->db->where('tipo_operativo ', '2');
        return $this->db->count_all_results();
    }

    function tip12() {
        $this->db->from('monitoreo');

        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '11');
        return $this->db->count_all_results();
    }

    function tip13() {
        $this->db->from('monitoreo');

        //       $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '1');
        return $this->db->count_all_results();
    }

    function tip14() {
        $this->db->from('monitoreo');

        //   $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '39');
        return $this->db->count_all_results();
    }

    function tip15() {
        $this->db->from('monitoreo');
        //  $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('id_tipo_caso ', '10');
        return $this->db->count_all_results();
    }

    function tipTotal() {
        $this->db->from('operativo');
        // $this->db->where('id_distrito_operativo ', $distrito);
        //         $this->db->where('id_tipo_operativo ', '2');
        /*      $this->db->where('id_tipo_operativo ', '6');
          $this->db->where('id_tipo_operativo ', '16');
          $this->db->where('id_tipo_operativo ', '14');
          $this->db->where('id_tipo_operativo ', '18');
          // $this->db->where('id_tipo_operativo ', '16');
          //  $this->db->where('tipo_operativo ', '2'); */
        return $this->db->count_all_results();
    }

    function tipTotal_monitoreo() {
        $this->db->from('monitoreo');

        return $this->db->count_all_results();
    }

    function tipd1() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '1');

        //    $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd2() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '2');

        //    $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd3() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '3');

        //     $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd4() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '4');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd5() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '5');

        // $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd6() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '6');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd7() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '7');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd8() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '8');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd9() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '9');

        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd10() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '10');

        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd11() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '11');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd12() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '12');

        // $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd13() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '13');

        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipd14() {
        $this->db->from('monitoreo');
        $this->db->where('id_distrito_monitoreo ', '14');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipm1() {
        $this->db->from('monitoreo');


        $this->db->where('mes ', '1');
        return $this->db->count_all_results();
    }

    function tipm2() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '2');

        return $this->db->count_all_results();
    }

    function tipm3() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '3');

        return $this->db->count_all_results();
    }

    function tipm4() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '4');

        return $this->db->count_all_results();
    }

    function tipm5() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '5');

        return $this->db->count_all_results();
    }

    function tipm6() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '6');

        return $this->db->count_all_results();
    }

    function tipm7() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '7');

        return $this->db->count_all_results();
    }

    function tipm8() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '8');

        return $this->db->count_all_results();
    }

    function tipm9() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '9');

        return $this->db->count_all_results();
    }

    function tipm10() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '10');

        return $this->db->count_all_results();
    }

    function tipm11() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '11');

        return $this->db->count_all_results();
    }

    function tipm12() {
        $this->db->from('monitoreo');
        $this->db->where('mes ', '12');

        return $this->db->count_all_results();
    }

    function tipdc1() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara', '1');

        //    $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc2() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '2');

        //    $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc3() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '3');

        //     $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc4() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '4');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc5() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara', '5');

        // $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc6() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara', '6');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc7() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara', '7');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc8() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara', '8');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc9() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '9');

        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc10() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '10');

        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc11() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '11');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc12() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '12');

        // $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc13() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '13');

        //   $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc14() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '14');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc15() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '15');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc16() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '16');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc17() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '17');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc18() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '18');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc19() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '19');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc20() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '20');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc21() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '21');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc22() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '22');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc23() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '23');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc24() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '24');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc25() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '25');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc26() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '26');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc27() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '27');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc28() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '28');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc29() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '29');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc30() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '30');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc31() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '31');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function tipdc32() {
        $this->db->from('monitoreo');
        $this->db->where('id_camara ', '32');

        //  $this->db->where_not_in('operativo.id_tipo_operativo ', 18);
        return $this->db->count_all_results();
    }

    function lunes_g() {
        $this->db->from('monitoreo');
        $this->db->where('nro_dia ', 1);
        return $this->db->count_all_results();
    }

    function martes_g() {
        $this->db->from('monitoreo');
        $this->db->where('nro_dia ', 2);
        return $this->db->count_all_results();
    }

    function miercoles_g() {
        $this->db->from('monitoreo');
        $this->db->where('nro_dia ', 3);
        return $this->db->count_all_results();
    }

    function jueves_g() {
        $this->db->from('monitoreo');
        $this->db->where('nro_dia ', 4);
        return $this->db->count_all_results();
    }

    function viernes_g() {
        $this->db->from('monitoreo');
        $this->db->where('nro_dia ', 5);
        return $this->db->count_all_results();
    }

    function sabado_g() {
        $this->db->from('monitoreo');
        $this->db->where('nro_dia ', 6);
        return $this->db->count_all_results();
    }

    function domingo_g() {
        $this->db->from('monitoreo');
        $this->db->where('nro_dia ', 0);
        return $this->db->count_all_results();
    }

}
