<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Intendencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'grocery_CRUD', 'table'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('intendencia_model');
        //   $this->load->model('colegios');
        //   $this->load->model('ferias');
        //   $this->load->model('canchas');
        // $this->load->model('mapa_modulos_policiales_model');
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

    public function index() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/index', $data);
    }

    public function lista_modulos_reportes() {
        $data = array(
            "distrito" => $this->intendencia_model->lista_distritos()
        );
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/lista_reporte_general', $data);
    }

    public function reporte_actividad_1() {
        $this->load->library('highcharts');
        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');
        $tipd1 = $this->intendencia_model->tipo_operativo(11, $distrito);
        $tipd2 = $this->intendencia_model->tipo_operativo(2, $distrito);
        $tipd3 = $this->intendencia_model->tipo_operativo(6, $distrito);
        $tipd4 = $this->intendencia_model->tipo_operativo(7, $distrito);
        $tipd5 = $this->intendencia_model->tipo_operativo(5, $distrito);
        $tipd6 = $this->intendencia_model->tipo_operativo(10, $distrito);
        $tipd7 = $this->intendencia_model->tipo_operativo(8, $distrito);
        $tipd8 = $this->intendencia_model->tipo_operativo(14, $distrito);
        $tipd9 = $this->intendencia_model->tipo_operativo(12, $distrito);
        $tipd10 = $this->intendencia_model->tipo_operativo(15, $distrito);
        $tipd11 = $this->intendencia_model->tipo_operativo(13, $distrito);

        $tipTotal = $this->intendencia_model->total_registros_operativos($distrito);

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
        $this->highcharts->set_title('Grafico - Cantidad de Operativos realizados segun la Actividad Economica', 'Distrito ' . $distrito);
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);
        $data['charts2'] = $this->highcharts->render();

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_1', $data);
    }
  public function reporte_actividad_1_1() {
        $this->load->library('highcharts');
        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');
        $tipd1 = $this->intendencia_model->tipo_operativo_general(11);
        $tipd2 = $this->intendencia_model->tipo_operativo_general(2);
        $tipd3 = $this->intendencia_model->tipo_operativo_general(6);
        $tipd4 = $this->intendencia_model->tipo_operativo_general(7);
        $tipd5 = $this->intendencia_model->tipo_operativo_general(5);
        $tipd6 = $this->intendencia_model->tipo_operativo_general(10);
        $tipd7 = $this->intendencia_model->tipo_operativo_general(8);
        $tipd8 = $this->intendencia_model->tipo_operativo_general(14);
        $tipd9 = $this->intendencia_model->tipo_operativo_general(12);
        $tipd10 = $this->intendencia_model->tipo_operativo_general(15);
        $tipd11 = $this->intendencia_model->tipo_operativo_general(13);

        $tipTotal = $this->intendencia_model->total_registros_operativos_general();

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
        $this->highcharts->set_title('Grafico - Porcentaje de Operativos Realizados de la Gestion 2017', 'GENERAL ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);
        $data['charts2'] = $this->highcharts->render();

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_1_1', $data);
    }
    public function reporte_actividad_2() {

        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_2', $data);
    }
    public function reporte_actividad_2_1() {

        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_2_1', $data);
    }

    public function reporte_actividad_3() {

        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_3', $data);
    }

    public function reporte_actividad_4() {

        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        $data['zona'] = $this->intendencia_model->reporte_zonas($distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_4', $data);
    }

    public function reporte_actividad_5() {
        $this->load->library('highcharts');
        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');
        $graph_data = $this->_data_clausuras();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Grafico Realizadas Pos Actividad Comercial - Gestion 2017', 'Distrito ' . $distrito); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', 'Dias'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        //   $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';
        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);

        $this->highcharts->render_to('my_div'); // choose a specific div to render to graph

        $data['charts2'] = $this->highcharts->render();

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_5', $data);
    }

    public function reporte_actividad_6() {
        $this->load->library('highcharts');
        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');
        $op1 = $this->intendencia_model->tip_general_hora('01:00:00', '03:00:00', $distrito);
        $op2 = $this->intendencia_model->tip_general_hora('03:01:00', '05:00:00', $distrito);
        $op3 = $this->intendencia_model->tip_general_hora('05:01:00', '07:00:00', $distrito);
        $op4 = $this->intendencia_model->tip_general_hora('07:01:00', '09:00:00', $distrito);
        $op5 = $this->intendencia_model->tip_general_hora('09:01:00', '11:00:00', $distrito);
        $op6 = $this->intendencia_model->tip_general_hora('11:01:00', '13:00:00', $distrito);
        $op7 = $this->intendencia_model->tip_general_hora('13:01:00', '15:00:00', $distrito);
        $op8 = $this->intendencia_model->tip_general_hora('15:01:00', '17:00:00', $distrito);
        $op9 = $this->intendencia_model->tip_general_hora('17:01:00', '19:00:00', $distrito);
        $op10 = $this->intendencia_model->tip_general_hora('19:01:00', '21:00:00', $distrito);
        $op11 = $this->intendencia_model->tip_general_hora('21:01:00', '23:00:00', $distrito);
        $op12 = $this->intendencia_model->tip_general_hora('23:01:00', '24:00:00', $distrito);

        $tipTotal = $this->intendencia_model->tip_general_hora_total($distrito);

        $serie['data'] = array(
            array('01:00 - 03:00', round(($op1 / $tipTotal) * 100), 3),
            array('03:01 - 05:00 ', round(($op2 / $tipTotal) * 100), 3),
            array('05:01 - 07:00  ', round(($op3 / $tipTotal) * 100), 3),
            array('07:01 - 09:00  ', round(($op4 / $tipTotal) * 100), 3),
            array('09:01 - 11:00  ', round(($op5 / $tipTotal) * 100), 3),
            array('11:01 - 13:00  ', round(($op6 / $tipTotal) * 100), 3),
            array('13:01 - 15:00  ', round(($op7 / $tipTotal) * 100), 3),
            array('15:01 - 17:00   ', round(($op8 / $tipTotal) * 100), 3),
            array('17:01 - 19:00  ', round(($op9 / $tipTotal) * 100), 3),
            array('19:01 - 21:00   ', round(($op10 / $tipTotal) * 100), 3),
            array('21:01 - 23:00    ', round(($op11 / $tipTotal) * 100), 3),
            array('23:01 - 24:00    ', round(($op12 / $tipTotal) * 100), 3)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' % '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico - Horario de Operativos', 'Distrito ' . $distrito);
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);

        $data['charts2'] = $this->highcharts->render();

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_6', $data);
    }

    public function reporte_actividad_6_1() {
        $this->load->library('highcharts');
        $distrito = $this->input->post('distrito');
        $pregunta = $this->input->post('pregunta');
        $op1 = $this->intendencia_model->tip_general_hora_general('01:00:00', '03:00:00');
        $op2 = $this->intendencia_model->tip_general_hora_general('03:01:00', '05:00:00');
        $op3 = $this->intendencia_model->tip_general_hora_general('05:01:00', '07:00:00');
        $op4 = $this->intendencia_model->tip_general_hora_general('07:01:00', '09:00:00');
        $op5 = $this->intendencia_model->tip_general_hora_general('09:01:00', '11:00:00');
        $op6 = $this->intendencia_model->tip_general_hora_general('11:01:00', '13:00:00');
        $op7 = $this->intendencia_model->tip_general_hora_general('13:01:00', '15:00:00');
        $op8 = $this->intendencia_model->tip_general_hora_general('15:01:00', '17:00:00');
        $op9 = $this->intendencia_model->tip_general_hora_general('17:01:00', '19:00:00');
        $op10 = $this->intendencia_model->tip_general_hora_general('19:01:00', '21:00:00');
        $op11 = $this->intendencia_model->tip_general_hora_general('21:01:00', '23:00:00');
        $op12 = $this->intendencia_model->tip_general_hora_general('23:01:00', '24:00:00');

        $tipTotal = $this->intendencia_model->tip_general_hora_total_general();

        $serie['data'] = array(
            array('01:00 - 03:00', round(($op1 / $tipTotal) * 100), 3),
            array('03:01 - 05:00 ', round(($op2 / $tipTotal) * 100), 3),
            array('05:01 - 07:00  ', round(($op3 / $tipTotal) * 100), 3),
            array('07:01 - 09:00  ', round(($op4 / $tipTotal) * 100), 3),
            array('09:01 - 11:00  ', round(($op5 / $tipTotal) * 100), 3),
            array('11:01 - 13:00  ', round(($op6 / $tipTotal) * 100), 3),
            array('13:01 - 15:00  ', round(($op7 / $tipTotal) * 100), 3),
            array('15:01 - 17:00   ', round(($op8 / $tipTotal) * 100), 3),
            array('17:01 - 19:00  ', round(($op9 / $tipTotal) * 100), 3),
            array('19:01 - 21:00   ', round(($op10 / $tipTotal) * 100), 3),
            array('21:01 - 23:00    ', round(($op11 / $tipTotal) * 100), 3),
            array('23:01 - 24:00    ', round(($op12 / $tipTotal) * 100), 3)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' % '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico - Horario de Operativos', 'GENERAL ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);

        $data['charts2'] = $this->highcharts->render();

        $data['distrito'] = $this->input->post('distrito');
        $data['reporte'] = $this->intendencia_model->reporte_especifico($pregunta, $distrito);
        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/reporte_general_6_1', $data);
    }

    public function _data_clausuras() {
        $distrito = $this->input->post('distrito');
        $l = $this->intendencia_model->clausuras(2, $distrito);
        $m = $this->intendencia_model->clausuras(6, $distrito);
        $mi = $this->intendencia_model->clausuras(10, $distrito);
        $j = $this->intendencia_model->clausuras(8, $distrito);
        $v = $this->intendencia_model->clausuras(14, $distrito);
        $s = $this->intendencia_model->clausuras(12, $distrito);
        $d = $this->intendencia_model->clausuras(5, $distrito);

        $data['users']['data'] = array($l, $m, $mi, $j, $v, $s, $d);
        $data['users']['name'] = 'Operativos ';
        // $data['popul']['data'] = array(1277528133, 1365524982, 420469703, 126804433, 250372925);
        // $data['popul']['name'] = 'World Population';
        $data['axis']['categories'] = array('BARES, DISCOTECAS Y CANTINAS', 'EXPENDIO Y VENTA DE ALIMENTOS', 'HORNO PANIFICADORA',
            'HOTELES, MOTELES Y ALOJAMIENTOS', 'INTERNET', 'LENOCINIO', 'GRANJAS');

        return $data;
    }

    public function getAjaxPoblacion2() {
        if ($this->input->is_ajax_request() && $this->input->get("provincia2")) {
            //   $this->load->model("provincias_model");
            $provinciaId = $this->input->get("provincia2");

            //obtenemos las poblaciones de esa provincia
            $poblaciones = $this->intendencia_model->getEntidades($provinciaId);

            $data = array(
                "poblaciones2" => $poblaciones,
                "postal" => str_pad($poblaciones[0]->id_distrito, '0', STR_PAD_LEFT)
            );

            echo json_encode($data);
        }
    }

    public function getAjaxPostal2() {
        if ($this->input->is_ajax_request() && $this->input->get("poblacion2")) {
            // $this->load->model("provincias_model");
            $poblacionId = $this->input->get("poblacion2");

            //obtenemos el código postal de la poblacion
            $cPostal = $this->intendencia_model->getEnt($poblacionId);

            $data = array(
                "postal" => str_pad($cPostal->descripcion, 5, '0', STR_PAD_LEFT),
                "provincias" => $this->intendencia_model->getCalles($poblacionId)
            );

            echo json_encode($data);
        }
    }

    public function llenado_datos() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('llenado_datos', $data);
    }

    public function distritos_operativos() {
        $data = array(
            "provincias" => $this->intendencia_model->tipo_operativo(),
            "tipo_operativo" => $this->intendencia_model->tipo_operativo()
        );
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/distritos_operativos', $data);
    }

    public function llenado_datos2() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('llenado_datos', $data);
    }

    public function lista_modulos() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('observatorio/modulos', $data);
    }

    public function lista_modulos_reportes_general() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('observatorio/modulos_reportes_general', $data);
    }

    public function listas_equipamiento() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('observatorio/listas_equipamiento', $data);
    }

    public function listas_equipamiento_reporte() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('observatorio/listas_equipamiento_reporte', $data);
    }

    public function listas_guardia_municipal_reporte() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('colegios/listas_guardia_municipal_reporte', $data);
    }

    public function reporte_operativos() {
        $distrito = $this->input->post('DNI');
        if ($distrito == 1) {
            $coor = '-16.528923612228628, -68.16049885668946';
        } else if ($distrito == 2) {
            $coor = '-16.546778379915395, -68.18693470874024';
        } else if ($distrito == 3) {
            $coor = '-16.535588488339208, -68.21302723803711';
        } else if ($distrito == 4) {
            $coor = '-16.51419424292476, -68.23465657153321';
        } else if ($distrito == 5) {
            $coor = '-16.478312423802752, -68.19689106860352';
        } else if ($distrito == 6) {
            $coor = '-16.5023441029502, -68.17869496264649';
        } else if ($distrito == 7) {
            $coor = '-16.472386345850005, -68.26624226489258';
        } else if ($distrito == 8) {
            $coor = '-16.60535014763866, -68.18727803149415';
        } else if ($distrito == 9) {
            $coor = '-16.49691254608991, -68.29885792651368';
        } else if ($distrito == 10) {
            $coor = '-16.64564900359328, -68.16873860278321';
        } else if ($distrito == 11) {
            $coor = '-16.519625314275768, -68.27911686816407';
        } else if ($distrito == 12) {
            $coor = '-16.559448502705656, -68.23293995776368';
        } else if ($distrito == 13) {
            $coor = '-16.398459776322508, -68.18830799975586';
        } else if ($distrito == 14) {
            $coor = '-16.48736580390754, -68.23654484667969';
        } else if ($distrito == 15) {
            $coor = '-16.464640, -68.239145';
        } else if ($distrito == 16) {
            $coor = '-14.826481, -64.866473';
        }


        $data = array(
            "provincias" => $this->intendencia_model->getProvincias(),
            "tipo_operativo" => $this->intendencia_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = $coor;
        $config['zoom'] = '14';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '100%';
        $config['map_height'] = '600px';



        $tipo_operativo = $this->input->post('id_tipo_operativo');

        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');




        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        if ($distrito == 1) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.501989, -68.162107',
                '-16.503543, -68.162697',
                '-16.504757, -68.163094',
                '-16.506423, -68.164821',
                '-16.511555, -68.169565',
                '-16.511699, -68.169544',
                '-16.512059, -68.165488',
                '-16.516219, -68.167047',
                '-16.554491, -68.179798',
                '-16.555663, -68.176459',
                '-16.555632, -68.176038',
                '-16.555293, -68.174171',
                '-16.550099, -68.173763',
                '-16.550099, -68.174332',
                '-16.549019, -68.173581',
                '-16.546859, -68.173635',
                '-16.544833, -68.170802',
                '-16.546931, -68.170341',
                '-16.546962, -68.169687',
                '-16.547147, -68.168839',
                '-16.548875, -68.166275',
                '-16.546798, -68.163914',
                '-16.539833, -68.146444',
                '-16.536791, -68.145915',
                '-16.533640, -68.149483',
                '-16.532694, -68.148314',
                '-16.528662, -68.144763',
                '-16.524799, -68.147079',
                '-16.521347, -68.148466',
                '-16.520332, -68.149423',
                '-16.518224, -68.149901',
                '-16.517757, -68.150442',
                '-16.517911, -68.150801',
                '-16.517161, -68.150824',
                '-16.512577, -68.152993',
                '-16.512563, -68.152746',
                '-16.511652, -68.153140',
                '-16.511551, -68.152970',
                '-16.508697, -68.154584',
                '-16.507343, -68.155740',
                '-16.507825, -68.156198',
                '-16.502142, -68.161951',
                '-16.501989, -68.162107'
            );
            $polygon['strokeColor'] = '#0FF';
            $polygon['fillColor'] = '#0FF';

            /// d1
            $marker = array();
            $marker['position'] = '-16.529764, -68.162098';
            $marker['infowindow_content'] = 'Distrito 1';
            $marker['icon'] = base_url() . 'assets/logos/d1.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 2) {
            $polygon = array();
            $polygon['points'] = array('-16.555085, -68.209641',
                '-16.561555, -68.193920',
                '-16.568937, -68.201494',
                '-16.571640, -68.198757',
                '-16.572257, -68.199197',
                '-16.572499, -68.198998',
                '-16.572530, -68.198922',
                '-16.573378, -68.197757',
                '-16.569120, -68.193254',
                '-16.568917, -68.193449',
                '-16.567674, -68.192935',
                '-16.566340, -68.191589',
                '-16.570512, -68.185956',
                '-16.573790, -68.185730',
                '-16.573654, -68.184705',
                '-16.573166, -68.184678',
                '-16.570049, -68.183362',
                '-16.567057, -68.180530',
                '-16.564388, -68.179359',
                '-16.561642, -68.180636',
                '-16.555632, -68.176038',
                '-16.555663, -68.176459',
                '-16.554491, -68.179798',
                '-16.516219, -68.167047',
                '-16.516219, -68.173822',
                '-16.554913, -68.209661',
                '-16.555040, -68.209607',
                '-16.555085, -68.209641'
            );
            $polygon['strokeColor'] = '#C0F';
            $polygon['fillColor'] = '#C0F';

            /// d2
            $marker = array();
            $marker['position'] = '-16.546778379915395, -68.1874496928711';
            $marker['infowindow_content'] = 'Distrito 2';
            $marker['icon'] = base_url() . 'assets/logos/d2.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 3) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.543593, -68.236846',
                '-16.529605, -68.238708',
                '-16.528901, -68.238146',
                '-16.528122, -68.237279',
                '-16.527711, -68.236038',
                '-16.526999, -68.232664',
                '-16.526094, -68.230978',
                '-16.525083, -68.229627',
                '-16.522124, -68.227711',
                '-16.520797, -68.224911',
                '-16.517330, -68.221292',
                '-16.514913, -68.218320',
                '-16.513082, -68.216765',
                '-16.513092, -68.216325',
                '-16.512578, -68.215584',
                '-16.512537, -68.215305',
                '-16.513223, -68.215364',
                '-16.513182, -68.213905',
                '-16.513532, -68.213883',
                '-16.514138, -68.212575',
                '-16.515003, -68.212607',
                '-16.515568, -68.191291',
                '-16.519469, -68.195018',
                '-16.521707, -68.192425',
                '-16.517322, -68.188342',
                '-16.517480, -68.183545',
                '-16.515814, -68.183352',
                '-16.516219, -68.173822',
                '-16.554913, -68.209661',
                '-16.550454, -68.220745',
                '-16.550125, -68.220573',
                '-16.543576, -68.236725',
                '-16.543593, -68.236846'
            );

            $polygon['strokeColor'] = '#FF9';
            $polygon['fillColor'] = '#FF9';
            /// d3
            $marker = array();
            $marker['position'] = '-16.536904979856914, -68.21388554492188';
            $marker['infowindow_content'] = 'Distrito 3!';
            $marker['icon'] = base_url() . 'assets/logos/d3.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 4) {

            $polygon = array();
            $polygon['points'] = array(
                '-16.543593, -68.236846',
                '-16.527921, -68.252698',
                '-16.528785, -68.256475',
                '-16.520473, -68.259971',
                '-16.516277, -68.256065',
                '-16.515906, -68.254821',
                '-16.512944, -68.251710',
                '-16.511956, -68.248148',
                '-16.509076, -68.247740',
                '-16.508233, -68.247504',
                '-16.505250, -68.243212',
                '-16.504962, -68.242011',
                '-16.502122, -68.238363',
                '-16.497020, -68.234586',
                '-16.493152, -68.229673',
                '-16.485724, -68.228407',
                '-16.491318, -68.201068',
                '-16.494178, -68.194494',
                '-16.495104, -68.192289',
                '-16.496301, -68.187845',
                '-16.498729, -68.188703',
                '-16.503275, -68.195538',
                '-16.502772, -68.199102',
                '-16.510487, -68.206839',
                '-16.510470, -68.212476',
                '-16.511286, -68.212514',
                '-16.511746, -68.213775',
                '-16.512083, -68.213782',
                '-16.512083, -68.214670',
                '-16.512537, -68.215305',
                '-16.512578, -68.215584',
                '-16.513092, -68.216325',
                '-16.513082, -68.216765',
                '-16.514913, -68.218320',
                '-16.517330, -68.221292',
                '-16.520797, -68.224911',
                '-16.522124, -68.227711',
                '-16.525083, -68.229627',
                '-16.526094, -68.230978',
                '-16.526999, -68.232664',
                '-16.527711, -68.236038',
                '-16.528122, -68.237279',
                '-16.528901, -68.238146',
                '-16.529605, -68.238708',
                '-16.543593, -68.236846',
            );
            $polygon['strokeColor'] = '#6F6';
            $polygon['fillColor'] = '#6F6';
            /// d4
            $marker = array();
            $marker['position'] = '-16.513865082179166, -68.23448491015625';
            $marker['infowindow_content'] = 'Distrito 4';
            $marker['icon'] = base_url() . 'assets/logos/d4.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 5) {

            $polygon = array();
            $polygon['points'] = array(
                '-16.494178, -68.194494',
                '-16.491318, -68.201068',
                '-16.485724, -68.228407',
                '-16.481556, -68.227478',
                '-16.480145, -68.226993',
                '-16.477964, -68.225502',
                '-16.475536, -68.223270',
                '-16.473375, -68.221328',
                '-16.474857, -68.219182',
                '-16.473242, -68.217583',
                '-16.470227, -68.216124',
                '-16.464486, -68.195811',
                '-16.460981, -68.188743',
                '-16.458176, -68.184536',
                '-16.443141, -68.167422',
                '-16.446932, -68.160498',
                '-16.446780, -68.159657',
                '-16.455051, -68.159666',
                '-16.457416, -68.163592',
                '-16.477298, -68.182959',
                '-16.486690, -68.192224',
                '-16.494178, -68.194494'
            );
            $polygon['strokeColor'] = '#408080';
            $polygon['fillColor'] = '#408080';
            /// d5
            $marker = array();
            $marker['position'] = '-16.478312423802752, -68.19774937548829';
            $marker['infowindow_content'] = 'Distrito 5';
            $marker['icon'] = base_url() . 'assets/logos/d5.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 6) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.455051, -68.159666',
                '-16.457416, -68.163592',
                '-16.486623, -68.192207',
                '-16.494178, -68.194494',
                '-16.495104, -68.192289',
                '-16.496301, -68.187845',
                '-16.498729, -68.188703',
                '-16.503275, -68.195538',
                '-16.502772, -68.199102',
                '-16.510487, -68.206839',
                '-16.510470, -68.212476',
                '-16.511286, -68.212514',
                '-16.511746, -68.213775',
                '-16.512083, -68.213782',
                '-16.512083, -68.214670',
                '-16.512537, -68.215305',
                '-16.513223, -68.215364',
                '-16.513182, -68.213905',
                '-16.513532, -68.213883',
                '-16.514138, -68.212575',
                '-16.515003, -68.212607',
                '-16.515568, -68.191291',
                '-16.519469, -68.195018',
                '-16.521707, -68.192425',
                '-16.517322, -68.188342',
                '-16.517480, -68.183545',
                '-16.515814, -68.183352',
                '-16.515896, -68.167114',
                '-16.512059, -68.165488',
                '-16.511699, -68.169544',
                '-16.511555, -68.169565',
                '-16.506423, -68.164821',
                '-16.504757, -68.163094',
                '-16.503543, -68.162697',
                '-16.501989, -68.162107',
                '-16.499654, -68.163577',
                '-16.497751, -68.163609',
                '-16.496589, -68.164671',
                '-16.496764, -68.164886',
                '-16.496321, -68.165197',
                '-16.495591, -68.166624',
                '-16.495282, -68.166838',
                '-16.495087, -68.167654',
                '-16.491455, -68.170540',
                '-16.490550, -68.171119',
                '-16.488266, -68.171001',
                '-16.487758, -68.170449',
                '-16.487017, -68.170481',
                '-16.487017, -68.170481',
                '-16.482057, -68.166985',
                '-16.480422, -68.167292',
                '-16.482507, -68.165524',
                '-16.482567, -68.164306',
                '-16.482308, -68.163512',
                '-16.479877, -68.163810',
                '-16.479444, -68.165001',
                '-16.478692, -68.165776',
                '-16.477091, -68.166670',
                '-16.476261, -68.166877',
                '-16.475966, -68.167373',
                '-16.473962, -68.168011',
                '-16.469813, -68.167970',
                '-16.457673, -68.162278',
                '-16.457292, -68.160474',
                '-16.455051, -68.159666'
            );



            $polygon['strokeColor'] = '#F00';
            $polygon['fillColor'] = '#F00';

            /// d6
            $marker = array();
            $marker['position'] = '-16.505306706037636, -68.17955326953125';
            $marker['infowindow_content'] = 'Distrito 6';
            $marker['icon'] = base_url() . 'assets/logos/d6.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 7) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.458262, -68.230947',
                '-16.459517, -68.232041',
                '-16.461971, -68.236640',
                '-16.464640, -68.239145',
                '-16.473828, -68.247509',
                '-16.474281, -68.246393',
                '-16.475042, -68.246650',
                '-16.476554, -68.243614',
                '-16.480238, -68.243571',
                '-16.482172, -68.243989',
                '-16.481040, -68.248860',
                '-16.481596, -68.249064',
                '-16.483756, -68.244751',
                '-16.484672, -68.244815',
                '-16.486534, -68.245512',
                '-16.490548, -68.247024',
                '-16.492039, -68.247163',
                '-16.492728, -68.247753',
                '-16.494076, -68.248301',
                '-16.496144, -68.249985',
                '-16.497841, -68.251637',
                '-16.498777, -68.252066',
                '-16.498125, -68.258233',
                '-16.495547, -68.266935',
                '-16.492902, -68.275576',
                '-16.494844, -68.276937',
                '-16.489592, -68.285366',
                '-16.490755, -68.286417',
                '-16.487513, -68.292052',
                '-16.482565, -68.288491',
                '-16.480250, -68.288341',
                '-16.480055, -68.288642',
                '-16.477628, -68.287610',
                '-16.474907, -68.290900',
                '-16.471831, -68.289290',
                '-16.470000, -68.288947',
                '-16.467346, -68.295573',
                '-16.431090, -68.266670',
                '-16.458262, -68.230947',
            );
            $polygon['strokeColor'] = '#FF9999';
            $polygon['fillColor'] = '#FF9999';

            /// d7
            $marker = array();
            $marker['position'] = '-16.472386345850005, -68.26675724902344';
            $marker['infowindow_content'] = 'Distrito 7';
            $marker['icon'] = base_url() . 'assets/logos/d7.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 8) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.573414, -68.184697',
                '-16.573805, -68.185684',
                '-16.570432, -68.185952',
                '-16.566170, -68.191566',
                '-16.567537, -68.193015',
                '-16.568874, -68.193540',
                '-16.569070, -68.193336',
                '-16.573074, -68.197529',
                '-16.573197, -68.197722',
                '-16.572514, -68.198776',
                '-16.572534, -68.198969',
                '-16.572323, -68.199275',
                '-16.571686, -68.198728',
                '-16.568940, -68.201458',
                '-16.561572, -68.193922',
                '-16.555194, -68.209756',
                '-16.570189, -68.223757',
                '-16.573456, -68.206174',
                '-16.582391, -68.214437',
                '-16.589087, -68.220380',
                '-16.602358, -68.232941',
                '-16.604044, -68.230527',
                '-16.599540, -68.226118',
                '-16.602460, -68.223897',
                '-16.597874, -68.218211',
                '-16.629578, -68.197583',
                '-16.642782, -68.183328',
                '-16.644349, -68.177992',
                '-16.646792, -68.175568',
                '-16.644137, -68.174020',
                '-16.644334, -68.172619',
                '-16.633432, -68.168268',
                '-16.633890, -68.157468',
                '-16.634116, -68.157011',
                '-16.634059, -68.156422',
                '-16.631234, -68.157218',
                '-16.618960, -68.163935',
                '-16.611972, -68.145521',
                '-16.606513, -68.153882',
                '-16.598288, -68.159160',
                '-16.594052, -68.167298',
                '-16.586772, -68.170388',
                '-16.585364, -68.172515',
                '-16.584057, -68.174100',
                '-16.581045, -68.175001',
                '-16.580479, -68.178767',
                '-16.579339, -68.180287',
                '-16.576393, -68.182140',
                '-16.574771, -68.184611',
                '-16.573414, -68.184697'
            );

            $polygon['strokeColor'] = '#F36';
            $polygon['fillColor'] = '#F36';

            /// d8

            $marker = array();
            $marker['position'] = '-16.6092981644936, -68.187793015625';
            $marker['infowindow_content'] = 'Distrito 8';
            $marker['icon'] = base_url() . 'assets/logos/d8.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 9) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.494844, -68.276937',
                '-16.489592, -68.285366',
                '-16.490755, -68.286417',
                '-16.487513, -68.292052',
                '-16.482565, -68.288491',
                '-16.480250, -68.288341',
                '-16.480055, -68.288642',
                '-16.477628, -68.287610',
                '-16.474907, -68.290900',
                '-16.471831, -68.289290',
                '-16.470000, -68.288947',
                '-16.467346, -68.295573',
                '-16.470721, -68.297617',
                '-16.468293, -68.301308',
                '-16.476894, -68.308545',
                '-16.475854, -68.307726',
                '-16.501444, -68.320197',
                '-16.512808, -68.307354',
                '-16.510968, -68.287677',
                '-16.494844, -68.276937'
            );
            $polygon['strokeColor'] = '#000';
            $polygon['fillColor'] = '#000';

            /// d9

            $marker = array();
            $marker['position'] = '-16.499381454478936, -68.29902958789063';
            $marker['infowindow_content'] = 'Distrito 9';
            $marker['icon'] = base_url() . 'assets/logos/d9.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 10) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.602358, -68.232941',
                '-16.604044, -68.230527',
                '-16.599540, -68.226118',
                '-16.602460, -68.223897',
                '-16.597874, -68.218211',
                '-16.629578, -68.197583',
                '-16.642782, -68.183328',
                '-16.644349, -68.177992',
                '-16.646792, -68.175568',
                '-16.644137, -68.174020',
                '-16.644334, -68.172619',
                '-16.633432, -68.168268',
                '-16.633890, -68.157468',
                '-16.634116, -68.157011',
                '-16.634059, -68.156422',
                '-16.631234, -68.157218',
                '-16.618960, -68.163935',
                '-16.611972, -68.145521',
                '-16.621487, -68.126831',
                '-16.634275, -68.130908',
                '-16.634988, -68.108468',
                '-16.642719, -68.124561',
                '-16.655733, -68.137364',
                '-16.659207, -68.143522',
                '-16.662044, -68.151376',
                '-16.666544, -68.164764',
                '-16.665290, -68.165494',
                '-16.664653, -68.165858',
                '-16.664385, -68.166352',
                '-16.662350, -68.168605',
                '-16.659904, -68.171115',
                '-16.659184, -68.172639',
                '-16.656206, -68.179676',
                '-16.635836, -68.197776',
                '-16.626975, -68.205699',
                '-16.610020, -68.239843',
                '-16.602358, -68.232941'
            );
            $polygon['strokeColor'] = '#F93';
            $polygon['fillColor'] = '#F93';

            /// d10
            $marker = array();
            $marker['position'] = '-16.64943172675481, -68.14728093066407';
            $marker['infowindow_content'] = 'Distrito 10';
            $marker['icon'] = base_url() . 'assets/logos/d10.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 11) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.495547, -68.266935',
                '-16.492627, -68.275633',
                '-16.510968, -68.287677',
                '-16.519608, -68.291910',
                '-16.523805, -68.293927',
                '-16.527549, -68.291223',
                '-16.539474, -68.280803',
                '-16.520473, -68.259971',
                '-16.520473, -68.259971',
                '-16.516788, -68.264009',
                '-16.508352, -68.272281',
                '-16.506829, -68.266516',
                '-16.495547, -68.266935'
            );
            $polygon['strokeColor'] = '#0080C0';
            $polygon['fillColor'] = '#0080C0';

            /// d11
            $marker = array();
            $marker['position'] = '-16.52571451573992, -68.27774357714844';
            $marker['infowindow_content'] = 'Distrito 11';
            $marker['icon'] = base_url() . 'assets/logos/d11.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 12) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.555194, -68.209756',
                '-16.550454, -68.220745',
                '-16.550125, -68.220573',
                '-16.543576, -68.236725',
                '-16.551252, -68.245593',
                '-16.559531, -68.251338',
                '-16.560360, -68.259079',
                '-16.560638, -68.259251',
                '-16.565315, -68.246057',
                '-16.572083, -68.225466',
                '-16.555194, -68.209756'
            );
            $polygon['strokeColor'] = '#00F';
            $polygon['fillColor'] = '#00F';

            /// d12
            $marker = array();
            $marker['position'] = '-16.56454922606114, -68.23036503710938';
            $marker['infowindow_content'] = 'Distrito 12';
            $marker['icon'] = base_url() . 'assets/logos/d12.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 13) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.446932, -68.160498',
                '-16.443141, -68.167422',
                '-16.458176, -68.184536',
                '-16.460981, -68.188743',
                '-16.464486, -68.195811',
                '-16.464629, -68.195800',
                '-16.463302, -68.195950',
                '-16.462828, -68.196251',
                '-16.461203, -68.196830',
                '-16.462098, -68.197409',
                '-16.463929, -68.197978',
                '-16.462417, -68.199190',
                '-16.459783, -68.198176',
                '-16.459063, -68.199421',
                '-16.458466, -68.199034',
                '-16.457787, -68.201352',
                '-16.455306, -68.200822',
                '-16.454627, -68.202335',
                '-16.455254, -68.202475',
                '-16.455419, -68.204181',
                '-16.454946, -68.205951',
                '-16.453454, -68.207153',
                '-16.455131, -68.207560',
                '-16.454719, -68.209164',
                '-16.453608, -68.208542',
                '-16.453341, -68.209679',
                '-16.455008, -68.210001',
                '-16.454125, -68.214892',
                '-16.459619, -68.214424',
                '-16.461923, -68.213523',
                '-16.463899, -68.214167',
                '-16.463076, -68.215497',
                '-16.463981, -68.216162',
                '-16.460997, -68.220733',
                '-16.456994, -68.229438',
                '-16.458262, -68.230947',
                '-16.432422, -68.264346',
                '-16.393025, -68.242352',
                '-16.384132, -68.215401',
                '-16.332742, -68.203728',
                '-16.298969, -68.176949',
                '-16.282162, -68.160813',
                '-16.270957, -68.149998',
                '-16.263377, -68.151935',
                '-16.282656, -68.149360',
                '-16.291060, -68.152965',
                '-16.308360, -68.143647',
                '-16.322363, -68.136781',
                '-16.349050, -68.140042',
                '-16.368157, -68.158238',
                '-16.428874, -68.153074',
                '-16.433813, -68.159082',
                '-16.446932, -68.160498'
            );

            $polygon['strokeColor'] = '#030';
            $polygon['fillColor'] = '#030';

            /// d13
            $marker = array();
            $marker['position'] = '-16.40191799328029, -68.18847966113282';
            $marker['infowindow_content'] = 'Distrito 13';
            $marker['icon'] = base_url() . 'assets/logos/d13.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 14) {
            $polygon = array();
            $polygon['points'] = array(
                '-16.464629, -68.195800',
                '-16.463302, -68.195950',
                '-16.462828, -68.196251',
                '-16.461203, -68.196830',
                '-16.462098, -68.197409',
                '-16.463929, -68.197978',
                '-16.462417, -68.199190',
                '-16.459783, -68.198176',
                '-16.459063, -68.199421',
                '-16.458466, -68.199034',
                '-16.457787, -68.201352',
                '-16.455306, -68.200822',
                '-16.454627, -68.202335',
                '-16.455254, -68.202475',
                '-16.455419, -68.204181',
                '-16.454946, -68.205951',
                '-16.453454, -68.207153',
                '-16.455131, -68.207560',
                '-16.454719, -68.209164',
                '-16.453608, -68.208542',
                '-16.453341, -68.209679',
                '-16.455008, -68.210001',
                '-16.454125, -68.214892',
                '-16.459619, -68.214424',
                '-16.461923, -68.213523',
                '-16.463899, -68.214167',
                '-16.463076, -68.215497',
                '-16.463981, -68.216162',
                '-16.460997, -68.220733',
                '-16.456994, -68.229438',
                '-16.458262, -68.230947',
                '-16.459517, -68.232041',
                '-16.461971, -68.236640',
                '-16.464640, -68.239145',
                '-16.473828, -68.247509',
                '-16.474281, -68.246393',
                '-16.475042, -68.246650',
                '-16.476554, -68.243614',
                '-16.480238, -68.243571',
                '-16.482172, -68.243989',
                '-16.481040, -68.248860',
                '-16.481596, -68.249064',
                '-16.483756, -68.244751',
                '-16.484672, -68.244815',
                '-16.486534, -68.245512',
                '-16.490548, -68.247024',
                '-16.492039, -68.247163',
                '-16.492728, -68.247753',
                '-16.494076, -68.248301',
                '-16.496144, -68.249985',
                '-16.497841, -68.251637',
                '-16.498777, -68.252066',
                '-16.498125, -68.258233',
                '-16.495547, -68.266935',
                '-16.506829, -68.266516',
                '-16.508352, -68.272281',
                '-16.516788, -68.264009',
                '-16.520473, -68.259971',
                '-16.516277, -68.256065',
                '-16.515906, -68.254821',
                '-16.512944, -68.251710',
                '-16.511956, -68.248148',
                '-16.509076, -68.247740',
                '-16.508233, -68.247504',
                '-16.505250, -68.243212',
                '-16.504962, -68.242011',
                '-16.502122, -68.238363',
                '-16.497020, -68.234586',
                '-16.493152, -68.229673',
                '-16.485724, -68.228407',
                '-16.480189, -68.226969',
                '-16.477515, -68.225102',
                '-16.473276, -68.221326',
                '-16.474696, -68.219223',
                '-16.473163, -68.217576',
                '-16.470303, -68.216023',
                '-16.466812, -68.203026',
                '-16.464629, -68.195800'
            );
            $polygon['strokeColor'] = '#969';
            $polygon['fillColor'] = '#969';

            /// d14
            $marker = array();
            $marker['position'] = '-16.48555516175049, -68.23448491015625';
            $marker['infowindow_content'] = 'Distrito 14';
            $marker['icon'] = base_url() . 'assets/logos/d14.png';
            $this->googlemaps->add_marker($marker);
        } else if ($distrito == 15) {
            
        } else if ($distrito == 16) {
            $polygon = array();
            $polygon['points'] = array('-14.819241, -64.87909',
                '-14.815943, -64.873168',
                '-14.815486, -64.867117',
                '-14.82144, -64.866709',
                '-14.826481, -64.866473',
                '-14.826169, -64.87394',
                '-14.826294, -64.878425',
                '-14.82173, -64.879112'
            );
            $polygon['strokeColor'] = '#000099';
            $polygon['fillColor'] = '#000099';
        }







        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->intendencia_model->get_markers($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        if ($tipo_operativo == 2) {
            $tipo_icon = 'assets/logos/bares7.png';
        } else if ($tipo_operativo == 3) {
            $tipo_icon = 'assets/logos/bares7.png';
        } else {
            $tipo_icon = 'assets/logos/bares7.png';
        }
        if (!$markers) {
            
        } else {
            foreach ($markers as $info_marker) {
                $marker = array();
                $marker ['animation'] = 'DROP';
                $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
                $marker['icon'] = base_url() . $tipo_icon;

                $im = $info_marker->imagen_operativo;
                $im2 = substr("$im", -3);
                if ($im2 == '') {
                    $im = 'sin_imagen.jpg';
                    $ims = '<br/>   <img src="' . base_url() . 'assets/uploads/operativos/' . $im . '" width="150" >';
                } else if ($im2 == 'mp4') {
                    $im = $info_marker->imagen_operativo;
                    $datos = 'Aquí hay algo de texto!';
                    $nombre = 'mitexto.txt';

                    //     force_download($nombre, $datos);



                    $ims = '<br/> <video controls>   <source src="' . base_url() . 'assets/uploads/operativos/' . $im . '" type="video/mp4"> <video controls>';
                    //    $ims = '--> <strong>'.anchor('editor/downloads/'.$im, $im).'</strong>';
                } else {
                    $im = $info_marker->imagen_operativo;
                    $ims = '<br/>   <img src="' . base_url() . 'assets/uploads/operativos/' . $im . '" width="150" >';
                }
                $total = mysql_num_rows(mysql_query("SELECT * FROM decomiso where id_operativo = "
                                . $info_marker->id_operativo));
                if ($total == 0) {
                    $total = 0;
                }

                $obs = $info_marker->id_intervencion;
                if ($obs == 1) {
                    $intervencion = 'Clandestino';
                } else if ($obs == 2) {
                    $intervencion = 'Legal';
                } else {
                    $intervencion = 'Otros';
                }
                $id_entidad = $info_marker->id_entidad;
                $entid = $this->intendencia_model->entidad_nombre($id_entidad);
                foreach ($entid as $filas):
                    $entidad = $filas->nombre_entidad;
                endforeach;
                $marker ['infowindow_content'] = '<strong>Responsable: </strong>' . $info_marker->responsable .
                        ' <br/> <strong>Descripcion: </strong> ' . $info_marker->descripcion_operativo .
                        ' <br/> <strong>Cantidad Decomisos: </strong> ' . $total .
                        ' <br/> <strong>Encargado Decomisos: </strong> ' . $info_marker->encargado_decomisos .
                        ' <br/> <strong>Tipo Legalidad: </strong> ' . $intervencion .
                        ' <br/> <strong>Responsable: </strong> ' . $info_marker->responsable .
                        ' <br/> <strong>Propietario: </strong> ' . $info_marker->propietario .
                        $ims;
                $marker['id'] = $info_marker->id_operativo;
                $this->googlemaps->add_marker($marker);
                //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
                //si queremos que se pueda arrastrar el marker
                //$marker['draggable'] = TRUE;
                //si queremos darle una id, muy útil
            }
        }
        //creamos el mapa y lo asignamos a map que lo 
        //tendremos disponible en la vista mapa_view con el array data
        $data['datos'] = $this->intendencia_model->get_markers($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->library('highcharts');
        $op1 = $this->intendencia_model->op1($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op2 = $this->intendencia_model->op2($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op3 = $this->intendencia_model->op3($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op4 = $this->intendencia_model->op4($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op5 = $this->intendencia_model->op5($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op6 = $this->intendencia_model->op6($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op7 = $this->intendencia_model->op7($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op8 = $this->intendencia_model->op8($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op9 = $this->intendencia_model->op9($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op10 = $this->intendencia_model->op10($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op11 = $this->intendencia_model->op11($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op12 = $this->intendencia_model->op12($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);



        $serie['data'] = array(
            array('01:00 - 03:00', $op1),
            array('03:01 - 05:00 ', $op2),
            array('05:01 - 07:00  ', $op3),
            array('07:01 - 09:00  ', $op4),
            array('09:01 - 11:00  ', $op5),
            array('11:01 - 13:00  ', $op6),
            array('13:01 - 15:00  ', $op7),
            array('15:01 - 17:00   ', $op8),
            array('17:01 - 19:00  ', $op9),
            array('19:01 - 21:00   ', $op10),
            array('21:01 - 23:00    ', $op11),
            array('23:01 - 24:00    ', $op12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();

        $graph_data = $this->_data();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Operativos por dias', 'Por Semana'); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', 'Dias'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        //   $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';
        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);

        $this->highcharts->render_to('my_div'); // choose a specific div to render to graph

        $data['charts2'] = $this->highcharts->render();

        $data['operativos'] = $this->intendencia_model->get_markers($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $data['tipo_operativo'] = $this->intendencia_model->tipo_operativo_id($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/mapa_view', $data);
    }

    public function reporte_operativos_fecha() {
        //     $distrito = $this->input->post('DNI');
        /*   if ($distrito == 1) {
          $coor = '-16.528923612228628, -68.16049885668946';
          } else if ($distrito == 2) {
          $coor = '-16.546778379915395, -68.18693470874024';
          } else if ($distrito == 3) {
          $coor = '-16.535588488339208, -68.21302723803711';
          } else if ($distrito == 4) {
          $coor = '-16.51419424292476, -68.23465657153321';
          } else if ($distrito == 5) {
          $coor = '-16.478312423802752, -68.19689106860352';
          } else if ($distrito == 6) {
          $coor = '-16.5023441029502, -68.17869496264649';
          } else if ($distrito == 7) {
          $coor = '-16.472386345850005, -68.26624226489258';
          } else if ($distrito == 8) {
          $coor = '-16.60535014763866, -68.18727803149415';
          } else if ($distrito == 9) {
          $coor = '-16.49691254608991, -68.29885792651368';
          } else if ($distrito == 10) {
          $coor = '-16.64564900359328, -68.16873860278321';
          } else if ($distrito == 11) {
          $coor = '-16.519625314275768, -68.27911686816407';
          } else if ($distrito == 12) {
          $coor = '-16.559448502705656, -68.23293995776368';
          } else if ($distrito == 13) {
          $coor = '-16.398459776322508, -68.18830799975586';
          } else if ($distrito == 14) {
          $coor = '-16.48736580390754, -68.23654484667969';
          } else if ($distrito == 15) {
          $coor = '-16.464640, -68.239145';
          } else if ($distrito == 16) {
          $coor = '-14.826481, -64.866473';
          }
         */

        $data = array(
            "provincias" => $this->intendencia_model->getProvincias(),
            "tipo_operativo" => $this->intendencia_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = '-16.528923612228628, -68.16049885668946';
        $config['zoom'] = '14';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '100%';
        $config['map_height'] = '900px';



        //  $tipo_operativo = $this->input->post('id_tipo_operativo');
        //   $fecha_inicio = $this->input->post('fecha_inicio');
        //    $fecha_fin = $this->input->post('fecha_fin');
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);


        /// Distrito 1
        $polygon = array();
        $polygon['points'] = array(
            '-16.501989, -68.162107',
            '-16.503543, -68.162697',
            '-16.504757, -68.163094',
            '-16.506423, -68.164821',
            '-16.511555, -68.169565',
            '-16.511699, -68.169544',
            '-16.512059, -68.165488',
            '-16.516219, -68.167047',
            '-16.554491, -68.179798',
            '-16.555663, -68.176459',
            '-16.555632, -68.176038',
            '-16.555293, -68.174171',
            '-16.550099, -68.173763',
            '-16.550099, -68.174332',
            '-16.549019, -68.173581',
            '-16.546859, -68.173635',
            '-16.544833, -68.170802',
            '-16.546931, -68.170341',
            '-16.546962, -68.169687',
            '-16.547147, -68.168839',
            '-16.548875, -68.166275',
            '-16.546798, -68.163914',
            '-16.539833, -68.146444',
            '-16.536791, -68.145915',
            '-16.533640, -68.149483',
            '-16.532694, -68.148314',
            '-16.528662, -68.144763',
            '-16.524799, -68.147079',
            '-16.521347, -68.148466',
            '-16.520332, -68.149423',
            '-16.518224, -68.149901',
            '-16.517757, -68.150442',
            '-16.517911, -68.150801',
            '-16.517161, -68.150824',
            '-16.512577, -68.152993',
            '-16.512563, -68.152746',
            '-16.511652, -68.153140',
            '-16.511551, -68.152970',
            '-16.508697, -68.154584',
            '-16.507343, -68.155740',
            '-16.507825, -68.156198',
            '-16.502142, -68.161951',
            '-16.501989, -68.162107'
        );
        $polygon['strokeColor'] = '#0FF';
        $polygon['fillColor'] = '#0FF';
        /// Distrito 2
        $polygon2 = array();
        $polygon2['points'] = array('-16.555085, -68.209641',
            '-16.561555, -68.193920',
            '-16.568937, -68.201494',
            '-16.571640, -68.198757',
            '-16.572257, -68.199197',
            '-16.572499, -68.198998',
            '-16.572530, -68.198922',
            '-16.573378, -68.197757',
            '-16.569120, -68.193254',
            '-16.568917, -68.193449',
            '-16.567674, -68.192935',
            '-16.566340, -68.191589',
            '-16.570512, -68.185956',
            '-16.573790, -68.185730',
            '-16.573654, -68.184705',
            '-16.573166, -68.184678',
            '-16.570049, -68.183362',
            '-16.567057, -68.180530',
            '-16.564388, -68.179359',
            '-16.561642, -68.180636',
            '-16.555632, -68.176038',
            '-16.555663, -68.176459',
            '-16.554491, -68.179798',
            '-16.516219, -68.167047',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.555040, -68.209607',
            '-16.555085, -68.209641'
        );
        $polygon2['strokeColor'] = '#C0F';
        $polygon2['fillColor'] = '#C0F';

        // Distrito 3

        $polygon3 = array();
        $polygon3['points'] = array(
            '-16.543593, -68.236846',
            '-16.529605, -68.238708',
            '-16.528901, -68.238146',
            '-16.528122, -68.237279',
            '-16.527711, -68.236038',
            '-16.526999, -68.232664',
            '-16.526094, -68.230978',
            '-16.525083, -68.229627',
            '-16.522124, -68.227711',
            '-16.520797, -68.224911',
            '-16.517330, -68.221292',
            '-16.514913, -68.218320',
            '-16.513082, -68.216765',
            '-16.513092, -68.216325',
            '-16.512578, -68.215584',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.543593, -68.236846'
        );

        $polygon3['strokeColor'] = '#FF9';
        $polygon3['fillColor'] = '#FF9';

        /// Distrito 4
        $polygon4 = array();
        $polygon4['points'] = array(
            '-16.543593, -68.236846',
            '-16.527921, -68.252698',
            '-16.528785, -68.256475',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.491318, -68.201068',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.512578, -68.215584',
            '-16.513092, -68.216325',
            '-16.513082, -68.216765',
            '-16.514913, -68.218320',
            '-16.517330, -68.221292',
            '-16.520797, -68.224911',
            '-16.522124, -68.227711',
            '-16.525083, -68.229627',
            '-16.526094, -68.230978',
            '-16.526999, -68.232664',
            '-16.527711, -68.236038',
            '-16.528122, -68.237279',
            '-16.528901, -68.238146',
            '-16.529605, -68.238708',
            '-16.543593, -68.236846',
        );

        $polygon4['strokeColor'] = '#6F6';
        $polygon4['fillColor'] = '#6F6';

        /// Distrito 5
        $polygon5 = array();
        $polygon5['points'] = array(
            '-16.494178, -68.194494',
            '-16.491318, -68.201068',
            '-16.485724, -68.228407',
            '-16.481556, -68.227478',
            '-16.480145, -68.226993',
            '-16.477964, -68.225502',
            '-16.475536, -68.223270',
            '-16.473375, -68.221328',
            '-16.474857, -68.219182',
            '-16.473242, -68.217583',
            '-16.470227, -68.216124',
            '-16.464486, -68.195811',
            '-16.460981, -68.188743',
            '-16.458176, -68.184536',
            '-16.443141, -68.167422',
            '-16.446932, -68.160498',
            '-16.446780, -68.159657',
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.477298, -68.182959',
            '-16.486690, -68.192224',
            '-16.494178, -68.194494'
        );

        $polygon5['strokeColor'] = '#408080';
        $polygon5['fillColor'] = '#408080';

        /// Distrito 6
        $polygon6 = array();
        $polygon6['points'] = array(
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.486623, -68.192207',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.515896, -68.167114',
            '-16.512059, -68.165488',
            '-16.511699, -68.169544',
            '-16.511555, -68.169565',
            '-16.506423, -68.164821',
            '-16.504757, -68.163094',
            '-16.503543, -68.162697',
            '-16.501989, -68.162107',
            '-16.499654, -68.163577',
            '-16.497751, -68.163609',
            '-16.496589, -68.164671',
            '-16.496764, -68.164886',
            '-16.496321, -68.165197',
            '-16.495591, -68.166624',
            '-16.495282, -68.166838',
            '-16.495087, -68.167654',
            '-16.491455, -68.170540',
            '-16.490550, -68.171119',
            '-16.488266, -68.171001',
            '-16.487758, -68.170449',
            '-16.487017, -68.170481',
            '-16.487017, -68.170481',
            '-16.482057, -68.166985',
            '-16.480422, -68.167292',
            '-16.482507, -68.165524',
            '-16.482567, -68.164306',
            '-16.482308, -68.163512',
            '-16.479877, -68.163810',
            '-16.479444, -68.165001',
            '-16.478692, -68.165776',
            '-16.477091, -68.166670',
            '-16.476261, -68.166877',
            '-16.475966, -68.167373',
            '-16.473962, -68.168011',
            '-16.469813, -68.167970',
            '-16.457673, -68.162278',
            '-16.457292, -68.160474',
            '-16.455051, -68.159666'
        );

        $polygon6['strokeColor'] = '#F00';
        $polygon6['fillColor'] = '#F00';

        /// Distrito 7
        $polygon7 = array();
        $polygon7['points'] = array(
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.492902, -68.275576',
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.431090, -68.266670',
            '-16.458262, -68.230947',
        );

        $polygon7['strokeColor'] = '#FF9999';
        $polygon7['fillColor'] = '#FF9999';

        /// Distrito 8
        $polygon8 = array();
        $polygon8['points'] = array(
            '-16.573414, -68.184697',
            '-16.573805, -68.185684',
            '-16.570432, -68.185952',
            '-16.566170, -68.191566',
            '-16.567537, -68.193015',
            '-16.568874, -68.193540',
            '-16.569070, -68.193336',
            '-16.573074, -68.197529',
            '-16.573197, -68.197722',
            '-16.572514, -68.198776',
            '-16.572534, -68.198969',
            '-16.572323, -68.199275',
            '-16.571686, -68.198728',
            '-16.568940, -68.201458',
            '-16.561572, -68.193922',
            '-16.555194, -68.209756',
            '-16.570189, -68.223757',
            '-16.573456, -68.206174',
            '-16.582391, -68.214437',
            '-16.589087, -68.220380',
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.606513, -68.153882',
            '-16.598288, -68.159160',
            '-16.594052, -68.167298',
            '-16.586772, -68.170388',
            '-16.585364, -68.172515',
            '-16.584057, -68.174100',
            '-16.581045, -68.175001',
            '-16.580479, -68.178767',
            '-16.579339, -68.180287',
            '-16.576393, -68.182140',
            '-16.574771, -68.184611',
            '-16.573414, -68.184697'
        );

        $polygon8['strokeColor'] = '#F36';
        $polygon8['fillColor'] = '#F36';

        /// Distrito 9
        $polygon9 = array();
        $polygon9['points'] = array(
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.470721, -68.297617',
            '-16.468293, -68.301308',
            '-16.476894, -68.308545',
            '-16.475854, -68.307726',
            '-16.501444, -68.320197',
            '-16.512808, -68.307354',
            '-16.510968, -68.287677',
            '-16.494844, -68.276937'
        );
        $polygon9['strokeColor'] = '#000';
        $polygon9['fillColor'] = '#000';


        /// Distrito 10
        $polygon10 = array();
        $polygon10['points'] = array(
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.621487, -68.126831',
            '-16.634275, -68.130908',
            '-16.634988, -68.108468',
            '-16.642719, -68.124561',
            '-16.655733, -68.137364',
            '-16.659207, -68.143522',
            '-16.662044, -68.151376',
            '-16.666544, -68.164764',
            '-16.665290, -68.165494',
            '-16.664653, -68.165858',
            '-16.664385, -68.166352',
            '-16.662350, -68.168605',
            '-16.659904, -68.171115',
            '-16.659184, -68.172639',
            '-16.656206, -68.179676',
            '-16.635836, -68.197776',
            '-16.626975, -68.205699',
            '-16.610020, -68.239843',
            '-16.602358, -68.232941'
        );
        $polygon10['strokeColor'] = '#F93';
        $polygon10['fillColor'] = '#F93';


        /// Distrito 11
        $polygon11 = array();
        $polygon11['points'] = array(
            '-16.495547, -68.266935',
            '-16.492627, -68.275633',
            '-16.510968, -68.287677',
            '-16.519608, -68.291910',
            '-16.523805, -68.293927',
            '-16.527549, -68.291223',
            '-16.539474, -68.280803',
            '-16.520473, -68.259971',
            '-16.520473, -68.259971',
            '-16.516788, -68.264009',
            '-16.508352, -68.272281',
            '-16.506829, -68.266516',
            '-16.495547, -68.266935'
        );
        $polygon11['strokeColor'] = '#0080C0';
        $polygon11['fillColor'] = '#0080C0';

        /// Distrito 12
        $polygon12 = array();
        $polygon12['points'] = array(
            '-16.555194, -68.209756',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.551252, -68.245593',
            '-16.559531, -68.251338',
            '-16.560360, -68.259079',
            '-16.560638, -68.259251',
            '-16.565315, -68.246057',
            '-16.572083, -68.225466',
            '-16.555194, -68.209756'
        );
        $polygon12['strokeColor'] = '#00F';
        $polygon12['fillColor'] = '#00F';


        /// Distrito 13
        $polygon13 = array();
        $polygon13['points'] = array(
            '-16.446932, -68.160498',
            '-16.443141, -68.167422',
            '-16.458176, -68.184536',
            '-16.460981, -68.188743',
            '-16.464486, -68.195811',
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.432422, -68.264346',
            '-16.393025, -68.242352',
            '-16.384132, -68.215401',
            '-16.332742, -68.203728',
            '-16.298969, -68.176949',
            '-16.282162, -68.160813',
            '-16.270957, -68.149998',
            '-16.263377, -68.151935',
            '-16.282656, -68.149360',
            '-16.291060, -68.152965',
            '-16.308360, -68.143647',
            '-16.322363, -68.136781',
            '-16.349050, -68.140042',
            '-16.368157, -68.158238',
            '-16.428874, -68.153074',
            '-16.433813, -68.159082',
            '-16.446932, -68.160498'
        );

        $polygon13['strokeColor'] = '#030';
        $polygon13['fillColor'] = '#030';


        /// Distrito 14
        $polygon14 = array();
        $polygon14['points'] = array(
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.506829, -68.266516',
            '-16.508352, -68.272281',
            '-16.516788, -68.264009',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.480189, -68.226969',
            '-16.477515, -68.225102',
            '-16.473276, -68.221326',
            '-16.474696, -68.219223',
            '-16.473163, -68.217576',
            '-16.470303, -68.216023',
            '-16.466812, -68.203026',
            '-16.464629, -68.195800'
        );
        $polygon14['strokeColor'] = '#969';
        $polygon14['fillColor'] = '#969';
/// d1
        $marker = array();
        $marker['position'] = '-16.529764, -68.162098';
        $marker['infowindow_content'] = 'Distrito 1';
        $marker['icon'] = base_url() . 'assets/logos/d1.png';
        $this->googlemaps->add_marker($marker);
/// d2
        $marker = array();
        $marker['position'] = '-16.546778379915395, -68.1874496928711';
        $marker['infowindow_content'] = 'Distrito 2';
        $marker['icon'] = base_url() . 'assets/logos/d2.png';
        $this->googlemaps->add_marker($marker);
/// d3
        $marker = array();
        $marker['position'] = '-16.536904979856914, -68.21388554492188';
        $marker['infowindow_content'] = 'Distrito 3!';
        $marker['icon'] = base_url() . 'assets/logos/d3.png';
        $this->googlemaps->add_marker($marker);

/// d4
        $marker = array();
        $marker['position'] = '-16.513865082179166, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 4';
        $marker['icon'] = base_url() . 'assets/logos/d4.png';
        $this->googlemaps->add_marker($marker);

/// d5
        $marker = array();
        $marker['position'] = '-16.478312423802752, -68.19774937548829';
        $marker['infowindow_content'] = 'Distrito 5';
        $marker['icon'] = base_url() . 'assets/logos/d5.png';
        $this->googlemaps->add_marker($marker);
/// d6
        $marker = array();
        $marker['position'] = '-16.505306706037636, -68.17955326953125';
        $marker['infowindow_content'] = 'Distrito 6';
        $marker['icon'] = base_url() . 'assets/logos/d6.png';
        $this->googlemaps->add_marker($marker);
/// d7
        $marker = array();
        $marker['position'] = '-16.472386345850005, -68.26675724902344';
        $marker['infowindow_content'] = 'Distrito 7';
        $marker['icon'] = base_url() . 'assets/logos/d7.png';
        $this->googlemaps->add_marker($marker);
/// d8

        $marker = array();
        $marker['position'] = '-16.6092981644936, -68.187793015625';
        $marker['infowindow_content'] = 'Distrito 8';
        $marker['icon'] = base_url() . 'assets/logos/d8.png';
        $this->googlemaps->add_marker($marker);
/// d9

        $marker = array();
        $marker['position'] = '-16.499381454478936, -68.29902958789063';
        $marker['infowindow_content'] = 'Distrito 9';
        $marker['icon'] = base_url() . 'assets/logos/d9.png';
        $this->googlemaps->add_marker($marker);

/// d10
        $marker = array();
        $marker['position'] = '-16.64943172675481, -68.14728093066407';
        $marker['infowindow_content'] = 'Distrito 10';
        $marker['icon'] = base_url() . 'assets/logos/d10.png';
        $this->googlemaps->add_marker($marker);


/// d11
        $marker = array();
        $marker['position'] = '-16.52571451573992, -68.27774357714844';
        $marker['infowindow_content'] = 'Distrito 11';
        $marker['icon'] = base_url() . 'assets/logos/d11.png';
        $this->googlemaps->add_marker($marker);

/// d12
        $marker = array();
        $marker['position'] = '-16.56454922606114, -68.23036503710938';
        $marker['infowindow_content'] = 'Distrito 12';
        $marker['icon'] = base_url() . 'assets/logos/d12.png';
        $this->googlemaps->add_marker($marker);

/// d13
        $marker = array();
        $marker['position'] = '-16.40191799328029, -68.18847966113282';
        $marker['infowindow_content'] = 'Distrito 13';
        $marker['icon'] = base_url() . 'assets/logos/d13.png';
        $this->googlemaps->add_marker($marker);

/// d14
        $marker = array();
        $marker['position'] = '-16.48555516175049, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 14';
        $marker['icon'] = base_url() . 'assets/logos/d14.png';
        $this->googlemaps->add_marker($marker);



        $marker = array();
        $marker['position'] = '-16.49477280, -68.220752';
        // $marker['icon'] = base_url() . 'assets/logos/market2.png';
        //    $marker['draggable'] = true;
        //  $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';
        //   $marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        //  $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $this->googlemaps->add_polygon($polygon);
        $this->googlemaps->add_polygon($polygon2);
        $this->googlemaps->add_polygon($polygon3);
        $this->googlemaps->add_polygon($polygon4);
        $this->googlemaps->add_polygon($polygon5);
        $this->googlemaps->add_polygon($polygon6);
        $this->googlemaps->add_polygon($polygon7);
        $this->googlemaps->add_polygon($polygon8);
        $this->googlemaps->add_polygon($polygon9);
        $this->googlemaps->add_polygon($polygon10);
        $this->googlemaps->add_polygon($polygon11);
        $this->googlemaps->add_polygon($polygon12);
        $this->googlemaps->add_polygon($polygon13);
        $this->googlemaps->add_polygon($polygon14);

        if (isset($_GET['variable1'])) {
            $leyenda = $_GET['variable1'];
        } else {
            $leyenda = '0';
        }

        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');
//$leyenda = $this->input->post('DNI');
        // $data['map'] = $this->googlemaps->create_map();
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->intendencia_model->get_markers_general_fecha($leyenda, $fecha_inicio, $fecha_fin);

        //  $tipo_icon = 'assets/logos/bares.png';
        if (!$markers) {
            
        } else {
            foreach ($markers as $info_marker) {
                if ($info_marker->id_tipo_operativo == 2) {
                    $tipo_icon = 'assets/logos/bares7.png';
                } else if ($info_marker->id_tipo_operativo == 3) {
                    $tipo_icon = 'assets/logos/canchas.png';
                } else if ($info_marker->id_tipo_operativo == 4) {
                    $tipo_icon = 'assets/logos/colegios.png';
                } else if ($info_marker->id_tipo_operativo == 5) {
                    $tipo_icon = 'assets/logos/granja_avicola.png';
                } else if ($info_marker->id_tipo_operativo == 6) {
                    $tipo_icon = 'assets/logos/expendio_comidas.png';
                } else if ($info_marker->id_tipo_operativo == 7) {
                    $tipo_icon = 'assets/logos/mercados.png';
                } else if ($info_marker->id_tipo_operativo == 8) {
                    $tipo_icon = 'assets/logos/hotel.png';
                } else if ($info_marker->id_tipo_operativo == 9) {
                    $tipo_icon = 'assets/logos/mataderos.png';
                } else if ($info_marker->id_tipo_operativo == 10) {
                    $tipo_icon = 'assets/logos/horno.png';
                } else if ($info_marker->id_tipo_operativo == 11) {
                    $tipo_icon = 'assets/logos/asentamientos.png';
                } else if ($info_marker->id_tipo_operativo == 12) {
                    $tipo_icon = 'assets/logos/lenocinios.png';
                } else if ($info_marker->id_tipo_operativo == 13) {
                    $tipo_icon = 'assets/logos/puestos_ambulantes.png';
                } else if ($info_marker->id_tipo_operativo == 14) {
                    $tipo_icon = 'assets/logos/internet.png';
                } else if ($info_marker->id_tipo_operativo == 15) {
                    $tipo_icon = 'assets/logos/otros.png';
                } else {
                    $tipo_icon = 'assets/logos/market2.png';
                }






                $marker = array();
                $marker ['animation'] = 'DROP';
                $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
                $marker['icon'] = base_url() . $tipo_icon;

                $im = $info_marker->imagen_operativo;
                $im2 = substr("$im", -3);
                if ($im2 == '') {
                    $im = 'sin_imagen.jpg';
                    $ims = '<br/>   <img src="' . base_url() . 'assets/uploads/operativos/' . $im . '" width="150" >';
                } else if ($im2 == 'mp4') {
                    $im = $info_marker->imagen_operativo;
                    $datos = 'Aquí hay algo de texto!';
                    $nombre = 'mitexto.txt';

                    //     force_download($nombre, $datos);



                    $ims = '<br/> <video controls>   <source src="' . base_url() . 'assets/uploads/operativos/' . $im . '" type="video/mp4"> <video controls>';
                    //    $ims = '--> <strong>'.anchor('editor/downloads/'.$im, $im).'</strong>';
                } else {
                    $im = $info_marker->imagen_operativo;
                    $ims = '<br/>   <img src="' . base_url() . 'assets/uploads/operativos/' . $im . '" width="150" >';
                }
                $total = mysql_num_rows(mysql_query("SELECT * FROM decomiso where id_operativo = "
                                . $info_marker->id_operativo));
                if ($total == 0) {
                    $total = 0;
                }

                $obs = $info_marker->id_intervencion;
                if ($obs == 1) {
                    $intervencion = 'Clandestino';
                } else if ($obs == 2) {
                    $intervencion = 'Legal';
                } else {
                    $intervencion = 'Otros';
                }
                $marker ['infowindow_content'] = '<strong>Responsable: </strong>' . $info_marker->responsable .
                        ' <br/> <strong>Cantidad Decomisos: </strong> ' . $total .
                        ' <br/> <strong>Encargado Decomisos: </strong> ' . $info_marker->encargado_decomisos .
                        ' <br/> <strong>Tipo Operativo: </strong> ' . $info_marker->nombre_o .
                        ' <br/> <strong>Tipo Legalidad: </strong> ' . $intervencion .
                        ' <br/> <strong>Responsable: </strong> ' . $info_marker->responsable .
                        ' <br/> <strong>Propietario: </strong> ' . $info_marker->propietario .
                        $ims;
                $marker['id'] = $info_marker->id_operativo;
                $this->googlemaps->add_marker($marker);
                //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
                //si queremos que se pueda arrastrar el marker
                //$marker['draggable'] = TRUE;
                //si queremos darle una id, muy útil
            }
        }
        //creamos el mapa y lo asignamos a map que lo 
        //tendremos disponible en la vista mapa_view con el array data
        $data['datos'] = $this->intendencia_model->get_markers_general_fecha($leyenda, $fecha_inicio, $fecha_fin);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->library('highcharts');
        $op1 = $this->intendencia_model->tip_general_fecha_1($fecha_inicio, $fecha_fin);
        $op2 = $this->intendencia_model->tip_general_fecha_2($fecha_inicio, $fecha_fin);
        $op3 = $this->intendencia_model->tip_general_fecha_3($fecha_inicio, $fecha_fin);
        $op4 = $this->intendencia_model->tip_general_fecha_4($fecha_inicio, $fecha_fin);
        $op5 = $this->intendencia_model->tip_general_fecha_5($fecha_inicio, $fecha_fin);
        $op6 = $this->intendencia_model->tip_general_fecha_6($fecha_inicio, $fecha_fin);
        $op7 = $this->intendencia_model->tip_general_fecha_7($fecha_inicio, $fecha_fin);
        $op8 = $this->intendencia_model->tip_general_fecha_8($fecha_inicio, $fecha_fin);
        $op9 = $this->intendencia_model->tip_general_fecha_9($fecha_inicio, $fecha_fin);
        $op10 = $this->intendencia_model->tip_general_fecha_10($fecha_inicio, $fecha_fin);
        $op11 = $this->intendencia_model->tip_general_fecha_11($fecha_inicio, $fecha_fin);
        $op12 = $this->intendencia_model->tip_general_fecha_12($fecha_inicio, $fecha_fin);

        //$tipTotal = $this->intendencia_model->tipTotal_fecha();

        $serie['data'] = array(
            array('01:00 - 03:00', $op1),
            array('03:01 - 05:00 ', $op2),
            array('05:01 - 07:00  ', $op3),
            array('07:01 - 09:00  ', $op4),
            array('09:01 - 11:00  ', $op5),
            array('11:01 - 13:00  ', $op6),
            array('13:01 - 15:00  ', $op7),
            array('15:01 - 17:00   ', $op8),
            array('17:01 - 19:00  ', $op9),
            array('19:01 - 21:00   ', $op10),
            array('21:01 - 23:00    ', $op11),
            array('23:01 - 24:00    ', $op12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Horas ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);

        $data['charts'] = $this->highcharts->render();

        $graph_data = $this->_data3();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Operativos por dias', 'Por Semana'); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', 'Dias'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        //   $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';
        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);

        $this->highcharts->render_to('my_div'); // choose a specific div to render to graph

        $data['charts2'] = $this->highcharts->render();


        $tip1 = $this->intendencia_model->tip_fecha_1($fecha_inicio, $fecha_fin);
        $tip2 = $this->intendencia_model->tip_fecha_2($fecha_inicio, $fecha_fin);
        $tip3 = $this->intendencia_model->tip_fecha_3($fecha_inicio, $fecha_fin);
        $tip4 = $this->intendencia_model->tip_fecha_4($fecha_inicio, $fecha_fin);
        $tip5 = $this->intendencia_model->tip_fecha_5($fecha_inicio, $fecha_fin);
        $tip6 = $this->intendencia_model->tip_fecha_6($fecha_inicio, $fecha_fin);
        $tip7 = $this->intendencia_model->tip_fecha_7($fecha_inicio, $fecha_fin);
        $tip8 = $this->intendencia_model->tip_fecha_8($fecha_inicio, $fecha_fin);
        $tip9 = $this->intendencia_model->tip_fecha_9($fecha_inicio, $fecha_fin);
        $tip10 = $this->intendencia_model->tip_fecha_10($fecha_inicio, $fecha_fin);
        $tip11 = $this->intendencia_model->tip_fecha_11($fecha_inicio, $fecha_fin);
        $tip12 = $this->intendencia_model->tip_fecha_12($fecha_inicio, $fecha_fin);
        $tip13 = $this->intendencia_model->tip_fecha_13($fecha_inicio, $fecha_fin);
        $tip14 = $this->intendencia_model->tip_fecha_14($fecha_inicio, $fecha_fin);
        $tip15 = $this->intendencia_model->tip_fecha_15($fecha_inicio, $fecha_fin);

        $tipTotal = $this->observatorio_model->tipTotal_2();

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tip1),
            array('EXPENDIO DE COMIDAS ', $tip2),
            array('HIGIENE Y ALIMENTOS  ', $tip3),
            array('SUPERMERCADOS  ', $tip4),
            array('TIENDAS DE BARRIO  ', $tip5),
            array('VENDEDORES AMBULANTES  ', $tip6),
            //  array('COLEGIOS  ', round(($tip7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tip8),
            array('LENOCIDIOS ', $tip9),
            //   array('CANCHAS DEPORTIVAS   ', round(($tip10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tip11),
            //   array('FERIAS', round(($tip12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tip13),
            array('GUARDERIAS ', $tip14),
            array('HORNO PANIFICADORA', $tip15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por tipo  Operativos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);

        $data['charts'] = $this->highcharts->render();


        $tipd1 = $this->intendencia_model->tipd1($fecha_inicio, $fecha_fin);
        $tipd2 = $this->intendencia_model->tipd2($fecha_inicio, $fecha_fin);
        $tipd3 = $this->intendencia_model->tipd3($fecha_inicio, $fecha_fin);
        $tipd4 = $this->intendencia_model->tipd4($fecha_inicio, $fecha_fin);
        $tipd5 = $this->intendencia_model->tipd5($fecha_inicio, $fecha_fin);
        $tipd6 = $this->intendencia_model->tipd6($fecha_inicio, $fecha_fin);
        $tipd7 = $this->intendencia_model->tipd7($fecha_inicio, $fecha_fin);
        $tipd8 = $this->intendencia_model->tipd8($fecha_inicio, $fecha_fin);
        $tipd9 = $this->intendencia_model->tipd9($fecha_inicio, $fecha_fin);
        $tipd10 = $this->intendencia_model->tipd10($fecha_inicio, $fecha_fin);
        $tipd11 = $this->intendencia_model->tipd11($fecha_inicio, $fecha_fin);
        $tipd12 = $this->intendencia_model->tipd12($fecha_inicio, $fecha_fin);
        $tipd13 = $this->intendencia_model->tipd13($fecha_inicio, $fecha_fin);
        $tipd14 = $this->intendencia_model->tipd14($fecha_inicio, $fecha_fin);


        $tipTotal = $this->observatorio_model->tipTotal();

        $serie['data'] = array(
            array('DISTRITO 1', $tipd1),
            array('DISTRITO 2 ', $tipd2),
            array('DISTRITO 3  ', $tipd3),
            array('DISTRITO 4  ', $tipd4),
            array('DISTRITO 5  ', $tipd5),
            array('DISTRITO 6  ', $tipd6),
            array('DISTRITO 7  ', $tipd7),
            array('DISTRITO 8  ', $tipd8),
            array('DISTRITO 9 ', $tipd9),
            array('DISTRITO 10 ', $tipd10),
            array('DISTRITO 11', $tipd11),
            array('DISTRITO 12', $tipd12),
            array('DISTRITO 13', $tipd13),
            array('DISTRITO 14', $tipd14)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Distritos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();


        $tipdm1 = $this->intendencia_model->tipm1($fecha_inicio, $fecha_fin);
        $tipdm2 = $this->intendencia_model->tipm2($fecha_inicio, $fecha_fin);
        $tipdm3 = $this->intendencia_model->tipm3($fecha_inicio, $fecha_fin);
        $tipdm4 = $this->intendencia_model->tipm4($fecha_inicio, $fecha_fin);
        $tipdm5 = $this->intendencia_model->tipm5($fecha_inicio, $fecha_fin);
        $tipdm6 = $this->intendencia_model->tipm6($fecha_inicio, $fecha_fin);
        $tipdm7 = $this->intendencia_model->tipm7($fecha_inicio, $fecha_fin);
        $tipdm8 = $this->intendencia_model->tipm8($fecha_inicio, $fecha_fin);
        $tipdm9 = $this->intendencia_model->tipm9($fecha_inicio, $fecha_fin);
        $tipdm10 = $this->intendencia_model->tipm10($fecha_inicio, $fecha_fin);
        $tipdm11 = $this->intendencia_model->tipm11($fecha_inicio, $fecha_fin);
        $tipdm12 = $this->intendencia_model->tipm12($fecha_inicio, $fecha_fin);



        $tipTotal = $this->observatorio_model->tipTotal();

        $serie['data'] = array(
            array('ENERO', $tipdm1),
            array('FEBRERO ', $tipdm2),
            array('MARZO  ', $tipdm3),
            array('ABRIL  ', $tipdm4),
            array('MAYO ', $tipdm5),
            array('JUNIO ', $tipdm6),
            array('JULIO  ', $tipdm7),
            array('AGOSTO ', $tipdm8),
            array('SEPTIEMBRE ', $tipdm9),
            array('OCTUBRE', $tipdm10),
            array('NOVIEMBRE', $tipdm11),
            array('DICIEMBRE', $tipdm12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();

        $data['operativos'] = $this->intendencia_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_fecha', $data);
    }

    function _data3() {
        $tipo_operativo = $this->input->post('id_tipo_operativo');
        $distrito = $this->input->post('id_distrito');
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');
        $sem = $this->intendencia_model->lista_tipo_operativos_semana($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);

        foreach ($sem as $fecha)
            $dat = $fecha->fecha;

        // $sem->fecha;
        $l = $this->intendencia_model->lunes_g($fecha_inicio, $fecha_fin);
        $m = $this->intendencia_model->martes_g($fecha_inicio, $fecha_fin);
        $mi = $this->intendencia_model->miercoles_g($fecha_inicio, $fecha_fin);
        $j = $this->intendencia_model->jueves_g($fecha_inicio, $fecha_fin);
        $v = $this->intendencia_model->viernes_g($fecha_inicio, $fecha_fin);
        $s = $this->intendencia_model->sabado_g($fecha_inicio, $fecha_fin);
        $d = $this->intendencia_model->domingo_g($fecha_inicio, $fecha_fin);

        //echo $op1 = date('w', strtotime('2015-06-27'));
        //echo $sem1;



        $data['users']['data'] = array($l, $m, $mi, $j, $v, $s, $d);
        $data['users']['name'] = 'Dias de la Semana';
        // $data['popul']['data'] = array(1277528133, 1365524982, 420469703, 126804433, 250372925);
        // $data['popul']['name'] = 'World Population';
        $data['axis']['categories'] = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

        return $data;
    }

    public function entidades() {
        $data = array(
            "provincias" => $this->intendencia_model->getProvincias(),
            "provincias2" => $this->intendencia_model->tipo_operativo(),
            "tipo_operativo" => $this->intendencia_model->tipo_operativo(),
            "tipo_intervencion" => $this->intendencia_model->tipo_intervencion()
        );
        $this->load->library('googlemaps');
        $config = array();
        $config['center'] = '-16.475678633758676,-68.20015263476563';
        $config['zoom'] = '11';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '96%';
        $config['map_height'] = '600px';
        /*  $config['places'] = TRUE;
          $config['placesAutocompleteInputID'] = 'zona';
          $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased
          $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');'; */

        //
        //  $config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        $this->googlemaps->initialize($config);

        /// Distrito 1
        $polygon = array();
        $polygon['points'] = array(
            '-16.501989, -68.162107',
            '-16.503543, -68.162697',
            '-16.504757, -68.163094',
            '-16.506423, -68.164821',
            '-16.511555, -68.169565',
            '-16.511699, -68.169544',
            '-16.512059, -68.165488',
            '-16.516219, -68.167047',
            '-16.554491, -68.179798',
            '-16.555663, -68.176459',
            '-16.555632, -68.176038',
            '-16.555293, -68.174171',
            '-16.550099, -68.173763',
            '-16.550099, -68.174332',
            '-16.549019, -68.173581',
            '-16.546859, -68.173635',
            '-16.544833, -68.170802',
            '-16.546931, -68.170341',
            '-16.546962, -68.169687',
            '-16.547147, -68.168839',
            '-16.548875, -68.166275',
            '-16.546798, -68.163914',
            '-16.539833, -68.146444',
            '-16.536791, -68.145915',
            '-16.533640, -68.149483',
            '-16.532694, -68.148314',
            '-16.528662, -68.144763',
            '-16.524799, -68.147079',
            '-16.521347, -68.148466',
            '-16.520332, -68.149423',
            '-16.518224, -68.149901',
            '-16.517757, -68.150442',
            '-16.517911, -68.150801',
            '-16.517161, -68.150824',
            '-16.512577, -68.152993',
            '-16.512563, -68.152746',
            '-16.511652, -68.153140',
            '-16.511551, -68.152970',
            '-16.508697, -68.154584',
            '-16.507343, -68.155740',
            '-16.507825, -68.156198',
            '-16.502142, -68.161951',
            '-16.501989, -68.162107'
        );
        $polygon['strokeColor'] = '#0FF';
        $polygon['fillColor'] = '#0FF';
        /// Distrito 2
        $polygon2 = array();
        $polygon2['points'] = array('-16.555085, -68.209641',
            '-16.561555, -68.193920',
            '-16.568937, -68.201494',
            '-16.571640, -68.198757',
            '-16.572257, -68.199197',
            '-16.572499, -68.198998',
            '-16.572530, -68.198922',
            '-16.573378, -68.197757',
            '-16.569120, -68.193254',
            '-16.568917, -68.193449',
            '-16.567674, -68.192935',
            '-16.566340, -68.191589',
            '-16.570512, -68.185956',
            '-16.573790, -68.185730',
            '-16.573654, -68.184705',
            '-16.573166, -68.184678',
            '-16.570049, -68.183362',
            '-16.567057, -68.180530',
            '-16.564388, -68.179359',
            '-16.561642, -68.180636',
            '-16.555632, -68.176038',
            '-16.555663, -68.176459',
            '-16.554491, -68.179798',
            '-16.516219, -68.167047',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.555040, -68.209607',
            '-16.555085, -68.209641'
        );
        $polygon2['strokeColor'] = '#C0F';
        $polygon2['fillColor'] = '#C0F';

        // Distrito 3

        $polygon3 = array();
        $polygon3['points'] = array(
            '-16.543593, -68.236846',
            '-16.529605, -68.238708',
            '-16.528901, -68.238146',
            '-16.528122, -68.237279',
            '-16.527711, -68.236038',
            '-16.526999, -68.232664',
            '-16.526094, -68.230978',
            '-16.525083, -68.229627',
            '-16.522124, -68.227711',
            '-16.520797, -68.224911',
            '-16.517330, -68.221292',
            '-16.514913, -68.218320',
            '-16.513082, -68.216765',
            '-16.513092, -68.216325',
            '-16.512578, -68.215584',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.543593, -68.236846'
        );

        $polygon3['strokeColor'] = '#FF9';
        $polygon3['fillColor'] = '#FF9';

        /// Distrito 4
        $polygon4 = array();
        $polygon4['points'] = array(
            '-16.543593, -68.236846',
            '-16.527921, -68.252698',
            '-16.528785, -68.256475',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.491318, -68.201068',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.512578, -68.215584',
            '-16.513092, -68.216325',
            '-16.513082, -68.216765',
            '-16.514913, -68.218320',
            '-16.517330, -68.221292',
            '-16.520797, -68.224911',
            '-16.522124, -68.227711',
            '-16.525083, -68.229627',
            '-16.526094, -68.230978',
            '-16.526999, -68.232664',
            '-16.527711, -68.236038',
            '-16.528122, -68.237279',
            '-16.528901, -68.238146',
            '-16.529605, -68.238708',
            '-16.543593, -68.236846',
        );

        $polygon4['strokeColor'] = '#6F6';
        $polygon4['fillColor'] = '#6F6';

        /// Distrito 5
        $polygon5 = array();
        $polygon5['points'] = array(
            '-16.494178, -68.194494',
            '-16.491318, -68.201068',
            '-16.485724, -68.228407',
            '-16.481556, -68.227478',
            '-16.480145, -68.226993',
            '-16.477964, -68.225502',
            '-16.475536, -68.223270',
            '-16.473375, -68.221328',
            '-16.474857, -68.219182',
            '-16.473242, -68.217583',
            '-16.470227, -68.216124',
            '-16.464486, -68.195811',
            '-16.460981, -68.188743',
            '-16.458176, -68.184536',
            '-16.443141, -68.167422',
            '-16.446932, -68.160498',
            '-16.446780, -68.159657',
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.477298, -68.182959',
            '-16.486690, -68.192224',
            '-16.494178, -68.194494'
        );

        $polygon5['strokeColor'] = '#408080';
        $polygon5['fillColor'] = '#408080';

        /// Distrito 6
        $polygon6 = array();
        $polygon6['points'] = array(
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.486623, -68.192207',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.515896, -68.167114',
            '-16.512059, -68.165488',
            '-16.511699, -68.169544',
            '-16.511555, -68.169565',
            '-16.506423, -68.164821',
            '-16.504757, -68.163094',
            '-16.503543, -68.162697',
            '-16.501989, -68.162107',
            '-16.499654, -68.163577',
            '-16.497751, -68.163609',
            '-16.496589, -68.164671',
            '-16.496764, -68.164886',
            '-16.496321, -68.165197',
            '-16.495591, -68.166624',
            '-16.495282, -68.166838',
            '-16.495087, -68.167654',
            '-16.491455, -68.170540',
            '-16.490550, -68.171119',
            '-16.488266, -68.171001',
            '-16.487758, -68.170449',
            '-16.487017, -68.170481',
            '-16.487017, -68.170481',
            '-16.482057, -68.166985',
            '-16.480422, -68.167292',
            '-16.482507, -68.165524',
            '-16.482567, -68.164306',
            '-16.482308, -68.163512',
            '-16.479877, -68.163810',
            '-16.479444, -68.165001',
            '-16.478692, -68.165776',
            '-16.477091, -68.166670',
            '-16.476261, -68.166877',
            '-16.475966, -68.167373',
            '-16.473962, -68.168011',
            '-16.469813, -68.167970',
            '-16.457673, -68.162278',
            '-16.457292, -68.160474',
            '-16.455051, -68.159666'
        );

        $polygon6['strokeColor'] = '#F00';
        $polygon6['fillColor'] = '#F00';

        /// Distrito 7
        $polygon7 = array();
        $polygon7['points'] = array(
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.492902, -68.275576',
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.431090, -68.266670',
            '-16.458262, -68.230947',
        );

        $polygon7['strokeColor'] = '#FF9999';
        $polygon7['fillColor'] = '#FF9999';

        /// Distrito 8
        $polygon8 = array();
        $polygon8['points'] = array(
            '-16.573414, -68.184697',
            '-16.573805, -68.185684',
            '-16.570432, -68.185952',
            '-16.566170, -68.191566',
            '-16.567537, -68.193015',
            '-16.568874, -68.193540',
            '-16.569070, -68.193336',
            '-16.573074, -68.197529',
            '-16.573197, -68.197722',
            '-16.572514, -68.198776',
            '-16.572534, -68.198969',
            '-16.572323, -68.199275',
            '-16.571686, -68.198728',
            '-16.568940, -68.201458',
            '-16.561572, -68.193922',
            '-16.555194, -68.209756',
            '-16.570189, -68.223757',
            '-16.573456, -68.206174',
            '-16.582391, -68.214437',
            '-16.589087, -68.220380',
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.606513, -68.153882',
            '-16.598288, -68.159160',
            '-16.594052, -68.167298',
            '-16.586772, -68.170388',
            '-16.585364, -68.172515',
            '-16.584057, -68.174100',
            '-16.581045, -68.175001',
            '-16.580479, -68.178767',
            '-16.579339, -68.180287',
            '-16.576393, -68.182140',
            '-16.574771, -68.184611',
            '-16.573414, -68.184697'
        );

        $polygon8['strokeColor'] = '#F36';
        $polygon8['fillColor'] = '#F36';

        /// Distrito 9
        $polygon9 = array();
        $polygon9['points'] = array(
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.470721, -68.297617',
            '-16.468293, -68.301308',
            '-16.476894, -68.308545',
            '-16.475854, -68.307726',
            '-16.501444, -68.320197',
            '-16.512808, -68.307354',
            '-16.510968, -68.287677',
            '-16.494844, -68.276937'
        );
        $polygon9['strokeColor'] = '#000';
        $polygon9['fillColor'] = '#000';


        /// Distrito 10
        $polygon10 = array();
        $polygon10['points'] = array(
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.621487, -68.126831',
            '-16.634275, -68.130908',
            '-16.634988, -68.108468',
            '-16.642719, -68.124561',
            '-16.655733, -68.137364',
            '-16.659207, -68.143522',
            '-16.662044, -68.151376',
            '-16.666544, -68.164764',
            '-16.665290, -68.165494',
            '-16.664653, -68.165858',
            '-16.664385, -68.166352',
            '-16.662350, -68.168605',
            '-16.659904, -68.171115',
            '-16.659184, -68.172639',
            '-16.656206, -68.179676',
            '-16.635836, -68.197776',
            '-16.626975, -68.205699',
            '-16.610020, -68.239843',
            '-16.602358, -68.232941'
        );
        $polygon10['strokeColor'] = '#F93';
        $polygon10['fillColor'] = '#F93';


        /// Distrito 11
        $polygon11 = array();
        $polygon11['points'] = array(
            '-16.495547, -68.266935',
            '-16.492627, -68.275633',
            '-16.510968, -68.287677',
            '-16.519608, -68.291910',
            '-16.523805, -68.293927',
            '-16.527549, -68.291223',
            '-16.539474, -68.280803',
            '-16.520473, -68.259971',
            '-16.520473, -68.259971',
            '-16.516788, -68.264009',
            '-16.508352, -68.272281',
            '-16.506829, -68.266516',
            '-16.495547, -68.266935'
        );
        $polygon11['strokeColor'] = '#0080C0';
        $polygon11['fillColor'] = '#0080C0';

        /// Distrito 12
        $polygon12 = array();
        $polygon12['points'] = array(
            '-16.555194, -68.209756',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.551252, -68.245593',
            '-16.559531, -68.251338',
            '-16.560360, -68.259079',
            '-16.560638, -68.259251',
            '-16.565315, -68.246057',
            '-16.572083, -68.225466',
            '-16.555194, -68.209756'
        );
        $polygon12['strokeColor'] = '#00F';
        $polygon12['fillColor'] = '#00F';


        /// Distrito 13
        $polygon13 = array();
        $polygon13['points'] = array(
            '-16.446932, -68.160498',
            '-16.443141, -68.167422',
            '-16.458176, -68.184536',
            '-16.460981, -68.188743',
            '-16.464486, -68.195811',
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.432422, -68.264346',
            '-16.393025, -68.242352',
            '-16.384132, -68.215401',
            '-16.332742, -68.203728',
            '-16.298969, -68.176949',
            '-16.282162, -68.160813',
            '-16.270957, -68.149998',
            '-16.263377, -68.151935',
            '-16.282656, -68.149360',
            '-16.291060, -68.152965',
            '-16.308360, -68.143647',
            '-16.322363, -68.136781',
            '-16.349050, -68.140042',
            '-16.368157, -68.158238',
            '-16.428874, -68.153074',
            '-16.433813, -68.159082',
            '-16.446932, -68.160498'
        );

        $polygon13['strokeColor'] = '#030';
        $polygon13['fillColor'] = '#030';


        /// Distrito 14
        $polygon14 = array();
        $polygon14['points'] = array(
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.506829, -68.266516',
            '-16.508352, -68.272281',
            '-16.516788, -68.264009',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.480189, -68.226969',
            '-16.477515, -68.225102',
            '-16.473276, -68.221326',
            '-16.474696, -68.219223',
            '-16.473163, -68.217576',
            '-16.470303, -68.216023',
            '-16.466812, -68.203026',
            '-16.464629, -68.195800'
        );
        $polygon14['strokeColor'] = '#969';
        $polygon14['fillColor'] = '#969';
/// d1
        $marker = array();
        $marker['position'] = '-16.529764, -68.162098';
        $marker['infowindow_content'] = 'Distrito 1';
        $marker['icon'] = base_url() . 'assets/logos/d1.png';
        $this->googlemaps->add_marker($marker);
/// d2
        $marker = array();
        $marker['position'] = '-16.546778379915395, -68.1874496928711';
        $marker['infowindow_content'] = 'Distrito 2';
        $marker['icon'] = base_url() . 'assets/logos/d2.png';
        $this->googlemaps->add_marker($marker);
/// d3
        $marker = array();
        $marker['position'] = '-16.536904979856914, -68.21388554492188';
        $marker['infowindow_content'] = 'Distrito 3!';
        $marker['icon'] = base_url() . 'assets/logos/d3.png';
        $this->googlemaps->add_marker($marker);

/// d4
        $marker = array();
        $marker['position'] = '-16.513865082179166, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 4';
        $marker['icon'] = base_url() . 'assets/logos/d4.png';
        $this->googlemaps->add_marker($marker);

/// d5
        $marker = array();
        $marker['position'] = '-16.478312423802752, -68.19774937548829';
        $marker['infowindow_content'] = 'Distrito 5';
        $marker['icon'] = base_url() . 'assets/logos/d5.png';
        $this->googlemaps->add_marker($marker);
/// d6
        $marker = array();
        $marker['position'] = '-16.505306706037636, -68.17955326953125';
        $marker['infowindow_content'] = 'Distrito 6';
        $marker['icon'] = base_url() . 'assets/logos/d6.png';
        $this->googlemaps->add_marker($marker);
/// d7
        $marker = array();
        $marker['position'] = '-16.472386345850005, -68.26675724902344';
        $marker['infowindow_content'] = 'Distrito 7';
        $marker['icon'] = base_url() . 'assets/logos/d7.png';
        $this->googlemaps->add_marker($marker);
/// d8

        $marker = array();
        $marker['position'] = '-16.6092981644936, -68.187793015625';
        $marker['infowindow_content'] = 'Distrito 8';
        $marker['icon'] = base_url() . 'assets/logos/d8.png';
        $this->googlemaps->add_marker($marker);
/// d9

        $marker = array();
        $marker['position'] = '-16.499381454478936, -68.29902958789063';
        $marker['infowindow_content'] = 'Distrito 9';
        $marker['icon'] = base_url() . 'assets/logos/d9.png';
        $this->googlemaps->add_marker($marker);

/// d10
        $marker = array();
        $marker['position'] = '-16.64943172675481, -68.14728093066407';
        $marker['infowindow_content'] = 'Distrito 10';
        $marker['icon'] = base_url() . 'assets/logos/d10.png';
        $this->googlemaps->add_marker($marker);


/// d11
        $marker = array();
        $marker['position'] = '-16.52571451573992, -68.27774357714844';
        $marker['infowindow_content'] = 'Distrito 11';
        $marker['icon'] = base_url() . 'assets/logos/d11.png';
        $this->googlemaps->add_marker($marker);

/// d12
        $marker = array();
        $marker['position'] = '-16.56454922606114, -68.23036503710938';
        $marker['infowindow_content'] = 'Distrito 12';
        $marker['icon'] = base_url() . 'assets/logos/d12.png';
        $this->googlemaps->add_marker($marker);

/// d13
        $marker = array();
        $marker['position'] = '-16.40191799328029, -68.18847966113282';
        $marker['infowindow_content'] = 'Distrito 13';
        $marker['icon'] = base_url() . 'assets/logos/d13.png';
        $this->googlemaps->add_marker($marker);

/// d14
        $marker = array();
        $marker['position'] = '-16.48555516175049, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 14';
        $marker['icon'] = base_url() . 'assets/logos/d14.png';
        $this->googlemaps->add_marker($marker);



        //   $marker = array();
        //  $marker['position'] = '-16.49477280, -68.220752';
        // $marker['icon'] = base_url() . 'assets/logos/market2.png';
        //  $marker['draggable'] = true;
        //  $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';
        //   $marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        //  $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $this->googlemaps->add_polygon($polygon);
        $this->googlemaps->add_polygon($polygon2);
        $this->googlemaps->add_polygon($polygon3);
        $this->googlemaps->add_polygon($polygon4);
        $this->googlemaps->add_polygon($polygon5);
        $this->googlemaps->add_polygon($polygon6);
        $this->googlemaps->add_polygon($polygon7);
        $this->googlemaps->add_polygon($polygon8);
        $this->googlemaps->add_polygon($polygon9);
        $this->googlemaps->add_polygon($polygon10);
        $this->googlemaps->add_polygon($polygon11);
        $this->googlemaps->add_polygon($polygon12);
        $this->googlemaps->add_polygon($polygon13);
        $this->googlemaps->add_polygon($polygon14);


        $data['map'] = $this->googlemaps->create_map();

        $tipo_operativo = $this->input->post('provincias2');
        $entidad = $this->input->post('poblaciones2');
        // $fecha_fin = $this->input->post('fecha_fin');

        $markers = $this->intendencia_model->get_markers2($tipo_operativo, $entidad);


        if ($tipo_operativo == 2) {
            $tipo_icon = 'assets/logos/bares7.png';
        } else if ($tipo_operativo == 3) {
            $tipo_icon = 'assets/logos/canchas.png';
        } else if ($tipo_operativo == 4) {
            $tipo_icon = 'assets/logos/colegios.png';
        } else if ($tipo_operativo == 5) {
            $tipo_icon = 'assets/logos/embutidos.png';
        } else if ($tipo_operativo == 6) {
            $tipo_icon = 'assets/logos/expendio_comidas.png';
        } else if ($tipo_operativo == 7) {
            $tipo_icon = 'assets/logos/mercados.png';
        } else if ($tipo_operativo == 8) {
            $tipo_icon = 'assets/logos/granja_avicola.png';
        } else if ($tipo_operativo == 9) {
            $tipo_icon = 'assets/logos/guarderias.png';
        } else if ($tipo_operativo == 10) {
            $tipo_icon = 'assets/logos/horno.png';
        } else if ($tipo_operativo == 11) {
            $tipo_icon = 'assets/logos/lenocinios.png';
        } else if ($tipo_operativo == 13) {
            $tipo_icon = 'assets/logos/sanitarios.png';
        } else if ($tipo_operativo == 14) {
            $tipo_icon = 'assets/logos/supermercados.png';
        } else if ($tipo_operativo == 15) {
            $tipo_icon = 'assets/logos/puestos_ambulantes.png';
        } else if ($tipo_operativo == 16) {
            $tipo_icon = 'assets/logos/higiene.png';
        } else if ($tipo_operativo == 18) {
            $tipo_icon = 'assets/logos/tiendas_barrio.png';
        } else {
            $tipo_icon = 'assets/logos/market2.png';
        }

        if (!$markers) {
            
        } else {
            foreach ($markers as $info_marker) {
                $marker = array();
                $marker ['animation'] = 'DROP';
                $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
                $marker['icon'] = base_url() . $tipo_icon;

                $im = $info_marker->imagen_operativo;
                $im2 = substr("$im", -3);
                if ($im2 == '') {
                    $im = 'sin_imagen.jpg';
                    $ims = '<br/>   <img src="' . base_url() . 'assets/uploads/operativos/' . $im . '" width="150" >';
                } else if ($im2 == 'mp4') {
                    $im = $info_marker->imagen_operativo;
                    $datos = 'Aquí hay algo de texto!';
                    $nombre = 'mitexto.txt';

                    //     force_download($nombre, $datos);



                    $ims = '<br/> <video controls>   <source src="' . base_url() . 'assets/uploads/operativos/' . $im . '" type="video/mp4"> <video controls>';
                    //    $ims = '--> <strong>'.anchor('editor/downloads/'.$im, $im).'</strong>';
                } else {
                    $im = $info_marker->imagen_operativo;
                    $ims = '<br/>   <img src="' . base_url() . 'assets/uploads/operativos/' . $im . '" width="150" >';
                }
                $total = mysql_num_rows(mysql_query("SELECT * FROM decomiso where id_operativo = "
                                . $info_marker->id_operativo));
                if ($total == 0) {
                    $total = 0;
                }

                $obs = $info_marker->id_intervencion;
                if ($obs == 1) {
                    $intervencion = 'Clandestino';
                } else if ($obs == 2) {
                    $intervencion = 'Legal';
                } else {
                    $intervencion = 'Otros';
                }


                $marker ['infowindow_content'] = '<strong>Responsable: </strong>' . $info_marker->responsable .
                        ' <br/> <strong>Descripcion: </strong> ' . $info_marker->descripcion_operativo .
                        ' <br/> <strong>Cantidad Decomisos: </strong>  <a href=' . base_url() . 'entidades/' . $total . '>' . $total . ' </a> ' .
                        ' <br/> <strong>Encargado Decomisos: </strong> ' . $info_marker->encargado_decomisos .
                        ' <br/> <strong>Tipo Legalidad: </strong> ' . $intervencion .
                        ' <br/> <strong>Responsable: </strong> ' . $info_marker->responsable .
                        ' <br/> <strong>Nombre Entidad: </strong> ' . $info_marker->nombre_entidad .
                        ' <br/> <strong>Propietario: </strong> ' . $info_marker->propietario .
                        $ims;
                $marker['id'] = $info_marker->id_operativo;
                $this->googlemaps->add_marker($marker);
                //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
                //si queremos que se pueda arrastrar el marker
                //$marker['draggable'] = TRUE;
                //si queremos darle una id, muy útil
            }
        }

        //creamos el mapa y lo asignamos a map que lo 
        //tendremos disponible en la vista mapa_view con el array data
        $data['datos'] = $this->intendencia_model->get_markers2($tipo_operativo, $entidad);
        $data['decomisos'] = $this->intendencia_model->get_markers_decomisos($tipo_operativo);
        $data['map'] = $this->googlemaps->create_map();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/mapa_view_entidad', $data);
    }

    public function downloads($name) {

        $data = file_get_contents('assets/uploads/operativos/' . $name);
        force_download($name, $data);
    }

    public function reporte_felcc() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();



        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_felcc', $data);
    }

    public function reporte_transito() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_transito', $data);
    }

    public function reporte_felcv() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_felcv', $data);
    }

    public function reporte_diprove() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_diprove', $data);
    }

    public function reporte_camaras() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_camaras', $data);
    }

    public function reporte_salud() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_salud', $data);
    }

    public function reporte_educacion() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_educacion', $data);
    }

    public function reporte_obras() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto, Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_obras', $data);
    }

    public function reporte_modulos_policiales() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = 'El alto,Bolivia';
        $config['zoom'] = '13';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        $polygon = array();
        $polygon['points'] = array('-14.819241, -64.87909',
            '-14.815943, -64.873168',
            '-14.815486, -64.867117',
            '-14.82144, -64.866709',
            '-14.826481, -64.866473',
            '-14.826169, -64.87394',
            '-14.826294, -64.878425',
            '-14.82173, -64.879112'
        );
        $polygon['strokeColor'] = '#000099';
        $polygon['fillColor'] = '#000099';
        $this->googlemaps->add_polygon($polygon);
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            $marker ['animation'] = 'DROP';
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            $marker ['infowindow_content'] = $info_marker->descripcion_operativo;
            $marker['id'] = $info_marker->id_operativo;
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
        $this->load->library('highcharts');
        $operativos = $this->observatorio_model->lista_tipo_operativos();
        $this->observatorio_model->lista_tipo_operativos();
        foreach ($operativos as $info) {
            $serie['data'] = array(array($info->nombre_o, 20));
            //   $cantidad= $info->hota_ruta;
        }
        //    $operativos2 = $this->observatorio_model->lista_operativos();
        // $total = mysql_num_rows(mysql_query("SELECT * FROM planificacion_preparacion where id_semana = " . $id_semana_n));
        //      $total = $this->db->count_all_results($operativos2);
        //$serie['data'] = $this->observatorio_model->lista_tipo_operativos();
        /*   $serie['data'] = array(

          array($valor, 20)
          ); */
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;

        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_modulos_policiales', $data);
    }

    public function registro_operativos() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "provincias2" => $this->provincias_model->tipo_operativo(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo(),
            "operativo" => $this->provincias_model->operativo(),
            "tipo_intervencion" => $this->provincias_model->tipo_intervencion(),
            "estado_decomiso" => $this->provincias_model->estado_decomiso(),
            "id_decomiso_detalle" => $this->provincias_model->id_decomiso_detalle(),
            "id_medida" => $this->provincias_model->id_medida()
        );
        $this->load->library('googlemaps');
        $config = array();
        $config['center'] = '-16.475678633758676,-68.20015263476563';
        $config['zoom'] = '11';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        /*  $config['places'] = TRUE;
          $config['placesAutocompleteInputID'] = 'zona';
          $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased
          $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');'; */

        //
        //  $config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        $this->googlemaps->initialize($config);

        /// Distrito 1
        $polygon = array();
        $polygon['points'] = array(
            '-16.501989, -68.162107',
            '-16.503543, -68.162697',
            '-16.504757, -68.163094',
            '-16.506423, -68.164821',
            '-16.511555, -68.169565',
            '-16.511699, -68.169544',
            '-16.512059, -68.165488',
            '-16.516219, -68.167047',
            '-16.554491, -68.179798',
            '-16.555663, -68.176459',
            '-16.555632, -68.176038',
            '-16.555293, -68.174171',
            '-16.550099, -68.173763',
            '-16.550099, -68.174332',
            '-16.549019, -68.173581',
            '-16.546859, -68.173635',
            '-16.544833, -68.170802',
            '-16.546931, -68.170341',
            '-16.546962, -68.169687',
            '-16.547147, -68.168839',
            '-16.548875, -68.166275',
            '-16.546798, -68.163914',
            '-16.539833, -68.146444',
            '-16.536791, -68.145915',
            '-16.533640, -68.149483',
            '-16.532694, -68.148314',
            '-16.528662, -68.144763',
            '-16.524799, -68.147079',
            '-16.521347, -68.148466',
            '-16.520332, -68.149423',
            '-16.518224, -68.149901',
            '-16.517757, -68.150442',
            '-16.517911, -68.150801',
            '-16.517161, -68.150824',
            '-16.512577, -68.152993',
            '-16.512563, -68.152746',
            '-16.511652, -68.153140',
            '-16.511551, -68.152970',
            '-16.508697, -68.154584',
            '-16.507343, -68.155740',
            '-16.507825, -68.156198',
            '-16.502142, -68.161951',
            '-16.501989, -68.162107'
        );
        $polygon['strokeColor'] = '#0FF';
        $polygon['fillColor'] = '#0FF';
        /// Distrito 2
        $polygon2 = array();
        $polygon2['points'] = array('-16.555085, -68.209641',
            '-16.561555, -68.193920',
            '-16.568937, -68.201494',
            '-16.571640, -68.198757',
            '-16.572257, -68.199197',
            '-16.572499, -68.198998',
            '-16.572530, -68.198922',
            '-16.573378, -68.197757',
            '-16.569120, -68.193254',
            '-16.568917, -68.193449',
            '-16.567674, -68.192935',
            '-16.566340, -68.191589',
            '-16.570512, -68.185956',
            '-16.573790, -68.185730',
            '-16.573654, -68.184705',
            '-16.573166, -68.184678',
            '-16.570049, -68.183362',
            '-16.567057, -68.180530',
            '-16.564388, -68.179359',
            '-16.561642, -68.180636',
            '-16.555632, -68.176038',
            '-16.555663, -68.176459',
            '-16.554491, -68.179798',
            '-16.516219, -68.167047',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.555040, -68.209607',
            '-16.555085, -68.209641'
        );
        $polygon2['strokeColor'] = '#C0F';
        $polygon2['fillColor'] = '#C0F';

        // Distrito 3

        $polygon3 = array();
        $polygon3['points'] = array(
            '-16.543593, -68.236846',
            '-16.529605, -68.238708',
            '-16.528901, -68.238146',
            '-16.528122, -68.237279',
            '-16.527711, -68.236038',
            '-16.526999, -68.232664',
            '-16.526094, -68.230978',
            '-16.525083, -68.229627',
            '-16.522124, -68.227711',
            '-16.520797, -68.224911',
            '-16.517330, -68.221292',
            '-16.514913, -68.218320',
            '-16.513082, -68.216765',
            '-16.513092, -68.216325',
            '-16.512578, -68.215584',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.543593, -68.236846'
        );

        $polygon3['strokeColor'] = '#FF9';
        $polygon3['fillColor'] = '#FF9';

        /// Distrito 4
        $polygon4 = array();
        $polygon4['points'] = array(
            '-16.543593, -68.236846',
            '-16.527921, -68.252698',
            '-16.528785, -68.256475',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.491318, -68.201068',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.512578, -68.215584',
            '-16.513092, -68.216325',
            '-16.513082, -68.216765',
            '-16.514913, -68.218320',
            '-16.517330, -68.221292',
            '-16.520797, -68.224911',
            '-16.522124, -68.227711',
            '-16.525083, -68.229627',
            '-16.526094, -68.230978',
            '-16.526999, -68.232664',
            '-16.527711, -68.236038',
            '-16.528122, -68.237279',
            '-16.528901, -68.238146',
            '-16.529605, -68.238708',
            '-16.543593, -68.236846',
        );

        $polygon4['strokeColor'] = '#6F6';
        $polygon4['fillColor'] = '#6F6';

        /// Distrito 5
        $polygon5 = array();
        $polygon5['points'] = array(
            '-16.494178, -68.194494',
            '-16.491318, -68.201068',
            '-16.485724, -68.228407',
            '-16.481556, -68.227478',
            '-16.480145, -68.226993',
            '-16.477964, -68.225502',
            '-16.475536, -68.223270',
            '-16.473375, -68.221328',
            '-16.474857, -68.219182',
            '-16.473242, -68.217583',
            '-16.470227, -68.216124',
            '-16.464486, -68.195811',
            '-16.460981, -68.188743',
            '-16.458176, -68.184536',
            '-16.443141, -68.167422',
            '-16.446932, -68.160498',
            '-16.446780, -68.159657',
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.477298, -68.182959',
            '-16.486690, -68.192224',
            '-16.494178, -68.194494'
        );

        $polygon5['strokeColor'] = '#408080';
        $polygon5['fillColor'] = '#408080';

        /// Distrito 6
        $polygon6 = array();
        $polygon6['points'] = array(
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.486623, -68.192207',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.515896, -68.167114',
            '-16.512059, -68.165488',
            '-16.511699, -68.169544',
            '-16.511555, -68.169565',
            '-16.506423, -68.164821',
            '-16.504757, -68.163094',
            '-16.503543, -68.162697',
            '-16.501989, -68.162107',
            '-16.499654, -68.163577',
            '-16.497751, -68.163609',
            '-16.496589, -68.164671',
            '-16.496764, -68.164886',
            '-16.496321, -68.165197',
            '-16.495591, -68.166624',
            '-16.495282, -68.166838',
            '-16.495087, -68.167654',
            '-16.491455, -68.170540',
            '-16.490550, -68.171119',
            '-16.488266, -68.171001',
            '-16.487758, -68.170449',
            '-16.487017, -68.170481',
            '-16.487017, -68.170481',
            '-16.482057, -68.166985',
            '-16.480422, -68.167292',
            '-16.482507, -68.165524',
            '-16.482567, -68.164306',
            '-16.482308, -68.163512',
            '-16.479877, -68.163810',
            '-16.479444, -68.165001',
            '-16.478692, -68.165776',
            '-16.477091, -68.166670',
            '-16.476261, -68.166877',
            '-16.475966, -68.167373',
            '-16.473962, -68.168011',
            '-16.469813, -68.167970',
            '-16.457673, -68.162278',
            '-16.457292, -68.160474',
            '-16.455051, -68.159666'
        );

        $polygon6['strokeColor'] = '#F00';
        $polygon6['fillColor'] = '#F00';

        /// Distrito 7
        $polygon7 = array();
        $polygon7['points'] = array(
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.492902, -68.275576',
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.431090, -68.266670',
            '-16.458262, -68.230947',
        );

        $polygon7['strokeColor'] = '#FF9999';
        $polygon7['fillColor'] = '#FF9999';

        /// Distrito 8
        $polygon8 = array();
        $polygon8['points'] = array(
            '-16.573414, -68.184697',
            '-16.573805, -68.185684',
            '-16.570432, -68.185952',
            '-16.566170, -68.191566',
            '-16.567537, -68.193015',
            '-16.568874, -68.193540',
            '-16.569070, -68.193336',
            '-16.573074, -68.197529',
            '-16.573197, -68.197722',
            '-16.572514, -68.198776',
            '-16.572534, -68.198969',
            '-16.572323, -68.199275',
            '-16.571686, -68.198728',
            '-16.568940, -68.201458',
            '-16.561572, -68.193922',
            '-16.555194, -68.209756',
            '-16.570189, -68.223757',
            '-16.573456, -68.206174',
            '-16.582391, -68.214437',
            '-16.589087, -68.220380',
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.606513, -68.153882',
            '-16.598288, -68.159160',
            '-16.594052, -68.167298',
            '-16.586772, -68.170388',
            '-16.585364, -68.172515',
            '-16.584057, -68.174100',
            '-16.581045, -68.175001',
            '-16.580479, -68.178767',
            '-16.579339, -68.180287',
            '-16.576393, -68.182140',
            '-16.574771, -68.184611',
            '-16.573414, -68.184697'
        );

        $polygon8['strokeColor'] = '#F36';
        $polygon8['fillColor'] = '#F36';

        /// Distrito 9
        $polygon9 = array();
        $polygon9['points'] = array(
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.470721, -68.297617',
            '-16.468293, -68.301308',
            '-16.476894, -68.308545',
            '-16.475854, -68.307726',
            '-16.501444, -68.320197',
            '-16.512808, -68.307354',
            '-16.510968, -68.287677',
            '-16.494844, -68.276937'
        );
        $polygon9['strokeColor'] = '#000';
        $polygon9['fillColor'] = '#000';


        /// Distrito 10
        $polygon10 = array();
        $polygon10['points'] = array(
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.621487, -68.126831',
            '-16.634275, -68.130908',
            '-16.634988, -68.108468',
            '-16.642719, -68.124561',
            '-16.655733, -68.137364',
            '-16.659207, -68.143522',
            '-16.662044, -68.151376',
            '-16.666544, -68.164764',
            '-16.665290, -68.165494',
            '-16.664653, -68.165858',
            '-16.664385, -68.166352',
            '-16.662350, -68.168605',
            '-16.659904, -68.171115',
            '-16.659184, -68.172639',
            '-16.656206, -68.179676',
            '-16.635836, -68.197776',
            '-16.626975, -68.205699',
            '-16.610020, -68.239843',
            '-16.602358, -68.232941'
        );
        $polygon10['strokeColor'] = '#F93';
        $polygon10['fillColor'] = '#F93';


        /// Distrito 11
        $polygon11 = array();
        $polygon11['points'] = array(
            '-16.495547, -68.266935',
            '-16.492627, -68.275633',
            '-16.510968, -68.287677',
            '-16.519608, -68.291910',
            '-16.523805, -68.293927',
            '-16.527549, -68.291223',
            '-16.539474, -68.280803',
            '-16.520473, -68.259971',
            '-16.520473, -68.259971',
            '-16.516788, -68.264009',
            '-16.508352, -68.272281',
            '-16.506829, -68.266516',
            '-16.495547, -68.266935'
        );
        $polygon11['strokeColor'] = '#0080C0';
        $polygon11['fillColor'] = '#0080C0';

        /// Distrito 12
        $polygon12 = array();
        $polygon12['points'] = array(
            '-16.555194, -68.209756',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.551252, -68.245593',
            '-16.559531, -68.251338',
            '-16.560360, -68.259079',
            '-16.560638, -68.259251',
            '-16.565315, -68.246057',
            '-16.572083, -68.225466',
            '-16.555194, -68.209756'
        );
        $polygon12['strokeColor'] = '#00F';
        $polygon12['fillColor'] = '#00F';


        /// Distrito 13
        $polygon13 = array();
        $polygon13['points'] = array(
            '-16.446932, -68.160498',
            '-16.443141, -68.167422',
            '-16.458176, -68.184536',
            '-16.460981, -68.188743',
            '-16.464486, -68.195811',
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.432422, -68.264346',
            '-16.393025, -68.242352',
            '-16.384132, -68.215401',
            '-16.332742, -68.203728',
            '-16.298969, -68.176949',
            '-16.282162, -68.160813',
            '-16.270957, -68.149998',
            '-16.263377, -68.151935',
            '-16.282656, -68.149360',
            '-16.291060, -68.152965',
            '-16.308360, -68.143647',
            '-16.322363, -68.136781',
            '-16.349050, -68.140042',
            '-16.368157, -68.158238',
            '-16.428874, -68.153074',
            '-16.433813, -68.159082',
            '-16.446932, -68.160498'
        );

        $polygon13['strokeColor'] = '#030';
        $polygon13['fillColor'] = '#030';


        /// Distrito 14
        $polygon14 = array();
        $polygon14['points'] = array(
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.506829, -68.266516',
            '-16.508352, -68.272281',
            '-16.516788, -68.264009',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.480189, -68.226969',
            '-16.477515, -68.225102',
            '-16.473276, -68.221326',
            '-16.474696, -68.219223',
            '-16.473163, -68.217576',
            '-16.470303, -68.216023',
            '-16.466812, -68.203026',
            '-16.464629, -68.195800'
        );
        $polygon14['strokeColor'] = '#969';
        $polygon14['fillColor'] = '#969';
/// d1
        $marker = array();
        $marker['position'] = '-16.529764, -68.162098';
        $marker['infowindow_content'] = 'Distrito 1';
        $marker['icon'] = base_url() . 'assets/logos/d1.png';
        $this->googlemaps->add_marker($marker);
/// d2
        $marker = array();
        $marker['position'] = '-16.546778379915395, -68.1874496928711';
        $marker['infowindow_content'] = 'Distrito 2';
        $marker['icon'] = base_url() . 'assets/logos/d2.png';
        $this->googlemaps->add_marker($marker);
/// d3
        $marker = array();
        $marker['position'] = '-16.536904979856914, -68.21388554492188';
        $marker['infowindow_content'] = 'Distrito 3!';
        $marker['icon'] = base_url() . 'assets/logos/d3.png';
        $this->googlemaps->add_marker($marker);

/// d4
        $marker = array();
        $marker['position'] = '-16.513865082179166, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 4';
        $marker['icon'] = base_url() . 'assets/logos/d4.png';
        $this->googlemaps->add_marker($marker);

/// d5
        $marker = array();
        $marker['position'] = '-16.478312423802752, -68.19774937548829';
        $marker['infowindow_content'] = 'Distrito 5';
        $marker['icon'] = base_url() . 'assets/logos/d5.png';
        $this->googlemaps->add_marker($marker);
/// d6
        $marker = array();
        $marker['position'] = '-16.505306706037636, -68.17955326953125';
        $marker['infowindow_content'] = 'Distrito 6';
        $marker['icon'] = base_url() . 'assets/logos/d6.png';
        $this->googlemaps->add_marker($marker);
/// d7
        $marker = array();
        $marker['position'] = '-16.472386345850005, -68.26675724902344';
        $marker['infowindow_content'] = 'Distrito 7';
        $marker['icon'] = base_url() . 'assets/logos/d7.png';
        $this->googlemaps->add_marker($marker);
/// d8

        $marker = array();
        $marker['position'] = '-16.6092981644936, -68.187793015625';
        $marker['infowindow_content'] = 'Distrito 8';
        $marker['icon'] = base_url() . 'assets/logos/d8.png';
        $this->googlemaps->add_marker($marker);
/// d9

        $marker = array();
        $marker['position'] = '-16.499381454478936, -68.29902958789063';
        $marker['infowindow_content'] = 'Distrito 9';
        $marker['icon'] = base_url() . 'assets/logos/d9.png';
        $this->googlemaps->add_marker($marker);

/// d10
        $marker = array();
        $marker['position'] = '-16.64943172675481, -68.14728093066407';
        $marker['infowindow_content'] = 'Distrito 10';
        $marker['icon'] = base_url() . 'assets/logos/d10.png';
        $this->googlemaps->add_marker($marker);


/// d11
        $marker = array();
        $marker['position'] = '-16.52571451573992, -68.27774357714844';
        $marker['infowindow_content'] = 'Distrito 11';
        $marker['icon'] = base_url() . 'assets/logos/d11.png';
        $this->googlemaps->add_marker($marker);

/// d12
        $marker = array();
        $marker['position'] = '-16.56454922606114, -68.23036503710938';
        $marker['infowindow_content'] = 'Distrito 12';
        $marker['icon'] = base_url() . 'assets/logos/d12.png';
        $this->googlemaps->add_marker($marker);

/// d13
        $marker = array();
        $marker['position'] = '-16.40191799328029, -68.18847966113282';
        $marker['infowindow_content'] = 'Distrito 13';
        $marker['icon'] = base_url() . 'assets/logos/d13.png';
        $this->googlemaps->add_marker($marker);

/// d14
        $marker = array();
        $marker['position'] = '-16.48555516175049, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 14';
        $marker['icon'] = base_url() . 'assets/logos/d14.png';
        $this->googlemaps->add_marker($marker);



        $marker = array();
        $marker['position'] = '-16.49477280, -68.220752';
        // $marker['icon'] = base_url() . 'assets/logos/market2.png';


        $marker['draggable'] = true;
        $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';
        //   $marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        //  $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $this->googlemaps->add_polygon($polygon);
        $this->googlemaps->add_polygon($polygon2);
        $this->googlemaps->add_polygon($polygon3);
        $this->googlemaps->add_polygon($polygon4);
        $this->googlemaps->add_polygon($polygon5);
        $this->googlemaps->add_polygon($polygon6);
        $this->googlemaps->add_polygon($polygon7);
        $this->googlemaps->add_polygon($polygon8);
        $this->googlemaps->add_polygon($polygon9);
        $this->googlemaps->add_polygon($polygon10);
        $this->googlemaps->add_polygon($polygon11);
        $this->googlemaps->add_polygon($polygon12);
        $this->googlemaps->add_polygon($polygon13);
        $this->googlemaps->add_polygon($polygon14);


        $data['map'] = $this->googlemaps->create_map();


        $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('observatorio/registros_operativos', $data);
    }

    public function registros_operativos_colegios() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "provincias2" => $this->provincias_model->tipo_operativo_colegios(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo(),
            "operativo" => $this->provincias_model->operativo_colegio(),
            "tipo_intervencion" => $this->provincias_model->tipo_intervencion(),
            "estado_decomiso" => $this->provincias_model->estado_decomiso(),
            "id_decomiso_detalle" => $this->provincias_model->id_decomiso_detalle(),
            "distritos" => $this->provincias_model->distritos()
        );

        $data["solicitud_compra"] = $this->observatorio_model->lista_operativos_colegios();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('colegios/registros_operativos_colegios', $data);
    }

    public function guardar_operativos_colegios() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );

        /*   $id_zona = $this->input->post('provincias');
          $id_calle = $this->input->post('poblaciones');
          $ids = $this->observatorio_model->consiguiendo_id_distrito($id_zona);


          foreach ($ids as $id_distrito)
          $id_distrito;

          /* $zona = $this->observatorio_model->consiguiendo_parametros_zona($id_zona);
          foreach ($zona as $pos):
          $n1 = $pos->n1;
          $n2 = $pos->n2;
          $e1 = $pos->e1;
          $e2 = $pos->e2;
          endforeach; */

        /*      $calle = $this->observatorio_model->consiguiendo_parametros_calle($id_calle);
          foreach ($calle as $posc):
          /* $n3 = $posc->n3;
          $n4 = $posc->n4;
          $e3 = $posc->e3;
          $e4 = $posc->e4; */
        /*      $pos_x = $posc->cpos_x;
          $pos_y = $posc->cpos_y;
          endforeach;
         */

        //     $m1 = (($n2 - ($n1)) / ($e2 - ($e1)));
        //   $m2 = (($n4 - ($n3)) / ($e4 - ($e3)));
        //   $pos_x = (($n1 - ($n3) + ($m2 * ($e3)) - ($m1 * ($e1))) / ($m2 - ($m1)));
        //    $pos_y = ($m1 * $pos_x) - ($m1 * ($e1)) + $n1;
        //    $posx = $this->input->post('pos_x');
        //  $posy = $this->input->post('pos_y');
//$var = 1234.5678;
        // $number = (string) $posx;
        //  $format_number = str_replace('.', ',', $number);
        //   $format_number;
        //   $number2 = (string) $posy;
        //   $format_number2 = str_replace('.', ',', $number2);
        //   $format_number2;
        $date = strtotime($this->input->post('fecha'));
        $mes = date("m", $date);

        $guardar_operativos = array(
            'id_usuario' => $this->session->userdata('id_usuario'),
            'hoja_ruta' => $this->input->post('hoja_ruta'),
            'hora' => $this->input->post('hora'),
            'fecha' => $this->input->post('fecha'),
            'mes' => $mes,
            //    'id_calle' => $this->input->post('poblaciones'),
            'id_tipo_operativo' => $this->input->post('provincias2'),
            //   'id_intervencion' => $this->input->post('id_intervencion'),
            'id_entidad' => $this->input->post('poblaciones2'),
            //      'sitio_intervenido' => $this->input->post('sitio_intervenido'),
            //    'sub_distrito' => $this->input->post('postal'),
            'descripcion_operativo' => $this->input->post('descripcion_operativo'),
            'responsable' => $this->input->post('responsable'),
            // 'hojas' => $this->input->post('hojas'),
            //     'pos_x' => $this->input->post('pos_x'),
            //   'pos_x_p' => $format_number,
            // 'pos_y_p' => $format_number2,
            // 'pos_y' => $this->input->post('pos_y'),
            //     'id_zona' => $this->input->post('poblaciones'),
            // 'direccion_1' => $this->input->post('direccion_1'),
            //  'direccion_2' => $this->input->post('direccion_2'),
            //  'encargado' => $this->input->post('encargado'),
            //    'encargado_decomisos' => $this->input->post('encargado_decomisos'),
            ///      'propietario' => $this->input->post('propietario'),
            //           'nro_formulario' => $this->input->post('nro_formulario'),
            'nro_dia' => $fech = date('w', strtotime($this->input->post('fecha')))
        );

        $id_distrito = $this->input->post('provincias');

        $this->observatorio_model->guardar_operativos($guardar_operativos, $id_distrito);

        $this->session->set_flashdata('correcto', 'Registrado correctamente!');

        redirect(base_url() . 'editor/registros_operativos_colegios');
    }

    public function guardar_operativos() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );

        /*   $id_zona = $this->input->post('provincias');
          $id_calle = $this->input->post('poblaciones');
          $ids = $this->observatorio_model->consiguiendo_id_distrito($id_zona);


          foreach ($ids as $id_distrito)
          $id_distrito;

          /* $zona = $this->observatorio_model->consiguiendo_parametros_zona($id_zona);
          foreach ($zona as $pos):
          $n1 = $pos->n1;
          $n2 = $pos->n2;
          $e1 = $pos->e1;
          $e2 = $pos->e2;
          endforeach; */

        /*      $calle = $this->observatorio_model->consiguiendo_parametros_calle($id_calle);
          foreach ($calle as $posc):
          /* $n3 = $posc->n3;
          $n4 = $posc->n4;
          $e3 = $posc->e3;
          $e4 = $posc->e4; */
        /*      $pos_x = $posc->cpos_x;
          $pos_y = $posc->cpos_y;
          endforeach;
         */

        //     $m1 = (($n2 - ($n1)) / ($e2 - ($e1)));
        //   $m2 = (($n4 - ($n3)) / ($e4 - ($e3)));
        //   $pos_x = (($n1 - ($n3) + ($m2 * ($e3)) - ($m1 * ($e1))) / ($m2 - ($m1)));
        //    $pos_y = ($m1 * $pos_x) - ($m1 * ($e1)) + $n1;
        $posx = $this->input->post('pos_x');
        $posy = $this->input->post('pos_y');
//$var = 1234.5678;
        $number = (string) $posx;
        $format_number = str_replace('.', ',', $number);
        $format_number;

        $number2 = (string) $posy;
        $format_number2 = str_replace('.', ',', $number2);
        $format_number2;
        $date = strtotime($this->input->post('fecha'));
        $mes = date("m", $date);

        $guardar_operativos = array(
            'id_usuario' => $this->session->userdata('id_usuario'),
            'hoja_ruta' => $this->input->post('hoja_ruta'),
            'hora' => $this->input->post('hora'),
            'fecha' => $this->input->post('fecha'),
            'mes' => $mes,
            //    'id_zona' => $this->input->post('provincias'),
            //    'id_calle' => $this->input->post('poblaciones'),
            'id_tipo_operativo' => $this->input->post('provincias2'),
            'id_intervencion' => $this->input->post('id_intervencion'),
            'id_entidad' => $this->input->post('poblaciones2'),
            //      'sitio_intervenido' => $this->input->post('sitio_intervenido'),
            //    'sub_distrito' => $this->input->post('postal'),
            'descripcion_operativo' => $this->input->post('descripcion_operativo'),
            'responsable' => $this->input->post('responsable'),
            'hojas' => $this->input->post('hojas'),
            'pos_x' => $this->input->post('pos_x'),
            'pos_x_p' => $format_number,
            'pos_y_p' => $format_number2,
            'pos_y' => $this->input->post('pos_y'),
            'id_zona' => $this->input->post('poblaciones'),
            'direccion_1' => $this->input->post('direccion_1'),
            'direccion_2' => $this->input->post('direccion_2'),
            'encargado' => $this->input->post('encargado'),
            'encargado_decomisos' => $this->input->post('encargado_decomisos'),
            'propietario' => $this->input->post('propietario'),
            'nro_formulario' => $this->input->post('nro_formulario'),
            'almacen' => $this->input->post('almacen'),
            'nro_dia' => $fech = date('w', strtotime($this->input->post('fecha')))
        );

        $id_distrito = $this->input->post('provincias');

        $this->observatorio_model->guardar_operativos($guardar_operativos, $id_distrito);

        $this->session->set_flashdata('correcto', 'Registrado correctamente!');

        redirect(base_url() . 'editor/registro_operativos');
    }

    public function guardar_decomisos() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );



        $guardar_decomisos = array(
            'id_usuario' => $this->session->userdata('id_usuario'),
            'id_operativo' => $this->input->post('DNI'),
            'id_estado_decomiso' => $this->input->post('id_estado_decomiso'),
            'cantidad' => $this->input->post('cantidad'),
            'id_decomiso_detalle' => $this->input->post('id_decomiso_detalle'),
            'observacion' => $this->input->post('observacion'),
            'id_medida' => $this->input->post('id_medida'),
            'marca' => $this->input->post('marca'),
            'serie_modelo' => $this->input->post('serie_modelo'),
        );

        // $id_distrito = $this->input->post('provincias');

        $this->observatorio_model->guardar_decomisos($guardar_decomisos);

        $this->session->set_flashdata('correcto', 'Registrado correctamente!');

        redirect(base_url() . 'editor/registro_operativos');
    }

    function borrar_operativo() {
        $id = $this->uri->segment(3);
        $delete = $this->observatorio_model->eliminar_operativo($id);
        $delete = $this->observatorio_model->eliminar_operativo_decomiso($id);
        redirect(base_url() . 'editor/registro_operativos');
    }

    function borrar_operativo_colegio() {
        $id = $this->uri->segment(3);
        $delete = $this->observatorio_model->eliminar_operativo($id);
        $delete = $this->observatorio_model->eliminar_operativo_decomiso($id);
        redirect(base_url() . 'editor/registros_operativos_colegios');
    }

    function aprobar_operativo() {
        $id = $this->uri->segment(3);
        $this->observatorio_model->aprobar_operativo($id);

        redirect(base_url() . 'editor/registro_operativos');
    }

    function aprobar_operativo_colegio() {
        $id = $this->uri->segment(3);
        $this->observatorio_model->aprobar_operativo($id);

        redirect(base_url() . 'editor/registros_operativos_colegios');
    }

    public function mapas_ubicacion() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapas_ubicacion', $data);
    }

    public function lista_camaras() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapas_ubicacion_1', $data);
    }

    public function lista_ubicacion() {
        $this->load->library('googlemaps');
        //   $this->load->library('googlemaps');

        $config = array();
        $config['center'] = 'auto';


        $config['onboundschanged'] = 'if (!centreGot) {
	var mapCentre = map.getCenter();
	marker_0.setOptions({
		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
	});
}
centreGot = true;';
        /* $config['directions'] = TRUE;
          $config['directionsStart'] = '-16.506952577028812, -68.17869496264649';
          $config['directionsEnd'] = 'Bolivia, El alto, ceja';
          $config['directionsDivID'] = 'directionsDiv';
         */
        $config['trafficOverlay'] = TRUE;
        $this->googlemaps->initialize($config);

