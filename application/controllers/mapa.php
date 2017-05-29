<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mapa_model');
        $this->load->model('provincias_model');
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'suscriptor') {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        //creamos la configuración del mapa con un array
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->infowindow;
            $marker['id'] = $info_marker->id;
            $this->googlemaps->add_marker($marker);
            //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
            //si queremos que se pueda arrastrar el marker
            //$marker['draggable'] = TRUE;
            //si queremos darle una id, muy útil
        }

        //creamos el mapa y lo asignamos a map que lo 
        //tendremos disponible en la vista mapa_view con el array data
        $data['datos'] = $this->mapa_model->get_markers();
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('header');
        $this->load->view('mapa_view', $data);
    }

    public function select_pro() {
        $this->load->model("provincias_model");
        $data = array(
            "provincias" => $this->provincias_model->getProvincias()
        );

        $this->load->view("home", $data);
    }

    public function getAjaxPoblacion() {
        if ($this->input->is_ajax_request() && $this->input->get("provincia")) {
            $this->load->model("provincias_model");
            $provinciaId = $this->input->get("provincia");

            //obtenemos las poblaciones de esa provincia
            $poblaciones = $this->provincias_model->getPoblaciones($provinciaId);

            $data = array(
                "poblaciones" => $poblaciones
            );

            echo json_encode($data);
        }
    }

    public function getAjaxPoblacion_2() {
        if ($this->input->is_ajax_request() && $this->input->get("provincia")) {
            $this->load->model("provincias_model");
            $provinciaId = $this->input->get("provincia");

            //obtenemos las poblaciones de esa provincia
            $poblaciones = $this->provincias_model->getPoblaciones2($provinciaId);

            $data = array(
                "poblaciones2" => $poblaciones
            );

            echo json_encode($data);
        }
    }

    public function getAjaxPoblacion2_camara() {
        if ($this->input->is_ajax_request() && $this->input->get("provincias2")) {
            $this->load->model("provincias_model");
            $provinciaId = $this->input->get("provincias2");

            //obtenemos las poblaciones de esa provincia
            $poblaciones = $this->provincias_model->getEntidades_camaras($provinciaId);

            $data = array(
                "poblaciones2" => $poblaciones,
                "postal" => str_pad($poblaciones[0]->id_distrito_camara, '0', STR_PAD_LEFT)
            );

            echo json_encode($data);
        }
    }

    /**
     * @desc - devuelve un json con el código postal de una provincia y todas las provincias
     */
    public function getAjaxPostal() {
        if ($this->input->is_ajax_request() && $this->input->get("poblaciones2")) {
            $this->load->model("provincias_model");
            $poblacionId = $this->input->get("poblacion");

            //obtenemos el código postal de la poblacion
            $cPostal = $this->provincias_model->getPostal($poblacionId);

            $data = array(
                "postal" => str_pad($cPostal->id_distrito, 5, '0', STR_PAD_LEFT),
                "provincias" => $this->provincias_model->getCalles($poblacionId)
            );

            echo json_encode($data);
        }
    }

    public function getAjaxPoblacion2() {
        if ($this->input->is_ajax_request() && $this->input->get("provincia2")) {
            $this->load->model("provincias_model");
            $provinciaId = $this->input->get("provincia2");

            //obtenemos las poblaciones de esa provincia
            $poblaciones = $this->provincias_model->getEntidades($provinciaId);

            $data = array(
                "poblaciones2" => $poblaciones,
                "postal" => str_pad($poblaciones[0]->id_distrito, '0', STR_PAD_LEFT)
            );

            echo json_encode($data);
        }
    }

    /**
     * @desc - devuelve un json con el código postal de una provincia y todas las provincias
     */
    public function getAjaxPostal2() {
        if ($this->input->is_ajax_request() && $this->input->get("poblacion2")) {
            $this->load->model("provincias_model");
            $poblacionId = $this->input->get("poblacion2");

            //obtenemos el código postal de la poblacion
            $cPostal = $this->provincias_model->getEnt($poblacionId);

            $data = array(
                "postal" => str_pad($cPostal->descripcion, 5, '0', STR_PAD_LEFT),
                "provincias" => $this->provincias_model->getCalles($poblacionId)
            );

            echo json_encode($data);
        }
    }

}
