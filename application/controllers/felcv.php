<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Felcv extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'grocery_CRUD', 'table'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('mapa_model');
        $this->load->model('monitoreo_model');
        $this->load->model('provincias_model');
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

    public function index() {

        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('observatorio/index', $data);
    }

    public function aprobar_felcv() {
        $id = $this->uri->segment(3);
        $this->faltas_contravenciones_model->aprobar_felcv($id);

        redirect(base_url() . 'felcv/registros_felcv');
    }

    function borrar_felcv() {
        $id = $this->uri->segment(3);
        $delete = $this->faltas_contravenciones_model->eliminar_felcv($id);
        redirect(base_url() . 'felcv/registros_felcv');
    }
    
     function eliminar($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('felcv', array('felcv.id_felcv' => $row->id_felcv))->row();
        return '<a onClick="if (confirma() == false)
                            return false" href="' . base_url() . 'felcv/borrar_felcv/' . $row->id_felcv . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/eliminar.png" height="45px" title="Eliminar Registro" >
                                                </a>';
    }

    function editar($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('felcv', array('felcv.id_felcv' => $row->id_felcv))->row();
        return '<a  href="' . base_url() . 'felcv/edicion_felcv/' . $row->id_felcv . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/editar.png" height="45px" title="Editar Registro" >
                                                </a>';
    }

    function aprobar($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('felcv', array('felcv.id_felcv' => $row->id_felcv))->row();
        return '<a onClick="if (confirma_aprobar() == false)
                                                                return false" href="' . base_url() . 'felcv/aprobar_felcv/' . $row->id_felcv . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/activado3.png" height="50px" title="Aprobar Formulario">
                                                </a>';
    }

    function copiar($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('felcv', array('felcv.id_felcv' => $row->id_felcv))->row();
        return ' <a  href="' . base_url() . 'felcv/copiar_felcv/' . $row->id_felcv . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/copiar.png" height="50px" title="Copiar Formulario">
                                                </a>';
    }

    public function registros_felcv() {
        
             $crud = new grocery_CRUD();
            $crud->set_table('felcv');
            //  $crud->required_fields('fecha_registro', 'fecha_hecho', 'hora_registro', 'hora_hecho', 'genero', 'genero_agresor', 'edad', 'edad_agresor', 'descripcion');
            $crud->columns('Eliminar Registro','Editar Registro','Aprobar Registro','Copiar Registro',
                    'id_felcv', 'numero', 'cod_numero', 'departamento', 
                 'provincia', 'municipio','unidades_epis_modulos', 'fecha_denuncia', 'hora_denuncia',
                    'mes_registro','fecha_hecho','hora_hecho','n_caso','descargo_policia','division',
                    'casos_atencion','delitos','nombre_denunciante',
                    'nombre_victima','ci_victima','lugar_nacimiento',
                    'genero','edad','temperancia_victima','nivel_instruccion',
                 'motivo_violencia','lugar_hecho',
                    'distrito','zona','avenida','nombre_agresor','ci_agresor',
                    'lugar_nacimiento_agresor','arma','edad_agresor','genero_agresor','temperancia_agresor',
                    'nivel_instruccion_agresor','medios_comunicacion','situacion_agresor','servicio_felcv',
                    'certificado_medico','derivado','tiempo_seguimiento_caso');
         $crud->set_relation('distrito', 'distrito', 'nombre_distrito');
        $crud->set_relation('zona', 'zona', 'nombre');
        $crud->set_relation('gestion', 'gestion', 'nombre_gestion');
        $crud->set_relation('mes_registro', 'mes', 'nombre_mes');
        $crud->set_relation('departamento', 'departamento', 'nombre_departamento');
        $crud->set_relation('provincia', 'provincia', 'nombre_provincia');
        $crud->set_relation('municipio', 'municipio', 'nombre_municipio');
       $crud->set_relation('division', 'division', 'nombre_division');
        $crud->set_relation('unidades_epis_modulos', 'epis', 'nombre_epis');
        $crud->set_relation('division', 'division', 'nombre_division');
        $crud->set_relation('delitos', 'delito', 'nombre_delito');
        $crud->set_relation('nivel_instruccion', 'nivel_instruccion', 'nombre_nivel_instruccion');
        $crud->set_relation('genero', 'genero', 'nombre_genero');
        $crud->set_relation('genero_agresor', 'genero_infractor', 'nombre_genero_infractor');
        
        $crud->set_relation('motivo_violencia', 'motivo_violencia', 'nombre_motivo_violencia');
        $crud->set_relation('lugar_hecho', 'lugar_hecho', 'nombre_lugar_hecho');
        $crud->set_relation('nivel_instruccion_agresor', 'nivel_instruccion_agresor', 'nombre_nivel_instruccion_agresor');
    //    $crud->set_relation('ocupacion_denunciado', 'ocupacion_denunciado', 'nombre_ocupacion_denunciado');
        
        $crud->set_relation('temperancia_victima', 'temperancia', 'nombre_temperancia');
        $crud->set_relation('medios_comunicacion', 'medios_comunicacion', 'nombre_medios_comunicacion');
        $crud->set_relation('situacion_agresor', 'situacion_agresor', 'nombre_situacion_agresor');
        $crud->set_relation('servicio_felcv', 'servicio_felcv', 'nombre_servicio_felcv');
        $crud->set_relation('derivado', 'derivado', 'nombre_derivado');
        $crud->set_relation('temperancia_agresor', 'temperancia', 'nombre_temperancia');
       /// $crud->set_relation('arrestado', 'arrestado', 'nombre_arrestado');
   //     $crud->set_relation('sancion', 'sancion', 'nombre_sancion');

    //    $crud->set_relation('estado_caso', 'estado_caso', 'nombre_estado_caso');
      //  $crud->set_relation('termino_prueba', 'termino_prueba', 'nombre_termino_prueba');
    //    $crud->set_relation('recurso_apelacion', 'recurso_apelacion', 'nombre_recurso_apelacion');
    //    $crud->set_relation('servicio_destacado', 'servicio_destacado', 'nombre_servicio_destacado');
   $crud->callback_column('Eliminar Registro', array($this, 'eliminar'));
        $crud->callback_column('Editar Registro', array($this, 'editar'));
        $crud->callback_column('Aprobar Registro', array($this, 'aprobar'));
        $crud->callback_column('Copiar Registro', array($this, 'copiar'));
            $crud->set_subject('felcv');
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_print();
        
            $output = $crud->render();
            $this->_example_output($output);
            
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
            "unidades_epis_modulos" => $this->faltas_contravenciones_model->unidades_epis_modulos(),
            "casos_atencion" => $this->faltas_contravenciones_model->casos_atencion(),
            "nivel_instruccion" => $this->faltas_contravenciones_model->nivel_instruccion(),
            "motivo_violencia" => $this->faltas_contravenciones_model->motivo_violencia(),
            "lugar_hecho" => $this->faltas_contravenciones_model->lugar_hecho(),
            "nivel_instruccion_agresor" => $this->faltas_contravenciones_model->nivel_instruccion_agresor(),
            "medios_comunicacion" => $this->faltas_contravenciones_model->medios_comunicacion(),
            "situacion_agresor" => $this->faltas_contravenciones_model->situacion_agresor(),
            "servicio_felcv" => $this->faltas_contravenciones_model->servicio_felcv(),
            "derivado" => $this->faltas_contravenciones_model->derivado(),
            "felcv" => $this->faltas_contravenciones_model->felcv(),
        );
        $this->load->library('googlemaps');
        $config = array();
        $config['center'] = '-16.506438243849082,-68.1624944201966';
        $config['zoom'] = '14';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '90%';
        $config['map_height'] = '850px';
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
        $marker['position'] = '-16.506438243849082,-68.1624944201966';
        $marker['draggable'] = true;
        $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';

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
//       $this->googlemaps->add_polygon($cam1);
//$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
//si queremos que se pueda arrastrar el marker
//$marker['draggable'] = TRUE;
//si queremos darle una id, muy útil
//creamos el mapa y lo asignamos a map que lo 
//tendremos disponible en la vista mapa_view con el array data
        $data['datos'] = $this->mapa_model->get_markers_general_monitoreo_ubicacion();
        $data['map'] = $this->googlemaps->create_map();


