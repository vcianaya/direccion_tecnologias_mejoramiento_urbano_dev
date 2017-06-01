<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Camaras_ue extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$ue = $this->load->model('ue/unidades_educativas_model','ue');
}

	public function register_ue() {
		$data['css'] = '
		<link href="'.base_url().'assets/plugin/select2/css/select2.min.css" rel="stylesheet" type="text/css">
		<link href="'.base_url().'assets/css/style_general.css" rel="stylesheet" type="text/css">
		<link href="'.base_url().'assets/plugin/datepicker/css/datepicker.css" rel="stylesheet" type="text/css">
		';

		$data['nivel'] =  $this->ue->get_nivel();
		$data['zona'] =  $this->ue->get_zona();
		$data['distrito'] =  $this->ue->get_distrito();
		$data['tipo_medidor'] = $this->ue->get_tipo_medidor();
		$data['poligon'] = $this->ue->get_poligon();
		$this->load->view('master/header',$data);
		$this->load->view('camaras_ue/registrar_ue');
	}

}