// set up the marker ready for positioning 
// once we know the users location
        $marker = array();
        $marker['draggable'] = true;
        $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();


        /*
          $config['center'] = 'auto';
          $config['zoom'] = 'auto';
          $config['directions'] = TRUE;
          $config['directionsStart'] = 'Bolivia, El alto, calle 1';
          $config['directionsEnd'] = 'Bolivia, El alto, ceja';
          $config['directionsDivID'] = 'directionsDiv';
          $this->googlemaps->initialize($config);
          $data['map'] = $this->googlemaps->create_map();

         */
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_ubicacion', $data);
    }

    public function lista_vias() {
        $this->load->library('googlemaps');
        //   $this->load->library('googlemaps');

        $config = array();
        $config = array();
        $config['center'] = '-16.475678633758676,-68.20015263476563';
        $config['zoom'] = '11';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';
        /*  $config['places'] = TRUE;
          $config['placesAutocompleteInputID'] = 'zona';
          $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased
          $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');'; */

        //
        //  $config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        $this->googlemaps->initialize($config);

        /// Distrito 1
        $polygon = array();
        $polygon['points'] = array(
            '-16.501989, -68.162107',
            '-16.503543, -68.162697',
            '-16.504757, -68.163094',
            '-16.506423, -68.164821',
            '-16.511555, -68.169565',
            '-16.511699, -68.169544',
            '-16.512059, -68.165488',
            '-16.516219, -68.167047',
            '-16.554491, -68.179798',
            '-16.555663, -68.176459',
            '-16.555632, -68.176038',
            '-16.555293, -68.174171',
            '-16.550099, -68.173763',
            '-16.550099, -68.174332',
            '-16.549019, -68.173581',
            '-16.546859, -68.173635',
            '-16.544833, -68.170802',
            '-16.546931, -68.170341',
            '-16.546962, -68.169687',
            '-16.547147, -68.168839',
            '-16.548875, -68.166275',
            '-16.546798, -68.163914',
            '-16.539833, -68.146444',
            '-16.536791, -68.145915',
            '-16.533640, -68.149483',
            '-16.532694, -68.148314',
            '-16.528662, -68.144763',
            '-16.524799, -68.147079',
            '-16.521347, -68.148466',
            '-16.520332, -68.149423',
            '-16.518224, -68.149901',
            '-16.517757, -68.150442',
            '-16.517911, -68.150801',
            '-16.517161, -68.150824',
            '-16.512577, -68.152993',
            '-16.512563, -68.152746',
            '-16.511652, -68.153140',
            '-16.511551, -68.152970',
            '-16.508697, -68.154584',
            '-16.507343, -68.155740',
            '-16.507825, -68.156198',
            '-16.502142, -68.161951',
            '-16.501989, -68.162107'
        );
        $polygon['strokeColor'] = '#0FF';
        $polygon['fillColor'] = '#0FF';
        /// Distrito 2
        $polygon2 = array();
        $polygon2['points'] = array('-16.555085, -68.209641',
            '-16.561555, -68.193920',
            '-16.568937, -68.201494',
            '-16.571640, -68.198757',
            '-16.572257, -68.199197',
            '-16.572499, -68.198998',
            '-16.572530, -68.198922',
            '-16.573378, -68.197757',
            '-16.569120, -68.193254',
            '-16.568917, -68.193449',
            '-16.567674, -68.192935',
            '-16.566340, -68.191589',
            '-16.570512, -68.185956',
            '-16.573790, -68.185730',
            '-16.573654, -68.184705',
            '-16.573166, -68.184678',
            '-16.570049, -68.183362',
            '-16.567057, -68.180530',
            '-16.564388, -68.179359',
            '-16.561642, -68.180636',
            '-16.555632, -68.176038',
            '-16.555663, -68.176459',
            '-16.554491, -68.179798',
            '-16.516219, -68.167047',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.555040, -68.209607',
            '-16.555085, -68.209641'
        );
        $polygon2['strokeColor'] = '#C0F';
        $polygon2['fillColor'] = '#C0F';

        // Distrito 3

        $polygon3 = array();
        $polygon3['points'] = array(
            '-16.543593, -68.236846',
            '-16.529605, -68.238708',
            '-16.528901, -68.238146',
            '-16.528122, -68.237279',
            '-16.527711, -68.236038',
            '-16.526999, -68.232664',
            '-16.526094, -68.230978',
            '-16.525083, -68.229627',
            '-16.522124, -68.227711',
            '-16.520797, -68.224911',
            '-16.517330, -68.221292',
            '-16.514913, -68.218320',
            '-16.513082, -68.216765',
            '-16.513092, -68.216325',
            '-16.512578, -68.215584',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.543593, -68.236846'
        );

        $polygon3['strokeColor'] = '#FF9';
        $polygon3['fillColor'] = '#FF9';

        /// Distrito 4
        $polygon4 = array();
        $polygon4['points'] = array(
            '-16.543593, -68.236846',
            '-16.527921, -68.252698',
            '-16.528785, -68.256475',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.491318, -68.201068',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.512578, -68.215584',
            '-16.513092, -68.216325',
            '-16.513082, -68.216765',
            '-16.514913, -68.218320',
            '-16.517330, -68.221292',
            '-16.520797, -68.224911',
            '-16.522124, -68.227711',
            '-16.525083, -68.229627',
            '-16.526094, -68.230978',
            '-16.526999, -68.232664',
            '-16.527711, -68.236038',
            '-16.528122, -68.237279',
            '-16.528901, -68.238146',
            '-16.529605, -68.238708',
            '-16.543593, -68.236846',
        );

        $polygon4['strokeColor'] = '#6F6';
        $polygon4['fillColor'] = '#6F6';

        /// Distrito 5
        $polygon5 = array();
        $polygon5['points'] = array(
            '-16.494178, -68.194494',
            '-16.491318, -68.201068',
            '-16.485724, -68.228407',
            '-16.481556, -68.227478',
            '-16.480145, -68.226993',
            '-16.477964, -68.225502',
            '-16.475536, -68.223270',
            '-16.473375, -68.221328',
            '-16.474857, -68.219182',
            '-16.473242, -68.217583',
            '-16.470227, -68.216124',
            '-16.464486, -68.195811',
            '-16.460981, -68.188743',
            '-16.458176, -68.184536',
            '-16.443141, -68.167422',
            '-16.446932, -68.160498',
            '-16.446780, -68.159657',
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.477298, -68.182959',
            '-16.486690, -68.192224',
            '-16.494178, -68.194494'
        );

        $polygon5['strokeColor'] = '#408080';
        $polygon5['fillColor'] = '#408080';

        /// Distrito 6
        $polygon6 = array();
        $polygon6['points'] = array(
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.486623, -68.192207',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.515896, -68.167114',
            '-16.512059, -68.165488',
            '-16.511699, -68.169544',
            '-16.511555, -68.169565',
            '-16.506423, -68.164821',
            '-16.504757, -68.163094',
            '-16.503543, -68.162697',
            '-16.501989, -68.162107',
            '-16.499654, -68.163577',
            '-16.497751, -68.163609',
            '-16.496589, -68.164671',
            '-16.496764, -68.164886',
            '-16.496321, -68.165197',
            '-16.495591, -68.166624',
            '-16.495282, -68.166838',
            '-16.495087, -68.167654',
            '-16.491455, -68.170540',
            '-16.490550, -68.171119',
            '-16.488266, -68.171001',
            '-16.487758, -68.170449',
            '-16.487017, -68.170481',
            '-16.487017, -68.170481',
            '-16.482057, -68.166985',
            '-16.480422, -68.167292',
            '-16.482507, -68.165524',
            '-16.482567, -68.164306',
            '-16.482308, -68.163512',
            '-16.479877, -68.163810',
            '-16.479444, -68.165001',
            '-16.478692, -68.165776',
            '-16.477091, -68.166670',
            '-16.476261, -68.166877',
            '-16.475966, -68.167373',
            '-16.473962, -68.168011',
            '-16.469813, -68.167970',
            '-16.457673, -68.162278',
            '-16.457292, -68.160474',
            '-16.455051, -68.159666'
        );

        $polygon6['strokeColor'] = '#F00';
        $polygon6['fillColor'] = '#F00';

        /// Distrito 7
        $polygon7 = array();
        $polygon7['points'] = array(
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.492902, -68.275576',
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.431090, -68.266670',
            '-16.458262, -68.230947',
        );

        $polygon7['strokeColor'] = '#FF9999';
        $polygon7['fillColor'] = '#FF9999';

        /// Distrito 8
        $polygon8 = array();
        $polygon8['points'] = array(
            '-16.573414, -68.184697',
            '-16.573805, -68.185684',
            '-16.570432, -68.185952',
            '-16.566170, -68.191566',
            '-16.567537, -68.193015',
            '-16.568874, -68.193540',
            '-16.569070, -68.193336',
            '-16.573074, -68.197529',
            '-16.573197, -68.197722',
            '-16.572514, -68.198776',
            '-16.572534, -68.198969',
            '-16.572323, -68.199275',
            '-16.571686, -68.198728',
            '-16.568940, -68.201458',
            '-16.561572, -68.193922',
            '-16.555194, -68.209756',
            '-16.570189, -68.223757',
            '-16.573456, -68.206174',
            '-16.582391, -68.214437',
            '-16.589087, -68.220380',
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.606513, -68.153882',
            '-16.598288, -68.159160',
            '-16.594052, -68.167298',
            '-16.586772, -68.170388',
            '-16.585364, -68.172515',
            '-16.584057, -68.174100',
            '-16.581045, -68.175001',
            '-16.580479, -68.178767',
            '-16.579339, -68.180287',
            '-16.576393, -68.182140',
            '-16.574771, -68.184611',
            '-16.573414, -68.184697'
        );

        $polygon8['strokeColor'] = '#F36';
        $polygon8['fillColor'] = '#F36';

        /// Distrito 9
        $polygon9 = array();
        $polygon9['points'] = array(
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.470721, -68.297617',
            '-16.468293, -68.301308',
            '-16.476894, -68.308545',
            '-16.475854, -68.307726',
            '-16.501444, -68.320197',
            '-16.512808, -68.307354',
            '-16.510968, -68.287677',
            '-16.494844, -68.276937'
        );
        $polygon9['strokeColor'] = '#000';
        $polygon9['fillColor'] = '#000';


        /// Distrito 10
        $polygon10 = array();
        $polygon10['points'] = array(
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.621487, -68.126831',
            '-16.634275, -68.130908',
            '-16.634988, -68.108468',
            '-16.642719, -68.124561',
            '-16.655733, -68.137364',
            '-16.659207, -68.143522',
            '-16.662044, -68.151376',
            '-16.666544, -68.164764',
            '-16.665290, -68.165494',
            '-16.664653, -68.165858',
            '-16.664385, -68.166352',
            '-16.662350, -68.168605',
            '-16.659904, -68.171115',
            '-16.659184, -68.172639',
            '-16.656206, -68.179676',
            '-16.635836, -68.197776',
            '-16.626975, -68.205699',
            '-16.610020, -68.239843',
            '-16.602358, -68.232941'
        );
        $polygon10['strokeColor'] = '#F93';
        $polygon10['fillColor'] = '#F93';


        /// Distrito 11
        $polygon11 = array();
        $polygon11['points'] = array(
            '-16.495547, -68.266935',
            '-16.492627, -68.275633',
            '-16.510968, -68.287677',
            '-16.519608, -68.291910',
            '-16.523805, -68.293927',
            '-16.527549, -68.291223',
            '-16.539474, -68.280803',
            '-16.520473, -68.259971',
            '-16.520473, -68.259971',
            '-16.516788, -68.264009',
            '-16.508352, -68.272281',
            '-16.506829, -68.266516',
            '-16.495547, -68.266935'
        );
        $polygon11['strokeColor'] = '#0080C0';
        $polygon11['fillColor'] = '#0080C0';

        /// Distrito 12
        $polygon12 = array();
        $polygon12['points'] = array(
            '-16.555194, -68.209756',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.551252, -68.245593',
            '-16.559531, -68.251338',
            '-16.560360, -68.259079',
            '-16.560638, -68.259251',
            '-16.565315, -68.246057',
            '-16.572083, -68.225466',
            '-16.555194, -68.209756'
        );
        $polygon12['strokeColor'] = '#00F';
        $polygon12['fillColor'] = '#00F';


        /// Distrito 13
        $polygon13 = array();
        $polygon13['points'] = array(
            '-16.446932, -68.160498',
            '-16.443141, -68.167422',
            '-16.458176, -68.184536',
            '-16.460981, -68.188743',
            '-16.464486, -68.195811',
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.432422, -68.264346',
            '-16.393025, -68.242352',
            '-16.384132, -68.215401',
            '-16.332742, -68.203728',
            '-16.298969, -68.176949',
            '-16.282162, -68.160813',
            '-16.270957, -68.149998',
            '-16.263377, -68.151935',
            '-16.282656, -68.149360',
            '-16.291060, -68.152965',
            '-16.308360, -68.143647',
            '-16.322363, -68.136781',
            '-16.349050, -68.140042',
            '-16.368157, -68.158238',
            '-16.428874, -68.153074',
            '-16.433813, -68.159082',
            '-16.446932, -68.160498'
        );

        $polygon13['strokeColor'] = '#030';
        $polygon13['fillColor'] = '#030';


        /// Distrito 14
        $polygon14 = array();
        $polygon14['points'] = array(
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.506829, -68.266516',
            '-16.508352, -68.272281',
            '-16.516788, -68.264009',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.480189, -68.226969',
            '-16.477515, -68.225102',
            '-16.473276, -68.221326',
            '-16.474696, -68.219223',
            '-16.473163, -68.217576',
            '-16.470303, -68.216023',
            '-16.466812, -68.203026',
            '-16.464629, -68.195800'
        );
        $polygon14['strokeColor'] = '#969';
        $polygon14['fillColor'] = '#969';
/// d1
        $marker = array();
        $marker['position'] = '-16.529764, -68.162098';
        $marker['infowindow_content'] = 'Distrito 1';
        $marker['icon'] = base_url() . 'assets/logos/d1.png';
        $this->googlemaps->add_marker($marker);
/// d2
        $marker = array();
        $marker['position'] = '-16.546778379915395, -68.1874496928711';
        $marker['infowindow_content'] = 'Distrito 2';
        $marker['icon'] = base_url() . 'assets/logos/d2.png';
        $this->googlemaps->add_marker($marker);
/// d3
        $marker = array();
        $marker['position'] = '-16.536904979856914, -68.21388554492188';
        $marker['infowindow_content'] = 'Distrito 3!';
        $marker['icon'] = base_url() . 'assets/logos/d3.png';
        $this->googlemaps->add_marker($marker);

/// d4
        $marker = array();
        $marker['position'] = '-16.513865082179166, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 4';
        $marker['icon'] = base_url() . 'assets/logos/d4.png';
        $this->googlemaps->add_marker($marker);

/// d5
        $marker = array();
        $marker['position'] = '-16.478312423802752, -68.19774937548829';
        $marker['infowindow_content'] = 'Distrito 5';
        $marker['icon'] = base_url() . 'assets/logos/d5.png';
        $this->googlemaps->add_marker($marker);
/// d6
        $marker = array();
        $marker['position'] = '-16.505306706037636, -68.17955326953125';
        $marker['infowindow_content'] = 'Distrito 6';
        $marker['icon'] = base_url() . 'assets/logos/d6.png';
        $this->googlemaps->add_marker($marker);
/// d7
        $marker = array();
        $marker['position'] = '-16.472386345850005, -68.26675724902344';
        $marker['infowindow_content'] = 'Distrito 7';
        $marker['icon'] = base_url() . 'assets/logos/d7.png';
        $this->googlemaps->add_marker($marker);
/// d8

        $marker = array();
        $marker['position'] = '-16.6092981644936, -68.187793015625';
        $marker['infowindow_content'] = 'Distrito 8';
        $marker['icon'] = base_url() . 'assets/logos/d8.png';
        $this->googlemaps->add_marker($marker);
/// d9

        $marker = array();
        $marker['position'] = '-16.499381454478936, -68.29902958789063';
        $marker['infowindow_content'] = 'Distrito 9';
        $marker['icon'] = base_url() . 'assets/logos/d9.png';
        $this->googlemaps->add_marker($marker);

/// d10
        $marker = array();
        $marker['position'] = '-16.64943172675481, -68.14728093066407';
        $marker['infowindow_content'] = 'Distrito 10';
        $marker['icon'] = base_url() . 'assets/logos/d10.png';
        $this->googlemaps->add_marker($marker);


/// d11
        $marker = array();
        $marker['position'] = '-16.52571451573992, -68.27774357714844';
        $marker['infowindow_content'] = 'Distrito 11';
        $marker['icon'] = base_url() . 'assets/logos/d11.png';
        $this->googlemaps->add_marker($marker);

/// d12
        $marker = array();
        $marker['position'] = '-16.56454922606114, -68.23036503710938';
        $marker['infowindow_content'] = 'Distrito 12';
        $marker['icon'] = base_url() . 'assets/logos/d12.png';
        $this->googlemaps->add_marker($marker);

/// d13
        $marker = array();
        $marker['position'] = '-16.40191799328029, -68.18847966113282';
        $marker['infowindow_content'] = 'Distrito 13';
        $marker['icon'] = base_url() . 'assets/logos/d13.png';
        $this->googlemaps->add_marker($marker);

/// d14
        $marker = array();
        $marker['position'] = '-16.48555516175049, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 14';
        $marker['icon'] = base_url() . 'assets/logos/d14.png';
        $this->googlemaps->add_marker($marker);



        $marker = array();
        $marker['position'] = '-16.49477280, -68.220752';
        // $marker['icon'] = base_url() . 'assets/logos/market2.png';


        $marker['draggable'] = true;
        $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';
        //   $marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        //  $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $this->googlemaps->add_polygon($polygon);
        $this->googlemaps->add_polygon($polygon2);
        $this->googlemaps->add_polygon($polygon3);
        $this->googlemaps->add_polygon($polygon4);
        $this->googlemaps->add_polygon($polygon5);
        $this->googlemaps->add_polygon($polygon6);
        $this->googlemaps->add_polygon($polygon7);
        $this->googlemaps->add_polygon($polygon8);
        $this->googlemaps->add_polygon($polygon9);
        $this->googlemaps->add_polygon($polygon10);
        $this->googlemaps->add_polygon($polygon11);
        $this->googlemaps->add_polygon($polygon12);
        $this->googlemaps->add_polygon($polygon13);
        $this->googlemaps->add_polygon($polygon14);


        $config['onboundschanged'] = 'if (!centreGot) {
	var mapCentre = map.getCenter();
	marker_0.setOptions({
		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
	});
}
centreGot = true;';
        /* $config['directions'] = TRUE;
          $config['directionsStart'] = '-16.506952577028812, -68.17869496264649';
          $config['directionsEnd'] = 'Bolivia, El alto, ceja';
          $config['directionsDivID'] = 'directionsDiv';
         */
        $config['trafficOverlay'] = TRUE;
        $this->googlemaps->initialize($config);

