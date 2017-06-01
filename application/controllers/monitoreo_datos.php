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
        $this->load->model('monitoreo_model');
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
        $this->load->library('highcharts');
        $data = array(
            "provincias" => $this->intendencia_model->mumero_casos_registrados_intendencia(),
            "fecha" => $this->intendencia_model->ultima_fecha(),
            "fecha_decomisos" => $this->intendencia_model->ultima_fecha_decomisos()
        );
        $tipd1 = $this->monitoreo_model->tipo_operativo_mes(1);
        $tipd2 = $this->monitoreo_model->tipo_operativo_mes(2);
        $tipd3 = $this->monitoreo_model->tipo_operativo_mes(3);
        $tipd4 = $this->monitoreo_model->tipo_operativo_mes(4);
        $tipd5 = $this->monitoreo_model->tipo_operativo_mes(5);
        $tipd6 = $this->monitoreo_model->tipo_operativo_mes(6);
        $tipd7 = $this->monitoreo_model->tipo_operativo_mes(7);
        $tipd8 = $this->monitoreo_model->tipo_operativo_mes(8);
        $tipd9 = $this->monitoreo_model->tipo_operativo_mes(9);
        $tipd10 = $this->monitoreo_model->tipo_operativo_mes(10);
        $tipd11 = $this->monitoreo_model->tipo_operativo_mes(11);
        $tipd12 = $this->monitoreo_model->tipo_operativo_mes(12);


        $tipTotal = $this->monitoreo_model->tipo_operativo_mes_general();

        $serie['data'] = array(
            array('ENERO', round(($tipd1 / $tipTotal) * 100), 3),
            array('FEBRERO', round(($tipd2 / $tipTotal) * 100), 3),
            array('MARZO', round(($tipd3 / $tipTotal) * 100), 3),
            array('ABRIL', round(($tipd4 / $tipTotal) * 100), 3),
            array('MAYO', round(($tipd5 / $tipTotal) * 100), 3),
            array('JUNIO', round(($tipd6 / $tipTotal) * 100), 3),
            array('JULIO', round(($tipd7 / $tipTotal) * 100), 3),
            array('AGOSTO', round(($tipd8 / $tipTotal) * 100), 3),
            array('SEPTIEMBRE', round(($tipd9 / $tipTotal) * 100), 3),
            array('OCTUBRE', round(($tipd10 / $tipTotal) * 100), 3),
            array('NOVIEMBRE', round(($tipd11 / $tipTotal) * 100), 3),
            array('DICIEMBRE', round(($tipd12 / $tipTotal) * 100), 3)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' % '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico - Porcentaje de Operativos Realizados de la Gestion 2017', 'POT MES ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);
        $data['charts2'] = $this->highcharts->render();
        
         $tipd1 = $this->monitoreo_model->tipo_operativo_distrito(1);
        $tipd2 = $this->monitoreo_model->tipo_operativo_distrito(2);
        $tipd3 = $this->monitoreo_model->tipo_operativo_distrito(3);
        $tipd4 = $this->monitoreo_model->tipo_operativo_distrito(4);
        $tipd5 = $this->monitoreo_model->tipo_operativo_distrito(5);
        $tipd6 = $this->monitoreo_model->tipo_operativo_distrito(6);
        $tipd7 = $this->monitoreo_model->tipo_operativo_distrito(7);
        $tipd8 = $this->monitoreo_model->tipo_operativo_distrito(8);
        $tipd9 = $this->monitoreo_model->tipo_operativo_distrito(9);
        $tipd10 = $this->monitoreo_model->tipo_operativo_distrito(10);
        $tipd11 = $this->monitoreo_model->tipo_operativo_distrito(11);
        $tipd12 = $this->monitoreo_model->tipo_operativo_distrito(12);
        $tipd13 = $this->monitoreo_model->tipo_operativo_distrito(13);
        $tipd14 = $this->monitoreo_model->tipo_operativo_distrito(14);


        $tipTotal = $this->monitoreo_model->tipo_operativo_mes_general();

        $serie['data'] = array(
           array('DISTRITO 1', round(($tipd1 / $tipTotal) * 100), 3),
            array('DISTRITO 2', round(($tipd2 / $tipTotal) * 100), 3),
            array('DISTRITO 3', round(($tipd3 / $tipTotal) * 100), 3),
            array('DISTRITO 4', round(($tipd4 / $tipTotal) * 100), 3),
            array('DISTRITO 5', round(($tipd5 / $tipTotal) * 100), 3),
            array('DISTRITO 6', round(($tipd6 / $tipTotal) * 100), 3),
            array('DISTRITO 7', round(($tipd7 / $tipTotal) * 100), 3),
            array('DISTRITO 8', round(($tipd8 / $tipTotal) * 100), 3),
            array('DISTRITO 9', round(($tipd9 / $tipTotal) * 100), 3),
            array('DISTRITO 10', round(($tipd10 / $tipTotal) * 100), 3),
            array('DISTRITO 11', round(($tipd11 / $tipTotal) * 100), 3),
            array('DISTRITO 12', round(($tipd12 / $tipTotal) * 100), 3),
            array('DISTRITO 13', round(($tipd13 / $tipTotal) * 100), 3),
            array('DISTRITO 14', round(($tipd14 / $tipTotal) * 100), 3)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' % '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico - Porcentaje de Operativos Realizados de la Gestion 2017', 'POT DISTRITOS ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);
        $data['charts3'] = $this->highcharts->render();

        
         $tipd1 = $this->monitoreo_model->tipo_operativo_general(11);
        $tipd2 = $this->monitoreo_model->tipo_operativo_general(2);
        $tipd3 = $this->monitoreo_model->tipo_operativo_general(6);
        $tipd4 = $this->monitoreo_model->tipo_operativo_general(7);
        $tipd5 = $this->monitoreo_model->tipo_operativo_general(5);
        $tipd6 = $this->monitoreo_model->tipo_operativo_general(10);
        $tipd7 = $this->monitoreo_model->tipo_operativo_general(8);
        $tipd8 = $this->monitoreo_model->tipo_operativo_general(14);
        $tipd9 = $this->monitoreo_model->tipo_operativo_general(12);
        $tipd10 = $this->monitoreo_model->tipo_operativo_general(15);
        $tipd11 = $this->monitoreo_model->tipo_operativo_general(13);

        $tipTotal = $this->monitoreo_model->tipo_operativo_mes_general();

        $serie['data'] = array(
            array('ASENTAMIENTOS EN VIAS PUBLICAS', round(($tipd1 / $tipTotal) * 100), 3),
            array('BARES, DISCOTECAS Y CANTINAS', round(($tipd2 / $tipTotal) * 100), 3),
            array('EXPENDIO Y VENTA DE ALIMENTOS', round(($tipd3 / $tipTotal) * 100), 3),
            array('FERIAS Y MERCADOS', round(($tipd4 / $tipTotal) * 100), 3),
            array('GRANJAS, CRIADEROS Y FABRICAS', round(($tipd5 / $tipTotal) * 100), 3),
            array('HORNO PANIFICADORA', round(($tipd6 / $tipTotal) * 100), 3),
            array('HOTELES, MOTELES Y ALOJAMIENTOS', round(($tipd7 / $tipTotal) * 100), 3),
            array('INTERNET', round(($tipd8 / $tipTotal) * 100), 3),
            array('LENOCINIO', round(($tipd9 / $tipTotal) * 100), 3),
            array('OTROS', round(($tipd10 / $tipTotal) * 100), 3),
            array('PUESTOS DE VENTA', round(($tipd11 / $tipTotal) * 100), 3)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' % '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico - Porcentaje de Operativos Realizados de la Gestion 2017', 'POR OPERATIVOS ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);
        $data['charts4'] = $this->highcharts->render();
        //  $data['datos'] = $this->mapa_model->get_markets_intendencia();
        //      $data['map'] = $this->googlemaps->create_map();
        $this->load->view('header');

        $this->load->view('monitoreo_datos/mapa_view_general_camaras_db', $data);
    }

}
