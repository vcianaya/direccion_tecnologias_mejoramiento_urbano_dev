<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of monitoreo_datos
 *
 * @author jcarlos
 */
class monitoreo_datos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'grocery_CRUD', 'table'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('intendencia_model');
        $this->load->model('mapa_model');
        /*   $this->load->model('inten  dencia_model');
          $this->load->model('observatorio_model');
         */
        $this->load->database('default');
        //        $this->load->library(array('form_validation', 'grocery_CRUD', 'table'));

        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'administrador') {
            redirect(base_url() . 'login');
        }
    }

    public function reporte_por_mes() {
   
        $data = array(
            "provincias" => $this->intendencia_model->mumero_casos_registrados_intendencia(),
            "fecha"  =>$this->intendencia_model->ultima_fecha(),
            "fecha_decomisos"  =>$this->intendencia_model->ultima_fecha_decomisos()
        );
      //  $data['datos'] = $this->mapa_model->get_markets_intendencia();
  //      $data['map'] = $this->googlemaps->create_map();
        $this->load->view('header');

        $this->load->view('monitoreo_datos/mapa_view_general_camaras_db', $data);
    }

}
