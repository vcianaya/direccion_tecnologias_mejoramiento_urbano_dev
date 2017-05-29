<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Alumbrado extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'grocery_CRUD', 'table'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('mapa_model');
        $this->load->model('monitoreo_model');
        $this->load->model('provincias_model');
        $this->load->model('felcc_model');
        $this->load->model('cim_model');
        $this->load->model('faltas_contravenciones_model');
        $this->load->model('alumbrado_model');
        $this->load->helper('mysql_to_excel_helper');

        $this->load->database('default');
//        $this->load->library(array('form_validation', 'grocery_CRUD', 'table'));

        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'administrador') {
            redirect(base_url() . 'login');
        }
    }

    public function distritos_alumbrado() {
        $data = array(
                //  "tipo_operativo" => $this->provincias_model->tipo_caso_monitoreo()
        );
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('alumbrado/distritos_alumbrado', $data);
    }

    public function distritos_3_alumbrado() {
        $data = array(
            "_3_px_013" => $this->alumbrado_model->distrito_3(34)
        );
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('alumbrado/distrito_3', $data);
    }

    public function distritos_4_alumbrado($id) {
        $data['id'] = $id;
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        //  $this->load->view('header');
        $this->load->view('alumbrado/distrito_3_1', $data);
    }

    public function excel() {
        $this->load->model('cim_model');
        to_excel($this->cim_model->get(), "archivoexcel");
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
        $data = $this->db->get_where('defensoria', array('defensoria.id' => $row->id))->row();
        return '<a  href="' . base_url() . 'dna/edicion_defensoria/' . $row->id . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/editar_dna.png" height="45px" title="Editar Registro" >
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

    function ver_nforme($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('defensoria', array('defensoria.id' => $row->id))->row();
        return '<a  href="' . base_url() . 'dna/ver_informe/' . $row->id . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/imprimir.png" height="45px" title="Ver Informe Defensoria de la Ninez y Adolescencia" >
                                                </a>';
    }

    function seguimiento($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('defensoria', array('defensoria.id' => $row->id))->row();


        return '<a data-toggle="modal" data-id="' . $row->id . ' " shape="poly"
                                                   href="#myModalDistrito" class="open-ModalD1">
                                                    <img type="image" src="' . base_url() . '/assets/img/caso_nuevo.png" height="45px" title="Agregar Caso nuevo o de Seguimiento">
                                                </a>';
    }

    function descripcion_seguimiento($value, $row) {
        $this->load->model('mapa_model'); // your model
        $data = $this->mapa_model->get_seguimiento($row->id); // iam using session here

        if (!$data) {
            $hasil = '<table  border="1" > No Existe Ningun Caso';
        } else {
            $hasil = '  <table  border="2" ><tr>

          <td><strong>Acciones del Area de Trabajo Social</strong></td>
          <td><strong>Acciones del Area Psicologica</strong></td>
          <td><strong>Acciones del Area Legal</strong></td>
          <td><strong>Editar Caso</strong></td>
          </tr>';
            foreach ($data as $x) {
                $hasil .=' <tr><td> ' . $x->acciones_trabajo_social . ' </td>'
                        . ' <td> ' . $x->acciones_area_psicologica . '  </td>
          <td> ' . $x->acciones_area_legal . '  </td> '
                        . '<td> ' . ' <a  href="' . base_url() . 'dna/editar_seguimiento/' . $x->id . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/editar_caso.png" height="35px" title="Editar Caso">
                                                </a>' . '  </td></tr>';
            }
        }
        return $hasil . '</table>';
        /*
          $this->load->model('mapa_model'); // your model
          $data = $this->mapa_model->get_markers_decomisos($row->id_operativo); // iam using session here
          $hasil = '<select name="officeCode">';
          foreach ($data as $x) {
          $hasil .='<option value="' . $x->nombre_item . '">' . $x->nombre_item . '</option>';
          }
          return $hasil . '</select>'; */
    }

    public function editar_seguimiento() {
        $id = $this->uri->segment(3);

        $data["edit"] = $this->mapa_model->defensoria_edit($id);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');

        //     $this->load->view('header', $output2);
        $this->load->view('header');
        $this->load->view('defensorias/editar_seguimiento', $data);
    }

    public function ver_informe() {
        $id = $this->uri->segment(3);
        $data['edit'] = $this->cim_model->ver_informe($id);
        $data['vehiculos'] = $this->cim_model->ver_informe_vehiculo($id);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('defensorias/ver_informe', $data);
    }

    public function guardar_seguimiento() {


        $guardar_seguimiento = array(
            'id_usuario' => $this->session->userdata('id_usuario'),
            'id_dna' => $this->input->post('DNI'),
            'nro' => $this->input->post('nro'),
            'nro_caso' => $this->input->post('nro_caso'),
            'nombres_apellidos' => $this->input->post('nombres_apellidos'),
            'distrito_seguimiento' => $this->input->post('distrito_seguimiento'),
            'mes_seguimiento' => $this->input->post('mes_seguimiento'),
            'gestion_seguimiento' => $this->input->post('gestion_seguimiento'),
            'estado_caso' => $this->input->post('estado_caso'),
            'tipologia_principal' => $this->input->post('tipologia_principal'),
            'tipologia_secundaria' => $this->input->post('tipologia_secundaria'),
            'sexo' => $this->input->post('sexo'),
            'edad' => $this->input->post('edad'),
            'areas' => $this->input->post('areas'),
            'acciones_trabajo_social' => $this->input->post('acciones_trabajo_social'),
            'acciones_area_psicologica' => $this->input->post('acciones_area_psicologica'),
            'acciones_area_legal' => $this->input->post('acciones_area_legal'),
            'ministerio_publico_nro_caso' => $this->input->post('ministerio_publico_nro_caso'),
            'proceso_jusgado_de_caso_nombres' => $this->input->post('proceso_jusgado_de_caso_nombres'),
            'observaciones' => $this->input->post('observaciones')
        );


        $this->mapa_model->guardar_seguimiento($guardar_seguimiento);
        $id_dna = $this->input->post('DNI');
        $defensoria = $this->mapa_model->defensoria($id_dna);
        foreach ($defensoria as $pr) :

        endforeach;

        $guardar_seguimiento2 = array(
            'tipologia_principal' => $pr->tipologia_principal,
            'tipologia_secundaria' => $pr->tipologia_secundaria,
            'distrito_seguimiento' => $pr->distrito,
            'mes_seguimiento' => $pr->mes,
            'gestion_seguimiento' => $pr->year
        );
        $this->mapa_model->guardar_seguimiento2($guardar_seguimiento2, $id_dna);

        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'dna/registro_dna');
    }

    public function update_seguimiento() {
        $id_dna = $this->input->post('DNI');
        $guardar_seguimiento2 = array(
            'nro' => $this->input->post('nro'),
            'nro_caso' => $this->input->post('nro_caso'),
            'nombres_apellidos' => $this->input->post('nombres_apellidos'),
            'distrito_seguimiento' => $this->input->post('distrito_seguimiento'),
            'mes_seguimiento' => $this->input->post('mes_seguimiento'),
            'gestion_seguimiento' => $this->input->post('gestion_seguimiento'),
            'estado_caso' => $this->input->post('estado_caso'),
            'tipologia_principal' => $this->input->post('tipologia_principal'),
            'tipologia_secundaria' => $this->input->post('tipologia_secundaria'),
            'sexo' => $this->input->post('sexo'),
            'edad' => $this->input->post('edad'),
            'areas' => $this->input->post('areas'),
            'acciones_trabajo_social' => $this->input->post('acciones_trabajo_social'),
            'acciones_area_psicologica' => $this->input->post('acciones_area_psicologica'),
            'acciones_area_legal' => $this->input->post('acciones_area_legal'),
            'ministerio_publico_nro_caso' => $this->input->post('ministerio_publico_nro_caso'),
            'proceso_jusgado_de_caso_nombres' => $this->input->post('proceso_jusgado_de_caso_nombres'),
            'observaciones' => $this->input->post('observaciones')
        );
        $this->mapa_model->update_seguimiento($guardar_seguimiento2, $id_dna);
        $this->session->set_flashdata('correcto', 'Registrado correctamente!');
        redirect(base_url() . 'dna/registro_dna');
    }

    function descripcion($value, $row) {
        $this->load->model('mapa_model'); // your model
        $data = $this->mapa_model->get_markers_postes($row->id); // iam using session here

        if (!$data) {
            $hasil = '<table  border="1" > No Existe Postes';
        } else {
            $hasil = '  <table  border="2" ><tr>

          <td><strong>Numero Poste</strong></td>
          <td><strong>Pos x</strong></td>
          <td><strong>Pos y</strong></td>
         
          </tr>';
            foreach ($data as $x) {
                $hasil .=' <tr><td> ' . $x->numero_poste . ' </td>'
                        . ' <td> ' . $x->pos_x_p . ' </td>
          <td> ' . $x->pos_y_p . '  </td> ';
            }
        }
        return $hasil . '</table>';
    }

    public function registro_alumbrado() {

        $crud = new grocery_CRUD();
        $crud->set_table('luminarias');
        $crud->columns('id', 'distrito', 'zona', 'direccion', 'area', 'nro_postes_luz', 'nro_no_funcionan', 'video_si_no', 'video', 'Postes', 'Agregar Poste', 'imagen_area');
        $crud->edit_fields('video', 'imagen_area', 'direccion');
        //   $crud->edit_fields('distrito','direccion','entidad','motivo','trabajo_realizado','realizado_por',
        //         'nombre_propietario','cargo_propietario','imagen_soporte','fecha','hora','pos_x', 'pos_y');
        //   $crud->set_relation('entidad', 'entidad', 'nombre_entidad');
        $crud->set_relation('distrito', 'distrito', 'nombre_distrito');
        $crud->set_relation('zona', 'zona', 'nombre');
        $crud->set_relation('area', 'area', 'codigo_area');
        //    $crud->callback_column('Editar DNA', array($this, 'editar'));
        //   $crud->set_relation('realizado_por', 'users', 'username');
        //    $crud->set_relation_n_n('tipo_trabajo_realizar', 'soporte_trabajo', 'tipo_trabajo', 'id_soporte_tecnico', 'id_tipo_trabajo', 'nombre_tipo_trabajo');
        $crud->callback_column('Agregar Poste', array($this, 'ver_postes'));
        $crud->callback_column('Verificacion', array($this, 'ver_verificacion'));
        $crud->callback_column('Postes', array($this, 'descripcion'));

        $crud->set_field_upload('video', 'assets/uploads/soporte');
        $crud->set_field_upload('imagen_area', 'assets/uploads/soporte');
        $crud->callback_add_field('estado_area_plaza', function () {
            return '<label>
            <input type="radio" name="estado_area_plaza" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="estado_area_plaza" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('rejas_descubiertas', function () {
            return '<label>
            <input type="radio" name="rejas_descubiertas" value="SI" id="RadioGroup1_0">
          SI</label>
  
          <label>
            <input name="rejas_descubiertas" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('rejas_cerradas', function () {
            return '<label>
            <input type="radio" name="rejas_cerradas" value="SI" id="RadioGroup1_0">
          SI</label>
       
          <label>
            <input name="rejas_cerradas" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('equipamiento_area', function () {
            return '<label>
            <input type="radio" name="equipamiento_area" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="equipamiento_area" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('banqueta_area', function () {
            return '<label>
            <input type="radio" name="banqueta_area" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="banqueta_area" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('basureros', function () {
            return '<label>
            <input type="radio" name="basureros" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="basureros" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('monumentos', function () {
            return '<label>
            <input type="radio" name="monumentos" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="monumentos" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('plaquetas_creacion', function () {
            return '<label>
            <input type="radio" name="plaquetas_creacion" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="plaquetas_creacion" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('area_verde', function () {
            return '<label>
            <input type="radio" name="area_verde" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="area_verde" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('mantenimiento', function () {
            return '<label>
            <input type="radio" name="mantenimiento" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="mantenimiento" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });

        $crud->callback_add_field('limpias', function () {
            return '<label>
            <input type="radio" name="limpias" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="limpias" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('actividades_servicios', function () {
            return '<label>
            <input type="radio" name="actividades_servicios" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="actividades_servicios" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('modulo_policial', function () {
            return '<label>
            <input type="radio" name="modulo_policial" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="modulo_policial" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('centro_salud', function () {
            return '<label>
            <input type="radio" name="centro_salud" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="centro_salud" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('parada_trasnporte', function () {
            return '<label>
            <input type="radio" name="parada_trasnporte" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="parada_trasnporte" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('comercio', function () {
            return '<label>
            <input type="radio" name="comercio" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="comercio" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('venta_comidas', function () {
            return '<label>
            <input type="radio" name="venta_comidas" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="venta_comidas" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('snacks', function () {
            return '<label>
            <input type="radio" name="snacks" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="snacks" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('venta_productos', function () {
            return '<label>
            <input type="radio" name="venta_productos" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="venta_productos" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });



        $crud->callback_add_field('estado_area_parques', function () {
            return '<label>
            <input type="radio" name="estado_area_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="estado_area_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('rejas_descubiertas_parques', function () {
            return '<label>
            <input type="radio" name="rejas_descubiertas_parques" value="SI" id="RadioGroup1_0">
          SI</label>
  
          <label>
            <input name="rejas_descubiertas_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('rejas_cerradas_parques', function () {
            return '<label>
            <input type="radio" name="rejas_cerradas_parques" value="SI" id="RadioGroup1_0">
          SI</label>
       
          <label>
            <input name="rejas_cerradas_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('equipamiento_area_parques', function () {
            return '<label>
            <input type="radio" name="equipamiento_area_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="equipamiento_area_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });




        $crud->callback_add_field('banquetas_parques', function () {
            return '<label>
            <input type="radio" name="banquetas_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="banquetas_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('basureros_parques', function () {
            return '<label>
            <input type="radio" name="basureros_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="basureros_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('monumentos_parques', function () {
            return '<label>
            <input type="radio" name="monumentos_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="monumentos_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('plaquetas_creacion_parques', function () {
            return '<label>
            <input type="radio" name="plaquetas_creacion_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="plaquetas_creacion_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('juego_para_nino_parques', function () {
            return '<label>
            <input type="radio" name="juego_para_nino_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="juego_para_nino_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('area_verde_parques', function () {
            return '<label>
            <input type="radio" name="area_verde_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="area_verde_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('mantenimiento_parques', function () {
            return '<label>
            <input type="radio" name="mantenimiento_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="mantenimiento_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('limpias_parques', function () {
            return '<label>
            <input type="radio" name="limpias_parques" value="B" id="RadioGroup1_0">
          BUENO</label>
        
          <label>
            <input name="limpias_parques" type="radio" id="RadioGroup1_1" value="M">
            MALO</label>';
        });
        $crud->callback_add_field('actividades_servicios_parques', function () {
            return '<label>
            <input type="radio" name="actividades_servicios_parques" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="actividades_servicios_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('modulo_policial_parques', function () {
            return '<label>
            <input type="radio" name="modulo_policial_parques" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="modulo_policial_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('centro_salud_parques', function () {
            return '<label>
            <input type="radio" name="centro_salud_parques" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="centro_salud_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('parada_transporte', function () {
            return '<label>
            <input type="radio" name="parada_transporte" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="parada_transporte" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('comercio_parques', function () {
            return '<label>
            <input type="radio" name="comercio_parques" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="comercio_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('venta_comidas_parques', function () {
            return '<label>
            <input type="radio" name="venta_comidas_parques" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="venta_comidas_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('snacks_parques', function () {
            return '<label>
            <input type="radio" name="snacks_parques" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="snacks_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });
        $crud->callback_add_field('venta_productos_parques', function () {
            return '<label>
            <input type="radio" name="venta_productos_parques" value="SI" id="RadioGroup1_0">
          SI</label>
        
          <label>
            <input name="venta_productos_parques" type="radio" id="RadioGroup1_1" value="NO">
            NO</label>';
        });





        $crud->callback_add_field('video_si_no', function () {
            return ' <select name="video_si_no" id="video_si_no">
          <option>SELECCIONAR...</option>
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select>';
        });

        $crud->callback_edit_field('video_si_no', function () {
            return ' <select name="video_si_no" id="video_si_no">
          <option>SELECCIONAR...</option>
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select>';
        });
        $crud->callback_add_field('pos_y', function () {
            return '<input type="text" name="pos_y" value=""  id="pos_y" placeholder="click en el Mapa"  />';
        });
        $crud->callback_add_field('pos_x', function () {
            return '<input type="text" name="pos_x" value=""  id="pos_x" placeholder="click en el Mapa"  />';
        });

        //    $crud->callback_add_field('mapas', 'mapa');
        $this->load->library('gc_dependent_select');
        $fields = array(
            // first field:
            'distrito' => array(// first dropdown name
                'table_name' => 'distrito', // table of country
                'title' => 'nombre', // country title
                'relate' => null // the first dropdown hasn't a relation
            ),
            // second field
            'zona' => array(// second dropdown name
                'table_name' => 'zona', // table of state
                'title' => 'nombre', // state title
                'id_field' => 'id', // table of state: primary key
                'relate' => 'id_distrito', // table of state:
                'data-placeholder' => 'select state' //dropdown's data-placeholder:
            )
        );

        $config = array(
            'main_table' => 'distrito',
            'main_table_primary' => 'id',
            "url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/', //path to method
            'ajax_loader' => base_url() . 'ajax-loader.gif', // path to ajax-loader image. It's an optional parameter
            'segment_name' => 'Your_segment_name'
        );




        $categories = new gc_dependent_select($crud, $fields, $config);

        // first method:
        //$output = $categories->render();
        // the second method:
        $js = $categories->get_js();
        $output = $crud->render();
        $output->output.= $js;
        $this->_example_output($output);
//        $this->load->view('distritos/distritos');
        //       $data['map'] = $this->googlemaps->create_map();
// $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header', $output);
        $this->load->view('alumbrado/registro_alumbrado', $data);
    }

    public function registro_areas() {

        $crud = new grocery_CRUD();
        $crud->set_table('area');
//        $crud->columns('id', 'distrito', 'zona', 'direccion', 'area', 'nro_postes_luz', 'nro_no_funcionan', 'video_si_no', 'video', 'Postes', 'Agregar Poste');
        //   $crud->edit_fields('distrito','direccion','entidad','motivo','trabajo_realizado','realizado_por',
        //         'nombre_propietario','cargo_propietario','imagen_soporte','fecha','hora','pos_x', 'pos_y');
        //   $crud->set_relation('entidad', 'entidad', 'nombre_entidad');
        //  $crud->set_relation('distrito', 'distrito', 'nombre_distrito');
        //      $crud->set_relation('zona', 'zona', 'nombre');
        //    $crud->set_relation('area', 'area', 'codigo_area');
        //    $crud->callback_column('Editar DNA', array($this, 'editar'));
        //   $crud->set_relation('realizado_por', 'users', 'username');
        //    $crud->set_relation_n_n('tipo_trabajo_realizar', 'soporte_trabajo', 'tipo_trabajo', 'id_soporte_tecnico', 'id_tipo_trabajo', 'nombre_tipo_trabajo');
        /*   $crud->callback_column('Agregar Poste', array($this, 'ver_postes'));
          $crud->callback_column('Verificacion', array($this, 'ver_verificacion'));
          $crud->callback_column('Postes', array($this, 'descripcion'));

          $crud->set_field_upload('video', 'assets/uploads/soporte');
         */
        //    $crud->callback_add_field('mapas', 'mapa');


        $crud->unset_read();
        $crud->unset_delete();
        $output = $crud->render();
        $this->_example_output($output);
//        $this->load->view('distritos/distritos');
        //       $data['map'] = $this->googlemaps->create_map();
// $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header', $output);
        $this->load->view('alumbrado/registro_areas', $data);
    }

    function ver_postes($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('luminarias', array('luminarias.id' => $row->id))->row();
        return '<a  href="' . base_url() . 'alumbrado/registro_postes/add/' . $row->id . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/caso_nuevo.png" height="45px" title="Imprimir" >
                                                </a>';
    }

    function ver_area2($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('postes', array('postes.luminaria' => $row->luminaria))->row();
        return '<a  href="' . base_url() . 'alumbrado/registro_postes/add/' . $row->luminaria . '">
                                                    <img type="image" src="' . base_url() . '/assets/img/caso_nuevo.png" height="45px" title="Imprimir" >
                                                </a>';
    }

    function ver_area($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('postes', array('postes.luminaria' => $row->luminaria))->row();
        $this->load->model('mapa_model'); // your model
        $data = $this->mapa_model->luminaria($row->luminaria); // iam using session here

        if (!$data) {
            $hasil = '<table> No Existe Postes';
        } else {
            $hasil = '  <table><tr>

          <td></td>
         
         
          </tr>';
            foreach ($data as $x) {
                $hasil .=' <tr><td> ' . $x->codigo_area . ' </td>'
                ;
            }
        }
        return $hasil . '</table>';
    }

    public function registro_postes() {
        $id_luminaria = $this->uri->segment(4);
        $crud = new grocery_CRUD();
        $crud->set_table('postes');
        $crud->columns('Area', 'luminaria', 'numero_poste', 'estructura_poste', 'tipo_poste', 'tipo_luminaria', 'potencia', 'funciona_poste_si_no', 'pos_x_p', 'pos_y_p');
        //   $crud->edit_fields('distrito','direccion','entidad','motivo','trabajo_realizado','realizado_por',
        //         'nombre_propietario','cargo_propietario','imagen_soporte','fecha','hora','pos_x', 'pos_y');
        //   $crud->set_relation('entidad', 'entidad', 'nombre_entidad');
        $crud->set_relation('tipo_poste', 'tipo_poste', 'nombre_tipo_poste');
        $crud->set_relation('tipo_luminaria', 'tipo_luminaria', 'nombre_tipo_luminaria');
        $crud->set_relation('estructura_poste', 'estructura_poste', 'nombre_estructura_poste');
        // $crud->set_relation_n_n('luminaria', 'luminarias', 'area', 'area', 'codigo_area');
        // $crud->set_relation($var, 'area', 'codigo_area');
        $crud->callback_column('Area', array($this, 'ver_area'));
        //    $crud->callback_column('Editar DNA', array($this, 'editar'));
        //   $crud->set_relation('realizado_por', 'users', 'username');
        //    $crud->set_relation_n_n('tipo_trabajo_realizar', 'soporte_trabajo', 'tipo_trabajo', 'id_soporte_tecnico', 'id_tipo_trabajo', 'nombre_tipo_trabajo');
        $crud->set_field_upload('video', 'assets/uploads/soporte');
        $crud->callback_add_field('funciona_poste_si_no', function () {
            return ' <select name="funciona_poste_si_no" id="funciona_poste_si_no">
          <option>SELECCIONAR...</option>
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select>';
        });

        $crud->callback_add_field('luminaria', function () {
            $id_luminaria = $this->uri->segment(4);
            return ' <input type="text"   name="luminaria" id="luminaria" value="' . $id_luminaria . '"  >';
        });
        $crud->callback_add_field('pos_y_p', function () {
            return '<input type="text" name="pos_y_p" value=""  id="pos_y_p" placeholder="click en el Mapa"  />';
        });
        $crud->callback_add_field('pos_x_p', function () {
            return '<input type="text" name="pos_x_p" value=""  id="pos_x_p" placeholder="click en el Mapa"  />';
        });

        //    $crud->callback_add_field('mapas', 'mapa');
        $this->load->library('gc_dependent_select');
        $fields = array(
            // first field:
            'distrito' => array(// first dropdown name
                'table_name' => 'distrito', // table of country
                'title' => 'nombre', // country title
                'relate' => null // the first dropdown hasn't a relation
            ),
            // second field
            'zona' => array(// second dropdown name
                'table_name' => 'zona', // table of state
                'title' => 'nombre', // state title
                'id_field' => 'id', // table of state: primary key
                'relate' => 'id_distrito', // table of state:
                'data-placeholder' => 'select state' //dropdown's data-placeholder:
            )
        );

        $config = array(
            'main_table' => 'distrito',
            'main_table_primary' => 'id',
            "url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/', //path to method
            'ajax_loader' => base_url() . 'ajax-loader.gif', // path to ajax-loader image. It's an optional parameter
            'segment_name' => 'Your_segment_name'
        );




        $categories = new gc_dependent_select($crud, $fields, $config);

        // first method:
        //$output = $categories->render();
        // the second method:
        $js = $categories->get_js();
        $output = $crud->render();
        $output->output.= $js;
        $this->_example_output($output);
        $this->load->view('distritos/distritos');

        $data['map'] = $this->googlemaps->create_map();
// $data["solicitud_compra"] = $this->observatorio_model->lista_operativos();
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header', $output);
        $this->load->view('alumbrado/registro_postes', $data);
    }

    public function reporte_general() {
        $this->load->library('highcharts');

        $serie['data'] = array(
            array('DISTRITO 1 ', $this->felcv_model->distritos(1)),
            array('DISTRITO 2', $this->felcv_model->distritos(2)),
            array('DISTRITO 3', $this->felcv_model->distritos(3)),
            array('DISTRITO 4', $this->felcv_model->distritos(4)),
            array('DISTRITO 5', $this->felcv_model->distritos(5)),
            array('DISTRITO 6', $this->felcv_model->distritos(6)),
            array('DISTRITO 7', $this->felcv_model->distritos(7)),
            array('DISTRITO 8', $this->felcv_model->distritos(8)),
            array('DISTRITO 12', $this->felcv_model->distritos(12)),
            array('DISTRITO 14', $this->felcv_model->distritos(14)),
            array('FUERA DEL MUNICIPIO DEL ALTO', $this->felcv_model->distritos(0))
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' Registros '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de la Felcv', 'Por Distritos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR OBSERVATORIO MUNICIPAL DE SEGURIDAD CIUDADANA";
        $this->highcharts->set_credits($credits);
        $data['charts2'] = $this->highcharts->render();




        $data['datos'] = $this->felcv_model->get_markers_general_cim();

        $crud = new grocery_CRUD();
        $crud->set_table('luminarias');
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_print();
        $crud->set_subject('luminarias');
        $output = $crud->render();
        $this->_example_output($output);


        //  $data['operativos'] = $this->mapa_model->get_markers_general($leyenda);
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header', $output);
        $this->load->view('felcv/reporte_general', $data);
    }

    public function reporte_alumbrado() {
        $this->load->library('highcharts');

        $serie['data'] = array(
            array('DISTRITO 1 ', $this->mapa_model->distritos(1)),
            array('DISTRITO 2', $this->mapa_model->distritos(2)),
            array('DISTRITO 3', $this->mapa_model->distritos(3)),
            array('DISTRITO 4', $this->mapa_model->distritos(4)),
            array('DISTRITO 5', $this->mapa_model->distritos(5)),
            array('DISTRITO 6', $this->mapa_model->distritos(6)),
            array('DISTRITO 7', $this->mapa_model->distritos(7)),
            array('DISTRITO 8', $this->mapa_model->distritos(8)),
            array('DISTRITO 12', $this->mapa_model->distritos(12)),
            array('DISTRITO 14', $this->mapa_model->distritos(14))
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' Registros '}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Plaza y Parques', 'Por Distritos ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);
        $data['charts2'] = $this->highcharts->render();
        $result = mysql_query("SELECT SUM(nro_postes_luz) as total FROM luminarias");
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $var1 = $row["total"];
        $result = mysql_query("SELECT SUM(nro_no_funcionan) as total2 FROM luminarias");
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $var2 = $row["total2"];
        echo $tot = $var1 - $var2;
        $total = $tot + $var2;

        $serie['data'] = array(
            array('FUNCIONAN ', $tot * 1),
            array('NO FUNCIONAN', $var2 * 1)
        );
        $callback = "function() { return '<b>'+ this.point.name +'</b>: '+ this.y +' Reg.'}";

        @$tool->formatter = $callback;
        @$plot->pie->dataLabels->formatter = $callback;
        $this->highcharts->set_title('Grafico de Postes', 'Por Funcionamiento ');
        $this->highcharts
                ->set_type('pie')
                ->set_serie($serie)
                ->set_tooltip($tool)
                ->set_plotOptions($plot);
        @$credits->text = "DATOS PROCESADOS POR LA DIRECCION DE TECNOLOGIAS Y MEJORAMIENTO URBANO";
        $this->highcharts->set_credits($credits);
        $data['charts3'] = $this->highcharts->render();


        ///     $data['datos'] = $this->felcv_model->get_markers_general_cim();

        $crud = new grocery_CRUD();
        $crud->set_table('luminarias');
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        $crud->unset_read();
        $crud->unset_print();
        $crud->set_subject('luminarias');
        $output = $crud->render();
        $this->_example_output($output);


        $this->load->library('googlemaps');
        $config = array();

        $config['center'] = '-16.529764, -68.162098';

        $config['zoom'] = '11';
        $config['map_type'] = 'ROADMAP';
        $config['map_width'] = '80%';
        $config['map_height'] = '600px';

        $this->googlemaps->initialize($config);

        $colegios = $this->mapa_model->get_postes();
        foreach ($colegios as $info_marker) {
            if ($info_marker->funciona_poste_si_no == 'SI') {
                $tipo_icon = 'assets/logos/poste.png';
            } else {
                $tipo_icon = 'assets/logos/poste_apagado.png';
            }
            $marker = array();
            $marker ['animation'] = 'DROP';

            $marker['center'] = '-16.529764, -68.162098';
            $config['zoom'] = 15;

            $marker ['position'] = $info_marker->pos_y_p . ',' . $info_marker->pos_x_p;
            $marker['icon'] = base_url() . $tipo_icon;
            $marker ['infowindow_content'] = '  <strong>Luminaria: </strong> ' . $info_marker->luminaria .
                    ' <br> <strong>Numero de poste: </strong> ' . $info_marker->numero_poste .
                    ' <br> <strong>Estructura del Poste: </strong> ' . $info_marker->nombre_estructura_poste .
                    ' <br> <strong>Tipo de Poste: </strong> ' . $info_marker->nombre_tipo_poste .
                    ' <br> <strong>Tipo de Luminaria: </strong> ' . $info_marker->nombre_tipo_luminaria .
                    ' <br> <strong>Potencia: </strong> ' . $info_marker->potencia .
                    ' <br> <strong>Funciona el Poste: </strong> ' . $info_marker->funciona_poste_si_no;
            $marker['id'] = $info_marker->id;
            $this->googlemaps->add_marker($marker);
        }
        $this->load->view('distritos/distritos_1');
        $data['map'] = $this->googlemaps->create_map();


        //       $data['operativos'] = $this->mapa_model->get_markers_general();
        // $data['tipo_operativo'] = $this->mapa_model->tipo_operativo($tipo_operativo);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header', $output);
        $this->load->view('alumbrado/mapa_view_general', $data);
    }

    public function guardar_dna() {


        $date = strtotime($this->input->post('fecha'));
        $dia = date("w", $date);
        $mes = date("m", $date);
        $year = date("Y", $date);

        $guardar_defensoria = array(
            'codigo_dna' => $this->input->post('codigo_dna'),
            'fecha' => $this->input->post('fecha'),
            'nro_atencion' => $this->input->post('nro_atencion'),
            'tipologia_principal' => $this->input->post('provincias2'),
            'tipologia_secundaria' => $this->input->post('poblaciones2'),
            'distrito' => $this->input->post('provincias'),
            'zona' => $this->input->post('poblaciones'),
            'domicilio' => $this->input->post('domicilio'),
            'procedencia' => $this->input->post('procedencia'),
            'telefono' => $this->input->post('telefono'),
            'domicilio2' => $this->input->post('domicilio2'),
            'telefono2' => $this->input->post('telefono2'),
            'pos_x' => $this->input->post('pos_x'),
            'pos_y' => $this->input->post('pos_y'),
            'nombre_apellidos_1' => $this->input->post('nombre_apellidos_1'),
            'nombre_apellidos_2' => $this->input->post('nombre_apellidos_2'),
            'nombre_apellidos_3' => $this->input->post('nombre_apellidos_3'),
            'nombre_apellidos_4' => $this->input->post('nombre_apellidos_4'),
            'gestante_1' => $this->input->post('gestante_1'),
            'gestante_2' => $this->input->post('gestante_2'),
            'gestante_3' => $this->input->post('gestante_3'),
            'gestante_4' => $this->input->post('gestante_4'),
            'edada1' => $this->input->post('edada1'),
            'edada2' => $this->input->post('edada2'),
            'edada3' => $this->input->post('edada3'),
            'edada4' => $this->input->post('edada4'),
            'edadm1' => $this->input->post('edadm1'),
            'edadm2' => $this->input->post('edadm2'),
            'edadm3' => $this->input->post('edadm3'),
            'edadm4' => $this->input->post('edadm4'),
            'sexo1' => $this->input->post('sexo1'),
            'sexo2' => $this->input->post('sexo2'),
            'sexo3' => $this->input->post('sexo3'),
            'sexo4' => $this->input->post('sexo4'),
            'c_na1' => $this->input->post('c_na1'),
            'c_na2' => $this->input->post('c_na2'),
            'c_na3' => $this->input->post('c_na3'),
            'c_na4' => $this->input->post('c_na4'),
            'estudia1' => $this->input->post('estudia1'),
            'estudia2' => $this->input->post('estudia2'),
            'estudia3' => $this->input->post('estudia3'),
            'estudia4' => $this->input->post('estudia4'),
            'grado_instruccion_1' => $this->input->post('grado_instruccion_1'),
            'grado_instruccion_2' => $this->input->post('grado_instruccion_2'),
            'grado_instruccion_3' => $this->input->post('grado_instruccion_3'),
            'grado_instruccion_4' => $this->input->post('grado_instruccion_4'),
            'tipo_trabajo_1' => $this->input->post('tipo_trabajo_1'),
            'tipo_trabajo_2' => $this->input->post('tipo_trabajo_2'),
            'tipo_trabajo_3' => $this->input->post('tipo_trabajo_3'),
            'tipo_trabajo_4' => $this->input->post('tipo_trabajo_4'),
            'fam_nombre_apellidos_1' => $this->input->post('fam_nombre_apellidos_1'),
            'fam_nombre_apellidos_2' => $this->input->post('fam_nombre_apellidos_2'),
            'fam_nombre_apellidos_3' => $this->input->post('fam_nombre_apellidos_3'),
            'fam_nombre_apellidos_4' => $this->input->post('fam_nombre_apellidos_4'),
            'parentesco_1' => $this->input->post('parentesco_1'),
            'parentesco_2' => $this->input->post('parentesco_2'),
            'parentesco_3' => $this->input->post('parentesco_3'),
            'parentesco_4' => $this->input->post('parentesco_4'),
            'fam_edad_1' => $this->input->post('fam_edad_1'),
            'fam_edad_2' => $this->input->post('fam_edad_2'),
            'fam_edad_3' => $this->input->post('fam_edad_3'),
            'fam_edad_4' => $this->input->post('fam_edad_4'),
            'fam_sexo1' => $this->input->post('fam_sexo1'),
            'fam_sexo2' => $this->input->post('fam_sexo2'),
            'fam_sexo3' => $this->input->post('fam_sexo3'),
            'fam_sexo4' => $this->input->post('fam_sexo4'),
            'fam_grado_instruccion_1' => $this->input->post('fam_grado_instruccion_1'),
            'fam_grado_instruccion_2' => $this->input->post('fam_grado_instruccion_2'),
            'fam_grado_instruccion_3' => $this->input->post('fam_grado_instruccion_3'),
            'fam_grado_instruccion_4' => $this->input->post('fam_grado_instruccion_4'),
            'fam_ocupacion_1' => $this->input->post('fam_ocupacion_1'),
            'fam_ocupacion_2' => $this->input->post('fam_ocupacion_2'),
            'fam_ocupacion_3' => $this->input->post('fam_ocupacion_3'),
            'fam_ocupacion_4' => $this->input->post('fam_ocupacion_4'),
            'anonimo' => $this->input->post('anonimo'),
            'denunciante_nombre' => $this->input->post('denunciante_nombre'),
            'denunciante_ci' => $this->input->post('denunciante_ci'),
            'denunciante_domicilio' => $this->input->post('denunciante_domicilio'),
            'denunciante_lugar_trabajo' => $this->input->post('denunciante_lugar_trabajo'),
            'denunciante_telefono' => $this->input->post('denunciante_telefono'),
            'denunciante_parentesco' => $this->input->post('denunciante_parentesco'),
            'denunciante_ocupacion' => $this->input->post('denunciante_ocupacion'),
            'se_desconoce' => $this->input->post('se_desconoce'),
            'denunciado_nombre' => $this->input->post('denunciado_nombre'),
            'denunciado_edad' => $this->input->post('denunciado_edad'),
            'denunciado_sexo' => $this->input->post('denunciado_sexo'),
            'denunciado_domicilio' => $this->input->post('denunciado_domicilio'),
            'denunciado_lugar_trabajo' => $this->input->post('denunciado_lugar_trabajo'),
            'denunciado_grado_instruccion' => $this->input->post('denunciado_grado_instruccion'),
            'denunciado_telefono' => $this->input->post('denunciado_telefono'),
            'denunciado_parentesco' => $this->input->post('denunciado_parentesco'),
            'denunciado_ocupacion' => $this->input->post('denunciado_ocupacion'),
            'denuncias_anteriores' => $this->input->post('denuncias_anteriores'),
            'anteriormente' => $this->input->post('anteriormente'),
            'descripcion' => $this->input->post('descripcion'),
            'opinion' => $this->input->post('opinion'),
            'dinamica' => $this->input->post('dinamica'),
            'acciones' => $this->input->post('acciones'),
            'dia' => $dia,
            'mes' => $mes,
            'year' => $year,
            'usuario' => $this->session->userdata('id_usuario')
        );

//  $id_distrito = $this->input->post('provincias');

        $this->cim_model->guardar_defensoria($guardar_defensoria);

        redirect(base_url() . 'dna/registro_dna');
    }

    public function ver_r() {
        $id = $this->uri->segment(3);
        $data['edit'] = $this->cim_model->ver_informe($id);
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('defensorias/ver_informe', $data);
    }

    public function reporte_generalss() {
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('header');
        $this->load->view('defensorias/reporte_general', $data);
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
