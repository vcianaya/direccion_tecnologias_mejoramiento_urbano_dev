<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Felcc_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function lista_meses() {
        $this->db->select('*');

        $this->db->from('mes');

        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_divisiones() {
        $this->db->select('*');
        $this->db->from('division');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function mes() {
        $this->db->select('*');
        $this->db->from('mes');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_delitos() {
        $this->db->select('*');
        $this->db->from('delito');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_gestion() {
        $this->db->select('*');
        $this->db->from('gestion');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_edad() {
        $this->db->select('*');
        $this->db->from('edad');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_nacionalidad() {
        $this->db->select('*');
        $this->db->from('nacionalidad');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_medios_utilizados() {
        $this->db->select('*');
        $this->db->from('medios_utilizados');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_instrumentos_utilizados() {
        $this->db->select('*');
        $this->db->from('instrumentos_utilizados');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_estado_juridico() {
        $this->db->select('*');
        $this->db->from('estado_juridico');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function lista_arrestado() {
        $this->db->select('*');
        $this->db->from('arrestado');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function guardar_felcc($guardar_operativos, $id_distrito) {
        $this->db->set('distrito', $id_distrito);
        $this->db->insert('felcc', $guardar_operativos);
    }

    public function felcc() {
        $this->db->select('*');
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("estado_aprobacion", 0);
        $this->db->from('felcc');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function eliminar_felcc($id) {
        $this->db->where('id_felcc', $id);
        return $this->db->delete('felcc');
    }

    function aprobar_felcc($id) {
        $this->db->where('id_felcc', $id);
        $this->db->set('estado_aprobacion', 1);
        return $this->db->update('felcc');
    }

    public function get_markers_general($leyenda, $division, $mes) {
      

        if ($mes == 13) {
            $this->db->join('division', 'division.id = felcc.division');
            $this->db->join('delito', 'delito.id = felcc.delitos_hecho');
            $this->db->where('division ', $division);
        } else {
            $this->db->join('division', 'division.id = felcc.division');
            $this->db->join('delito', 'delito.id = felcc.delitos_hecho');
            $this->db->where('division ', $division);
            $this->db->where('mes', $mes);
        }




        $markers = $this->db->get('felcc');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_delito($id_felcc) {
        if ($id_felcc == 0) {
            
        } else {
            $this->db->where('id', $id_felcc);
        }




        $markers = $this->db->get('delito');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    function tip_general_13($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('00:00:00') . '" and "' . date(('00:59:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_1($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('00:00:00') . '" and "' . date(('03:00:00')) . '"');

        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_2($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('03:01:00') . '" and "' . date(('05:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_3($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('05:01:00') . '" and "' . date(('07:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_4($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('07:01:00') . '" and "' . date(('09:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_5($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('09:01:00') . '" and "' . date(('11:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_6($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('11:01:00') . '" and "' . date(('13:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_7($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('13:01:00') . '" and "' . date(('15:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_8($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('15:01:00') . '" and "' . date(('17:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_9($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('17:01:00') . '" and "' . date(('19:00:00')) . '"');
        //  $this->db->where('hora_hecho BETWEEN "' . date('19:01:00') . '" and "' . date(('21:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_10($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('19:01:00') . '" and "' . date(('21:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_11($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('21:01:00') . '" and "' . date(('23:00:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip_general_12($mes, $division) {

        $this->db->where('hora_hecho BETWEEN "' . date('23:01:00') . '" and "' . date(('24:59:00')) . '"');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tip1() {
        $this->db->from('felcc');
        $this->db->where('division ', '1');
        return $this->db->count_all_results();
    }

    function tip2() {
        $this->db->from('felcc');
        $this->db->where('division ', '2');
        return $this->db->count_all_results();
    }

    function tip3() {
        $this->db->from('felcc');
        $this->db->where('division ', '3');
        return $this->db->count_all_results();
    }

    function tip4() {
        $this->db->from('felcc');
        $this->db->where('division ', '4');
        return $this->db->count_all_results();
    }

    function tip5() {
        $this->db->from('felcc');
        $this->db->where('division ', '5');
        return $this->db->count_all_results();
    }

    function tip6() {
        $this->db->from('felcc');
        $this->db->where('division ', '6');
        return $this->db->count_all_results();
    }

    function tip7() {
        $this->db->from('felcc');
        $this->db->where('division ', '7');
        return $this->db->count_all_results();
    }

    function tip8() {
        $this->db->from('felcc');
        $this->db->where('division ', '8');
        return $this->db->count_all_results();
    }

    function tip9() {
        $this->db->from('felcc');
        $this->db->where('division ', '9');
        return $this->db->count_all_results();
    }

    function tip10() {
        $this->db->from('felcc');
        $this->db->where('division ', '10');
        return $this->db->count_all_results();
    }

    function tipd1($mes, $division) {
        $this->db->where('distrito ', '1');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd2($mes, $division) {
        $this->db->where('distrito ', '2');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd3($mes, $division) {
        $this->db->where('distrito ', '3');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd4($mes, $division) {
        $this->db->where('distrito ', '4');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd5($mes, $division) {
        $this->db->where('distrito ', '5');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd6($mes, $division) {
        $this->db->where('distrito ', '6');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd7($mes, $division) {
        $this->db->where('distrito ', '7');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd8($mes, $division) {
        $this->db->where('distrito ', '8');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd9($mes, $division) {
        $this->db->where('distrito ', '9');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd10($mes, $division) {
        $this->db->where('distrito ', '10');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd11($mes, $division) {
        $this->db->where('distrito ', '11');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd12($mes, $division) {
        $this->db->where('distrito ', '12');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd13($mes, $division) {
        $this->db->where('distrito ', '13');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipd14($mes, $division) {
        $this->db->where('distrito ', '14');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }
    function tipd15($mes, $division) {
        $this->db->where('distrito ', '0');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipm1() {
        $this->db->from('felcc');
        $this->db->where('estado_caso ', '1');
        return $this->db->count_all_results();
    }

    function tipm2() {
        $this->db->from('felcc');
        $this->db->where('estado_caso ', '2');
        return $this->db->count_all_results();
    }

    function tipm3() {
        $this->db->from('felcc');
        $this->db->where('estado_caso ', '3');
        return $this->db->count_all_results();
    }

    function tipm4() {
        $this->db->from('felcc');
        $this->db->where('estado_caso ', '4');
        return $this->db->count_all_results();
    }

    function tipm5() {
        $this->db->from('felcc');
        $this->db->where('estado_caso ', '5');
        return $this->db->count_all_results();
    }

    function tipm6() {
        $this->db->from('felcc');
        $this->db->where('estado_caso ', '6');
        return $this->db->count_all_results();
    }

    function tipm7() {
        $this->db->from('felcc');
        $this->db->where('estado_caso ', '7');
        return $this->db->count_all_results();
    }

    function tipm8() {
        $this->db->from('felcc');
        $this->db->where('estado_caso ', '8');
        return $this->db->count_all_results();
    }

    function tipg1($mes, $division) {

        $this->db->where('sexo_victima ', 1);

        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');

        return $this->db->count_all_results();
    }

    function tipg2($mes, $division) {

        $this->db->where('sexo_victima ', 2);
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipg3($mes, $division) {

   //     $this->db->where('sexo_victima ', 3);
        $this->db->where('sexo_victima', 0);
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {

            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa1($mes, $division) {
        $this->db->where('edad_victima ', '1');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa2($mes, $division) {
        $this->db->where('edad_victima ', '2');
        if ($mes == 13) {

            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa3($mes, $division) {
        $this->db->where('edad_victima ', '3');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa4($mes, $division) {
        $this->db->where('edad_victima ', '4');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa5($mes, $division) {
        $this->db->where('edad_victima ', '5');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa6($mes, $division) {
        ;
        $this->db->where('edad_victima ', '6');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa7($mes, $division) {
        $this->db->where('edad_victima ', '7');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa8($mes, $division) {
        $this->db->where('edad_victima ', '8');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa9($mes, $division) {
        $this->db->where('edad_victima ', '9');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa10($mes, $division) {
        $this->db->where('edad_victima ', '10');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa11($mes, $division) {
        $this->db->where('edad_victima ', '11');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa12($mes, $division) {
        $this->db->where('edad_victima ', '12');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa13($mes, $division) {
        $this->db->where('edad_victima ', '13');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipa14($mes, $division) {
        $this->db->where('edad_victima ', 14);
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme1($mes, $division) {
        $this->db->where('mes ', '1');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme2($mes, $division) {
        $this->db->where('mes ', '2');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme3($mes, $division) {
        $this->db->where('mes ', '3');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme4($mes, $division) {
        $this->db->where('mes ', '4');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme5($mes, $division) {
        $this->db->where('mes ', '5');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme6($mes, $division) {
        $this->db->where('mes ', '6');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme7($mes, $division) {
        $this->db->where('mes ', '7');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme8($mes, $division) {
        $this->db->where('mes ', '8');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme9($mes, $division) {
        $this->db->where('mes ', '9');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme10($mes, $division) {
        $this->db->where('mes ', '10');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme11($mes, $division) {
        $this->db->where('mes ', '11');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

    function tipme12($mes, $division) {
        $this->db->where('mes ', '12');
        if ($mes == 13) {
            $this->db->where('division ', $division);
        } else {
            $this->db->where('mes', $mes);
        }
        $this->db->from('felcc');
        return $this->db->count_all_results();
    }

}
