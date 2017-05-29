<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function notas() {
        $this->db->from('notas');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function jefaturas() {
        $this->db->from('jefaturas');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function notas_consulta($notas) {
        $this->db->where('id ', $notas);
        $this->db->from('notas');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function jefaturas_consulta($jefaturas) {
        $this->db->from('jefaturas');
        $this->db->where('id ', $jefaturas);
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function cite($notas, $jefaturas) {

        $this->db->from('cite');
        //    $this->db->where('notas ', $notas);
        //    $this->db->where('jefaturas ', $jefaturas);
        $this->db->join('notas', 'notas.id = cite.notas');
        $this->db->join('jefaturas', 'jefaturas.id = cite.jefaturas');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function guardar_notas($guardar_notas) {
        $this->db->insert('cite', $guardar_notas);
    }

    public function get_seguimiento($vst) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        ///    $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_entidad ', $entidad);
        $this->db->where('id_dna', $vst);
        //      $this->db->join('decomiso_detalle', 'decomiso_detalle.id = decomiso.id_decomiso_detalle');
        //      $this->db->join('estado_decomiso', 'estado_decomiso.id = decomiso.id_estado_decomiso');
        //      $this->db->join('zona', 'zona.id = operativo.id_zona');
        //   $this->db->join('calle', 'calle.id = operativo.id_calle');
        //      $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

        $markers = $this->db->get('seguimiento');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function guardar_seguimiento($guardar_seguimiento) {
        $this->db->insert('seguimiento', $guardar_seguimiento);
    }

    public function guardar_seguimiento2($guardar_seguimiento2, $id_dna) {
        $this->db->where('id_dna', $id_dna);
        $this->db->update('seguimiento', $guardar_seguimiento2);
    }

    public function update_seguimiento($guardar_seguimiento2, $id_dna) {
        $this->db->where('id', $id_dna);
        $this->db->update('seguimiento', $guardar_seguimiento2);
    }

    public function defensoria($id) {
        $this->db->where("defensoria.id", $id);
        /*   $this->db->join('tipologia_primaria', 'tipologia_primaria.id = defensoria.tipologia_principal');
          $this->db->join('tipologia_secundaria', 'tipologia_secundaria.id = defensoria.tipologia_secundaria');
          $this->db->join('zona', 'zona.id = defensoria.zona'); */
        $this->db->from('defensoria');

        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function defensoria_edit($id) {
        $this->db->where("seguimiento.id", $id);
        /*   $this->db->join('tipologia_primaria', 'tipologia_primaria.id = defensoria.tipologia_principal');
          $this->db->join('tipologia_secundaria', 'tipologia_secundaria.id = defensoria.tipologia_secundaria');
          $this->db->join('zona', 'zona.id = defensoria.zona'); */
        $this->db->from('seguimiento');

        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function get_markers($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_distrito_operativo ', $distrito);
        $this->db->where('operativo.id_tipo_operativo ', $tipo_operativo);
        $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        $this->db->join('zona', 'zona.id = operativo.id_zona');
        //   $this->db->join('calle', 'calle.id = operativo.id_calle');
        $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

        $markers = $this->db->get('operativo');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_general_fecha($leyenda, $fecha_inicio, $fecha_fin) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        $this->db->where('fecha >=', $fecha_inicio);
        $this->db->where('fecha <=', $fecha_fin);
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        //    $this->db->where('operativo.id_tipo_operativo ', '2');
        $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        $this->db->join('zona', 'zona.id = operativo.id_zona');
        //   $this->db->join('calle', 'calle.id = operativo.id_calle');

        $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');
        /*  if ($leyenda == 0) {

          } else {
          $this->db->where('operativo.id_tipo_operativo ', $leyenda);
          } */
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        /*  $this->db->or_where('operativo.id_tipo_operativo ', 6);

          $this->db->or_where('operativo.id_tipo_operativo ', 16);

          $this->db->or_where('operativo.id_tipo_operativo ', 14);
          $this->db->or_where('operativo.id_tipo_operativo ', 15);
          $this->db->or_where('operativo.id_tipo_operativo ', 4);

          $this->db->or_where('operativo.id_tipo_operativo ', 13);
          $this->db->or_where('operativo.id_tipo_operativo ', 11);
          $this->db->or_where('operativo.id_tipo_operativo ', 5);

          $this->db->or_where('operativo.id_tipo_operativo ', 8);
          $this->db->or_where('operativo.id_tipo_operativo ', 10); */

        $markers = $this->db->get('operativo');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_general($leyenda) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        //    $this->db->where('operativo.id_tipo_operativo ', '2');
        $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        $this->db->join('zona', 'zona.id = operativo.id_zona');
        //   $this->db->join('calle', 'calle.id = operativo.id_calle');

        $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');
        if ($leyenda == 0) {
            
        } else {
            $this->db->where('operativo.id_tipo_operativo ', $leyenda);
        }
        $this->db->where_not_in('operativo.id_tipo_operativo ', 3);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 4);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 9);
        $this->db->where_not_in('operativo.id_tipo_operativo ', 7);
        /*  $this->db->or_where('operativo.id_tipo_operativo ', 6);

          $this->db->or_where('operativo.id_tipo_operativo ', 16);

          $this->db->or_where('operativo.id_tipo_operativo ', 14);
          $this->db->or_where('operativo.id_tipo_operativo ', 15);
          $this->db->or_where('operativo.id_tipo_operativo ', 4);

          $this->db->or_where('operativo.id_tipo_operativo ', 13);
          $this->db->or_where('operativo.id_tipo_operativo ', 11);
          $this->db->or_where('operativo.id_tipo_operativo ', 5);

          $this->db->or_where('operativo.id_tipo_operativo ', 8);
          $this->db->or_where('operativo.id_tipo_operativo ', 10); */

        $markers = $this->db->get('operativo');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_general_monitoreo($leyenda) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        //    $this->db->where('operativo.id_tipo_operativo ', '2');
        //    $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        $this->db->join('camara', 'camara.id = monitoreo.id_camara');
        $this->db->join('zona', 'zona.id = monitoreo.id_zona_monitoreo');
        $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
        if ($leyenda == 0) {
            
        } else {
            $this->db->where('monitoreo.id_camara ', $leyenda);
        }
        $markers = $this->db->get('monitoreo');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_general_monitoreo_tipo() {
        $this->db->group_by('id_tipo_caso');
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        //    $this->db->where('operativo.id_tipo_operativo ', '2');
        //    $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        //    $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
        $this->db->join('zona', 'zona.id = monitoreo.id_zona_monitoreo');
        $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
        //       $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

        $markers = $this->db->get('monitoreo');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_general_monitoreo_camaras() {
        $this->db->group_by('id_camara');
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        //    $this->db->where('operativo.id_tipo_operativo ', '2');
        //    $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        //    $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
        $this->db->join('camara', 'camara.id = monitoreo.id_camara');
        $this->db->join('zona', 'zona.id = monitoreo.id_zona_monitoreo');
        $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
        //       $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

        $markers = $this->db->get('monitoreo');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_general_monitoreo_ubicacion() {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        //  $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_distrito_operativo ', $distrito);
        //    $this->db->where('operativo.id_tipo_operativo ', '2');
        //    $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        //     $this->db->join('zona', 'zona.id = monitoreo.id_zona_monitoreo');
        //    $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
        //       $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');
        /*   if ($leyenda == 0) {

          } else {
          $this->db->where('monitoreo.id_camara ', $leyenda);
          } */
        $markers = $this->db->get('faltas_contravenciones');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers2($tipo_operativo, $entidad) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);
        ///    $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        $this->db->where('id_entidad ', $entidad);
        $this->db->where('operativo.id_tipo_operativo ', $tipo_operativo);
        $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        $this->db->join('zona', 'zona.id = operativo.id_zona');
        //   $this->db->join('calle', 'calle.id = operativo.id_calle');
        $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

        $markers = $this->db->get('operativo');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    function distritos($distrito) {
        $this->db->from('luminarias');
        $this->db->where('distrito', $distrito);
        return $this->db->count_all_results();
    }

    function total_registros() {
        $this->db->from('luminarias');
        
        // $this->db->where('gas', 'Si');
        return $this->db->count_all_results();
    }

    public function get_postes() {
        //   $markers2 = $this->db->get('modulo_policial');
        $this->db->join('estructura_poste', 'estructura_poste.id = postes.estructura_poste');
        $this->db->join('tipo_poste', 'tipo_poste.id = postes.tipo_poste');
        $this->db->join('tipo_luminaria', 'tipo_luminaria.id = postes.tipo_luminaria');
        $markers = $this->db->get('postes');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_postes($vst) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        $this->db->where('luminaria', $vst);
        //   $this->db->where('fecha <=', $fecha_fin);
        ///    $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
        //   $this->db->where('id_entidad ', $entidad);
        //     $this->db->where('id_operativo', $vst);
        //      $this->db->join('decomiso_detalle', 'decomiso_detalle.id = decomiso.id_decomiso_detalle');
        //      $this->db->join('estado_decomiso', 'estado_decomiso.id = decomiso.id_estado_decomiso');
        //      $this->db->join('zona', 'zona.id = operativo.id_zona');
        //   $this->db->join('calle', 'calle.id = operativo.id_calle');
        //      $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

        $markers = $this->db->get('postes');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function get_markers_monitoreo($caso_monitoreo, $distrito, $fecha_inicio, $fecha_fin) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        //   $this->db->where('fecha >=', $fecha_inicio);
        //   $this->db->where('fecha <=', $fecha_fin);



        if ($distrito == 0) {
            if ($caso_monitoreo == 0) {
                //    echo 'Inicio:'.$fecha_inicio.'Final'.$fecha_fin;
                $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
                ///   $this->db->where('id_distrito_monitoreo ', $distrito);
                //  $this->db->where('monitoreo.id_tipo_caso ', $caso_monitoreo);
                $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
                //  $this->db->join('zona', 'zona.id = monitoreo.id_zona_monitoreo');
            } else {

                $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
                ///   $this->db->where('id_distrito_monitoreo ', $distrito);
                $this->db->where('monitoreo.id_tipo_caso ', $caso_monitoreo);
                $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
                $this->db->join('zona', 'zona.id = monitoreo.id_zona_monitoreo');
                //   $this->db->join('calle', 'calle.id = operativo.id_calle');
                //  $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');
            }
            $markers = $this->db->get('monitoreo');
            if ($markers->num_rows() > 0) {
                return $markers->result();
            }
        } else {
            $this->db->where('fecha BETWEEN "' . date('Y-m-d', strtotime($fecha_inicio)) . '" and "' . date('Y-m-d', strtotime($fecha_fin)) . '"');
            $this->db->where('id_distrito_monitoreo ', $distrito);
            $this->db->where('monitoreo.id_tipo_caso ', $caso_monitoreo);
            $this->db->join('tipo_caso_monitoreo', 'tipo_caso_monitoreo.id = monitoreo.id_tipo_caso');
            $this->db->join('zona', 'zona.id = monitoreo.id_zona_monitoreo');
            //   $this->db->join('calle', 'calle.id = operativo.id_calle');
            //  $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');

            $markers = $this->db->get('monitoreo');
            if ($markers->num_rows() > 0) {
                return $markers->result();
            }
        }
    }

    public function tipo_operativo($tipo_operativo) {

        $this->db->where('id', $tipo_operativo);

        $markers2 = $this->db->get('tipo_operativo');

        return $markers2->result();
    }

    public function tipo_caso($tipo_caso) {

        $this->db->where('id', $tipo_caso);

        $markers2 = $this->db->get('tipo_caso_monitoreo');

        return $markers2->result();
    }

    public function guardar_hoja($lat, $lng, $infowindow) {
        $this->db->set('pos_y', $lat);
        $this->db->set('pos_x', $lng);
        $this->db->set('sub_distrito', $infowindow);
        $this->db->insert('operativo');
    }
    
    public function luminaria($vst) {
        //     $this->db->where("$accommodation BETWEEN $minvalue AND $maxvalue");
        $this->db->where('luminarias.id', $vst);
         $this->db->join('area', 'area.id = luminarias.area');
   //  $this->db->join('notas', 'notas.id = cite.notas');
        $markers = $this->db->get('luminarias');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

}
