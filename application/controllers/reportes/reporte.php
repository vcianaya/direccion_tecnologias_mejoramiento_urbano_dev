<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reporte extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'form'));
    $this->load->model('orm/luminarias');
    $this->load->model('orm/postes');
  }

  public function poste()
  {
    $luminarias = Luminarias::join('distrito','distrito.id','=','luminarias.distrito')
    ->join('zona','zona.id','=','luminarias.zona')
    ->join('area','area.id','=','luminarias.area')
    ->select('Luminarias.id','luminarias.direccion','luminarias.nro_postes_luz','luminarias.nro_no_funcionan','distrito.nombre_distrito','zona.nombre as nombrezona','area.codigo_area')
    ->get();
    $data['luminarias'] = $luminarias;
    $this->load->view('header0');
    $this->load->view('alumbrado/reporte/lista_poste',$data);
  }

  public function reportePoste($id_luminaria)
  {

    $luminaria = Luminarias::join('area','area.id','=','luminarias.area')
    ->select('luminarias.id','luminarias.direccion','luminarias.nro_postes_luz','luminarias.nro_no_funcionan','luminarias.estado_area_plaza','luminarias.rejas_descubiertas','luminarias.rejas_cerradas'
    ,'luminarias.banqueta_area','luminarias.basureros','luminarias.monumentos','luminarias.plaquetas_creacion','luminarias.mantenimiento','luminarias.limpias','luminarias.modulo_policial','luminarias.centro_salud','luminarias.parada_trasnporte'
    ,'luminarias.comercio','luminarias.venta_comidas','luminarias.snacks','luminarias.venta_productos','luminarias.observaciones'
    ,'area.id as id_area','area.codigo_area','area.tipo_area','area.pos_x','area.pos_y','area.nombre_area')
    ->where('luminarias.id',$id_luminaria)
    ->first();
    $postes = Postes::join('tipo_poste','tipo_poste.id','=','postes.tipo_poste')
    ->join('tipo_luminaria','tipo_luminaria.id','=','postes.tipo_luminaria')
    ->join('estructura_poste','estructura_poste.id','=','postes.estructura_poste')
    ->select('postes.numero_poste','postes.funciona_poste_si_no','postes.pos_x_p','postes.pos_y_p','postes.potencia','postes.funciona_poste_si_no','tipo_poste.nombre_tipo_poste','tipo_luminaria.nombre_tipo_luminaria','estructura_poste.nombre_estructura_poste')
    ->where('postes.luminaria',$id_luminaria)
    ->get();

    $data['luminaria'] = $luminaria;
    $data['postes'] = $postes;
    $this->load->view('header0');
    $this->load->view('alumbrado/reporte/detalle_poste', $data);
  }

}