// $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header',$output);
        $this->load->view('felcv/registros_felcv', $data);
    }

    public function guardar_felcv() {


        $date = strtotime($this->input->post('fecha_hecho'));
        $dia = date("w", $date);
        $year = date("Y", $date);
        $guardar_felcv = array(
            'numero' => $this->input->post('numero'),
            'cod_numero' => $this->input->post('cod_numero'),
            'departamento' => $this->input->post('departamento'),
            'provincia' => $this->input->post('provincia'),
            'municipio' => $this->input->post('municipio'),
            'unidades_epis_modulos' => $this->input->post('unidades_epis_modulos'),
            'fecha_denuncia' => $this->input->post('fecha_denuncia'),
            'hora_denuncia' => $this->input->post('hora_denuncia'),
            'mes_registro' => $this->input->post('mes_registro'),
            'fecha_hecho' => $this->input->post('fecha_hecho'),
            'hora_hecho' => $this->input->post('hora_hecho'),
            'n_caso' => $this->input->post('n_caso'),
            'descargo_policia' => $this->input->post('descargo_policia'),
            'division' => $this->input->post('division'),
            'casos_atencion' => $this->input->post('casos_atencion'),
            'delitos' => $this->input->post('delitos'),
            'nombre_denunciante' => $this->input->post('nombre_denunciante'),
            'nombre_victima' => $this->input->post('nombre_victima'),
            'ci_victima' => $this->input->post('ci_victima'),
            'lugar_nacimiento' => $this->input->post('lugar_nacimiento'),
            'genero' => $this->input->post('genero'),
            'edad' => $this->input->post('edad'),
            'temperancia_victima' => $this->input->post('temperancia_victima'),
            'nivel_instruccion' => $this->input->post('nivel_instruccion'),
            'motivo_violencia' => $this->input->post('motivo_violencia'),
            'lugar_hecho' => $this->input->post('lugar_hecho'),
            'distrito' => $this->input->post('provincias'),
            'zona' => $this->input->post('poblaciones'),
            'avenida' => $this->input->post('avenida'),
            'nombre_agresor' => $this->input->post('nombre_agresor'),
            'ci_agresor' => $this->input->post('ci_agresor'),
            'lugar_nacimiento_agresor' => $this->input->post('lugar_nacimiento_agresor'),
            'arma' => $this->input->post('arma'),
            'edad_agresor' => $this->input->post('edad_agresor'),
            'genero_agresor' => $this->input->post('genero_agresor'),
            'temperancia_agresor' => $this->input->post('temperancia_agresor'),
            'nivel_instruccion_agresor' => $this->input->post('nivel_instruccion_agresor'),
            'medios_comunicacion' => $this->input->post('medios_comunicacion'),
            'situacion_agresor' => $this->input->post('situacion_agresor'),
            'servicio_felcv' => $this->input->post('servicio_felcv'),
            'certificado_medico' => $this->input->post('certificado_medico'),
            'derivado' => $this->input->post('derivado'),
            'tiempo_seguimiento_caso' => $this->input->post('tiempo_seguimiento_caso'),
            'pos_x' => $this->input->post('pos_x'),
            'pos_y' => $this->input->post('pos_y'),
            'estado_aprobacion' => $this->input->post('estado_aprobacion'),
            'dia' => $dia,
            'gestion' => $year,
            'usuario' => $this->session->userdata('id_usuario')
        );

//  $id_distrito = $this->input->post('provincias');

        $this->faltas_contravenciones_model->guardar_felcv($guardar_felcv);

        redirect(base_url() . 'felcv/registros_felcv');
    }

    public function edicion_felcv() {
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
            "unidades_epis_modulos" => $this->faltas_contravenciones_model->unidades_epis_modulos(),
            "casos_atencion" => $this->faltas_contravenciones_model->casos_atencion(),
            "nivel_instruccion" => $this->faltas_contravenciones_model->nivel_instruccion(),
            "motivo_violencia" => $this->faltas_contravenciones_model->motivo_violencia(),
            "lugar_hecho" => $this->faltas_contravenciones_model->lugar_hecho(),
            "nivel_instruccion_agresor" => $this->faltas_contravenciones_model->nivel_instruccion_agresor(),
            "medios_comunicacion" => $this->faltas_contravenciones_model->medios_comunicacion(),
            "situacion_agresor" => $this->faltas_contravenciones_model->situacion_agresor(),
            "servicio_felcv" => $this->faltas_contravenciones_model->servicio_felcv(),
            "derivado" => $this->faltas_contravenciones_model->derivado(),
            "felcv" => $this->faltas_contravenciones_model->felcv(),
        );
        $id_felcv = $this->uri->segment(3);

        $edit = $this->faltas_contravenciones_model->felcv_edit($id_felcv);
        foreach ($edit as $e):
            //$e->pos_x;
        endforeach;
        $this->load->library('googlemaps');
        $config = array();
        $config['center'] = $e->pos_y . ',' . $e->pos_x;
        $this->load->library('googlemaps');
        $config = array();
        $config['center'] = '-16.506438243849082,-68.1624944201966';
        $config['zoom'] = '14';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '90%';
        $config['map_height'] = '850px';
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
        $marker['position'] = $e->pos_y . ',' . $e->pos_x;
        $marker['draggable'] = true;
        $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';

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
//       $this->googlemaps->add_polygon($cam1);
//$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
//si queremos que se pueda arrastrar el marker
//$marker['draggable'] = TRUE;
//si queremos darle una id, muy útil
//creamos el mapa y lo asignamos a map que lo 
//tendremos disponible en la vista mapa_view con el array data
        $data['datos'] = $this->mapa_model->get_markers_general_monitoreo_ubicacion();
        $data['map'] = $this->googlemaps->create_map();

        $id_felcv = $this->uri->segment(3);
        $data['edit'] = $this->faltas_contravenciones_model->felcv_edit($id_felcv);
