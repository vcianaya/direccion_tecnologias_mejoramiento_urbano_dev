<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades_economicas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'grocery_CRUD', 'table'));
        $this->load->helper(array('url', 'form'));


        $this->load->database('default');
//        $this->load->library(array('form_validation', 'grocery_CRUD', 'table'));

        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'administrador') {
            redirect(base_url() . 'login');
        }
    }

    public function _example_output($output = null) {


//   $this->load->view('admin_view_crud', $output);
//    $this->load->view('footer');
    }

    public function registro() {
        $this->db = $this->load->database('dtmu_video_camaras',true);
       //   $db_prueba = $this->load->database('dtmu_video_camaras', TRUE);
        $crud = new grocery_CRUD();
        $crud->set_table('actividad_economica');
        //  $crud->required_fields('fecha_registro', 'fecha_hecho', 'hora_registro', 'hora_hecho', 'genero', 'genero_agresor', 'edad', 'edad_agresor', 'descripcion');
        //     $crud->set_relation('temperancia_agresor', 'temperancia', 'nombre_temperancia');
        $crud->set_subject('actividad_economica');
       $crud->unset_add();
       $crud->unset_edit();
      $crud->unset_delete();
      $crud->unset_read();
      $crud->unset_print();

        $output = $crud->render();
        $this->_example_output($output);
        $this->load->view('master/header');
        $this->load->view('actividades_economicas/registro', $output);
        $this->load->view('master/footer');
    }

}
