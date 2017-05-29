<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Nino extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'grocery_CRUD', 'table'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('mapa_model');
        $this->load->model('monitoreo_model');
        $this->load->model('provincias_model');
        $this->load->model('felcc_model');
        $this->load->model('cim_model');
        $this->load->model('nino_model');
        $this->load->model('faltas_contravenciones_model');
        $this->load->helper('mysql_to_excel_helper');

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

    public function _example_output2($output2 = null) {


//   $this->load->view('admin_view_crud', $output);
//    $this->load->view('footer');
    }

    public function index() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('observatorio/index', $data);
    }

    public function aprobar_felcc() {
        $id = $this->uri->segment(3);
        $this->faltas_contravenciones_model->aprobar_felcc($id);

        redirect(base_url() . 'felcc/registros_felcc');
    }

    function borrar_felcc() {
        $id = $this->uri->segment(3);
        $delete = $this->faltas_contravenciones_model->eliminar_felcc($id);
        redirect(base_url() . 'felcc/registros_felcc');
    }

    function eliminar($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('felcc', array('felcc.id_felcc' => $row->id_felcc))->row();
        return '<a onClick="if (confirma() == false)
                            return false" href="' . base_url() . 'felcc/borrar_felcc/' . $row->id_felcc . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/eliminar.png" height="45px" title="Eliminar Registro" >
                                                </a>';
    }

    function editar($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('felcc', array('felcc.id_felcc' => $row->id_felcc))->row();
        return '<a  href="' . base_url() . 'felcc/edicion_felcc/' . $row->id_felcc . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/editar.png" height="45px" title="Editar Registro" >
                                                </a>';
    }

    function aprobar($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('felcc', array('felcc.id_felcc' => $row->id_felcc))->row();
        return '<a onClick="if (confirma_aprobar() == false)
                                                                return false" href="' . base_url() . 'felcc/aprobar_felcc/' . $row->id_felcc . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/activado3.png" height="50px" title="Aprobar Formulario">
                                                </a>';
    }

    function copiar($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('felcc', array('felcc.id_felcc' => $row->id_felcc))->row();
        return ' <a  href="' . base_url() . 'felcc/copiar_felcc/' . $row->id_felcc . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/copiar.png" height="50px" title="Copiar Formulario">
                                                </a>';
    }

    public function cim() {

        $crud = new grocery_CRUD();
        $crud->set_table('cim');

        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_print();
        $crud->set_subject('cim');
        $output = $crud->render();
        $this->_example_output($output);

        $data = array(
            "provincias" => $this->cim_model->getProvincias(),
            "infraestructura_pertenece" => $this->cim_model->infraestrutura_pertenece()
        );
        $this->load->view('distritos/distritos');
        //       $data['datos'] = $this->mapa_model->get_markers_general_monitoreo_ubicacion();
        $data['map'] = $this->googlemaps->create_map();


// $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header', $output);
        $this->load->view('centro_infantil/registros_cim', $data);
    }

    public function guardar_cim() {


        $date = strtotime($this->input->post('fecha_inauguracion'));
        $dia = date("w", $date);

        $guardar_cim = array(
            'id_cim' => $this->input->post('id_cim'),
            'nombre' => $this->input->post('nombre'),
            'responsable' => $this->input->post('responsable'),
            'fecha_inauguracion' => $this->input->post('fecha_inauguracion'),
            'distrito' => $this->input->post('provincias'),
            'zona' => $this->input->post('poblaciones'),
            'calle' => $this->input->post('calle'),
            'numero' => $this->input->post('numero'),
            'telf' => $this->input->post('telf'),
            'email' => $this->input->post('email'),
            'numero_ninos' => $this->input->post('numero_ninos'),
            'aportes_ppff' => $this->input->post('aportes_ppff'),
            'administracion' => $this->input->post('administracion'),
            'infraestructura_pertenece' => $this->input->post('infraestructura_pertenece'),
            'familias_beneficiadas' => $this->input->post('familias_beneficiadas'),
            'ninos_becados' => $this->input->post('ninos_becados'),
            'cantidad_educadoras' => $this->input->post('cantidad_educadoras'),
            'cantidad_manipuladoras' => $this->input->post('cantidad_manipuladoras'),
            'cocina' => $this->input->post('cocina'),
            'bano' => $this->input->post('bano'),
            'patio' => $this->input->post('patio'),
            'muro_perimetral' => $this->input->post('muro_perimetral'),
            'almacen' => $this->input->post('almacen'),
            'comedor' => $this->input->post('comedor'),
            'sala_psicomotricidad' => $this->input->post('sala_psicomotricidad'),
            'otro_ambiente' => $this->input->post('otro_ambiente'),
            'aulas_independientes' => $this->input->post('aulas_independientes'),
            'cantidad_aulas' => $this->input->post('cantidad_aulas'),
            'aulas_detalle' => $this->input->post('aulas_detalle'),
            'agua' => $this->input->post('agua'),
            'agua_detalle' => $this->input->post('agua_detalle'),
            'electricidad' => $this->input->post('electricidad'),
            'electricidad_detalle' => $this->input->post('electricidad_detalle'),
            'alcantarillado' => $this->input->post('alcantarillado'),
            'alcantarillado_detalle' => $this->input->post('alcantarillado_detalle'),
            'gas' => $this->input->post('gas'),
            'gas_detalle' => $this->input->post('gas_detalle'),
            'fecha_cierre' => $this->input->post('fecha_cierre'),
            'se_recojio_material' => $this->input->post('se_recojio_material'),
            'motivo_cierre' => $this->input->post('motivo_cierre'),
            'otro_motivo_cierre' => $this->input->post('otro_motivo_cierre'),
            'pos_x' => $this->input->post('pos_x'),
            'pos_y' => $this->input->post('pos_y'),
            'dia' => $dia,
            'usuario' => $this->session->userdata('id_usuario')
        );

//  $id_distrito = $this->input->post('provincias');

        $this->cim_model->guardar_cim($guardar_cim);

        redirect(base_url() . 'centro_infantil/cim');
    }

    public function edicion_felcc() {
        $data = array(
            "departamento" => $this->faltas_contravenciones_model->departamento(),
            "provincia" => $this->faltas_contravenciones_model->provincia(),
            "municipio" => $this->faltas_contravenciones_model->municipio(),
            "localidad" => $this->faltas_contravenciones_model->localidad(),
            "epis" => $this->faltas_contravenciones_model->epis(),
            "division" => $this->faltas_contravenciones_model->division(),
            "delito" => $this->faltas_contravenciones_model->delito(),
            "genero" => $this->faltas_contravenciones_model->genero(),
            "estado_civil" => $this->faltas_contravenciones_model->estado_civil(),
            "ocupacion_victima" => $this->faltas_contravenciones_model->ocupacion_victima(),
            "temperancia_victima" => $this->faltas_contravenciones_model->temperancia(),
            "nacionalidad_victima" => $this->faltas_contravenciones_model->nacionalidad(),
            "genero_infractor" => $this->faltas_contravenciones_model->genero_infractor(),
            "estado_civil_denunciado" => $this->faltas_contravenciones_model->estado_civil_denunciado(),
            "ocupacion_denunciado" => $this->faltas_contravenciones_model->ocupacion_denunciado(),
            "temperancia_infractor" => $this->faltas_contravenciones_model->temperancia_infractor(),
            "nacionalidad_denunciado" => $this->faltas_contravenciones_model->nacionalidad_infractor(),
            "arrestado" => $this->faltas_contravenciones_model->arrestado(),
            "provincias" => $this->faltas_contravenciones_model->getProvincias(),
            "gestion" => $this->faltas_contravenciones_model->gestion(),
            "mes" => $this->faltas_contravenciones_model->mes(),
            "estado_caso" => $this->faltas_contravenciones_model->estado_caso(),
            "felcc" => $this->faltas_contravenciones_model->felcc(),
        );
        $id_felcc = $this->uri->segment(3);

        $edit = $this->faltas_contravenciones_model->felcc_edit($id_felcc);
        foreach ($edit as $e):
            //$e->pos_x;
        endforeach;

        $this->load->view('distritos/distritos_edit_felcc', $edit);
        $id_felcc = $this->uri->segment(3);
        $data['edit'] = $this->faltas_contravenciones_model->felcc_edit($id_felcc);
        $data['datos'] = $this->mapa_model->get_markers_general_monitoreo_ubicacion();
        $data['map'] = $this->googlemaps->create_map();


// $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('felcc/editar_felcc', $data);
    }

    public function update_felcc() {


        $date = strtotime($this->input->post('fecha_hecho'));
        $dia = date("d", $date);

        $guardar_felcc = array(
            'numero_formulario' => $this->input->post('numero_formulario'),
            'cod_num' => $this->input->post('cod_num'),
            'gestion' => $this->input->post('gestion'),
            'fecha_hecho' => $this->input->post('fecha_hecho'),
            'hora_hecho' => $this->input->post('hora_hecho'),
            'mes' => $this->input->post('mes'),
            'departamento' => $this->input->post('departamento'),
            'provincia' => $this->input->post('provincia'),
            'municipio' => $this->input->post('municipio'),
            'localidad' => $this->input->post('localidad'),
            'epis' => $this->input->post('epis'),
            'division' => $this->input->post('division'),
            'n_registro' => $this->input->post('n_registro'),
            'delitos_hecho' => $this->input->post('delitos_hecho'),
            'nombre_victima' => $this->input->post('nombre_victima'),
            'edad_victima' => $this->input->post('edad_victima'),
            'sexo_victima' => $this->input->post('sexo_victima'),
            'ci_victima' => $this->input->post('ci_victima'),
            'estado_civil_victima' => $this->input->post('estado_civil_victima'),
            'ocupacion_victima' => $this->input->post('ocupacion_victima'),
            'domicilio_victima' => $this->input->post('domicilio_victima'),
            'temperancia_victima' => $this->input->post('temperancia_victima'),
            'nacionalidad_victima' => $this->input->post('nacionalidad_victima'),
            'nombre_denunciado' => $this->input->post('nombre_denunciado'),
            'nombre_complices' => $this->input->post('nombre_complices'),
            'edad_denunciado' => $this->input->post('edad_denunciado'),
            'sexo_denunciado' => $this->input->post('sexo_denunciado'),
            'ci_denunciado' => $this->input->post('ci_denunciado'),
            'estado_civil_denunciado' => $this->input->post('estado_civil_denunciado'),
            'ocupacion_denunciado' => $this->input->post('ocupacion_denunciado'),
            'domicilio_denunciado' => $this->input->post('domicilio_denunciado'),
            'temperancia_denunciado' => $this->input->post('temperancia_denunciado'),
            'nacionalidad_denunciado' => $this->input->post('nacionalidad_denunciado'),
            'alias' => $this->input->post('alias'),
            'arrestado' => $this->input->post('arrestado'),
            'distrito' => $this->input->post('provincias'),
            'zona' => $this->input->post('poblaciones'),
            'lugar_hecho' => $this->input->post('lugar_hecho'),
            'lugar_especifico' => $this->input->post('lugar_especifico'),
            'causas_hecho' => $this->input->post('causas_hecho'),
            'objetos_robados' => $this->input->post('objetos_robados'),
            'medios_utilizados' => $this->input->post('medios_utilizados'),
            'instrumento_utilizado' => $this->input->post('instrumento_utilizado'),
            'caso_n' => $this->input->post('caso_n'),
            'asignado' => $this->input->post('asignado'),
            'estado_caso' => $this->input->post('estado_caso'),
            'detalle_caso' => $this->input->post('detalle_caso'),
            'estado_aprobacion' => $this->input->post('estado_aprobacion'),
            'dia' => $fech = date('w', strtotime($this->input->post('fecha_hecho'))),
            'usuario' => $this->session->userdata('id_usuario'),
            'pos_x' => $this->input->post('pos_x'),
            'pos_y' => $this->input->post('pos_y'),
        );
        $id_felcc = $this->input->post('id_felcc');
//  $id_distrito = $this->input->post('provincias');

        $this->faltas_contravenciones_model->update_felcc($guardar_felcc, $id_felcc);

        redirect(base_url() . 'felcc/registros_felcc');
    }

    public function reporte_cim_general() {

        $this->load->view('distritos/distritos_felcc');

        $markers = $this->cim_model->get_markers_general_cim();

        //  $tipo_icon = 'assets/logos/bares.png';
        if (!$markers) {
            
        } else {
            foreach ($markers as $info_marker) {


                $tipo_icon = 'assets/logos/cim.png';

                $marker = array();
                $marker ['animation'] = 'DROP';
                $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
                $marker['icon'] = base_url() . $tipo_icon;


                $marker ['infowindow_content'] = '  <strong>Nombre Centro Infantil: </strong> ' . $info_marker->nombre .
                        '<br/> <strong>Distrito: </strong> Distrito ' . $info_marker->distrito .
                        ' <br/> <strong>Zona: </strong> ' . $info_marker->zona .
                        ' <br/> <strong>Numero de Ninos: </strong> ' . $info_marker->numero_ninos .
                        ' <br/> <strong>Infraestructura Pertence: </strong>  ' . $info_marker->infraestructura_pertenece .
                        ' <br/> <strong>Muro Perimetral: </strong> ' . $info_marker->muro_perimetral .
                        ' <br/> <strong>Aulas Independientes: </strong> ' . $info_marker->aulas_independientes .
                        ' <br/> <strong>Cantidad de aulas: </strong> ' . $info_marker->cantidad_aulas .
                        ' <br/> <strong>Agua: </strong> ' . $info_marker->agua .
                        ' <br/> <strong>Electricidad: </strong> ' . $info_marker->electricidad .
                        ' <br/> <strong>Alcantarillado: </strong> ' . $info_marker->alcantarillado .
                        ' <br/> <strong>Gas: </strong> ' . $info_marker->gas .
                        ' <br/> <strong>Cantidad Educadoras: </strong> ' . $info_marker->cantidad_educadoras .
                        ' <br/> <strong>Cantidad  Manipuladoras: </strong> ' . $info_marker->cantidad_manipuladoras .
                        ' <br/> <strong>Nucleo escolar referencia: </strong> ' . $info_marker->nucleo_escolar_ref .
                        ' <br/> <strong>Centro de salud referencia: </strong> ' . $info_marker->centro_salud_ref .
                        ' <br/> <strong>Linea bus o minibus: </strong> ' . $info_marker->linea_bus_minibus;
                $marker['id'] = $info_marker->id;
                $this->googlemaps->add_marker($marker);
            }
        }

        $data['datos'] = $this->cim_model->get_markers_general_cim();
        $data['map'] = $this->googlemaps->create_map();



        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('centro_infantil/mapa_view_general', $data);
    }

    public function reporte_general() {
        $this->load->library('highcharts');
        $serie['data'] = array(
            array('1 A 11 MESES ', $this->nino_model->edad(0, 0.11)),
            array('1 ANO', $this->nino_model->edad(1, 1.9)),
            array('2 ANOS', $this->nino_model->edad(2, 2.9)),
            array('3 ANOS', $this->nino_model->edad(3, 3.9)),
            array('4 ANOS', $this->nino_model->edad(4, 4.9)),
            array('5 ANOS', $this->nino_model->edad(5, 5.9)),
            array('6 ANOS', $this->nino_model->edad(6, 6.9))
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' Registros '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Centros Infantiles', 'Por Edad ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts'] = $this->highcharts->render();

        $t = $this->nino_model->total_registros();
        $serie['data'] = array(
            array('Masculino ', round(($this->nino_model->sexo('Masculino') * 100) / $t)),
            array('Femenino', round(($this->nino_model->sexo('Femenino') * 100) / $t))
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Centros Infantiles', 'Por Sexo ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts10'] = $this->highcharts->render();

//round(($this->cim_model->cobertura(1, 20)*100)/$t)
  


        $serie['data'] = array(
            array('1 - 10 gramos', round(($this->nino_model->peso(1, 10.9) * 100) / $t)),
            array('11 - 20 gramos', round(($this->nino_model->peso(11, 20.9) * 100) / $t)),
            array('21 - 30 gramos', round(($this->nino_model->peso(21, 30.9) * 100) / $t)),
            array('31 - 40 gramos', round(($this->nino_model->peso(31, 40) * 100) / $t)),
            array('Vacias ', round(($this->nino_model->peso(1,1) * 100) / $t))
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' % '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Centros Infantiles', 'Por Peso');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts3'] = $this->highcharts->render();


        $serie['data'] = array(
            array('80 - 85 cm', round(($this->nino_model->talla(80, 85.9) * 100) / $t)),
            array('86 - 90 cm', round(($this->nino_model->talla(86, 90.9) * 100) / $t)),
            array('91 - 95 cm  ', round(($this->nino_model->talla(91, 95.9) * 100) / $t)),
            array('96 - 100 cm ', round(($this->nino_model->talla(96, 100.9) * 100) / $t)),
            array('101 - 105 cm ', round(($this->nino_model->talla(101, 105, 9) * 100) / $t)),
            array('106 - 110 cm ', round(($this->nino_model->talla(106, 110) * 100) / $t))
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Centros Infantiles', 'Por Talla ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts4'] = $this->highcharts->render();


        $total_registros = $this->cim_model->total_registros();
        $graph_data = $this->_servicios_basicos();
        $this->highcharts->set_type('column'); // drauwing type
        $this->highcharts->set_title('Grafico de Centros Infantiles', 'Por Servicios basicos'); // set chart title: title, subtitle(optional)
        $this->highcharts->set_axis_titles('language', $total_registros . ' Centros Infantiles'); // axis titles: x axis,  y axis

        $this->highcharts->set_xAxis($graph_data['axis']); // pushing categories for x axis labels
        $this->highcharts->set_serie($graph_data['users']); // the first serie
        $this->highcharts->set_serie($graph_data['popul']); // second serie
        // we can user credits option to make a link to the source article. 
        // it's possible to pass an object instead of array (but object will be converted to array by the lib)
        //  @$credits->href = 'http://www.internetworldstats.com/stats7.htm';
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);

        //   $this->highcharts->render_to('my_div'); // choose a specific div to render to graph



        $data['charts5'] = $this->highcharts->render();

        $t = $this->cim_model->total_registros();
        $serie['data'] = array(
            array('1 - 20 Beneficiados ', round(($this->cim_model->familias(1, 20) * 100) / $t)),
            array('21 - 40 Beneficiados', round(($this->cim_model->familias(21, 40) * 100) / $t)),
            array('41 - 60 Beneficiados', round(($this->cim_model->familias(41, 60) * 100) / $t)),
            array('61-80 Beneficiados', round(($this->cim_model->familias(61, 80) * 100) / $t)),
            array('81 - 100 Beneficiados', round(($this->cim_model->familias(81, 100) * 100) / $t)),
            array('101 - 120 Beneficiados', round(($this->cim_model->familias(101, 120) * 100) / $t)),
            array('121 - 140 Beneficiados', round(($this->cim_model->familias(121, 140) * 100) / $t)),
            array('141 - 160 Beneficiados', round(($this->cim_model->familias(141, 160) * 100) / $t)),
            array('161 - 200 Beneficiados', round(($this->cim_model->familias(161, 200) * 100) / $t)),
            array('Sin Beneficios', round(($this->cim_model->sin_familias() * 100) / $t))
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Centros Infantiles', 'Por Familias Beneficiadas ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts6'] = $this->highcharts->render();

        $t = $this->cim_model->total_registros();
        $serie['data'] = array(
            array('1 - 15 Becados ', round(($this->cim_model->becados(1, 16) * 100) / $t)),
            array('Sin Becas', round(($this->cim_model->sin_becas() * 100) / $t))
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' %'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Centros Infantiles', 'Por Familias Beneficiadas ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts7'] = $this->highcharts->render();

        $data['datos'] = $this->cim_model->get_markers_general_cim();

        $crud = new grocery_CRUD();
        $crud->set_table('datosnino');
        /*   $crud->columns('id_cim', 'nombre', 'responsable', 'fecha_inauguracion', 'distrito', 'zona', 'calle', 'numero', 'telf', 'email', 'numero_ninos', 'administracion', 'infraestructura_pertenece'
          , 'cocina', 'bano', 'patio', 'muro_perimetral', 'almacen', 'comedor', 'sala_psicomotricidad', 'otro_ambiente', 'aulas_independientes', 'cantidad_aulas', 'aulas_detalle', 'agua', 'electricidad', 'alcantarillado', 'gas', 'familias_beneficiadas', 'ninos_becados', 'cantidad_educadoras', 'cantidad_manipuladoras', 'nucleo_escolar_ref', 'defensoria_ref', 'centro_salud_ref', 'linea_bus_minibus');
         */ $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_print();
        $crud->set_subject('datosnino');
        $output = $crud->render();
        $this->_example_output($output);


        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header', $output);
        $this->load->view('ninos/reporte_general', $data);
    }

    function _ambientes() {

        $COCINA = $this->cim_model->cocina();
        $BANO = $this->cim_model->bano();
        $PATIO = $this->cim_model->patio();
        $MURO_PERIMETRAL = $this->cim_model->muro_perimetral();
        $ALMACEN = $this->cim_model->almacen();
        $COMEDOR = $this->cim_model->comedor();
        $SALA_DE_PSICOMOTRICIDAD = $this->cim_model->sala_psicomotricidad();
        $OTRO_AMBIENTE = $this->cim_model->otro_ambiente();

        $COCINA_ = $this->cim_model->cocina_();
        $BANO_ = $this->cim_model->bano_();
        $PATIO_ = $this->cim_model->patio_();
        $MURO_PERIMETRAL_ = $this->cim_model->muro_perimetral_();
        $ALMACEN_ = $this->cim_model->almacen_();
        $COMEDOR_ = $this->cim_model->comedor_();
        $SALA_DE_PSICOMOTRICIDAD_ = $this->cim_model->sala_psicomotricidad_();
        $OTRO_AMBIENTE_ = $this->cim_model->otro_ambiente_();

        $data['users']['data'] = array($COCINA, $BANO, $PATIO, $MURO_PERIMETRAL, $ALMACEN, $COMEDOR, $SALA_DE_PSICOMOTRICIDAD, $OTRO_AMBIENTE);
        $data['users']['name'] = 'Ambientes';
        $data['users']['name'] = 'Si';

        $data['popul']['data'] = array($COCINA_, $BANO_, $PATIO_, $MURO_PERIMETRAL_, $ALMACEN_, $COMEDOR_, $SALA_DE_PSICOMOTRICIDAD_, 0);
        $data['popul']['name'] = 'No';
        $data['axis']['categories'] = array('COCINA', 'BANO', 'PATIO', 'MURO PERIMETRAL', 'ALMACEN', 'COMEDOR', 'SALA DE PSICOMOTRICIDAD', 'OTRO AMBIENTE ');
        /*  $data['popul']['data'] = array(45, 2, 1, 4, 2);
          $data['popul']['name'] = 'World Population';
          $data['axis']['categories'] = array('a', 'b', 'PATIO', 'MURO PERIMETRAL', 'ALMACEN');
         */

        return $data;
    }

    function _servicios_basicos() {

        $agua = $this->cim_model->agua();
        $electricidad = $this->cim_model->electricidad();
        $alcantarillado = $this->cim_model->alcantarillado();
        $gas = $this->cim_model->gas();
        $agua_no = $this->cim_model->agua_no();
        $electricidad_no = $this->cim_model->electricidad_no();
        $alcantarillado_no = $this->cim_model->alcantarillado_no();
        $gas_no = $this->cim_model->gas_no();

        $data['users']['data'] = array($agua, $electricidad, $alcantarillado, $gas,);
        $data['users']['name'] = 'Si';

        $data['popul']['data'] = array($agua_no, $electricidad_no, $alcantarillado_no, $gas_no);
        $data['popul']['name'] = 'No';
        $data['axis']['categories'] = array('AGUA', 'ELECTRICIDAD', 'ALCANTARILLADO', 'GAS  ');
        //  $data['axis']['categories'] = array('a', 'b', 'PATIO', 'MURO PERIMETRAL', 'ALMACEN');


        return $data;
    }

}