// $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('felcv/editar_felcv', $data);
    }

    public function copiar_felcv() {
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
            "unidades_epis_modulos" => $this->faltas_contravenciones_model->unidades_epis_modulos(),
            "casos_atencion" => $this->faltas_contravenciones_model->casos_atencion(),
            "nivel_instruccion" => $this->faltas_contravenciones_model->nivel_instruccion(),
            "motivo_violencia" => $this->faltas_contravenciones_model->motivo_violencia(),
            "lugar_hecho" => $this->faltas_contravenciones_model->lugar_hecho(),
            "nivel_instruccion_agresor" => $this->faltas_contravenciones_model->nivel_instruccion_agresor(),
            "medios_comunicacion" => $this->faltas_contravenciones_model->medios_comunicacion(),
            "situacion_agresor" => $this->faltas_contravenciones_model->situacion_agresor(),
            "servicio_felcv" => $this->faltas_contravenciones_model->servicio_felcv(),
            "derivado" => $this->faltas_contravenciones_model->derivado(),
            "felcv" => $this->faltas_contravenciones_model->felcv(),
        );
        $id_felcv = $this->uri->segment(3);

        $edit = $this->faltas_contravenciones_model->felcv_edit($id_felcv);
        foreach ($edit as $e):
            //$e->pos_x;
        endforeach;
        $this->load->library('googlemaps');
        $config = array();
        $config['center'] = $e->pos_y . ',' . $e->pos_x;
        $this->load->library('googlemaps');
        $config = array();
        $config['center'] = '-16.506438243849082,-68.1624944201966';
        $config['zoom'] = '14';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '90%';
        $config['map_height'] = '850px';
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
        $marker['position'] = $e->pos_y . ',' . $e->pos_x;
        $marker['draggable'] = true;
        $marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';

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
//       $this->googlemaps->add_polygon($cam1);
//$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
//si queremos que se pueda arrastrar el marker
//$marker['draggable'] = TRUE;
//si queremos darle una id, muy útil
//creamos el mapa y lo asignamos a map que lo 
//tendremos disponible en la vista mapa_view con el array data
        $data['datos'] = $this->mapa_model->get_markers_general_monitoreo_ubicacion();
        $data['map'] = $this->googlemaps->create_map();

        $id_felcv = $this->uri->segment(3);
        $data['edit'] = $this->faltas_contravenciones_model->felcv_edit($id_felcv);
