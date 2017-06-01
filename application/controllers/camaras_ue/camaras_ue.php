<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Camaras_ue extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$ue = $this->load->model('ue/unidades_educativas_model','ue');
}

	public function register_ue() {
		$data['nivel'] =  $this->ue->get_nivel();
		$data['zona'] =  $this->ue->get_zona();
		$this->load->view('master/header');
		$this->load->view('camaras_ue/registrar_ue',$data);
	}

}
