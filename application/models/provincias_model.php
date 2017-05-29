<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Provincias_model extends CI_Model {

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

    public function getProvincias() {
        $this->db->select("id,nombre_distrito");
        $this->db->from('distrito');

        $provincias = $this->db->get();
        return $provincias->result();
    }

    function tipo_operativo() {
        $this->db->select('*');
        $this->db->from('tipo_operativo');
        $this->db->order_by('nombre_o', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipo_operativo_colegios() {
        $this->db->select('*');
        $this->db->where("id", 4);
        $this->db->or_where("id", 7);
        $this->db->or_where("id", 3);
        $this->db->from('tipo_operativo');
        $this->db->order_by('nombre_o', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipo_caso_monitoreo() {
        $this->db->select('*');
        $this->db->from('tipo_caso_monitoreo');
        $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function camara() {
        $this->db->select('*');
        $this->db->from('camara');
        //      $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }
  function distritos() {
        $this->db->select('*');
        $this->db->from('distrito');
        //      $this->db->order_by('nombre_monitoreo', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }
    function operativo() {
        $this->db->select('*');
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("decomiso", 0);
        $this->db->from('operativo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function operativo_colegio() {
        $this->db->select('*');
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("decomiso", 0);
     
        $this->db->or_where("operativo.id_tipo_operativo", 4);
        $this->db->where("decomiso", 0);
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->or_where("operativo.id_tipo_operativo", 7);
        $this->db->where("decomiso", 0);
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->or_where("operativo.id_tipo_operativo", 3);
        $this->db->where("decomiso", 0);
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));

        $this->db->from('operativo');
 //             $this->db->join('entidades', 'entidades.id = operativo.id_entidad');
        $this->db->join('tipo_operativo', 'tipo_operativo.id = operativo.id_tipo_operativo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function monitoreo() {
        $this->db->select('*');
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        $this->db->where("estado_aprobacion", 0);
        $this->db->from('monitoreo');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }
     function imagenes($id_imagen) {
        $this->db->select('*');
        $this->db->where("id_monitoreo", $id_imagen);
      //  $this->db->where("estado_aprobacion", 0);
        $this->db->from('imagenes');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipo_intervencion() {
        $this->db->select('*');
        $this->db->from('intervencion');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function estado_decomiso() {
        $this->db->select('*');
        $this->db->from('estado_decomiso');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function id_decomiso_detalle() {
        $this->db->select('*');
         $this->db->join('especie', 'especie.id = decomiso_detalle.id_especie');
        $this->db->from('decomiso_detalle');
         $this->db->order_by('nombre_detalle', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function id_medida() {
        $this->db->select('*');
        /// $this->db->join('especie', 'especie.id = decomiso_detalle.id_especie');
        $this->db->from('medida');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    
    public function getEnt($poblacionId) {
        $this->db->select("descripcion");
        $this->db->where("id", $poblacionId);
        return $this->db->get("entidades")->row();
    }

    public function getEntidades($provinciaId) {
      //   $this->db->select("id_distrito,nombre_entidad,descripcion");
        $this->db->order_by('nombre_entidad', 'asc');
        $this->db->where("id_tipo_operativo", $provinciaId);
        return $this->db->get("entidades")->result();
    }

    public function getEntidades_camara($provinciaId) {
        //  $this->db->select("id,nombre,descripcion");
        $this->db->order_by('id_distrito');
        $this->db->where("id", $provinciaId);
        return $this->db->get("entidades")->result();
    }

    public function getEntidades_camaras($provinciaId) {
    //    $this->db->select("id_distrito_camara");
        // $this->db->order_by('nombre_entidad', 'asc');
        $this->db->where("id_tipologia_principals", $provinciaId);
        return $this->db->get("tipologia_secundaria")->result();
    }

    /**
     * @desc - obtenemos todas las poblaciones que pertenecen a esa provincia
     * @return object
     */
    public function getPoblaciones($provinciaId) {
      //  $this->db->select("id,nombre,descripcion");
        $this->db->where("id_distrito", $provinciaId);
        return $this->db->get("zona")->result();
    }
     public function getPoblaciones2($provinciaId) {
      //  $this->db->select("id,nombre,descripcion");
        $this->db->where("id_tipologia_principal", $provinciaId);
        return $this->db->get("tipologia_secundaria")->result();
    }

    /**
     * @desc - obtiene el código postal de una población
     * @return object
     */
    public function getCalles($provinciaId) {
        $this->db->select("id,nombre");
        $this->db->where("id_zona", $provinciaId);
        $provincias = $this->db->get("calle");
        $data = array();
        foreach ($provincias->result() as $provincia) {
            $data[$provincia->id] = $provincia->nombre;
        }
        return $data;
    }

    public function getPostal($poblacionId) {
        $this->db->select("id_disitrito");
        $this->db->where("id", $poblacionId);
        return $this->db->get("entidades")->row();
    }

    public function getPostal_colegios($provinciaId2) {
        $this->db->select("id_distrito");
        $this->db->where("id", $provinciaId2);
        return $this->db->get("entidades")->row();
    }

    function estado_via() {
        $this->db->select('*');
        $this->db->from('estado_via');
        $this->db->order_by('nombre', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function tipo_via() {
        $this->db->select('*');
        $this->db->from('tipo_via');
        $this->db->order_by('nombre', 'asc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

    function vias() {
        $this->db->select('*');
        $this->db->where("id_usuario", $this->session->userdata('id_usuario'));
        //  $this->db->where("estado_aprobacion", 0);
        $this->db->from('vias');
        //  $this->db->order_by('id_producto', 'desc');
        //	$this->db->limit('2');
        $productos = $this->db->get();
        return $productos->result();
    }

}
