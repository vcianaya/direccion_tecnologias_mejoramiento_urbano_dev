<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Intendencia_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /* public function getProvincias() {
      $this->db->select("id,nombre");
      $provincias = $this->db->get("distrito");
      $data = array();
      foreach ($provincias->result() as $provincia) {
      $data[$provincia->id] = $provincia->nombre;
      }
      return $data;
      } */

    function mumero_casos_registrados_intendencia() {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function ultima_fecha() {
        //    $db_prueba = $this->load->database('intendencia', TRUE);

        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->select("fecha_ultimo");
        $db_prueba->limit(1);
        $db_prueba->order_by("fecha_ultimo", "DESC");
        $db_prueba->from('operativo');

        $provincias = $db_prueba->get();
        return $provincias->result();
    }

    public function ultima_fecha_decomisos() {
        //    $db_prueba = $this->load->database('intendencia', TRUE);

        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->select("fecha_ultimo");
        $db_prueba->limit(1);
        $db_prueba->order_by("fecha_ultimo", "DESC");
        $db_prueba->from('decomiso');

        $provincias = $db_prueba->get();
        return $provincias->result();
    }

    function mumero_casos_registrados_mes($mes) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        // $db_prueba->select('SUM(puntos)');
        $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    function mumero_casos_registrados_operativos($id_tipo_operativo) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_tipo_operativo', $id_tipo_operativo);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    function mumero_casos_registrados_operativo_item($item) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('item', $item);
        $db_prueba->from('decomiso');
        return $db_prueba->count_all_results();
    }

    function mumero_casos_registrados_distrito($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    function tip_general_hora($i, $f, $distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        // $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->from('operativo');
        $db_prueba->where('hora BETWEEN "' . date($i) . '" and "' . date(($f)) . '"');
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 3);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 4);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 9);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 7);

        return $db_prueba->count_all_results();
    }

    function tip_general_hora_general($i, $f) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        // $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->from('operativo');
        $db_prueba->where('hora BETWEEN "' . date($i) . '" and "' . date(($f)) . '"');
        //    $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 3);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 4);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 9);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 7);

        return $db_prueba->count_all_results();
    }

    function tip_general_hora_total($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        // $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->from('operativo');
        //  $db_prueba->where('hora BETWEEN "' . date($i) . '" and "' . date(($f)) . '"');
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 3);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 4);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 9);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 7);

        return $db_prueba->count_all_results();
    }

    function tip_general_hora_total_general() {
        $db_prueba = $this->load->database('intendencia', TRUE);
        // $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->from('operativo');
        //  $db_prueba->where('hora BETWEEN "' . date($i) . '" and "' . date(($f)) . '"');
        //    $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 3);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 4);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 9);
        $db_prueba->where_not_in('operativo.id_tipo_operativo ', 7);

        return $db_prueba->count_all_results();
    }

    function clausuras($tp, $distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_tipo_operativo', $tp);
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where('clausurado', 1);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    function distritos($distrito) {
        $this->db->from('distrito');
        $this->db->where_not_in("id", 0);
        $this->db->where('id', $distrito);
        return $this->db->count_all_results();
    }

    function total_registros() {
        $this->db->from('distrito');
        // $this->db->where('gas', 'Si');
        return $this->db->count_all_results();
    }

    function total_registros_operativos($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);

        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where_not_in("id_tipo_operativo", 3);
        $db_prueba->where_not_in("id_tipo_operativo", 4);
        $db_prueba->where_not_in("id_tipo_operativo", 9);
        $db_prueba->from('operativo');
        // $this->db->where('gas', 'Si');
        return $db_prueba->count_all_results();
    }

    function total_registros_operativos_general() {
        $db_prueba = $this->load->database('intendencia', TRUE);

        ///   $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where_not_in("id_tipo_operativo", 3);
        $db_prueba->where_not_in("id_tipo_operativo", 4);
        $db_prueba->where_not_in("id_tipo_operativo", 9);
        $db_prueba->from('operativo');
        // $this->db->where('gas', 'Si');
        return $db_prueba->count_all_results();
    }

    public function lista_distritos() {
        $this->db->select('*');
        $this->db->where_not_in("id", 0);
        $this->db->from('distrito');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function tipo_operativo($tipo_operativo, $distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function tipo_operativo_general($tipo_operativo) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        //   $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    function actividad_comercial($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->select('*');
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->from('operativo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $db_prueba->get();
        return $productos->result();
    }

    public function reporte_especifico($pregunta, $distrito) {
        $db_prueba = $this->db;
        $db_prueba->where('pregunta', $pregunta);
        $db_prueba->where('distrito', $distrito);
        $db_prueba->from('reporte_especifico_intendencia');
        $productos = $db_prueba->get();
        return $productos->result();
    }

    public function reporte_zonas($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        //     $db_prueba->limit(1);
        $db_prueba->group_by('id_zona');
        $db_prueba->join('zona', 'zona.idz = operativo.id_zona');
        //    $db_prueba->join('intervencion', 'intervencion.id = operativo.id_intervencion');
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->from('operativo');
        $productos = $db_prueba->get();
        return $productos->result();
    }

    public function tipo_operativo_mes($tipo_operativo, $distrito, $mes) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }
      public function tipo_operativo_mes_general($tipo_operativo,$distrito, $mes) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_tipo_operativo', $tipo_operativo);
      //  $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function tipo_operativo_mes_total($distrito, $mes) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        //    $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }
    public function tipo_operativo_mes_general_total($distrito, $mes) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        //    $db_prueba->where('id_tipo_operativo', $tipo_operativo);
       // $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function tipo_operativo_total($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        //    $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        $db_prueba->where('id_distrito_operativo', $distrito);
        ///   $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function tipo_operativo_total_clausuras($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        //    $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where('clausurado', 1);
        ///   $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function tipo_operativo_clausuras_total($distrito, $mes) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        //    $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where('clausurado', 1);
          $db_prueba->where('mes', $mes);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function tipo_operativo_clausuras($tipo_operativo, $distrito, $mes) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_tipo_operativo', $tipo_operativo);
        $db_prueba->where('id_distrito_operativo', $distrito);
        $db_prueba->where('mes', $mes);
        $db_prueba->where('clausurado', 1);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function situacion_legal($zona, $distrito, $legal) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        $db_prueba->where('id_zona', $zona);
        $db_prueba->where('id_distrito_operativo', $distrito);

        $db_prueba->where('id_intervencion', $legal);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function situacion_legal_total($distrito, $legal) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        ///   $db_prueba->where('id_zona', $zona);
        $db_prueba->where('id_distrito_operativo', $distrito);

        $db_prueba->where('id_intervencion', $legal);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    public function situacion_legal_total_general($distrito) {
        $db_prueba = $this->load->database('intendencia', TRUE);
        ///   $db_prueba->where('id_zona', $zona);
        $db_prueba->where('id_distrito_operativo', $distrito);

        //     $db_prueba->where('id_intervencion', $legal);
        $db_prueba->from('operativo');
        return $db_prueba->count_all_results();
    }

    function horas($hora_inicio, $hora_fin) {
        $this->db->from('felcv')->where('hora_denuncia BETWEEN "' . date($hora_inicio) . '" and "' . date(($hora_fin)) . '"');
        return $this->db->count_all_results();
    }

    function dias($dia) {
        $this->db->from('felcv');
        $this->db->where('dia', $dia);
        return $this->db->count_all_results();
    }

    function nivel_instruccion_victima($a, $b) {
        $this->db->from('felcv');
        $this->db->where('nivel_instruccion', $a);
        $this->db->or_where('nivel_instruccion', $b);
        return $this->db->count_all_results();
    }

    function nivel_instruccion_victima_genero($a, $b, $c) {
        $this->db->from('felcv');
        $this->db->where('genero', $c);
        $this->db->where('nivel_instruccion', $a);
        $this->db->or_where('nivel_instruccion', $b);
        $this->db->where('genero', $c);

        return $this->db->count_all_results();
    }

    function edad_victima($a, $b) {
        $this->db->from('felcv');
        $this->db->where('edad >=', $a);
        $this->db->where('edad <=', $b);
        return $this->db->count_all_results();
    }

    function edad_victima_genero($a, $b, $genero) {
        $this->db->from('felcv');
        $this->db->where('edad >=', $a);
        $this->db->where('edad <=', $b);
        $this->db->where('genero', $genero);
        return $this->db->count_all_results();
    }

    function temperancia_victima($temperancia_victima) {
        $this->db->from('felcv');
        $this->db->where('temperancia_victima', $temperancia_victima);
        return $this->db->count_all_results();
    }

    function temperancia_victima_genero($temperancia_victima, $genero) {
        $this->db->from('felcv');
        $this->db->where('temperancia_victima', $temperancia_victima);
        $this->db->where('genero', $genero);
        return $this->db->count_all_results();
    }

    function total_registros_genero($genero) {
        $this->db->from('felcv');
        $this->db->where('genero', $genero);
        // $this->db->where('gas', 'Si');
        return $this->db->count_all_results();
    }

    function ubicacion($ubicacion) {
        $this->db->from('felcv');
        //   $this->db->where('lugar_hecho', $ubicacion);
        return $this->db->count_all_results();
    }

    function situacion_agresor_dato($ubicacion) {
        $this->db->from('felcv');
        $this->db->where('situacion_agresor', $ubicacion);
        return $this->db->count_all_results();
    }

    function situacion_agresor_dato_genero($ubicacion, $genero) {
        $this->db->from('felcv');
        $this->db->where('situacion_agresor', $ubicacion);
        $this->db->where('genero', $genero);
        return $this->db->count_all_results();
    }

    function mes_general($mes) {
        $this->db->from('felcv');
        $this->db->where('mes_registro', $mes);
        return $this->db->count_all_results();
    }

    function division($division) {
        $this->db->from('felcv');
        $this->db->where('division', $division);
        return $this->db->count_all_results();
    }

    public function get() {
        $fields = $this->db->field_data('defensoria');
        $query = $this->db->select('*')->get('defensoria');
        return array("fields" => $fields, "query" => $query);
    }

    public function ver_informe($id) {
        $this->db->select('*');
        //   $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("id", $id);
        //  $this->db->join('gestion', 'gestion.id = faltas_contravenciones.gestion');


        $this->db->from('defensoria');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function defensoria($id) {
        $this->db->where("defensoria.id", $id);
        $this->db->join('tipologia_primaria', 'tipologia_primaria.id = defensoria.tipologia_principal');
        $this->db->join('tipologia_secundaria', 'tipologia_secundaria.id = defensoria.tipologia_secundaria');
        $this->db->join('zona', 'zona.id = defensoria.zona');
        $this->db->from('defensoria');

        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function getProvincias() {
        //  $this->db->select("id,nombre_distrito");
        $this->db->from('distrito');

        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function tipologia_principal() {
        //  $this->db->select("id,nombre_distrito");
        $this->db->from('tipologia_primaria');

        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function guardar_defensoria($guardar_defensoria) {
        $this->db->insert('defensoria', $guardar_defensoria);
    }

    function tipologia_principal_secundaria($a, $b) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function procedencia($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('procedencia', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function sexo1($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('sexo1', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function sexo2($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('sexo2', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function sexo3($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('sexo3', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function sexo4($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('sexo4', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function edad1($a, $b, $c, $d) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('edada1 >', $c);
        $this->db->where('edada1 <=', $d);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function edad2($a, $b, $c, $d) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('edada2 >', $c);
        $this->db->where('edada2 <=', $d);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function edad3($a, $b, $c, $d) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('edada3 >', $c);
        $this->db->where('edada3 <=', $d);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function edad4($a, $b, $c, $d) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('edada4 >', $c);
        $this->db->where('edada4 <=', $d);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function grado_instruccion_1($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('grado_instruccion_1', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function grado_instruccion_2($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('grado_instruccion_2', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function grado_instruccion_3($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('grado_instruccion_3', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function grado_instruccion_4($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('grado_instruccion_4', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function tipo_trabajo_1($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('tipo_trabajo_1', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function tipo_trabajo_2($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('tipo_trabajo_2', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function tipo_trabajo_3($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('tipo_trabajo_3', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function tipo_trabajo_4($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('tipo_trabajo_4', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function denunciante_ocupacion($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('denunciado_ocupacion', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function parentesco_1($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('denunciado_parentesco', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function denunciado_grado_instruccion($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('denunciado_grado_instruccion', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function denunciado_sexo($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('denunciado_sexo', $c);
        $this->db->from('defensoria');
        return $this->db->count_all_results();
    }

    function areas($a, $b, $c) {
        $this->db->where('tipologia_principal', $a);
        $this->db->where('tipologia_secundaria', $b);
        $this->db->where('areas', $c);
        $this->db->from('seguimiento');
        return $this->db->count_all_results();
    }

    function cobertura($c1, $c2) {
        $this->db->from('cim');
        $this->db->where('numero_ninos >=', $c1);
        $this->db->where('numero_ninos <=', $c2);
        return $this->db->count_all_results();
    }

    function familias($c1, $c2) {
        $this->db->from('cim');
        $this->db->where('familias_beneficiadas >=', $c1);
        $this->db->where('familias_beneficiadas <=', $c2);
        return $this->db->count_all_results();
    }

    function sin_familias() {
        $this->db->from('cim');
        $this->db->where('familias_beneficiadas', '');

        return $this->db->count_all_results();
    }

    function becados($c1, $c2) {
        $this->db->from('cim');
        $this->db->where('ninos_becados >=', $c1);
        $this->db->where('ninos_becados <=', $c2);
        return $this->db->count_all_results();
    }

    function sin_becas() {
        $this->db->from('cim');
//        $this->db->where('ninos_becados', '');
        $this->db->where('ninos_becados', 0);

        return $this->db->count_all_results();
    }

    function administracion($administracion) {
        $this->db->from('cim');
        $this->db->where('administracion', $administracion);
        return $this->db->count_all_results();
    }

    function infraestructura_pertenece($infraestructura_pertenece) {
        $this->db->from('cim');
        $this->db->where('infraestructura_pertenece', $infraestructura_pertenece);
        return $this->db->count_all_results();
    }

    function cocina() {
        $this->db->from('cim');
        $this->db->where('cocina', 1);
        return $this->db->count_all_results();
    }

    function cocina_() {
        $this->db->from('cim');
        $this->db->where('cocina', 0);
        return $this->db->count_all_results();
    }

    function bano() {
        $this->db->from('cim');
        $this->db->where('bano', 1);
        return $this->db->count_all_results();
    }

    function bano_() {
        $this->db->from('cim');
        $this->db->where('bano', 0);
        return $this->db->count_all_results();
    }

    function patio() {
        $this->db->from('cim');
        $this->db->where('patio', 1);
        return $this->db->count_all_results();
    }

    function patio_() {
        $this->db->from('cim');
        $this->db->where('patio', 0);
        return $this->db->count_all_results();
    }

    function muro_perimetral() {
        $this->db->from('cim');
        $this->db->where('muro_perimetral', 'Si');
        return $this->db->count_all_results();
    }

    function muro_perimetral_() {
        $this->db->from('cim');
        $this->db->where('muro_perimetral', 'No');
        return $this->db->count_all_results();
    }

    function almacen() {
        $this->db->from('cim');
        $this->db->where('almacen', 1);
        return $this->db->count_all_results();
    }

    function almacen_() {
        $this->db->from('cim');
        $this->db->where('almacen', 0);
        return $this->db->count_all_results();
    }

    function comedor() {
        $this->db->from('cim');
        $this->db->where('comedor', 1);
        return $this->db->count_all_results();
    }

    function comedor_() {
        $this->db->from('cim');
        $this->db->where('comedor', 0);
        return $this->db->count_all_results();
    }

    function otro_ambiente() {
        $this->db->from('cim');
        $this->db->where('otro_ambiente !=', '');
        return $this->db->count_all_results();
    }

    function otro_ambiente_() {
        $this->db->from('cim');
        $this->db->where('otro_ambiente =', '');
        return $this->db->count_all_results();
    }

    function sala_psicomotricidad() {
        $this->db->from('cim');
        $this->db->where('sala_psicomotricidad', 1);
        return $this->db->count_all_results();
    }

    function sala_psicomotricidad_() {
        $this->db->from('cim');
        $this->db->where('sala_psicomotricidad', 0);
        return $this->db->count_all_results();
    }

    function agua() {
        $this->db->from('cim');
        $this->db->where('agua', 'Si');
        return $this->db->count_all_results();
    }

    function agua_no() {
        $this->db->from('cim');
        $this->db->where('agua', 'No');
        return $this->db->count_all_results();
    }

    function electricidad() {
        $this->db->from('cim');
        $this->db->where('electricidad', 'Si');
        return $this->db->count_all_results();
    }

    function electricidad_no() {
        $this->db->from('cim');
        $this->db->where('electricidad', 'No');
        return $this->db->count_all_results();
    }

    function alcantarillado() {
        $this->db->from('cim');
        $this->db->where('alcantarillado', 'Si');
        return $this->db->count_all_results();
    }

    function alcantarillado_no() {
        $this->db->from('cim');
        $this->db->where('alcantarillado', 'No');
        return $this->db->count_all_results();
    }

    function gas() {
        $this->db->from('cim');
        $this->db->where('gas', 'Si');
        return $this->db->count_all_results();
    }

    function gas_no() {
        $this->db->from('cim');
        $this->db->where('gas', 'No');
        return $this->db->count_all_results();
    }

    function get_markers_general_cim() {
        $markers = $this->db->get('felcv');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    function update_faltas_contravenciones($guardar_faltas_contravenciones, $id_faltas) {
        $this->db->where('id_faltas', $id_faltas);
        //  $this->db->set('estado_aprobacion', 1);
        return $this->db->update('faltas_contravenciones', $guardar_faltas_contravenciones);
    }

    function eliminar_faltas_contravenciones($id) {
        $this->db->where('id_faltas', $id);
        return $this->db->delete('faltas_contravenciones');
    }

    function aprobar_faltas_contravenciones($id) {
        $this->db->where('id_faltas', $id);
        $this->db->set('estado_aprobacion', 1);
        return $this->db->update('faltas_contravenciones');
    }

    public function infraestrutura_pertenece() {
        //  $this->db->select("id,nombre_distrito");
        $this->db->from('infraestrutura_pertenece');

        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function gestion() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('gestion');

        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function mes() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('mes');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function departamento() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('departamento');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function provincia() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('provincia');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function municipio() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('municipio');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function localidad() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('localidad');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function epis() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('epis');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function denuncia() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('denuncia');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function nacionalidad() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('nacionalidad');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function nacionalidad_infractor() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('nacionalidad_infractor');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function genero() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('genero');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function genero_infractor() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('genero_infractor');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function ciudad_victima() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('ciudad_victima');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function ciudad_infractor() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('ciudad_infractor');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function temperancia() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('temperancia');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function temperancia_infractor() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('temperancia_infractor');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function categoria_licencia() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('categoria_licencia');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function tipo_vehiculo() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('tipo_vehiculo');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function diferentes_auxilios() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('diferentes_auxilios');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function servicio() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('servicio');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    ////


    public function arrestado() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('arrestado');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function sancion() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('sancion');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function estado_caso() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('estado_caso');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function remision_caso() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('remision_caso');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function termino_prueba() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('termino_prueba');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function recurso_apelacion() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('recurso_apelacion');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function servicio_destacado() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('servicio_destacado');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function estado_civil_denunciado() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('estado_civil_denunciado');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function estado_civil() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('estado_civil');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function ocupacion_victima() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('ocupacion');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function ocupacion_denunciado() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('ocupacion_denunciado');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    ///

    public function faltas_contravenciones() {
        $this->db->select('*');
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("estado_aprobacion", 0);
        // $this->db->where("id_faltas", $id_faltas);

        $this->db->join('mes', 'mes.id = faltas_contravenciones.mes');

        $this->db->join('epis', 'epis.id = faltas_contravenciones.epis');

        $this->db->join('denuncia', 'denuncia.id = faltas_contravenciones.denuncia');

        $this->db->from('faltas_contravenciones');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function faltas_contravenciones_edit($id_faltas) {
        $this->db->select('*');
        //   $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("id_faltas", $id_faltas);
        $this->db->join('gestion', 'gestion.id = faltas_contravenciones.gestion');
        $this->db->join('mes', 'mes.id = faltas_contravenciones.mes');
        $this->db->join('departamento', 'departamento.id = faltas_contravenciones.departamento');
        $this->db->join('provincia', 'provincia.id = faltas_contravenciones.provincia');
        $this->db->join('municipio', 'municipio.id = faltas_contravenciones.municipio');
        $this->db->join('localidad', 'localidad.id = faltas_contravenciones.localidad');
        $this->db->join('epis', 'epis.id = faltas_contravenciones.epis');
        $this->db->join('distrito', 'distrito.id = faltas_contravenciones.distrito');
        $this->db->join('zona', 'zona.id = faltas_contravenciones.zona');
        $this->db->join('denuncia', 'denuncia.id = faltas_contravenciones.denuncia');
        $this->db->join('ciudad_victima', 'ciudad_victima.id = faltas_contravenciones.ciudad_victima');
        $this->db->join('ciudad_infractor', 'ciudad_infractor.id = faltas_contravenciones.ciudad_infractor');
        $this->db->join('nacionalidad', 'nacionalidad.id = faltas_contravenciones.nacionalidad_victima');
        $this->db->join('nacionalidad_infractor', 'nacionalidad_infractor.id = faltas_contravenciones.nacionalidad_infractor');
        $this->db->join('genero', 'genero.id = faltas_contravenciones.sexo_victima');
        $this->db->join('genero_infractor', 'genero_infractor.id = faltas_contravenciones.sexo_infractor');
        $this->db->join('temperancia', 'temperancia.id = faltas_contravenciones.temperancia_victima');
        $this->db->join('temperancia_infractor', 'temperancia_infractor.id = faltas_contravenciones.temperancia_infractor');
        $this->db->join('categoria_licencia', 'categoria_licencia.id = faltas_contravenciones.categoria_licencia');
        $this->db->join('tipo_vehiculo', 'tipo_vehiculo.id = faltas_contravenciones.tipo_vehiculo');
        $this->db->join('servicio', 'servicio.id = faltas_contravenciones.servicio');
        $this->db->join('arrestado', 'arrestado.id = faltas_contravenciones.arrestado_infractor');
        $this->db->join('sancion', 'sancion.id = faltas_contravenciones.sancion');
        $this->db->join('estado_caso', 'estado_caso.id = faltas_contravenciones.estado_caso');
        $this->db->join('remision_caso', 'remision_caso.id = faltas_contravenciones.remision_caso');
        $this->db->join('termino_prueba', 'termino_prueba.id = faltas_contravenciones.termino_prueba');
        $this->db->join('recurso_apelacion', 'recurso_apelacion.id = faltas_contravenciones.recurso_apelacion');
        $this->db->join('servicio_destacado', 'servicio_destacado.id = faltas_contravenciones.servicio_destacado');

        $this->db->from('faltas_contravenciones');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function guardar_faltas_contravenciones($guardar_faltas_contravenciones) {
        $this->db->insert('faltas_contravenciones', $guardar_faltas_contravenciones);
    }

    public function get_markers_general($leyenda) {

        // $this->db->join('division', 'division.id = felcc_delitos.id_division');
        if ($leyenda == 0) {

        } else {
            //        $this->db->where('id_division ', $leyenda);
        }
        $markers = $this->db->get('faltas_contravenciones');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    function tip_general_1() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('01:00:00') . '" and "' . date(('03:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_2() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('03:01:00') . '" and "' . date(('05:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_3() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('05:01:00') . '" and "' . date(('07:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_4() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('07:01:00') . '" and "' . date(('09:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_5() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('09:01:00') . '" and "' . date(('11:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_6() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('11:01:00') . '" and "' . date(('13:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_7() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('13:01:00') . '" and "' . date(('15:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_8() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('15:01:00') . '" and "' . date(('17:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_9() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('17:01:00') . '" and "' . date(('19:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_10() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('19:01:00') . '" and "' . date(('21:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_11() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('21:01:00') . '" and "' . date(('23:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tip_general_12() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('hora_hecho BETWEEN "' . date('23:01:00') . '" and "' . date(('24:00:00')) . '"');
        return $this->db->count_all_results();
    }

    function tipme1() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '1');
        return $this->db->count_all_results();
    }

    function tipme2() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '2');
        return $this->db->count_all_results();
    }

    function tipme3() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '3');
        return $this->db->count_all_results();
    }

    function tipme4() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '4');
        return $this->db->count_all_results();
    }

    function tipme5() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '5');
        return $this->db->count_all_results();
    }

    function tipme6() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '6');
        return $this->db->count_all_results();
    }

    function tipme7() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '7');
        return $this->db->count_all_results();
    }

    function tipme8() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '8');
        return $this->db->count_all_results();
    }

    function tipme9() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '9');
        return $this->db->count_all_results();
    }

    function tipme10() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '10');
        return $this->db->count_all_results();
    }

    function tipme11() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '11');
        return $this->db->count_all_results();
    }

    function tipme12() {
        $this->db->from('faltas_contravenciones');
        $this->db->where('mes ', '12');
        return $this->db->count_all_results();
    }

//// FELCCCCCCC



    public function delito() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('delito');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function get_faltas_contravenciones() {
        $fields = $this->db->field_data('faltas_contravenciones');
        $query = $this->db->select('id_faltas, numero_formulario, cod_num, gestion.nombre_gestion, fecha_hecho, hora_hecho, mes.nombre_mes, departamento.nombre_departamento,'
                        . 'provincia.nombre_provincia, municipio.nombre_municipio, localidad.nombre_localidad,epis.nombre_epis, distrito.nombre_distrito, zona.nombre, lugar_hecho,pos_x,pos_y, denuncia.nombre_denuncia, nombre_victima,'
                        . 'ci_victima, ciudad_victima.nombre_ciudad_victima, nacionalidad.nombre_nacionalidad, edad_victima, genero.nombre_genero, telefono_victima,'
                        . 'temperancia.nombre_temperancia, descripcion_falta, nombre_infractor, ci_infractor, categoria_licencia.nombre_categoria_licencia, ciudad_infractor.nombre_ciudad_infractor,'
                        . 'nacionalidad_infractor.nombre_nacionalidad_infractor, edad_infractor, genero_infractor.nombre_genero_infractor, telefono_infractor, tipo_vehiculo.nombre_tipo_vehiculo, placa, servicio.nombre_servicio, '
                        . 'temperancia_infractor.nombre_temperancia_infractor, arrestado.nombre_arrestado, sancion.nombre_sancion, estado_caso.nombre_estado_caso, remision_caso.nombre_remision_caso, termino_prueba.nombre_termino_prueba, '
                        . 'recurso_apelacion.nombre_recurso_apelacion, servicio_destacado.nombre_servicio_destacado, numero_caso, arma_utilizada')
                ->join('mes', 'mes.id = faltas_contravenciones.mes')
                ->join('gestion', 'gestion.id = faltas_contravenciones.gestion')
                ->join('departamento', 'departamento.id = faltas_contravenciones.departamento')
                ->join('provincia', 'provincia.id = faltas_contravenciones.provincia')
                ->join('municipio', 'municipio.id = faltas_contravenciones.municipio')
                ->join('localidad', 'localidad.id = faltas_contravenciones.localidad')
                ->join('epis', 'epis.id = faltas_contravenciones.epis')
                ->join('distrito', 'distrito.id = faltas_contravenciones.distrito')
                ->join('zona', 'zona.id = faltas_contravenciones.zona')
                ->join('denuncia', 'denuncia.id = faltas_contravenciones.denuncia')
                ->join('ciudad_victima', 'ciudad_victima.id = faltas_contravenciones.ciudad_victima')
                ->join('ciudad_infractor', 'ciudad_infractor.id = faltas_contravenciones.ciudad_infractor')
                ->join('nacionalidad_infractor', 'nacionalidad_infractor.id = faltas_contravenciones.nacionalidad_infractor')
                ->join('nacionalidad', 'nacionalidad.id = faltas_contravenciones.nacionalidad_victima')
                ->join('genero', 'genero.id = faltas_contravenciones.sexo_victima')
                ->join('genero_infractor', 'genero_infractor.id = faltas_contravenciones.sexo_infractor')
                ->join('temperancia', 'temperancia.id = faltas_contravenciones.temperancia_victima')
                ->join('temperancia_infractor', 'temperancia_infractor.id = faltas_contravenciones.temperancia_infractor')
                ->join('categoria_licencia', 'categoria_licencia.id = faltas_contravenciones.categoria_licencia')
                ->join('tipo_vehiculo', 'tipo_vehiculo.id = faltas_contravenciones.tipo_vehiculo')
                ->join('servicio', 'servicio.id = faltas_contravenciones.servicio')
                ->join('arrestado', 'arrestado.id = faltas_contravenciones.arrestado_infractor')
                ->join('sancion', 'sancion.id = faltas_contravenciones.sancion')
                ->join('estado_caso', 'estado_caso.id = faltas_contravenciones.estado_caso')
                ->join('remision_caso', 'remision_caso.id = faltas_contravenciones.remision_caso')
                ->join('termino_prueba', 'termino_prueba.id = faltas_contravenciones.termino_prueba')
                ->join('recurso_apelacion', 'recurso_apelacion.id = faltas_contravenciones.recurso_apelacion')
                ->join('servicio_destacado', 'servicio_destacado.id = faltas_contravenciones.servicio_destacado')
                ->get('faltas_contravenciones');

        return array("fields" => $fields, "query" => $query);
    }

    public function guardar_cim($guardar_cim) {
        $this->db->insert('cim', $guardar_cim);
    }

    public function felcc() {
        $this->db->select('*');
        $this->db->where("usuario", $this->session->userdata('id_usuario'));
        $this->db->where("estado_aprobacion", 0);
        // $this->db->where("id_faltas", $id_faltas);

        $this->db->join('mes', 'mes.id = felcc.mes');

        $this->db->join('epis', 'epis.id = felcc.epis');

        $this->db->join('delito', 'delito.id = felcc.delitos_hecho');

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

    public function felcc_edit($id_felcc) {
        $this->db->select('*');
        //   $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("id_felcc", $id_felcc);
        $this->db->join('gestion', 'gestion.id = felcc.gestion');
        $this->db->join('mes', 'mes.id = felcc.mes');
        $this->db->join('departamento', 'departamento.id = felcc.departamento');
        $this->db->join('provincia', 'provincia.id = felcc.provincia');
        $this->db->join('municipio', 'municipio.id = felcc.municipio');
        $this->db->join('epis', 'epis.id = felcc.epis');
        $this->db->join('division', 'division.id = felcc.division');
        $this->db->join('delito', 'delito.id = felcc.delitos_hecho');
        $this->db->join('genero', 'genero.id = felcc.sexo_victima');
        $this->db->join('genero_infractor', 'genero_infractor.id = felcc.sexo_denunciado');

        $this->db->join('estado_civil', 'estado_civil.id = felcc.estado_civil_victima');
        $this->db->join('estado_civil_denunciado', 'estado_civil_denunciado.id = felcc.estado_civil_denunciado');
        $this->db->join('ocupacion', 'ocupacion.id = felcc.ocupacion_victima');
        $this->db->join('ocupacion_denunciado', 'ocupacion_denunciado.id = felcc.ocupacion_denunciado');
        $this->db->join('temperancia', 'temperancia.id = felcc.temperancia_victima');
        $this->db->join('temperancia_infractor', 'temperancia_infractor.id = felcc.temperancia_denunciado');
        $this->db->join('estado_caso', 'estado_caso.id = felcc.estado_caso');
        $this->db->join('nacionalidad', 'nacionalidad.id = felcc.nacionalidad_victima');
        $this->db->join('nacionalidad_infractor', 'nacionalidad_infractor.id = felcc.nacionalidad_denunciado');
        $this->db->join('distrito', 'distrito.id = felcc.distrito');
        /*  $this->db->join('gestion', 'gestion.id = felcc.gestion');
          $this->db->join('mes', 'mes.id = felcc.mes');
          $this->db->join('departamento', 'departamento.id = felcc.departamento');
          $this->db->join('provincia', 'provincia.id = felcc.provincia');
          $this->db->join('municipio', 'municipio.id = felcc.municipio');
          //  $this->db->join('localidad', 'localidad.id = felcc.localidad');
          $this->db->join('epis', 'epis.id = felcc.epis');
          //    $this->db->join('distrito', 'distrito.id = felcc.distrito');
          //  $this->db->join('zona', 'zona.id = felcc.zona');
          $this->db->join('division', 'division.id = felcc.division');
          $this->db->join('delito', 'delito.id = felcc.delitos_hecho');
          $this->db->join('estado_civil', 'estado_civil.id = felcc.estado_civil_victima');
          $this->db->join('estado_civil_denunciado', 'estado_civil_denunciado.id = felcc.estado_civil_denunciado');
          $this->db->join('ocupacion', 'ocupacion.id = felcc.ocupacion_victima');
          $this->db->join('ocupacion_denunciado', 'ocupacion_denunciado.id = felcc.ocupacion_denunciado');

          $this->db->join('nacionalidad', 'nacionalidad.id = felcc.nacionalidad_victima');
          $this->db->join('nacionalidad_infractor', 'nacionalidad_infractor.id = felcc.nacionalidad_denunciado');
          $this->db->join('genero', 'genero.id = felcc.sexo_victima');
          $this->db->join('genero_infractor', 'genero_infractor.id = felcc.sexo_denunciado');
          $this->db->join('temperancia', 'temperancia.id = felcc.temperancia_victima');
          $this->db->join('temperancia_infractor', 'temperancia_infractor.id = felcc.temperancia_denunciado');

          //  $this->db->join('arrestado', 'arrestado.id = felcc.arrestado');

          $this->db->join('estado_caso', 'estado_caso.id = felcc.estado_caso');
         */
        $this->db->from('felcc');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function update_felcc($guardar_felcc, $id_felcc) {
        $this->db->where('id_felcc', $id_felcc);
        //  $this->db->set('estado_aprobacion', 1);
        return $this->db->update('felcc', $guardar_felcc);
    }

    public function unidades_epis_modulos() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('unidades_epis_modulos');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function casos_atencion() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('casos_atencion');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function nivel_instruccion() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('nivel_instruccion');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function motivo_violencia() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('motivo_violencia');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function lugar_hecho() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('lugar_hecho');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function nivel_instruccion_agresor() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('nivel_instruccion_agresor');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function medios_comunicacion() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('medios_comunicacion');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function situacion_agresor() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('situacion_agresor');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function servicio_felcv() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('servicio_felcv');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function derivado() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('derivado');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function area() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('area');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function tipo_denuncia() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('tipo_denuncia');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function naturaleza_hecho() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('naturaleza_hecho');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function autopartes_robados() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('autopartes_robados');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function accesorios_robados() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('accesorios_robados');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function documentos_robados() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('documentos_robados');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function guardar_felcv($guardar_felcv) {
        $this->db->insert('felcv', $guardar_felcv);
    }

    public function felcv() {
        $this->db->select('*');
        $this->db->where("usuario", $this->session->userdata('id_usuario'));
        $this->db->where("estado_aprobacion", 0);
        // $this->db->where("id_faltas", $id_faltas);

        $this->db->join('mes', 'mes.id = felcv.mes_registro');

        $this->db->join('unidades_epis_modulos', 'unidades_epis_modulos.id = felcv.unidades_epis_modulos');

        $this->db->join('division', 'division.id = felcv.division');

        $this->db->from('felcv');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function eliminar_felcv($id) {
        $this->db->where('id_felcv', $id);
        return $this->db->delete('felcv');
    }

    function aprobar_felcv($id) {
        $this->db->where('id_felcv', $id);
        $this->db->set('estado_aprobacion', 1);
        return $this->db->update('felcv');
    }

    public function felcv_edit($id_felcv) {
        $this->db->select('*');
        //   $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("id_felcv", $id_felcv);
        //  $this->db->join('gestion', 'gestion.id = felcc.gestion');
        $this->db->join('mes', 'mes.id = felcv.mes_registro');
        $this->db->join('departamento', 'departamento.id = felcv.departamento');
        $this->db->join('provincia', 'provincia.id = felcv.provincia');
        $this->db->join('municipio', 'municipio.id = felcv.municipio');
        //
        $this->db->join('unidades_epis_modulos', 'unidades_epis_modulos.id = felcv.unidades_epis_modulos');
        $this->db->join('distrito', 'distrito.id = felcv.distrito');
        $this->db->join('zona', 'zona.id = felcv.zona');
        $this->db->join('division', 'division.id = felcv.division');
        $this->db->join('delito', 'delito.id = felcv.delitos');

        $this->db->join('temperancia', 'temperancia.id = felcv.temperancia_victima');
        $this->db->join('temperancia_infractor', 'temperancia_infractor.id = felcv.temperancia_agresor');

        $this->db->join('casos_atencion', 'casos_atencion.id = felcv.casos_atencion');
        $this->db->join('genero', 'genero.id = felcv.genero');

        $this->db->join('motivo_violencia', 'motivo_violencia.id = felcv.motivo_violencia');
        $this->db->join('genero_infractor', 'genero_infractor.id = felcv.genero_agresor');
        $this->db->join('nivel_instruccion', 'nivel_instruccion.id = felcv.nivel_instruccion');
        $this->db->join('nivel_instruccion_agresor', 'nivel_instruccion_agresor.id = felcv.nivel_instruccion_agresor');
        $this->db->join('medios_comunicacion', 'medios_comunicacion.id = felcv.medios_comunicacion');
        $this->db->join('situacion_agresor', 'situacion_agresor.id = felcv.situacion_agresor');
        $this->db->join('servicio_felcv', 'servicio_felcv.id = felcv.servicio_felcv');

        $this->db->join('derivado', 'derivado.id = felcv.derivado');
        $this->db->join('lugar_hecho', 'lugar_hecho.id = felcv.lugar_hecho');


        $this->db->from('felcv');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function update_felcv($guardar_felcv, $id_felcv) {
        $this->db->where('id_felcvs', $id_felcv);
        //  $this->db->set('estado_aprobacion', 1);
        return $this->db->update('felcv', $guardar_felcv);
    }

    public function get_felcc() {
        $fields = $this->db->field_data('felcc');
        $query = $this->db->select('id_felcc, numero_formulario, cod_num, gestion.nombre_gestion, fecha_hecho, hora_hecho, mes.nombre_mes, departamento.nombre_departamento,'
                        . 'provincia.nombre_provincia, municipio.nombre_municipio, localidad.nombre_localidad, epis.nombre_epis, division.nombre_division,'
                        . 'n_registro, delito.nombre_delito  , nombre_victima, edad_victima, genero.nombre_genero,'
                        . 'ci_victima,   estado_civil.nombre_estado_civil, ocupacion.nombre_ocupacion, domicilio_victima,'
                        . 'temperancia.nombre_temperancia, nacionalidad.nombre_nacionalidad, nombre_denunciado, nombre_complices, edad_denunciado, '
                        . 'genero_infractor.nombre_genero_infractor, ci_denunciado, estado_civil_denunciado.nombre_estado_civil_denunciado, ocupacion_denunciado.nombre_ocupacion_denunciado, domicilio_denunciado, '
                        . 'temperancia_infractor.nombre_temperancia_infractor, nacionalidad_infractor.nombre_nacionalidad_infractor,  alias, arrestado, ,distrito.nombre_distrito, zona.nombre,'
                        . 'lugar_hecho, lugar_especifico, causas_hecho, objetos_robados, medios_utilizados, instrumento_utilizado, caso_n, asignado, estado_caso.nombre_estado_caso, detalle_caso')
                ->join('mes', 'mes.id = felcc.mes')
                ->join('gestion', 'gestion.id = felcc.gestion')
                ->join('departamento', 'departamento.id = felcc.departamento')
                ->join('provincia', 'provincia.id = felcc.provincia')
                ->join('municipio', 'municipio.id = felcc.municipio')
                ->join('localidad', 'localidad.id = felcc.localidad')
                ->join('epis', 'epis.id = felcc.epis')
                ->join('division', 'division.id = felcc.division')
                ->join('delito', 'delito.id = felcc.delitos_hecho')
                ->join('genero', 'genero.id = felcc.sexo_victima')
                ->join('estado_civil', 'estado_civil.id = felcc.estado_civil_victima')
                ->join('ocupacion', 'ocupacion.id = felcc.ocupacion_victima')
                ->join('temperancia', 'temperancia.id = felcc.temperancia_victima')
                ->join('nacionalidad', 'nacionalidad.id = felcc.nacionalidad_victima')
                ->join('genero_infractor', 'genero_infractor.id = felcc.sexo_denunciado')
                ->join('estado_civil_denunciado', 'estado_civil_denunciado.id = felcc.estado_civil_denunciado')
                ->join('ocupacion_denunciado', 'ocupacion_denunciado.id = felcc.ocupacion_denunciado')
                ->join('temperancia_infractor', 'temperancia_infractor.id = felcc.temperancia_denunciado')
                ->join('nacionalidad_infractor', 'nacionalidad_infractor.id = felcc.nacionalidad_denunciado')
                ->join('distrito', 'distrito.id = felcc.distrito')
                ->join('zona', 'zona.id = felcc.zona')
                ->join('estado_caso', 'estado_caso.id = felcc.estado_caso')
                // ->join('denuncia', 'denuncia.id = felcc.denuncia')
                ->get('felcc');

        return array("fields" => $fields, "query" => $query);
    }

    public function get_felcv() {
        $fields = $this->db->field_data('felcv');
        $query = $this->db->select('id_felcv, numero, cod_numero, departamento.nombre_departamento, provincia.nombre_provincia, municipio.nombre_municipio, unidades_epis_modulos.nombre_unidades_epis_modulos,'
                        . 'fecha_denuncia, hora_denuncia, mes.nombre_mes, fecha_hecho, hora_hecho, n_caso, descargo_policia, division.nombre_division,'
                        . 'casos_atencion, delito.nombre_delito  , nombre_denunciante, nombre_victima,ci_victima,  lugar_nacimiento, genero.nombre_genero, edad,'
                        . 'temperancia.nombre_temperancia, nivel_instruccion.nombre_nivel_instruccion, motivo_violencia.nombre_motivo_violencia, lugar_hecho.nombre_lugar_hecho,'
                        . 'distrito.nombre_distrito, zona.nombre, avenida, nombre_agresor, ci_agresor, lugar_nacimiento_agresor, arma, edad_agresor, genero_infractor.nombre_genero_infractor,'
                        . 'temperancia_infractor.nombre_temperancia_infractor, nivel_instruccion_agresor.nombre_nivel_instruccion_agresor,  medios_comunicacion.nombre_medios_comunicacion,'
                        . 'situacion_agresor.nombre_situacion_agresor, servicio_felcv.nombre_servicio_felcv, certificado_medico, derivado.nombre_derivado, tiempo_seguimiento_caso')
                ->join('mes', 'mes.id = felcv.mes_registro')
                ->join('departamento', 'departamento.id = felcv.departamento')
                ->join('provincia', 'provincia.id = felcv.provincia')
                ->join('municipio', 'municipio.id = felcv.municipio')
                ->join('unidades_epis_modulos', 'unidades_epis_modulos.id = felcv.unidades_epis_modulos')
                ->join('nivel_instruccion', 'nivel_instruccion.id = felcv.nivel_instruccion')
                ->join('motivo_violencia', 'motivo_violencia.id = felcv.motivo_violencia')
                ->join('lugar_hecho', 'lugar_hecho.id = felcv.lugar_hecho')
                ->join('nivel_instruccion_agresor', 'nivel_instruccion_agresor.id = felcv.nivel_instruccion_agresor')
                ->join('medios_comunicacion', 'medios_comunicacion.id = felcv.medios_comunicacion')
                ->join('situacion_agresor', 'situacion_agresor.id = felcv.situacion_agresor')
                ->join('servicio_felcv', 'servicio_felcv.id = felcv.servicio_felcv')
                ->join('derivado', 'derivado.id = felcv.derivado')
                ->join('division', 'division.id = felcv.division')
                ->join('delito', 'delito.id = felcv.delitos')
                ->join('genero', 'genero.id = felcv.genero')
                ->join('temperancia', 'temperancia.id = felcv.temperancia_victima')
                ->join('genero_infractor', 'genero_infractor.id = felcv.genero_agresor')
                ->join('temperancia_infractor', 'temperancia_infractor.id = felcv.temperancia_agresor')
                ->join('distrito', 'distrito.id = felcv.distrito')
                ->join('zona', 'zona.id = felcv.zona')
                ->get('felcv');

        return array("fields" => $fields, "query" => $query);
    }

    public function diprove() {
        $this->db->select('*');
        $this->db->where("usuario", $this->session->userdata('id_usuario'));
        $this->db->where("estado_aprobacion", 0);
        // $this->db->where("id_faltas", $id_faltas);

        $this->db->join('mes', 'mes.id = diprove.mes_registro');

        //    $this->db->join('epis', 'epis.id = faltas_contravenciones.epis');
        //   $this->db->join('denuncia', 'denuncia.id = faltas_contravenciones.denuncia');

        $this->db->from('diprove');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function get_urbanizaciones() {
        //   $markers2 = $this->db->get('modulo_policial');
        $markers = $this->db->get('urbanizaciones_centrado');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

}
