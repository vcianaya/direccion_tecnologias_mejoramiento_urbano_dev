<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session', 'form_validation', 'grocery_CRUD', 'table'));
	}
	public function index()
	{
		//echo $this->blade->render("master/master");
		$data['css'] = '<link href="'.base_url().'assets/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
		$this->load->view('master/master',$data);
	}

}