// $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('felcv/copiar_felcv', $data);
    }

    public function update_felcv() {


        $date = strtotime($this->input->post('fecha_hecho'));
        $dia = date("d", $date);

      $guardar_felcv = array(
            'numero' => $this->input->post('numero'),
            'cod_numero' => $this->input->post('cod_numero'),
            'departamento' => $this->input->post('departamento'),
            'provincia' => $this->input->post('provincia'),
            'municipio' => $this->input->post('municipio'),
            'unidades_epis_modulos' => $this->input->post('unidades_epis_modulos'),
            'fecha_denuncia' => $this->input->post('fecha_denuncia'),
            'hora_denuncia' => $this->input->post('hora_denuncia'),
            'mes_registro' => $this->input->post('mes_registro'),
            'fecha_hecho' => $this->input->post('fecha_hecho'),
            'hora_hecho' => $this->input->post('hora_hecho'),
            'n_caso' => $this->input->post('n_caso'),
            'descargo_policia' => $this->input->post('descargo_policia'),
            'division' => $this->input->post('division'),
            'casos_atencion' => $this->input->post('casos_atencion'),
            'delitos' => $this->input->post('delitos'),
            'nombre_denunciante' => $this->input->post('nombre_denunciante'),
            'nombre_victima' => $this->input->post('nombre_victima'),
            'ci_victima' => $this->input->post('ci_victima'),
            'lugar_nacimiento' => $this->input->post('lugar_nacimiento'),
            'genero' => $this->input->post('genero'),
            'edad' => $this->input->post('edad'),
            'temperancia_victima' => $this->input->post('temperancia_victima'),
            'nivel_instruccion' => $this->input->post('nivel_instruccion'),
            'motivo_violencia' => $this->input->post('motivo_violencia'),
            'lugar_hecho' => $this->input->post('lugar_hecho'),
            'distrito' => $this->input->post('provincias'),
            'zona' => $this->input->post('poblaciones'),
            'avenida' => $this->input->post('avenida'),
            'nombre_agresor' => $this->input->post('nombre_agresor'),
            'ci_agresor' => $this->input->post('ci_agresor'),
            'lugar_nacimiento_agresor' => $this->input->post('lugar_nacimiento_agresor'),
            'arma' => $this->input->post('arma'),
            'edad_agresor' => $this->input->post('edad_agresor'),
            'genero_agresor' => $this->input->post('genero_agresor'),
            'temperancia_agresor' => $this->input->post('temperancia_agresor'),
            'nivel_instruccion_agresor' => $this->input->post('nivel_instruccion_agresor'),
            'medios_comunicacion' => $this->input->post('medios_comunicacion'),
            'situacion_agresor' => $this->input->post('situacion_agresor'),
            'servicio_felcv' => $this->input->post('servicio_felcv'),
            'certificado_medico' => $this->input->post('certificado_medico'),
            'derivado' => $this->input->post('derivado'),
            'tiempo_seguimiento_caso' => $this->input->post('tiempo_seguimiento_caso'),
            'pos_x' => $this->input->post('pos_x'),
            'pos_y' => $this->input->post('pos_y')
        );

        $id_felcv = $this->input->post('id_felcv');
//  $id_distrito = $this->input->post('provincias');

        $this->faltas_contravenciones_model->update_felcv($guardar_felcv, $id_felcv);

        redirect(base_url() . 'felcv/registros_felcv');
    }
     public function excel_felcv() {
        $this->load->model('faltas_contravenciones_model');
        to_excel($this->faltas_contravenciones_model->get_felcv(), "felcv");
    }

}