// set up the marker ready for positioning 
// once we know the users location
        $marker = array();
        $marker['draggable'] = true;
        $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();




        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_vias', $data);
    }

    public function busqueda_ubicacion_vias() {
        $this->load->library('googlemaps');
        //   $this->load->library('googlemaps');
        //  $direccion = $this->input->post('direccion');
        $pos_x = $this->input->post('pos_x');
        $pos_y = $this->input->post('pos_y');

        //  $config = array();
        //  $config['center'] = 'auto';
        //$this->load->library('googlemaps');
        //   $this->load->library('googlemaps');

        $config = array();
        //  $config['center'] = 'auto';
        // $config['center'] = '-16.509784, -68.159202';
        $config['center'] = $pos_y . ' , ' . $pos_x;
        $config['map_type'] = 'STREET';
        $config['streetViewPovHeading'] = 90;
        $this->googlemaps->initialize($config);
        $data['map'] = $this->googlemaps->create_map();

        //   $this->googlemaps->initialize($config);
        ///   $data['map'] = $this->googlemaps->create_map();



        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_vias_1', $data);
    }

    public function busqueda_ubicacion() {
        $this->load->library('googlemaps');
        //   $this->load->library('googlemaps');
        $direccion = $this->input->post('direccion');
        $pos_x = $this->input->post('pos_x');
        $pos_y = $this->input->post('pos_y');

        $config = array();
        $config['center'] = 'auto';



        $config['directions'] = TRUE;
        $config['directionsStart'] = $pos_y . ' , ' . $pos_x;
        $config['directionsEnd'] = 'Bolivia, El alto ' . $direccion;
        $config['directionsDivID'] = 'directionsDiv';
        $config['directionsMode'] = 'WALKING';
        $config['trafficOverlay'] = TRUE;
        $this->googlemaps->initialize($config);


        ///   $this->googlemaps->initialize($config);

        $data['map'] = $this->googlemaps->create_map();


        /*
          $config['center'] = 'auto';
          $config['zoom'] = 'auto';
          $config['directions'] = TRUE;
          $config['directionsStart'] = 'Bolivia, El alto, calle 1';
          $config['directionsEnd'] = 'Bolivia, El alto, ceja';
          $config['directionsDivID'] = 'directionsDiv';
          $this->googlemaps->initialize($config);
          $data['map'] = $this->googlemaps->create_map();

         */
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_ubicacion_busqueda', $data);
    }

    public function guardar_hoja() {
        $direccion = $this->input->post('direccion');
        $zona = $this->input->post('zona');
        $razon = $this->input->post('razon');
        $operativo = $this->input->post('operativo');
        $responsable = $this->input->post('responsable');
        $infowindow = '<strong>Razon: </strong>' . $razon . ' </br><strong>Operativo: </strong>' . $operativo . ' </br><strong>Responsable: </strong>' . $responsable;
        $ciudad = 'Bolivia, El alto';
        $direcc = $direccion;
        $address = urlencode($direcc);

        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;

        //  $url = "https://www.google.com/maps/d/edit?mid=zzcg5G7xqPik.kTqkrMQAMTPY&usp=sharing" . $address;
        $response = file_get_contents($url);
        $json = json_decode($response, true);

        $lat = $json['results'][0]['geometry']['location']['lat'];
        $lng = $json['results'][0]['geometry']['location']['lng'];

        $this->mapa_model->guardar_hoja($lat, $lng, $infowindow);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        redirect('mapa');
    }

    function getCoordinates($address) {
        $address = urlencode($address);
        //    $url = "https://www.google.com/maps/d/edit?mid=zzcg5G7xqPik.kTqkrMQAMTPY&usp=sharing" . $address;
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
        $response = file_get_contents($url);
        $json = json_decode($response, true);

        $data['lat'] = $lat = $json['results'][0]['geometry']['location']['lat'];
        $data['lng'] = $lng = $json['results'][0]['geometry']['location']['lng'];

        $this->load->view('header');
        $this->load->view('editor_view', $data);
        //return array($lat, $lng);
    }

    public function ver_pdf_operativos() {
        $tipo_operativo = $this->input->post('id_tipo_operativo');
        $distrito = $this->input->post('id_distrito');
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');

        $data["lista_pdf"] = $this->intendencia_model->busqueda_pdf_operativo($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('observatorio/ver_pdf_operativos', $data);
    }

    public function ver_informe_operativos() {
        $tipo_operativo = $this->input->post('id_tipo_operativo');
        $distrito = $this->input->post('id_distrito');
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');



        //  $this->_example_output($output);
        $this->load->library('highcharts');
        $op1 = $this->intendencia_model->op1($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op2 = $this->intendencia_model->op2($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op3 = $this->intendencia_model->op3($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op4 = $this->intendencia_model->op4($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op5 = $this->intendencia_model->op5($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op6 = $this->intendencia_model->op6($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op7 = $this->intendencia_model->op7($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op8 = $this->intendencia_model->op8($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op9 = $this->intendencia_model->op9($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op10 = $this->intendencia_model->op10($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op11 = $this->intendencia_model->op11($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $op12 = $this->intendencia_model->op12($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);



        $serie['data'] = array(
            array('01:00 - 03:00', $op1),
            array('03:01 - 05:00 ', $op2),
            array('05:01 - 07:00  ', $op3),
            array('07:01 - 09:00  ', $op4),
            array('09:01 - 11:00  ', $op5),
            array('11:01 - 13:00  ', $op6),
            array('13:01 - 15:00  ', $op7),
            array('15:01 - 17:00   ', $op8),
            array('17:01 - 19:00  ', $op9),
            array('19:01 - 21:00   ', $op10),
            array('21:01 - 23:00    ', $op11),
            array('23:01 - 24:00    ', $op12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Horas');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();

        $graph_data = $this->_data2();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Operativos por dias', 'Por Semana'); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', 'Dias'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        //   $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';
        @$credits->text = "O.M.S.C";
        $this->highcharts->set_credits($credits);

        $this->highcharts->render_to('my_div'); // choose a specific div to render to graph

        $data['charts'] = $this->highcharts->render();
        /*   $tip1 = $this->observatorio_model->tip1($distrito);
          $tip2 = $this->observatorio_model->tip2($distrito);
          $tip3 = $this->observatorio_model->tip3($distrito);
          $tip4 = $this->observatorio_model->tip4($distrito);
          $tip5 = $this->observatorio_model->tip5($distrito);
          $tip6 = $this->observatorio_model->tip6($distrito);
          $tip7 = $this->observatorio_model->tip7($distrito);
          $tip8 = $this->observatorio_model->tip8($distrito);
          $tip9 = $this->observatorio_model->tip9($distrito);
          $tip10 = $this->observatorio_model->tip10($distrito);
          $tip11 = $this->observatorio_model->tip11($distrito);
          $tip12 = $this->observatorio_model->tip12($distrito);
          $tip13 = $this->observatorio_model->tip13($distrito);
          $tip14 = $this->observatorio_model->tip14($distrito);
          $tip15 = $this->observatorio_model->tip15($distrito);

          $tipTotal = $this->observatorio_model->tipTotal($distrito);

          $serie['data'] = array(
          array('BARES Y CANTINAS', round(($tip1 / $tipTotal) * 100), 3),
          array('EXPENDIDO DE COMIDAS ', round(($tip2 / $tipTotal) * 100), 3),
          array('HIGIENE Y ALIMENTOS  ', round(($tip3 / $tipTotal) * 100), 3),
          array('SUPERMERCADOS  ', round(($tip4 / $tipTotal) * 100), 3),
          array('TIENDAS DE BARRIO  ', round(($tip5 / $tipTotal) * 100), 3),
          array('VENDEDORES AMBULANTES  ', round(($tip6 / $tipTotal) * 100), 3),
          array('COLEGIOS  ', round(($tip7 / $tipTotal) * 100), 3),
          array('SANITARIO  ', round(($tip8 / $tipTotal) * 100), 3),
          array('HIGIENE Y ALIMENTOS  ', round(($tip9 / $tipTotal) * 100), 3),
          array('CANCHAS DEPORTIVAS   ', round(($tip10 / $tipTotal) * 100), 3),
          array('EMBUTIDOS', round(($tip11 / $tipTotal) * 100), 3),
          array('FERIAS', round(($tip12 / $tipTotal) * 100), 3),
          array('GRANJA AVICOLA ', round(($tip13 / $tipTotal) * 100), 3),
          array('GUARDERIAS ', round(($tip14 / $tipTotal) * 100), 3),
          array('HORNO PANIFICADORA', round(($tip15 / $tipTotal) * 100), 3)
          );
          $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

          @$tool->formatter = $callback;
          @$plot->pie->dataLabels->formatter = $callback;
          $this->highcharts->set_title('Grafico de Operativos', 'Por tipo  Operativos ');
          $this->highcharts
          ->set_type('pie')
          ->set_serie($serie)
          ->set_tooltip($tool)
          ->set_plotOptions($plot);

          $data['charts'] = $this->highcharts->render(); */

        //$data['operativos'] = $this->mapa_model->get_markers($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $data['tipo_operativo'] = $this->intendencia_model->tipo_operativo_id($tipo_operativo);

        $data['operativos'] = $this->intendencia_model->get_markers($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $data["lista_pdf"] = $this->intendencia_model->busqueda_pdf_operativo($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('intendencia/ver_informe_operativos', $data);
    }

    function _data() {

        $data['users']['data'] = array(2, 1, 1, 1, 1, 1, 1);
        $data['users']['name'] = 'Dias de la Semana';
        // $data['popul']['data'] = array(1277528133, 1365524982, 420469703, 126804433, 250372925);
        // $data['popul']['name'] = 'World Population';
        $data['axis']['categories'] = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

        return $data;
    }

    function _data2() {
        $tipo_operativo = $this->input->post('id_tipo_operativo');
        $distrito = $this->input->post('id_distrito');
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');
        $sem = $this->intendencia_model->lista_tipo_operativos_semana($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin);

        foreach ($sem as $fecha)
            $dat = $fecha->fecha;

        // $sem->fecha;
        $l = $this->intendencia_model->lunes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat);
        $m = $this->intendencia_model->martes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat);
        $mi = $this->intendencia_model->miercoles($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat);
        $j = $this->intendencia_model->jueves($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat);
        $v = $this->intendencia_model->viernes($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat);
        $s = $this->intendencia_model->sabado($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat);
        $d = $this->intendencia_model->domingo($tipo_operativo, $distrito, $fecha_inicio, $fecha_fin, $dat);

        //echo $op1 = date('w', strtotime('2015-06-27'));
        //echo $sem1;



        $data['users']['data'] = array($l, $m, $mi, $j, $v, $s, $d);
        $data['users']['name'] = 'Dias de la Semana';
        // $data['popul']['data'] = array(1277528133, 1365524982, 420469703, 126804433, 250372925);
        // $data['popul']['name'] = 'World Population';
        $data['axis']['categories'] = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

        return $data;
    }

    public function distritos_transito() {
        $data = array(
            "provincias" => $this->provincias_model->getProvincias(),
            "tipo_operativo" => $this->provincias_model->tipo_operativo()
        );
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('transito/distritos_transito', $data);
    }

    public function distritos_ferias() {
        $data = array(
            "tipo_operativo" => $this->provincias_model->tipo_caso_monitoreo()
        );
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('ferias/distritos_ferias', $data);
    }

    public function distritos_canchas() {
        $data = array(
            "tipo_operativo" => $this->provincias_model->tipo_caso_monitoreo()
        );
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('cancha/distritos_cancha', $data);
    }

    public function distritos_colegios() {
        $data = array(
            "tipo_operativo" => $this->provincias_model->tipo_caso_monitoreo()
        );
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('colegios/distritos_colegios', $data);
    }

    public function distritos_1_colegios() {
        /*     $data = array(
          "m12_octubre" => $this->mapa_modulos_policiales_model->distrito_1_12_octubre(),
          "villaBolivar" => $this->mapa_modulos_policiales_model->distrito_1_villaBolivar(),
          "tejada_rectangular" => $this->mapa_modulos_policiales_model->distrito_1_tejada_rectangular(),
          "plan_45" => $this->mapa_modulos_policiales_model->distrito_1_plan_45(),
          "villa_exaltacion" => $this->mapa_modulos_policiales_model->distrito_1_villa_exaltacion(),
          "tejada_alpacoma" => $this->mapa_modulos_policiales_model->distrito_1_tejada_alpacoma(),
          "plan_405B" => $this->mapa_modulos_policiales_model->distrito_1_plan_405B()
          ); */
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('colegios/distrito_1', $data);
    }

    public function ver_informe_colegios() {



        //  $this->_example_output($output);
        $this->load->library('highcharts');



        $tipd1 = $this->colegios->tipd1();
        $tipd2 = $this->colegios->tipd2();
        $tipd3 = $this->colegios->tipd3();
        $tipd4 = $this->colegios->tipd4();
        $tipd5 = $this->colegios->tipd5();
        $tipd6 = $this->colegios->tipd6();
        $tipd7 = $this->colegios->tipd7();
        $tipd8 = $this->colegios->tipd8();
        $tipd9 = $this->colegios->tipd9();
        $tipd10 = $this->colegios->tipd10();
        $tipd11 = $this->colegios->tipd11();
        $tipd12 = $this->colegios->tipd12();
        $tipd13 = $this->colegios->tipd13();
        $tipd14 = $this->colegios->tipd14();


        $tipTotal = $this->colegios->total_colegios();

        $serie['data'] = array(
            //    array('DISTRITO 1', round(($tipd1 / $tipTotal) * 100), 3),
            array('DISTRITO 1', $tipd1),
            array('DISTRITO 2 ', $tipd2),
            array('DISTRITO 3  ', $tipd3),
            array('DISTRITO 4  ', $tipd4),
            array('DISTRITO 5  ', $tipd5),
            array('DISTRITO 6  ', $tipd6),
            array('DISTRITO 7  ', $tipd7),
            array('DISTRITO 8  ', $tipd8),
            array('DISTRITO 9 ', $tipd9),
            //     array('DISTRITO 10 ', $tipd10),
            array('DISTRITO 11', $tipd11),
            //     array('DISTRITO 12', $tipd12),
            //   array('DISTRITO 13', $tipd13),
            array('DISTRITO 14', $tipd14)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Operativos a Unidades Educativas', 'Por Distritos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $tipdm1 = $this->colegios->tipm1();
        $tipdm2 = $this->colegios->tipm2();
        $tipdm3 = $this->colegios->tipm3();
        $tipdm4 = $this->colegios->tipm4();
        $tipdm5 = $this->colegios->tipm5();
        $tipdm6 = $this->colegios->tipm6();
        $tipdm7 = $this->colegios->tipm7();
        $tipdm8 = $this->colegios->tipm8();
        $tipdm9 = $this->colegios->tipm9();
        $tipdm10 = $this->colegios->tipm10();
        $tipdm11 = $this->colegios->tipm11();
        $tipdm12 = $this->colegios->tipm12();



        $tipTotal = $this->colegios->total_colegios();

        $serie['data'] = array(
            /* array('ENERO', $tipdm1),
              array('FEBRERO ', $tipdm2),
              array('MARZO  ', $tipdm3),
              array('ABRIL  ', $tipdm4),
              array('MAYO ', $tipdm5),
              array('JUNIO ', $tipdm6),
              array('JULIO  ', $tipdm7), */
            array('AGOSTO ', $tipdm8),
            array('SEPTIEMBRE ', $tipdm9),
            array('OCTUBRE', $tipdm10),
            array('NOVIEMBRE', $tipdm11)
                //  array('DICIEMBRE', $tipdm12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Operativos a Unidades Educativas', 'Por Mes ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $graph_data = $this->_data4();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Operativos a Unidades Educativas', 'Por Dias'); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', 'Dias'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        //   $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';
        @$credits->text = "Article on Internet Wold Stats";
        //   $this->highcharts->set_credits($credits);

        $this->highcharts->render_to('my_div'); // choose a specific div to render to graph

        $data['charts2'] = $this->highcharts->render();

        $data['operativos'] = $this->colegios->get_markers_general_colegio();

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('colegios/ver_informe_colegios', $data);
    }

    public function ver_informe_canchas() {



        //  $this->_example_output($output);
        $this->load->library('highcharts');



        $tipd1 = $this->canchas->tipd1();
        $tipd2 = $this->canchas->tipd2();
        $tipd3 = $this->canchas->tipd3();
        $tipd4 = $this->canchas->tipd4();
        $tipd5 = $this->canchas->tipd5();
        $tipd6 = $this->canchas->tipd6();
        $tipd7 = $this->canchas->tipd7();
        $tipd8 = $this->canchas->tipd8();
        $tipd9 = $this->canchas->tipd9();
        $tipd10 = $this->canchas->tipd10();
        $tipd11 = $this->canchas->tipd11();
        $tipd12 = $this->canchas->tipd12();
        $tipd13 = $this->canchas->tipd13();
        $tipd14 = $this->canchas->tipd14();


        $tipTotal = $this->canchas->total_colegios();

        $serie['data'] = array(
            //    array('DISTRITO 1', round(($tipd1 / $tipTotal) * 100), 3),
            array('DISTRITO 1', $tipd1),
            // array('DISTRITO 2 ', $tipd2),
            array('DISTRITO 3  ', $tipd3),
            // array('DISTRITO 4  ', $tipd4),
            array('DISTRITO 5  ', $tipd5),
            array('DISTRITO 6  ', $tipd6),
            array('DISTRITO 7  ', $tipd7)
                // array('DISTRITO 8  ', $tipd8),
                // array('DISTRITO 9 ', $tipd9),
                // array('DISTRITO 10 ', $tipd10),
                //  array('DISTRITO 11', $tipd11),
                //  array('DISTRITO 12', $tipd12),
                //  array('DISTRITO 13', $tipd13),
                // array('DISTRITO 14', $tipd14)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Operativos de Canchas', 'Por Distritos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $tipdm1 = $this->canchas->tipm1();
        $tipdm2 = $this->canchas->tipm2();
        $tipdm3 = $this->canchas->tipm3();
        $tipdm4 = $this->canchas->tipm4();
        $tipdm5 = $this->canchas->tipm5();
        $tipdm6 = $this->canchas->tipm6();
        $tipdm7 = $this->canchas->tipm7();
        $tipdm8 = $this->canchas->tipm8();
        $tipdm9 = $this->canchas->tipm9();
        $tipdm10 = $this->canchas->tipm10();
        $tipdm11 = $this->canchas->tipm11();
        $tipdm12 = $this->canchas->tipm12();



        $tipTotal = $this->canchas->total_colegios();

        $serie['data'] = array(
            /*    array('ENERO', $tipdm1),
              array('FEBRERO ', $tipdm2),
              array('MARZO  ', $tipdm3),
              array('ABRIL  ', $tipdm4),
              array('MAYO ', $tipdm5),
              array('JUNIO ', $tipdm6),
              array('JULIO  ', $tipdm7),
              array('AGOSTO ', $tipdm8), */
            array('SEPTIEMBRE ', $tipdm9),
            array('OCTUBRE', $tipdm10),
            array('NOVIEMBRE', $tipdm11)
                //  array('DICIEMBRE', $tipdm12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Operativos de Canchas', 'Por Mes ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $graph_data = $this->_data_cancha();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Operativos de Canchas', 'Por Dias'); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', 'Dias'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        //   $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';
        @$credits->text = "Article on Internet Wold Stats";
        //   $this->highcharts->set_credits($credits);

        $this->highcharts->render_to('my_div'); // choose a specific div to render to graph

        $data['charts2'] = $this->highcharts->render();

        $data['operativos'] = $this->canchas->get_markers_general_colegio();

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('cancha/ver_informe_cancha', $data);
    }

    function _data_cancha() {

        $sem = $this->canchas->lista_tipo_operativos_semana();

        foreach ($sem as $fecha)
            $dat = $fecha->fecha;

        // $sem->fecha;
        $l = $this->canchas->lunes_g();
        $m = $this->canchas->martes_g();
        $mi = $this->canchas->miercoles_g();
        $j = $this->canchas->jueves_g();
        $v = $this->canchas->viernes_g();
        $s = $this->canchas->sabado_g();
        $d = $this->canchas->domingo_g();

        //echo $op1 = date('w', strtotime('2015-06-27'));
        //echo $sem1;



        $data['users']['data'] = array($l, $m, $mi, $j, $v, $s, $d);
        $data['users']['name'] = 'Dias de la Semana';
        // $data['popul']['data'] = array(1277528133, 1365524982, 420469703, 126804433, 250372925);
        // $data['popul']['name'] = 'World Population';
        $data['axis']['categories'] = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

        return $data;
    }

    public function ver_informe_ferias() {



        //  $this->_example_output($output);
        $this->load->library('highcharts');



        $tipd1 = $this->ferias->tipd1();
        $tipd2 = $this->ferias->tipd2();
        $tipd3 = $this->ferias->tipd3();
        $tipd4 = $this->ferias->tipd4();
        $tipd5 = $this->ferias->tipd5();
        $tipd6 = $this->ferias->tipd6();
        $tipd7 = $this->ferias->tipd7();
        $tipd8 = $this->ferias->tipd8();
        $tipd9 = $this->ferias->tipd9();
        $tipd10 = $this->ferias->tipd10();
        $tipd11 = $this->ferias->tipd11();
        $tipd12 = $this->ferias->tipd12();
        $tipd13 = $this->ferias->tipd13();
        $tipd14 = $this->ferias->tipd14();


        $tipTotal = $this->ferias->total_colegios();

        $serie['data'] = array(
            //    array('DISTRITO 1', round(($tipd1 / $tipTotal) * 100), 3),
            array('DISTRITO 1', $tipd1),
            array('DISTRITO 2 ', $tipd2),
            array('DISTRITO 3  ', $tipd3),
            array('DISTRITO 4  ', $tipd4),
            array('DISTRITO 5  ', $tipd5),
            array('DISTRITO 6  ', $tipd6),
            array('DISTRITO 7  ', $tipd7),
            array('DISTRITO 8  ', $tipd8),
            /*    array('DISTRITO 9 ', $tipd9),
              array('DISTRITO 10 ', $tipd10),
              array('DISTRITO 11', $tipd11),
              array('DISTRITO 12', $tipd12),
              array('DISTRITO 13', $tipd13), */
            array('DISTRITO 14', $tipd14)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Operativos de Ferias y Mercados', 'Por Distritos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $tipdm1 = $this->ferias->tipm1();
        $tipdm2 = $this->ferias->tipm2();
        $tipdm3 = $this->ferias->tipm3();
        $tipdm4 = $this->ferias->tipm4();
        $tipdm5 = $this->ferias->tipm5();
        $tipdm6 = $this->ferias->tipm6();
        $tipdm7 = $this->ferias->tipm7();
        $tipdm8 = $this->ferias->tipm8();
        $tipdm9 = $this->ferias->tipm9();
        $tipdm10 = $this->ferias->tipm10();
        $tipdm11 = $this->ferias->tipm11();
        $tipdm12 = $this->ferias->tipm12();



        $tipTotal = $this->canchas->total_colegios();

        $serie['data'] = array(
            /*    array('ENERO', $tipdm1),
              array('FEBRERO ', $tipdm2),
              array('MARZO  ', $tipdm3),
              array('ABRIL  ', $tipdm4),
              array('MAYO ', $tipdm5),
              array('JUNIO ', $tipdm6),
              array('JULIO  ', $tipdm7),
              array('AGOSTO ', $tipdm8), */
            array('SEPTIEMBRE ', $tipdm9),
            array('OCTUBRE', $tipdm10),
            array('NOVIEMBRE', $tipdm11)
                //    array('DICIEMBRE', $tipdm12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Operativos de Ferias y Mercados', 'Por Mes ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        $data['charts'] = $this->highcharts->render();


        $graph_data = $this->_data_ferias();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Operativos de Ferias y Mercados', 'Por Dias'); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', 'Dias'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        //   $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';
        @$credits->text = "Article on Internet Wold Stats";
        //   $this->highcharts->set_credits($credits);

        $this->highcharts->render_to('my_div'); // choose a specific div to render to graph

        $data['charts2'] = $this->highcharts->render();

        $data['operativos'] = $this->ferias->get_markers_general_colegio();

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('ferias/ver_informe_feria', $data);
    }

    function _data_ferias() {

        $sem = $this->ferias->lista_tipo_operativos_semana();

        foreach ($sem as $fecha)
            $dat = $fecha->fecha;

        // $sem->fecha;
        $l = $this->ferias->lunes_g();
        $m = $this->ferias->martes_g();
        $mi = $this->ferias->miercoles_g();
        $j = $this->ferias->jueves_g();
        $v = $this->ferias->viernes_g();
        $s = $this->ferias->sabado_g();
        $d = $this->ferias->domingo_g();

        //echo $op1 = date('w', strtotime('2015-06-27'));
        //echo $sem1;



        $data['users']['data'] = array($l, $m, $mi, $j, $v, $s, $d);
        $data['users']['name'] = 'Dias de la Semana';
        // $data['popul']['data'] = array(1277528133, 1365524982, 420469703, 126804433, 250372925);
        // $data['popul']['name'] = 'World Population';
        $data['axis']['categories'] = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

        return $data;
    }

    function _data4() {

        $sem = $this->colegios->lista_tipo_operativos_semana();

        foreach ($sem as $fecha)
            $dat = $fecha->fecha;

        // $sem->fecha;
        $l = $this->colegios->lunes_g();
        $m = $this->colegios->martes_g();
        $mi = $this->colegios->miercoles_g();
        $j = $this->colegios->jueves_g();
        $v = $this->colegios->viernes_g();
        $s = $this->colegios->sabado_g();
        $d = $this->colegios->domingo_g();

        //echo $op1 = date('w', strtotime('2015-06-27'));
        //echo $sem1;



        $data['users']['data'] = array($l, $m, $mi, $j, $v, $s, $d);
        $data['users']['name'] = 'Dias de la Semana';
        // $data['popul']['data'] = array(1277528133, 1365524982, 420469703, 126804433, 250372925);
        // $data['popul']['name'] = 'World Population';
        $data['axis']['categories'] = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

        return $data;
    }

    public function reporte_operativos_general() {


        $data = array(
            "provincias" => $this->intendencia_model->getProvincias(),
            "tipo_operativo" => $this->intendencia_model->tipo_operativo()
        );
        $config = array();
        $config['center'] = '-16.528923612228628, -68.16049885668946';
        $config['zoom'] = '14';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '100%';
        $config['map_height'] = '900px';



        //  $tipo_operativo = $this->input->post('id_tipo_operativo');
        //   $fecha_inicio = $this->input->post('fecha_inicio');
        //    $fecha_fin = $this->input->post('fecha_fin');
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);


        /// Distrito 1
        $polygon = array();
        $polygon['points'] = array(
            '-16.501989, -68.162107',
            '-16.503543, -68.162697',
            '-16.504757, -68.163094',
            '-16.506423, -68.164821',
            '-16.511555, -68.169565',
            '-16.511699, -68.169544',
            '-16.512059, -68.165488',
            '-16.516219, -68.167047',
            '-16.554491, -68.179798',
            '-16.555663, -68.176459',
            '-16.555632, -68.176038',
            '-16.555293, -68.174171',
            '-16.550099, -68.173763',
            '-16.550099, -68.174332',
            '-16.549019, -68.173581',
            '-16.546859, -68.173635',
            '-16.544833, -68.170802',
            '-16.546931, -68.170341',
            '-16.546962, -68.169687',
            '-16.547147, -68.168839',
            '-16.548875, -68.166275',
            '-16.546798, -68.163914',
            '-16.539833, -68.146444',
            '-16.536791, -68.145915',
            '-16.533640, -68.149483',
            '-16.532694, -68.148314',
            '-16.528662, -68.144763',
            '-16.524799, -68.147079',
            '-16.521347, -68.148466',
            '-16.520332, -68.149423',
            '-16.518224, -68.149901',
            '-16.517757, -68.150442',
            '-16.517911, -68.150801',
            '-16.517161, -68.150824',
            '-16.512577, -68.152993',
            '-16.512563, -68.152746',
            '-16.511652, -68.153140',
            '-16.511551, -68.152970',
            '-16.508697, -68.154584',
            '-16.507343, -68.155740',
            '-16.507825, -68.156198',
            '-16.502142, -68.161951',
            '-16.501989, -68.162107'
        );
        $polygon['strokeColor'] = '#0FF';
        $polygon['fillColor'] = '#0FF';
        /// Distrito 2
        $polygon2 = array();
        $polygon2['points'] = array('-16.555085, -68.209641',
            '-16.561555, -68.193920',
            '-16.568937, -68.201494',
            '-16.571640, -68.198757',
            '-16.572257, -68.199197',
            '-16.572499, -68.198998',
            '-16.572530, -68.198922',
            '-16.573378, -68.197757',
            '-16.569120, -68.193254',
            '-16.568917, -68.193449',
            '-16.567674, -68.192935',
            '-16.566340, -68.191589',
            '-16.570512, -68.185956',
            '-16.573790, -68.185730',
            '-16.573654, -68.184705',
            '-16.573166, -68.184678',
            '-16.570049, -68.183362',
            '-16.567057, -68.180530',
            '-16.564388, -68.179359',
            '-16.561642, -68.180636',
            '-16.555632, -68.176038',
            '-16.555663, -68.176459',
            '-16.554491, -68.179798',
            '-16.516219, -68.167047',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.555040, -68.209607',
            '-16.555085, -68.209641'
        );
        $polygon2['strokeColor'] = '#C0F';
        $polygon2['fillColor'] = '#C0F';

        // Distrito 3

        $polygon3 = array();
        $polygon3['points'] = array(
            '-16.543593, -68.236846',
            '-16.529605, -68.238708',
            '-16.528901, -68.238146',
            '-16.528122, -68.237279',
            '-16.527711, -68.236038',
            '-16.526999, -68.232664',
            '-16.526094, -68.230978',
            '-16.525083, -68.229627',
            '-16.522124, -68.227711',
            '-16.520797, -68.224911',
            '-16.517330, -68.221292',
            '-16.514913, -68.218320',
            '-16.513082, -68.216765',
            '-16.513092, -68.216325',
            '-16.512578, -68.215584',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.516219, -68.173822',
            '-16.554913, -68.209661',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.543593, -68.236846'
        );

        $polygon3['strokeColor'] = '#FF9';
        $polygon3['fillColor'] = '#FF9';

        /// Distrito 4
        $polygon4 = array();
        $polygon4['points'] = array(
            '-16.543593, -68.236846',
            '-16.527921, -68.252698',
            '-16.528785, -68.256475',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.491318, -68.201068',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.512578, -68.215584',
            '-16.513092, -68.216325',
            '-16.513082, -68.216765',
            '-16.514913, -68.218320',
            '-16.517330, -68.221292',
            '-16.520797, -68.224911',
            '-16.522124, -68.227711',
            '-16.525083, -68.229627',
            '-16.526094, -68.230978',
            '-16.526999, -68.232664',
            '-16.527711, -68.236038',
            '-16.528122, -68.237279',
            '-16.528901, -68.238146',
            '-16.529605, -68.238708',
            '-16.543593, -68.236846',
        );

        $polygon4['strokeColor'] = '#6F6';
        $polygon4['fillColor'] = '#6F6';

        /// Distrito 5
        $polygon5 = array();
        $polygon5['points'] = array(
            '-16.494178, -68.194494',
            '-16.491318, -68.201068',
            '-16.485724, -68.228407',
            '-16.481556, -68.227478',
            '-16.480145, -68.226993',
            '-16.477964, -68.225502',
            '-16.475536, -68.223270',
            '-16.473375, -68.221328',
            '-16.474857, -68.219182',
            '-16.473242, -68.217583',
            '-16.470227, -68.216124',
            '-16.464486, -68.195811',
            '-16.460981, -68.188743',
            '-16.458176, -68.184536',
            '-16.443141, -68.167422',
            '-16.446932, -68.160498',
            '-16.446780, -68.159657',
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.477298, -68.182959',
            '-16.486690, -68.192224',
            '-16.494178, -68.194494'
        );

        $polygon5['strokeColor'] = '#408080';
        $polygon5['fillColor'] = '#408080';

        /// Distrito 6
        $polygon6 = array();
        $polygon6['points'] = array(
            '-16.455051, -68.159666',
            '-16.457416, -68.163592',
            '-16.486623, -68.192207',
            '-16.494178, -68.194494',
            '-16.495104, -68.192289',
            '-16.496301, -68.187845',
            '-16.498729, -68.188703',
            '-16.503275, -68.195538',
            '-16.502772, -68.199102',
            '-16.510487, -68.206839',
            '-16.510470, -68.212476',
            '-16.511286, -68.212514',
            '-16.511746, -68.213775',
            '-16.512083, -68.213782',
            '-16.512083, -68.214670',
            '-16.512537, -68.215305',
            '-16.513223, -68.215364',
            '-16.513182, -68.213905',
            '-16.513532, -68.213883',
            '-16.514138, -68.212575',
            '-16.515003, -68.212607',
            '-16.515568, -68.191291',
            '-16.519469, -68.195018',
            '-16.521707, -68.192425',
            '-16.517322, -68.188342',
            '-16.517480, -68.183545',
            '-16.515814, -68.183352',
            '-16.515896, -68.167114',
            '-16.512059, -68.165488',
            '-16.511699, -68.169544',
            '-16.511555, -68.169565',
            '-16.506423, -68.164821',
            '-16.504757, -68.163094',
            '-16.503543, -68.162697',
            '-16.501989, -68.162107',
            '-16.499654, -68.163577',
            '-16.497751, -68.163609',
            '-16.496589, -68.164671',
            '-16.496764, -68.164886',
            '-16.496321, -68.165197',
            '-16.495591, -68.166624',
            '-16.495282, -68.166838',
            '-16.495087, -68.167654',
            '-16.491455, -68.170540',
            '-16.490550, -68.171119',
            '-16.488266, -68.171001',
            '-16.487758, -68.170449',
            '-16.487017, -68.170481',
            '-16.487017, -68.170481',
            '-16.482057, -68.166985',
            '-16.480422, -68.167292',
            '-16.482507, -68.165524',
            '-16.482567, -68.164306',
            '-16.482308, -68.163512',
            '-16.479877, -68.163810',
            '-16.479444, -68.165001',
            '-16.478692, -68.165776',
            '-16.477091, -68.166670',
            '-16.476261, -68.166877',
            '-16.475966, -68.167373',
            '-16.473962, -68.168011',
            '-16.469813, -68.167970',
            '-16.457673, -68.162278',
            '-16.457292, -68.160474',
            '-16.455051, -68.159666'
        );

        $polygon6['strokeColor'] = '#F00';
        $polygon6['fillColor'] = '#F00';

        /// Distrito 7
        $polygon7 = array();
        $polygon7['points'] = array(
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.492902, -68.275576',
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.431090, -68.266670',
            '-16.458262, -68.230947',
        );

        $polygon7['strokeColor'] = '#FF9999';
        $polygon7['fillColor'] = '#FF9999';

        /// Distrito 8
        $polygon8 = array();
        $polygon8['points'] = array(
            '-16.573414, -68.184697',
            '-16.573805, -68.185684',
            '-16.570432, -68.185952',
            '-16.566170, -68.191566',
            '-16.567537, -68.193015',
            '-16.568874, -68.193540',
            '-16.569070, -68.193336',
            '-16.573074, -68.197529',
            '-16.573197, -68.197722',
            '-16.572514, -68.198776',
            '-16.572534, -68.198969',
            '-16.572323, -68.199275',
            '-16.571686, -68.198728',
            '-16.568940, -68.201458',
            '-16.561572, -68.193922',
            '-16.555194, -68.209756',
            '-16.570189, -68.223757',
            '-16.573456, -68.206174',
            '-16.582391, -68.214437',
            '-16.589087, -68.220380',
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.606513, -68.153882',
            '-16.598288, -68.159160',
            '-16.594052, -68.167298',
            '-16.586772, -68.170388',
            '-16.585364, -68.172515',
            '-16.584057, -68.174100',
            '-16.581045, -68.175001',
            '-16.580479, -68.178767',
            '-16.579339, -68.180287',
            '-16.576393, -68.182140',
            '-16.574771, -68.184611',
            '-16.573414, -68.184697'
        );

        $polygon8['strokeColor'] = '#F36';
        $polygon8['fillColor'] = '#F36';

        /// Distrito 9
        $polygon9 = array();
        $polygon9['points'] = array(
            '-16.494844, -68.276937',
            '-16.489592, -68.285366',
            '-16.490755, -68.286417',
            '-16.487513, -68.292052',
            '-16.482565, -68.288491',
            '-16.480250, -68.288341',
            '-16.480055, -68.288642',
            '-16.477628, -68.287610',
            '-16.474907, -68.290900',
            '-16.471831, -68.289290',
            '-16.470000, -68.288947',
            '-16.467346, -68.295573',
            '-16.470721, -68.297617',
            '-16.468293, -68.301308',
            '-16.476894, -68.308545',
            '-16.475854, -68.307726',
            '-16.501444, -68.320197',
            '-16.512808, -68.307354',
            '-16.510968, -68.287677',
            '-16.494844, -68.276937'
        );
        $polygon9['strokeColor'] = '#000';
        $polygon9['fillColor'] = '#000';


        /// Distrito 10
        $polygon10 = array();
        $polygon10['points'] = array(
            '-16.602358, -68.232941',
            '-16.604044, -68.230527',
            '-16.599540, -68.226118',
            '-16.602460, -68.223897',
            '-16.597874, -68.218211',
            '-16.629578, -68.197583',
            '-16.642782, -68.183328',
            '-16.644349, -68.177992',
            '-16.646792, -68.175568',
            '-16.644137, -68.174020',
            '-16.644334, -68.172619',
            '-16.633432, -68.168268',
            '-16.633890, -68.157468',
            '-16.634116, -68.157011',
            '-16.634059, -68.156422',
            '-16.631234, -68.157218',
            '-16.618960, -68.163935',
            '-16.611972, -68.145521',
            '-16.621487, -68.126831',
            '-16.634275, -68.130908',
            '-16.634988, -68.108468',
            '-16.642719, -68.124561',
            '-16.655733, -68.137364',
            '-16.659207, -68.143522',
            '-16.662044, -68.151376',
            '-16.666544, -68.164764',
            '-16.665290, -68.165494',
            '-16.664653, -68.165858',
            '-16.664385, -68.166352',
            '-16.662350, -68.168605',
            '-16.659904, -68.171115',
            '-16.659184, -68.172639',
            '-16.656206, -68.179676',
            '-16.635836, -68.197776',
            '-16.626975, -68.205699',
            '-16.610020, -68.239843',
            '-16.602358, -68.232941'
        );
        $polygon10['strokeColor'] = '#F93';
        $polygon10['fillColor'] = '#F93';


        /// Distrito 11
        $polygon11 = array();
        $polygon11['points'] = array(
            '-16.495547, -68.266935',
            '-16.492627, -68.275633',
            '-16.510968, -68.287677',
            '-16.519608, -68.291910',
            '-16.523805, -68.293927',
            '-16.527549, -68.291223',
            '-16.539474, -68.280803',
            '-16.520473, -68.259971',
            '-16.520473, -68.259971',
            '-16.516788, -68.264009',
            '-16.508352, -68.272281',
            '-16.506829, -68.266516',
            '-16.495547, -68.266935'
        );
        $polygon11['strokeColor'] = '#0080C0';
        $polygon11['fillColor'] = '#0080C0';

        /// Distrito 12
        $polygon12 = array();
        $polygon12['points'] = array(
            '-16.555194, -68.209756',
            '-16.550454, -68.220745',
            '-16.550125, -68.220573',
            '-16.543576, -68.236725',
            '-16.551252, -68.245593',
            '-16.559531, -68.251338',
            '-16.560360, -68.259079',
            '-16.560638, -68.259251',
            '-16.565315, -68.246057',
            '-16.572083, -68.225466',
            '-16.555194, -68.209756'
        );
        $polygon12['strokeColor'] = '#00F';
        $polygon12['fillColor'] = '#00F';


        /// Distrito 13
        $polygon13 = array();
        $polygon13['points'] = array(
            '-16.446932, -68.160498',
            '-16.443141, -68.167422',
            '-16.458176, -68.184536',
            '-16.460981, -68.188743',
            '-16.464486, -68.195811',
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.432422, -68.264346',
            '-16.393025, -68.242352',
            '-16.384132, -68.215401',
            '-16.332742, -68.203728',
            '-16.298969, -68.176949',
            '-16.282162, -68.160813',
            '-16.270957, -68.149998',
            '-16.263377, -68.151935',
            '-16.282656, -68.149360',
            '-16.291060, -68.152965',
            '-16.308360, -68.143647',
            '-16.322363, -68.136781',
            '-16.349050, -68.140042',
            '-16.368157, -68.158238',
            '-16.428874, -68.153074',
            '-16.433813, -68.159082',
            '-16.446932, -68.160498'
        );

        $polygon13['strokeColor'] = '#030';
        $polygon13['fillColor'] = '#030';


        /// Distrito 14
        $polygon14 = array();
        $polygon14['points'] = array(
            '-16.464629, -68.195800',
            '-16.463302, -68.195950',
            '-16.462828, -68.196251',
            '-16.461203, -68.196830',
            '-16.462098, -68.197409',
            '-16.463929, -68.197978',
            '-16.462417, -68.199190',
            '-16.459783, -68.198176',
            '-16.459063, -68.199421',
            '-16.458466, -68.199034',
            '-16.457787, -68.201352',
            '-16.455306, -68.200822',
            '-16.454627, -68.202335',
            '-16.455254, -68.202475',
            '-16.455419, -68.204181',
            '-16.454946, -68.205951',
            '-16.453454, -68.207153',
            '-16.455131, -68.207560',
            '-16.454719, -68.209164',
            '-16.453608, -68.208542',
            '-16.453341, -68.209679',
            '-16.455008, -68.210001',
            '-16.454125, -68.214892',
            '-16.459619, -68.214424',
            '-16.461923, -68.213523',
            '-16.463899, -68.214167',
            '-16.463076, -68.215497',
            '-16.463981, -68.216162',
            '-16.460997, -68.220733',
            '-16.456994, -68.229438',
            '-16.458262, -68.230947',
            '-16.459517, -68.232041',
            '-16.461971, -68.236640',
            '-16.464640, -68.239145',
            '-16.473828, -68.247509',
            '-16.474281, -68.246393',
            '-16.475042, -68.246650',
            '-16.476554, -68.243614',
            '-16.480238, -68.243571',
            '-16.482172, -68.243989',
            '-16.481040, -68.248860',
            '-16.481596, -68.249064',
            '-16.483756, -68.244751',
            '-16.484672, -68.244815',
            '-16.486534, -68.245512',
            '-16.490548, -68.247024',
            '-16.492039, -68.247163',
            '-16.492728, -68.247753',
            '-16.494076, -68.248301',
            '-16.496144, -68.249985',
            '-16.497841, -68.251637',
            '-16.498777, -68.252066',
            '-16.498125, -68.258233',
            '-16.495547, -68.266935',
            '-16.506829, -68.266516',
            '-16.508352, -68.272281',
            '-16.516788, -68.264009',
            '-16.520473, -68.259971',
            '-16.516277, -68.256065',
            '-16.515906, -68.254821',
            '-16.512944, -68.251710',
            '-16.511956, -68.248148',
            '-16.509076, -68.247740',
            '-16.508233, -68.247504',
            '-16.505250, -68.243212',
            '-16.504962, -68.242011',
            '-16.502122, -68.238363',
            '-16.497020, -68.234586',
            '-16.493152, -68.229673',
            '-16.485724, -68.228407',
            '-16.480189, -68.226969',
            '-16.477515, -68.225102',
            '-16.473276, -68.221326',
            '-16.474696, -68.219223',
            '-16.473163, -68.217576',
            '-16.470303, -68.216023',
            '-16.466812, -68.203026',
            '-16.464629, -68.195800'
        );
        $polygon14['strokeColor'] = '#969';
        $polygon14['fillColor'] = '#969';
/// d1
        $marker = array();
        $marker['position'] = '-16.529764, -68.162098';
        $marker['infowindow_content'] = 'Distrito 1';
        $marker['icon'] = base_url() . 'assets/logos/d1.png';
        $this->googlemaps->add_marker($marker);
/// d2
        $marker = array();
        $marker['position'] = '-16.546778379915395, -68.1874496928711';
        $marker['infowindow_content'] = 'Distrito 2';
        $marker['icon'] = base_url() . 'assets/logos/d2.png';
        $this->googlemaps->add_marker($marker);
/// d3
        $marker = array();
        $marker['position'] = '-16.536904979856914, -68.21388554492188';
        $marker['infowindow_content'] = 'Distrito 3!';
        $marker['icon'] = base_url() . 'assets/logos/d3.png';
        $this->googlemaps->add_marker($marker);

/// d4
        $marker = array();
        $marker['position'] = '-16.513865082179166, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 4';
        $marker['icon'] = base_url() . 'assets/logos/d4.png';
        $this->googlemaps->add_marker($marker);

/// d5
        $marker = array();
        $marker['position'] = '-16.478312423802752, -68.19774937548829';
        $marker['infowindow_content'] = 'Distrito 5';
        $marker['icon'] = base_url() . 'assets/logos/d5.png';
        $this->googlemaps->add_marker($marker);
/// d6
        $marker = array();
        $marker['position'] = '-16.505306706037636, -68.17955326953125';
        $marker['infowindow_content'] = 'Distrito 6';
        $marker['icon'] = base_url() . 'assets/logos/d6.png';
        $this->googlemaps->add_marker($marker);
/// d7
        $marker = array();
        $marker['position'] = '-16.472386345850005, -68.26675724902344';
        $marker['infowindow_content'] = 'Distrito 7';
        $marker['icon'] = base_url() . 'assets/logos/d7.png';
        $this->googlemaps->add_marker($marker);
/// d8

        $marker = array();
        $marker['position'] = '-16.6092981644936, -68.187793015625';
        $marker['infowindow_content'] = 'Distrito 8';
        $marker['icon'] = base_url() . 'assets/logos/d8.png';
        $this->googlemaps->add_marker($marker);
/// d9

        $marker = array();
        $marker['position'] = '-16.499381454478936, -68.29902958789063';
        $marker['infowindow_content'] = 'Distrito 9';
        $marker['icon'] = base_url() . 'assets/logos/d9.png';
        $this->googlemaps->add_marker($marker);

/// d10
        $marker = array();
        $marker['position'] = '-16.64943172675481, -68.14728093066407';
        $marker['infowindow_content'] = 'Distrito 10';
        $marker['icon'] = base_url() . 'assets/logos/d10.png';
        $this->googlemaps->add_marker($marker);


/// d11
        $marker = array();
        $marker['position'] = '-16.52571451573992, -68.27774357714844';
        $marker['infowindow_content'] = 'Distrito 11';
        $marker['icon'] = base_url() . 'assets/logos/d11.png';
        $this->googlemaps->add_marker($marker);

/// d12
        $marker = array();
        $marker['position'] = '-16.56454922606114, -68.23036503710938';
        $marker['infowindow_content'] = 'Distrito 12';
        $marker['icon'] = base_url() . 'assets/logos/d12.png';
        $this->googlemaps->add_marker($marker);

/// d13
        $marker = array();
        $marker['position'] = '-16.40191799328029, -68.18847966113282';
        $marker['infowindow_content'] = 'Distrito 13';
        $marker['icon'] = base_url() . 'assets/logos/d13.png';
        $this->googlemaps->add_marker($marker);

/// d14
        $marker = array();
        $marker['position'] = '-16.48555516175049, -68.23448491015625';
        $marker['infowindow_content'] = 'Distrito 14';
        $marker['icon'] = base_url() . 'assets/logos/d14.png';
        $this->googlemaps->add_marker($marker);



        $marker = array();
        $marker['position'] = '-16.49477280, -68.220752';
        // $marker['icon'] = base_url() . 'assets/logos/market2.png';
        //    $marker['draggable'] = true;
        //  $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';
        //   $marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        //  $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
        $this->googlemaps->add_polygon($polygon);
        $this->googlemaps->add_polygon($polygon2);
        $this->googlemaps->add_polygon($polygon3);
        $this->googlemaps->add_polygon($polygon4);
        $this->googlemaps->add_polygon($polygon5);
        $this->googlemaps->add_polygon($polygon6);
        $this->googlemaps->add_polygon($polygon7);
        $this->googlemaps->add_polygon($polygon8);
        $this->googlemaps->add_polygon($polygon9);
        $this->googlemaps->add_polygon($polygon10);
        $this->googlemaps->add_polygon($polygon11);
        $this->googlemaps->add_polygon($polygon12);
        $this->googlemaps->add_polygon($polygon13);
        $this->googlemaps->add_polygon($polygon14);

        if (isset($_GET['variable1'])) {
            $leyenda = $_GET['variable1'];
        } else {
            $leyenda = '0';
        }


//$leyenda = $this->input->post('DNI');
        // $data['map'] = $this->googlemaps->create_map();
//$data['map'] = $this->googlemaps->create_map();
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->intendencia_model->get_markers_general($leyenda);

        //  $tipo_icon = 'assets/logos/bares.png';
        if (!$markers) {
            
        } else {
            foreach ($markers as $info_marker) {
                if ($info_marker->id_tipo_operativo == 2) {
                    $tipo_icon = 'assets/logos/bares7.png';
                } else if ($info_marker->id_tipo_operativo == 3) {
                    $tipo_icon = 'assets/logos/canchas.png';
                } else if ($info_marker->id_tipo_operativo == 4) {
                    $tipo_icon = 'assets/logos/colegios.png';
                } else if ($info_marker->id_tipo_operativo == 5) {
                    $tipo_icon = 'assets/logos/embutidos.png';
                } else if ($info_marker->id_tipo_operativo == 6) {
                    $tipo_icon = 'assets/logos/expendio_comidas.png';
                } else if ($info_marker->id_tipo_operativo == 7) {
                    $tipo_icon = 'assets/logos/mercados.png';
                } else if ($info_marker->id_tipo_operativo == 8) {
                    $tipo_icon = 'assets/logos/granja_avicola.png';
                } else if ($info_marker->id_tipo_operativo == 9) {
                    $tipo_icon = 'assets/logos/guarderias.png';
                } else if ($info_marker->id_tipo_operativo == 10) {
                    $tipo_icon = 'assets/logos/horno.png';
                } else if ($info_marker->id_tipo_operativo == 11) {
                    $tipo_icon = 'assets/logos/lenocinios.png';
                } else if ($info_marker->id_tipo_operativo == 13) {
                    $tipo_icon = 'assets/logos/sanitarios.png';
                } else if ($info_marker->id_tipo_operativo == 14) {
                    $tipo_icon = 'assets/logos/supermercados.png';
                } else if ($info_marker->id_tipo_operativo == 15) {
                    $tipo_icon = 'assets/logos/puestos_ambulantes.png';
                } else if ($info_marker->id_tipo_operativo == 16) {
                    $tipo_icon = 'assets/logos/higiene.png';
                } else if ($info_marker->id_tipo_operativo == 18) {
                    $tipo_icon = 'assets/logos/tiendas_barrio.png';
                } else {
                    $tipo_icon = 'assets/logos/market2.png';
                }






                $marker = array();
                $marker ['animation'] = 'DROP';
                $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
                $marker['icon'] = base_url() . $tipo_icon;

                $im = $info_marker->imagen_operativo;
                $im2 = substr("$im", -3);
                if ($im2 == '') {
                    $im = 'sin_imagen.jpg';
                    $ims = '<br/>   <img src="' . base_url() . 'assets/uploads/operativos/' . $im . '" width="150" >';
                } else if ($im2 == 'mp4') {
                    $im = $info_marker->imagen_operativo;
                    $datos = 'Aquí hay algo de texto!';
                    $nombre = 'mitexto.txt';

                    //     force_download($nombre, $datos);



                    $ims = '<br/> <video controls>   <source src="' . base_url() . 'assets/uploads/operativos/' . $im . '" type="video/mp4"> <video controls>';
                    //    $ims = '--> <strong>'.anchor('editor/downloads/'.$im, $im).'</strong>';
                } else {
                    $im = $info_marker->imagen_operativo;
                    $ims = '<br/>   <img src="' . base_url() . 'assets/uploads/operativos/' . $im . '" width="150" >';
                }
                $total = mysql_num_rows(mysql_query("SELECT * FROM decomiso where id_operativo = "
                                . $info_marker->id_operativo));
                if ($total == 0) {
                    $total = 0;
                }

                $obs = $info_marker->id_intervencion;
                if ($obs == 1) {
                    $intervencion = 'Clandestino';
                } else if ($obs == 2) {
                    $intervencion = 'Legal';
                } else {
                    $intervencion = 'Otros';
                }
                $marker ['infowindow_content'] = '<strong>Responsable: </strong>' . $info_marker->responsable .
                        ' <br/> <strong>Entidad: </strong> ' . $info_marker->nombre_entidad .
                        ' <br/> <strong>Cantidad Decomisos: </strong> ' . $total .
                        //      ' <br/> <strong>Encargado Decomisos: </strong> ' . $info_marker->encargado_decomisos .
                        //      ' <br/> <strong>Tipo Operativo: </strong> ' . $info_marker->nombre_o .
                        //      ' <br/> <strong>Tipo Legalidad: </strong> ' . $intervencion .
                        //       ' <br/> <strong>Responsable: </strong> ' . $info_marker->responsable .
                        //      ' <br/> <strong>Nombre Entidad: </strong> ' . $info_marker->nombre_entidad .
                        //        ' <br/> <strong>Propietario: </strong> ' . $info_marker->propietario .
                        $ims;
                $marker['id'] = $info_marker->id_operativo;
                $this->googlemaps->add_marker($marker);
                //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
                //si queremos que se pueda arrastrar el marker
                //$marker['draggable'] = TRUE;
                //si queremos darle una id, muy útil
            }
        }
        //creamos el mapa y lo asignamos a map que lo 
        //tendremos disponible en la vista mapa_view con el array data
        $data['datos'] = $this->intendencia_model->get_markers_general($leyenda);
        $data['map'] = $this->googlemaps->create_map();

        $data['operativos'] = $this->intendencia_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_general', $data);
    }

    public function reporte_operativos_general_graficos() {



        //creamos el mapa y lo asignamos a map que lo 
        //tendremos disponible en la vista mapa_view con el array data

        $this->load->library('highcharts');
        $op1 = $this->observatorio_model->tip_general_1();
        $op2 = $this->observatorio_model->tip_general_2();
        $op3 = $this->observatorio_model->tip_general_3();
        $op4 = $this->observatorio_model->tip_general_4();
        $op5 = $this->observatorio_model->tip_general_5();
        $op6 = $this->observatorio_model->tip_general_6();
        $op7 = $this->observatorio_model->tip_general_7();
        $op8 = $this->observatorio_model->tip_general_8();
        $op9 = $this->observatorio_model->tip_general_9();
        $op10 = $this->observatorio_model->tip_general_10();
        $op11 = $this->observatorio_model->tip_general_11();
        $op12 = $this->observatorio_model->tip_general_12();

        $tipTotal = $this->observatorio_model->tipTotal();

        $serie['data'] = array(
            array('01:00 - 03:00', $op1),
            array('03:01 - 05:00 ', $op2),
            array('05:01 - 07:00  ', $op3),
            array('07:01 - 09:00  ', $op4),
            array('09:01 - 11:00  ', $op5),
            array('11:01 - 13:00  ', $op6),
            array('13:01 - 15:00  ', $op7),
            array('15:01 - 17:00   ', $op8),
            array('17:01 - 19:00  ', $op9),
            array('19:01 - 21:00   ', $op10),
            array('21:01 - 23:00    ', $op11),
            array('23:01 - 24:00    ', $op12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Horas ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);

        $data['charts'] = $this->highcharts->render();

        $graph_data = $this->_data3();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Operativos por dias', 'Por Semana'); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', 'Dias'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        //   $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';


        $this->highcharts->render_to('my_div'); // choose a specific div to render to graph
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts2'] = $this->highcharts->render();


        $tip1 = $this->observatorio_model->tip1();
        $tip2 = $this->observatorio_model->tip2();
        $tip3 = $this->observatorio_model->tip3();
        $tip4 = $this->observatorio_model->tip4();
        $tip5 = $this->observatorio_model->tip5();
        $tip6 = $this->observatorio_model->tip6();
        $tip7 = $this->observatorio_model->tip7();
        $tip8 = $this->observatorio_model->tip8();
        $tip9 = $this->observatorio_model->tip9();
        $tip10 = $this->observatorio_model->tip10();
        $tip11 = $this->observatorio_model->tip11();
        $tip12 = $this->observatorio_model->tip12();
        $tip13 = $this->observatorio_model->tip13();
        $tip14 = $this->observatorio_model->tip14();
        $tip15 = $this->observatorio_model->tip15();

        $tipTotal = $this->observatorio_model->tipTotal_2();

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tip1),
            array('EXPENDIO DE COMIDAS ', $tip2),
            array('OTROS  ', $tip3),
            //   array('SUPERMERCADOS  ', $tip4),
            array('TIENDAS DE BARRIO  ', $tip5),
            array('VENDEDORES AMBULANTES  ', $tip6),
            //  array('COLEGIOS  ', round(($tip7 / $tipTotal) * 100), 3),
            array('PUESTOS DE VENTA  ', $tip8),
            array('MATADEROS ', $tip9),
            //   array('CANCHAS DEPORTIVAS   ', round(($tip10 / $tipTotal) * 100), 3),
            array('HOTELES, MOTELES Y ALOJAMIENTOS', $tip11),
            //   array('FERIAS', round(($tip12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tip13),
            array('ASENTAMIENTOS EN VIAS PUBLICAS ', $tip14),
            array('HORNO PANIFICADORA', $tip15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por tipo  Operativos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();


        $tipd1 = $this->observatorio_model->tipd1();
        $tipd2 = $this->observatorio_model->tipd2();
        $tipd3 = $this->observatorio_model->tipd3();
        $tipd4 = $this->observatorio_model->tipd4();
        $tipd5 = $this->observatorio_model->tipd5();
        $tipd6 = $this->observatorio_model->tipd6();
        $tipd7 = $this->observatorio_model->tipd7();
        $tipd8 = $this->observatorio_model->tipd8();
        $tipd9 = $this->observatorio_model->tipd9();
        $tipd10 = $this->observatorio_model->tipd10();
        $tipd11 = $this->observatorio_model->tipd11();
        $tipd12 = $this->observatorio_model->tipd12();
        $tipd13 = $this->observatorio_model->tipd13();
        $tipd14 = $this->observatorio_model->tipd14();


        $tipTotal = $this->observatorio_model->tipTotal();

        $serie['data'] = array(
            array('DISTRITO 1', $tipd1),
            array('DISTRITO 2 ', $tipd2),
            array('DISTRITO 3  ', $tipd3),
            array('DISTRITO 4  ', $tipd4),
            array('DISTRITO 5  ', $tipd5),
            array('DISTRITO 6  ', $tipd6),
            array('DISTRITO 7  ', $tipd7),
            array('DISTRITO 8  ', $tipd8),
            array('DISTRITO 9 ', $tipd9),
            array('DISTRITO 10 ', $tipd10),
            array('DISTRITO 11', $tipd11),
            array('DISTRITO 12', $tipd12),
            array('DISTRITO 13', $tipd13),
            array('DISTRITO 14', $tipd14)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Distritos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();


        $tipdm1 = $this->observatorio_model->tipm1();
        $tipdm2 = $this->observatorio_model->tipm2();
        $tipdm3 = $this->observatorio_model->tipm3();
        $tipdm4 = $this->observatorio_model->tipm4();
        $tipdm5 = $this->observatorio_model->tipm5();
        $tipdm6 = $this->observatorio_model->tipm6();
        $tipdm7 = $this->observatorio_model->tipm7();
        $tipdm8 = $this->observatorio_model->tipm8();
        $tipdm9 = $this->observatorio_model->tipm9();
        $tipdm10 = $this->observatorio_model->tipm10();
        $tipdm11 = $this->observatorio_model->tipm11();
        $tipdm12 = $this->observatorio_model->tipm12();



        $tipTotal = $this->observatorio_model->tipTotal();

        $serie['data'] = array(
            array('ENERO', $tipdm1),
            array('FEBRERO ', $tipdm2),
            array('MARZO  ', $tipdm3),
            array('ABRIL  ', $tipdm4),
            array('MAYO ', $tipdm5),
            array('JUNIO ', $tipdm6),
            array('JULIO  ', $tipdm7),
            array('AGOSTO ', $tipdm8),
            array('SEPTIEMBRE ', $tipdm9),
            array('OCTUBRE', $tipdm10),
            array('NOVIEMBRE', $tipdm11),
            array('DICIEMBRE', $tipdm12)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();


        $var = '1';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal2 = $this->observatorio_model->tipatotal1($var);
        if ($tipTotal2 == 0) {
            $tipTotal = '1';
        } else {
            $tipTotal = $this->observatorio_model->tipatotal1($var);
        }

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //  array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //  array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //  array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Enero ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();




        $var = '2';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal2 = $this->observatorio_model->tipatotal1($var);
        if ($tipTotal2 == 0) {
            $tipTotal = '1';
        } else {
            $tipTotal = $this->observatorio_model->tipatotal1($var);
        }

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //  array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //  array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //  array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Febrero ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();


        $var = '3';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal2 = $this->observatorio_model->tipatotal1($var);
        if ($tipTotal2 == 0) {
            $tipTotal = '1';
        } else {
            $tipTotal = $this->observatorio_model->tipatotal1($var);
        }

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //   array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            ///   array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //  array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Marzo ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();


        $var = '4';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal2 = $this->observatorio_model->tipatotal1($var);
        if ($tipTotal2 == 0) {
            $tipTotal = '1';
        } else {
            $tipTotal = $this->observatorio_model->tipatotal1($var);
        }

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //   array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //    array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //    array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Abril ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();

        $var = '5';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal = $this->observatorio_model->tipatotal1($var);

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //    array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //  array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //   array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Mayo ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();

        $var = '6';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal = $this->observatorio_model->tipatotal1($var);

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //   array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //    array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //   array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Junio ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();





        $var = '7';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal2 = $this->observatorio_model->tipatotal1($var);
        if ($tipTotal2 == 0) {
            $tipTotal = '1';
        } else {
            $tipTotal = $this->observatorio_model->tipatotal1($var);
        }

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //   array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //    array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //  array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +'  '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Julio ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();





        $var = '8';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal = $this->observatorio_model->tipatotal1($var);

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //   array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //   array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //  array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Agosto ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();





        $var = '9';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal2 = $this->observatorio_model->tipatotal1($var);
        if ($tipTotal2 == 0) {
            $tipTotal = '1';
        } else {
            $tipTotal = $this->observatorio_model->tipatotal1($var);
        }

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //   array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //   array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //    array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Septiembre ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();



        $var = '10';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal2 = $this->observatorio_model->tipatotal1($var);
        if ($tipTotal2 == 0) {
            $tipTotal = '1';
        } else {
            $tipTotal = $this->observatorio_model->tipatotal1($var);
        }

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //   array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //  array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //   array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Octubre ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);

        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();


        $var = '11';
        $tipq1 = $this->observatorio_model->tipa1($var);
        $tipq2 = $this->observatorio_model->tipa2($var);
        $tipq3 = $this->observatorio_model->tipa3($var);
        $tipq4 = $this->observatorio_model->tipa4($var);
        $tipq5 = $this->observatorio_model->tipa5($var);
        $tipq6 = $this->observatorio_model->tipa6($var);
        $tipq7 = $this->observatorio_model->tipa7($var);
        $tipq8 = $this->observatorio_model->tipa8($var);
        $tipq9 = $this->observatorio_model->tipa9($var);
        $tipq10 = $this->observatorio_model->tipa10($var);
        $tipq11 = $this->observatorio_model->tipa11($var);
        $tipq12 = $this->observatorio_model->tipa12($var);
        $tipq13 = $this->observatorio_model->tipa13($var);
        $tipq14 = $this->observatorio_model->tipa14($var);
        $tipq15 = $this->observatorio_model->tipa15($var);

        $tipTotal = $this->observatorio_model->tipatotal1($var);

        $serie['data'] = array(
            array('BARES Y CANTINAS', $tipq1),
            array('EXPENDIO DE COMIDAS ', $tipq2),
            array('HIGIENE Y ALIMENTOS  ', $tipq3),
            array('SUPERMERCADOS  ', $tipq4),
            array('TIENDAS DE BARRIO  ', $tipq5),
            array('VENDEDORES AMBULANTES  ', $tipq6),
            //   array('COLEGIOS  ', round(($tipq7 / $tipTotal) * 100), 3),
            array('SANITARIO  ', $tipq8),
            array('LENOCIDIOS ', $tipq9),
            //   array('CANCHAS DEPORTIVAS   ', round(($tipq10 / $tipTotal) * 100), 3),
            array('EMBUTIDOS', $tipq11),
            //   array('FERIAS', round(($tipq12 / $tipTotal) * 100), 3),
            array('GRANJA AVICOLA ', $tipq13),
            array('GUARDERIAS ', $tipq14),
            array('HORNO PANIFICADORA', $tipq15)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Operativos', 'Por Mes de Noviembre ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();
        $data['operativos'] = $this->intendencia_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('mapas/mapa_view_general_graficos', $data);
    }

    public function reporte_destruccion() {

        $data = array(
            "provincias" => $this->intendencia_model->mumero_casos_registrados_intendencia(),
            "fecha" => $this->intendencia_model->ultima_fecha(),
            "fecha_decomisos" => $this->intendencia_model->ultima_fecha_decomisos()
        );
        //  $data['datos'] = $this->mapa_model->get_markets_intendencia();
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('header');

        $this->load->view('monitoreo_datos/reporte_destruccion', $data);
    }

    public function guardar_inventario() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ap'),
            'destruccion' => $this->input->post('destruccion_ap'),
            'devolucion' => $this->input->post('devolucion_ap'),
            'donacion' => $this->input->post('donacion_ap'),
            'total' => $this->input->post('total_ap')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario2() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ap2'),
            'destruccion' => $this->input->post('destruccion_ap2'),
            'devolucion' => $this->input->post('devolucion_ap2'),
            'donacion' => $this->input->post('donacion_ap2'),
            'total' => $this->input->post('total_ap2')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario3() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ap3'),
            'destruccion' => $this->input->post('destruccion_ap3'),
            'devolucion' => $this->input->post('devolucion_ap3'),
            'donacion' => $this->input->post('donacion_ap3'),
            'total' => $this->input->post('total_ap3')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario4() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ap4'),
            'destruccion' => $this->input->post('destruccion_ap4'),
            'devolucion' => $this->input->post('devolucion_ap4'),
            'donacion' => $this->input->post('donacion_ap4'),
            'total' => $this->input->post('total_ap4')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_anp() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_anp'),
            'destruccion' => $this->input->post('destruccion_anp'),
            'devolucion' => $this->input->post('devolucion_anp'),
            'donacion' => $this->input->post('donacion_anp'),
            'total' => $this->input->post('total_anp')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_anp2() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_anp2'),
            'destruccion' => $this->input->post('destruccion_anp2'),
            'devolucion' => $this->input->post('devolucion_anp2'),
            'donacion' => $this->input->post('donacion_anp2'),
            'total' => $this->input->post('total_anp2')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_anp3() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_anp3'),
            'destruccion' => $this->input->post('destruccion_anp3'),
            'devolucion' => $this->input->post('devolucion_anp3'),
            'donacion' => $this->input->post('donacion_anp3'),
            'total' => $this->input->post('total_anp3')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_anp4() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_anp4'),
            'destruccion' => $this->input->post('destruccion_anp4'),
            'devolucion' => $this->input->post('devolucion_anp4'),
            'donacion' => $this->input->post('donacion_anp4'),
            'total' => $this->input->post('total_anp4')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_ba() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ba'),
            'destruccion' => $this->input->post('destruccion_ba'),
            'devolucion' => $this->input->post('devolucion_ba'),
            'donacion' => $this->input->post('donacion_ba'),
            'total' => $this->input->post('total_ba')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_ba2() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ba2'),
            'destruccion' => $this->input->post('destruccion_ba2'),
            'devolucion' => $this->input->post('devolucion_ba2'),
            'donacion' => $this->input->post('donacion_ba2'),
            'total' => $this->input->post('total_ba2')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_ba3() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ba3'),
            'destruccion' => $this->input->post('destruccion_ba3'),
            'devolucion' => $this->input->post('devolucion_ba3'),
            'donacion' => $this->input->post('donacion_ba3'),
            'total' => $this->input->post('total_ba3')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_ba4() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ba4'),
            'destruccion' => $this->input->post('destruccion_ba4'),
            'devolucion' => $this->input->post('devolucion_ba4'),
            'donacion' => $this->input->post('donacion_ba4'),
            'total' => $this->input->post('total_ba4')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_bna() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_bna'),
            'destruccion' => $this->input->post('destruccion_bna'),
            'devolucion' => $this->input->post('devolucion_bna'),
            'donacion' => $this->input->post('donacion_bna'),
            'total' => $this->input->post('total_bna')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_bna2() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_bna2'),
            'destruccion' => $this->input->post('destruccion_bna2'),
            'devolucion' => $this->input->post('devolucion_bna2'),
            'donacion' => $this->input->post('donacion_bna2'),
            'total' => $this->input->post('total_bna2')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_bna3() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_bna3'),
            'destruccion' => $this->input->post('destruccion_bna3'),
            'devolucion' => $this->input->post('devolucion_bna3'),
            'donacion' => $this->input->post('donacion_bna3'),
            'total' => $this->input->post('total_bna3')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_bna4() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_bna4'),
            'destruccion' => $this->input->post('destruccion_bna4'),
            'devolucion' => $this->input->post('devolucion_bna4'),
            'donacion' => $this->input->post('donacion_bna4'),
            'total' => $this->input->post('total_bna4')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_bm() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_bm'),
            'destruccion' => $this->input->post('destruccion_bm'),
            'devolucion' => $this->input->post('devolucion_bm'),
            'donacion' => $this->input->post('donacion_bm'),
            'total' => $this->input->post('total_bm')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_bm2() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_bm2'),
            'destruccion' => $this->input->post('destruccion_bm2'),
            'devolucion' => $this->input->post('devolucion_bm2'),
            'donacion' => $this->input->post('donacion_bm2'),
            'total' => $this->input->post('total_bm2')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_bm3() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_bm3'),
            'destruccion' => $this->input->post('destruccion_bm3'),
            'devolucion' => $this->input->post('devolucion_bm3'),
            'donacion' => $this->input->post('donacion_bm3'),
            'total' => $this->input->post('total_bm3')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_bm4() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_bm4'),
            'destruccion' => $this->input->post('destruccion_bm4'),
            'devolucion' => $this->input->post('devolucion_bm4'),
            'donacion' => $this->input->post('donacion_bm4'),
            'total' => $this->input->post('total_bm4')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_ee() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ee'),
            'destruccion' => $this->input->post('destruccion_ee'),
            'devolucion' => $this->input->post('devolucion_ee'),
            'donacion' => $this->input->post('donacion_ee'),
            'total' => $this->input->post('total_ee')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_ee2() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ee2'),
            'destruccion' => $this->input->post('destruccion_ee2'),
            'devolucion' => $this->input->post('devolucion_ee2'),
            'donacion' => $this->input->post('donacion_ee2'),
            'total' => $this->input->post('total_ee2')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_ee3() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ee3'),
            'destruccion' => $this->input->post('destruccion_ee3'),
            'devolucion' => $this->input->post('devolucion_ee3'),
            'donacion' => $this->input->post('donacion_ee3'),
            'total' => $this->input->post('total_ee3')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_ee4() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_ee4'),
            'destruccion' => $this->input->post('destruccion_ee4'),
            'devolucion' => $this->input->post('devolucion_ee4'),
            'donacion' => $this->input->post('donacion_ee4'),
            'total' => $this->input->post('total_ee4')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_mo() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_mo'),
            'destruccion' => $this->input->post('destruccion_mo'),
            'devolucion' => $this->input->post('devolucion_mo'),
            'donacion' => $this->input->post('donacion_mo'),
            'total' => $this->input->post('total_mo')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_mo2() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_mo2'),
            'destruccion' => $this->input->post('destruccion_mo2'),
            'devolucion' => $this->input->post('devolucion_mo2'),
            'donacion' => $this->input->post('donacion_mo2'),
            'total' => $this->input->post('total_mo2')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_mo3() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_mo3'),
            'destruccion' => $this->input->post('destruccion_mo3'),
            'devolucion' => $this->input->post('devolucion_mo3'),
            'donacion' => $this->input->post('donacion_mo3'),
            'total' => $this->input->post('total_mo3')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_mo4() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_mo4'),
            'destruccion' => $this->input->post('destruccion_mo4'),
            'devolucion' => $this->input->post('devolucion_mo4'),
            'donacion' => $this->input->post('donacion_mo4'),
            'total' => $this->input->post('total_mo4')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_anulado() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_anulado'),
            'destruccion' => $this->input->post('destruccion_anulado'),
            'devolucion' => $this->input->post('devolucion_anulado'),
            'donacion' => $this->input->post('donacion_anulado'),
            'total' => $this->input->post('total_anulado')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_anulado2() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_anulado2'),
            'destruccion' => $this->input->post('destruccion_anulado2'),
            'devolucion' => $this->input->post('devolucion_anulado2'),
            'donacion' => $this->input->post('donacion_anulado2'),
            'total' => $this->input->post('total_anulado2')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_anulado3() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_anulado3'),
            'destruccion' => $this->input->post('destruccion_anulado3'),
            'devolucion' => $this->input->post('devolucion_anulado3'),
            'donacion' => $this->input->post('donacion_anulado3'),
            'total' => $this->input->post('total_anulado3')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

    public function guardar_inventario_anulado4() {
        $id = $this->input->post('id');
        $guardar_decomisos = array(
            'cantidad' => $this->input->post('cantidad_anulado4'),
            'destruccion' => $this->input->post('destruccion_anulado4'),
            'devolucion' => $this->input->post('devolucion_anulado4'),
            'donacion' => $this->input->post('donacion_anulado4'),
            'total' => $this->input->post('total_anulado4')
        );

        $this->intendencia_model->update_decomisos($guardar_decomisos, $id);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'intendencia/reporte_destruccion');
    }

}
