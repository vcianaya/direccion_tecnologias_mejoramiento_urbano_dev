<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conflictos_sociales_model extends CI_Model {

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

    function update_conflictos_sociales($guardar_conflictos_sociales, $id_conflicto) {
        $this->db->where('id_conflicto', $id_conflicto);
        //  $this->db->set('estado_aprobacion', 1);
        return $this->db->update('conflictos_sociales', $guardar_conflictos_sociales);
    }

    function eliminar_auxilios($id) {
        $this->db->where('id_auxilios', $id);
        return $this->db->delete('auxilios');
    }

    function aprobar_auxilios($id) {
        $this->db->where('id_auxilios', $id);
        $this->db->set('estado_aprobacion', 1);
        return $this->db->update('auxilios');
    }

    public function getProvincias() {
        $this->db->select("id,nombre_distrito");
        $this->db->from('distrito');

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

    public function tipo_servicio_extraordinario() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('tipo_servicio_extraordinario');
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

    public function tipo_conflictos() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('tipo_conflictos');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function sectores_grupos_movilizados() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('sectores_grupos_movilizados');
        $provincias = $this->db->get();
        return $provincias->result();
    }

    public function resguardos_intervenciones() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('resguardos_intervenciones');
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

    public function auxilios() {
        $this->db->select('*');
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("estado_aprobacion", 0);
        // $this->db->where("id_faltas", $id_faltas);

        $this->db->join('mes', 'mes.id = auxilios.mes');

        $this->db->join('epis', 'epis.id = auxilios.epis');

        $this->db->join('diferentes_auxilios', 'diferentes_auxilios.id = auxilios.diferentes_auxilios');

        $this->db->from('auxilios');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function conflictos_sociales_edit($id_conflicto) {
        $this->db->select('*');
        //   $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("id_conflicto", $id_conflicto);
        $this->db->join('gestion', 'gestion.id = conflictos_sociales.gestion');
        $this->db->join('mes', 'mes.id = conflictos_sociales.mes');
        $this->db->join('departamento', 'departamento.id = conflictos_sociales.departamento');
        $this->db->join('provincia', 'provincia.id = conflictos_sociales.provincia');
        $this->db->join('municipio', 'municipio.id = conflictos_sociales.municipio');
        $this->db->join('localidad', 'localidad.id = conflictos_sociales.localidad');
        $this->db->join('epis', 'epis.id = conflictos_sociales.epis');
        $this->db->join('distrito', 'distrito.id = conflictos_sociales.distrito');
        $this->db->join('zona', 'zona.id = conflictos_sociales.zona');
        //     $this->db->join('denuncia', 'denuncia.id = auxilios.denuncia');
        //  $this->db->join('ciudad_victima', 'ciudad_victima.id = faltas_contravenciones.ciudad_victima');
        //  $this->db->join('ciudad_infractor', 'ciudad_infractor.id = faltas_contravenciones.ciudad_infractor');
        $this->db->join('tipo_conflictos', 'tipo_conflictos.id = conflictos_sociales.tipo_conflictos');
        $this->db->join('sectores_grupos_movilizados', 'sectores_grupos_movilizados.id = conflictos_sociales.sectores_grupos_movilizados');
        $this->db->join('resguardos_intervenciones', 'resguardos_intervenciones.id = conflictos_sociales.resguardos_intervenciones');

        $this->db->join('remision_caso', 'remision_caso.id = conflictos_sociales.remision_caso');
        //       $this->db->join('termino_prueba', 'termino_prueba.id = faltas_contravenciones.termino_prueba');
        //    $this->db->join('recurso_apelacion', 'recurso_apelacion.id = auxilios.recurso_apelacion');
        $this->db->join('servicio_destacado', 'servicio_destacado.id = conflictos_sociales.servicio_destacado');

        $this->db->from('conflictos_sociales');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    public function guardar_conflictos_sociales($guardar_conflictos_sociales) {
        $this->db->insert('conflictos_sociales', $guardar_conflictos_sociales);
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

    public function division() {
        $this->db->select("*");
        $this->db->where_not_in("id", 0);
        $this->db->from('division');
        $provincias = $this->db->get();
        return $provincias->result();
    }

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

    public function guardar_felcc($guardar_felcc) {
        $this->db->insert('felcc', $guardar_felcc);
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
        $this->db->join('localidad', 'localidad.id = felcc.localidad');
        $this->db->join('epis', 'epis.id = felcc.epis');
        $this->db->join('distrito', 'distrito.id = felcc.distrito');
        $this->db->join('zona', 'zona.id = felcc.zona');
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

        $this->db->join('arrestado', 'arrestado.id = felcc.arrestado');

        $this->db->join('estado_caso', 'estado_caso.id = felcc.estado_caso');

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
        $this->db->where('id_felcv', $id_felcv);
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

}
