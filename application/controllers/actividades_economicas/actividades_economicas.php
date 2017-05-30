<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades_economicas extends CI_Controller {

    public function registro() {
        $this->load->view('master/header');
        $this->load->view('actividades_economicas/registro');
        $this->load->view('master/footer');
    }

}
