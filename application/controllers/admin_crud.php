<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_crud extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        //   $this->load->model('solicitud_model');
        // $this->load->library(array('session', 'form_validation', 'table'));
        $this->load->library(array('form_validation', 'grocery_CRUD', 'table'));
        /*    if ($this->session->userdata('user_level') == FALSE || $this->session->userdata('perfil') == '1') {
          redirect(base_url() . 'login');
          } */
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'suscriptor') {
            redirect(base_url() . 'login');
        }
        //$this->load->library('grocery_CRUD');
    }

    public function _example_output($output = null) {

        $this->load->view('pages/index.php');
        $this->load->view('admin_view_crud', $output);
        //    $this->load->view('footer');
    }

    public function offices() {
        $output = $this->grocery_crud->render();

        $this->_example_output($output);
    }

    public function index() {

        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    /// epis
    public function epis() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('epis');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_epis');
            $crud->add_fields('nombre_epis');
            $crud->edit_fields('nombre_epis');
            $crud->set_subject('epis');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /// Provincia
    public function provincia() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('provincia');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_provincia');
            $crud->add_fields('nombre_provincia');
            $crud->edit_fields('nombre_provincia');
            $crud->set_subject('provincia');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /// municipio
    public function municipio() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('municipio');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_municipio');
            $crud->add_fields('nombre_municipio');
            $crud->edit_fields('nombre_municipio');
            $crud->set_subject('municipio');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
     /// municipio
    public function localidad() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('localidad');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_localidad');
            $crud->add_fields('nombre_localidad');
            $crud->edit_fields('nombre_localidad');
            $crud->set_subject('localidad');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    
    public function distrito() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('distrito');
            $crud->required_fields('nombre_distrito');
            $crud->columns('nombre_distrito');
            $crud->add_fields('nombre_distrito');
            $crud->edit_fields('nombre_distrito');
            $crud->set_subject('distrito');
       
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function zona() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('zona');
            $crud->required_fields('id_distrito', 'nombre');
            $crud->columns('nombre', 'id_distrito');
          

            $crud->add_fields('id_distrito', 'nombre');
            $crud->edit_fields('id_distrito', 'nombre');
            $crud->set_relation('id_distrito', 'distrito', 'nombre_distrito');
            $crud->set_subject('zona');
            $crud->callback_column('estado', array($this, 'activado_zona'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
   public function denuncia() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('denuncia');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_denuncia');
            $crud->add_fields('nombre_denuncia');
            $crud->edit_fields('nombre_denuncia');
            $crud->set_subject('denuncia');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    public function ciudad_victima() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('ciudad_victima');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_ciudad_victima');
            $crud->add_fields('nombre_ciudad_victima');
            $crud->edit_fields('nombre_ciudad_victima');
            $crud->set_subject('ciudad_victima');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
      public function nacionalidad_victima() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('nacionalidad');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_nacionalidad');
            $crud->add_fields('nombre_nacionalidad');
            $crud->edit_fields('nombre_nacionalidad');
            $crud->set_subject('nacionalidad');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    public function temperancia() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('temperancia');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_temperancia');
            $crud->add_fields('nombre_temperancia');
            $crud->edit_fields('nombre_temperancia');
            $crud->set_subject('temperancia');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

     public function sexo_victima() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('genero');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_genero');
            $crud->add_fields('nombre_genero');
            $crud->edit_fields('nombre_genero');
            $crud->set_subject('genero');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
     public function ciudad_infractor() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('ciudad_infractor');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_ciudad_infractor');
            $crud->add_fields('nombre_ciudad_infractor');
            $crud->edit_fields('nombre_ciudad_infractor');
            $crud->set_subject('ciudad_infractor');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    public function nacionalidad_infractor() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('nacionalidad_infractor');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_nacionalidad_infractor');
            $crud->add_fields('nombre_nacionalidad_infractor');
            $crud->edit_fields('nombre_nacionalidad_infractor');
            $crud->set_subject('nacionalidad_infractor');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
     public function sexo_infractor() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('genero_infractor');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_genero_infractor');
            $crud->add_fields('nombre_genero_infractor');
            $crud->edit_fields('nombre_genero_infractor');
            $crud->set_subject('genero_infractor');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    

    
    public function categoria_licencia() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('categoria_licencia');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_categoria_licencia');
            $crud->add_fields('nombre_categoria_licencia');
            $crud->edit_fields('nombre_categoria_licencia');
            $crud->set_subject('categoria_licencia');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function tipo_vehiculo() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tipo_vehiculo');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_tipo_vehiculo');
            $crud->add_fields('nombre_tipo_vehiculo');
            $crud->edit_fields('nombre_tipo_vehiculo');
            $crud->set_subject('tipo_vehiculo');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function servicio_movilidad() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('servicio');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_servicio');
            $crud->add_fields('nombre_servicio');
            $crud->edit_fields('nombre_servicio');
            $crud->set_subject('servicio');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
     public function temperancia_infractor() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('temperancia_infractor');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_temperancia_infractor');
            $crud->add_fields('nombre_temperancia_infractor');
            $crud->edit_fields('nombre_temperancia_infractor');
            $crud->set_subject('temperancia_infractor');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function tipo_arresto() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('arrestado');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_arrestado');
            $crud->add_fields('nombre_arrestado');
            $crud->edit_fields('nombre_arrestado');
            $crud->set_subject('arrestado');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function sancion() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('sancion');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_sancion');
            $crud->add_fields('nombre_sancion');
            $crud->edit_fields('nombre_sancion');
            $crud->set_subject('sancion');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function estado_caso() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('estado_caso');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_estado_caso');
            $crud->add_fields('nombre_estado_caso');
            $crud->edit_fields('nombre_estado_caso');
            $crud->set_subject('estado_caso');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function remision_caso() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('remision_caso');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_remision_caso');
            $crud->add_fields('nombre_remision_caso');
            $crud->edit_fields('nombre_remision_caso');
            $crud->set_subject('remision_caso');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function termino_prueba() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('termino_prueba');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_termino_prueba');
            $crud->add_fields('nombre_termino_prueba');
            $crud->edit_fields('nombre_termino_prueba');
            $crud->set_subject('termino_prueba');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function recurso_apelacion() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('recurso_apelacion');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_recurso_apelacion');
            $crud->add_fields('nombre_recurso_apelacion');
            $crud->edit_fields('nombre_recurso_apelacion');
            $crud->set_subject('recurso_apelacion');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function servicio_destacado() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('servicio_destacado');
            // $crud->required_fields('nombre_provincia', 'estado');
            $crud->columns('id', 'nombre_servicio_destacado');
            $crud->add_fields('nombre_servicio_destacado');
            $crud->edit_fields('nombre_servicio_destacado');
            $crud->set_subject('servicio_destacado');
            //  $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /// Camaras UYbicaion
    //
    //
      public function faltas_contravenciones() {
        try {
            $crud = new grocery_CRUD();

            //	$crud->set_theme('datatables');
            $crud->set_table('faltas_contravenciones');
            $crud->set_subject('faltas_contravenciones');
            //     $crud->required_fields('x', 'y');
            //$crud->fields('id','fecha','hora','Personal Manana','Personal Tarde','Personal Noche');
            $crud->columns('id_faltas', 'numero_formulario', 'cod_num', 'gestion', 'fecha_hecho', 'hora_hecho',
                    'mes', 'departamento', 'provincia', 'municipio', 'localidad','epis','distrito','zona',
                    'lugar_hecho','pos_x','pos_y','denuncia','nombre_victima','ci_victima','ciudad_victima',
                    'ciudad_victima','nacionalidad_victima','edad_victima','sexo_victima','telefono_victima',
                    'temperancia_victima','descripcion_falta','nombre_infractor','ci_infractor',
                    'categoria_licencia','ciudad_infractor','nacionalidad_infractor','edad_infractor',
                    'sexo_infractor','telefono_infractor','tipo_vehiculo','placa','servicio','temperancia_infractor',
                    'arrestado_infractor','sancion','estado_caso','termino_prueba','recurso_apelacion',
                    'numero_caso','arma_utilizada');
            $crud->fields('numero_formulario', 'cod_num', 'gestion', 'fecha_hecho', 'hora_hecho',
                    'mes', 'departamento', 'provincia', 'municipio', 'localidad','epis','distrito','zona',
                    'lugar_hecho','pos_x','pos_y','denuncia','nombre_victima','ci_victima','ciudad_victima',
                    'ciudad_victima','nacionalidad_victima','edad_victima','sexo_victima','telefono_victima',
                    'temperancia_victima','descripcion_falta','nombre_infractor','ci_infractor',
                    'categoria_licencia','ciudad_infractor','nacionalidad_infractor','edad_infractor',
                    'sexo_infractor','telefono_infractor','tipo_vehiculo','placa','servicio','temperancia_infractor',
                    'arrestado_infractor','sancion','estado_caso','termino_prueba','recurso_apelacion',
                    'numero_caso','arma_utilizada');
            $crud->edit_fields('numero_formulario', 'cod_num', 'gestion', 'fecha_hecho', 'hora_hecho',
                    'mes', 'departamento', 'provincia', 'municipio', 'localidad','epis','distrito','zona',
                    'lugar_hecho','pos_x','pos_y','denuncia','nombre_victima','ci_victima','ciudad_victima',
                    'ciudad_victima','nacionalidad_victima','edad_victima','sexo_victima','telefono_victima',
                    'temperancia_victima','descripcion_falta','nombre_infractor','ci_infractor',
                    'categoria_licencia','ciudad_infractor','nacionalidad_infractor','edad_infractor',
                    'sexo_infractor','telefono_infractor','tipo_vehiculo','placa','servicio','temperancia_infractor',
                    'arrestado_infractor','sancion','estado_caso','termino_prueba','recurso_apelacion',
                    'numero_caso','arma_utilizada');

            $crud->set_relation('distrito', 'distrito', 'nombre_distrito');
            $crud->set_relation('zona', 'zona', 'nombre');
            $crud->set_relation('gestion', 'gestion', 'nombre_gestion');
            $crud->set_relation('mes', 'mes', 'nombre_mes');
            $crud->set_relation('departamento', 'departamento', 'nombre_departamento');
            $crud->set_relation('provincia', 'provincia', 'nombre_provincia');
            $crud->set_relation('municipio', 'municipio', 'nombre_municipio');
            $crud->set_relation('localidad', 'localidad', 'nombre_localidad');
            $crud->set_relation('epis', 'epis', 'nombre_epis');
            $crud->set_relation('denuncia', 'denuncia', 'nombre_denuncia');
            $crud->set_relation('nacionalidad_victima', 'nacionalidad', 'nombre_nacionalidad');
            $crud->set_relation('sexo_victima', 'genero', 'nombre_genero');
            $crud->set_relation('temperancia_victima', 'temperancia', 'nombre_temperancia');
            $crud->set_relation('categoria_licencia', 'categoria_licencia', 'nombre_categoria_licencia');
            $crud->set_relation('ciudad_infractor', 'departamento', 'nombre_departamento');
            $crud->set_relation('nacionalidad_infractor', 'nacionalidad', 'nombre_nacionalidad');
            $crud->set_relation('tipo_vehiculo', 'tipo_vehiculo', 'nombre_tipo_vehiculo');
            $crud->set_relation('temperancia_infractor', 'temperancia', 'nombre_temperancia');
            $crud->set_relation('arrestado_infractor', 'arrestado', 'nombre_arrestado');
            $crud->set_relation('sancion', 'sancion', 'nombre_sancion');
            
            $crud->set_relation('estado_caso', 'estado_caso', 'nombre_estado_caso');
            $crud->set_relation('termino_prueba', 'termino_prueba', 'nombre_termino_prueba');
            $crud->set_relation('recurso_apelacion', 'recurso_apelacion', 'nombre_recurso_apelacion');
            $crud->set_relation('servicio_destacado', 'servicio_destacado', 'nombre_servicio_destacado');

            $crud->callback_add_field('hora_hecho', array($this, 'add_hora_hecho'));
            $crud->callback_edit_field('hora_hecho', array($this, 'add_hora_hecho'));






            $this->load->library('gc_dependent_select');
            $fields = array(
                // first field:
                'id_distrito' => array(// first dropdown name
                    'table_name' => 'distrito', // table of country
                    'title' => 'nombre', // country title
                    'relate' => null // the first dropdown hasn't a relation
                ),
                // second field
                'id_zona' => array(// second dropdown name
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

            // $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }


    function add_hora_hecho() {
        return '<input type="time"  value=""  style="width:200px;height:27px"  name="hora_hecho" id="hora_hecho" step="1" required="true" /> ';
    }
    public function monitoreo() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('monitoreo');
            //    $crud->required_fields('direccion', 'fecha', 'cantidad_personas', 'descripcion_monitoreo');
            $crud->columns('id_usuario', 'nro_caso', 'verificacion1', 'id_tipo_caso', 'direccion', 'id_distrito_monitoreo', 'id_camara', 'fecha', 'gestion', 'mes', 'nro_dia', 'hora', 'cantidad_personas', 'descripcion_monitoreo', 'pos_x', 'pos_y');
            // $crud->columns( 'nro_caso',  'direccion', 'id_distrito_monitoreo', 'id_camara');
            $crud->add_fields('nro_caso', 'id_tipo_caso', 'direccion', 'id_camara', 'fecha', 'mes', 'cantidad_personas', 'intervencion', 'descripcion_monitoreo');
            $crud->edit_fields('nro_caso', 'id_tipo_caso', 'direccion', 'id_distrito_monitoreo', 'id_camara', 'fecha', 'gestion', 'mes', 'nro_dia', 'cantidad_personas', 'descripcion_monitoreo', 'pos_x', 'pos_y');
            $crud->set_subject('monitoreo');
            $crud->set_relation('id_usuario', 'users', 'username');
            $crud->set_relation('id_tipo_caso', 'tipo_caso_monitoreo', 'nombre_monitoreo');
            $crud->set_relation('mes', 'mes', 'nombre');
            $crud->set_relation('id_distrito_monitoreo', 'distrito', 'nombre');
            $crud->set_relation('id_camara', 'camara', '{nombre_camara} - {lugar} - {ubicacion}');
            $crud->callback_add_field('hora', array($this, 'add_horas'));
            $crud->callback_edit_field('hora', array($this, 'add_horas'));
            $crud->callback_column('verificacion1', array($this, 'activado_verificacion1'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function activado_verificacion1($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('monitoreo', array('monitoreo.id_monitoreo' => $row->id_monitoreo))->row();
        if ($data->verificacion1 == '1') {
            return '<a href="' . base_url() . 'admin_crud/save_active_monitoreo/' . $row->id_monitoreo . '" title="Activado" style="position:relative; top:1px;"><img src="' . base_url() . 'assets/img/active-icon.png" width="25"/></a>';
        } else {
            return '<a href="' . base_url() . 'admin_crud/save_active_monitoreo/' . $row->id_monitoreo . '" title="Desactivado" style="position:relative; top:1px;"><img src="' . base_url() . 'assets/img/descactive-icon.png" width="25" /></a>';
        }
    }

    function save_active_monitoreo($id_template) {
        $this->administracion_model->save_active_monitoreo($id_template); //llamamos a la funciÃ³n getData() del modelo creado anteriormente.
        redirect(base_url() . 'admin_crud/monitoreo');
    }

    public function tipo_caso_monitoreo() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tipo_caso_monitoreo');
            $crud->required_fields('nombre_monitoreo', 'estado');
            $crud->columns('id', 'nombre_monitoreo', 'descripcion');
            $crud->add_fields('nombre_monitoreo', 'descripcion');
            $crud->edit_fields('nombre_monitoreo', 'descripcion');
            $crud->set_subject('tipo_caso_monitoreo');
            $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function imagenes() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('imagenes');
            $crud->required_fields('nombre_monitoreo', 'estado');
            $crud->columns('id_monitoreo', 'ruta');
            $crud->add_fields('id_monitoreo', 'ruta');
            $crud->edit_fields('id_monitoreo', 'ruta');
            $crud->set_relation('id_monitoreo', 'monitoreo', 'nro_caso');
            $crud->set_field_upload('ruta', 'uploads');
            $crud->set_subject('imagenes');
            //     $crud->callback_column('estado', array($this, 'activado_tipo_caso_monitoreo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function activado_tipo_caso_monitoreo($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('tipo_caso_monitoreo', array('tipo_caso_monitoreo.id' => $row->id))->row();
        if ($data->estado == '1') {
            return '<a href="' . base_url() . 'admin_crud/save_active_tipo_caso_monitoreo/' . $row->id . '" title="Activado" style="position:relative; top:1px;"><img src="' . base_url() . 'assets/img/active-icon.png" width="25"/></a>';
        } else {
            return '<a href="' . base_url() . 'admin_crud/save_active_tipo_caso_monitoreo/' . $row->id . '" title="Desactivado" style="position:relative; top:1px;"><img src="' . base_url() . 'assets/img/descactive-icon.png" width="25" /></a>';
        }
    }

    function save_active_tipo_caso_monitoreo($id_template) {
        $this->administracion_model->save_active_tipo_caso_monitoreo($id_template); //llamamos a la funciÃ³n getData() del modelo creado anteriormente.
        redirect(base_url() . 'admin_crud/tipo_caso_monitoreo');
    }

    //// Usuarios

    public function usuarios() {

        if ($this->session->userdata('nivel') != '1') {
            redirect(base_url() . 'admin');
        }
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('users');
            $crud->columns('perfil', 'username', 'first_name', 'last_name', 'email_addres', 'nivel');
            $crud->display_as('id', 'ID')
                    ->display_as('perfil', 'Perfil')
                    ->display_as('username', 'Usuario')
                    ->display_as('first_name', 'Nombres')
                    ->display_as('last_name', 'Apellidos')
                    ->display_as('email_addres', 'Email');
            $crud->set_rules('username', 'Usuarios', 'callback_usuario_unico');
            $crud->callback_edit_field('password', array($this, 'set_password_input_to_empty'));
            $crud->callback_add_field('password', array($this, 'set_password_input_to_empty'));
            $crud->set_subject('Usuarios');
            $crud->callback_before_insert(array($this, 'encrypt_password'));
            $crud->callback_before_update(array($this, 'encrypt_password'));
            $crud->callback_add_field('perfil', array($this, 'add_field_callback_perfil'));
            $crud->callback_edit_field('perfil', array($this, 'add_field_callback_perfil'));
            $crud->unset_read();
            ///  $crud->unset_edit();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function encrypt_password($post_array, $primary_key = null) {

        $this->load->helper('security');
        $post_array['password'] = do_hash($post_array['password'], 'sha1');
        return $post_array;
    }

    function callback_usuario_unico($username) {
        $sql = mysql_query("SELECT * FROM users WHERE username = '" . $username . "'");
        $contar = mysql_num_rows($sql);
        if ($contar == 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('usuario_unico', "El Usuario ya existe");
            return FALSE;
        }
    }

    /*  function add_genero() {
      return '<select name="genero" id="genero">
      <option value="masculino">Masculino</option>
      <option value="femenino">Femenino</option>
      </select>';
      } */

    function add_field_callback_perfil() {
        return '<select name="perfil" id="perfil">
            <option value="administrador">Administrador</option>
            <option value="editor">Usuarios</option>
            </select>';
    }

    function set_password_input_to_empty() {
        return "<input type='password' name='password' value='' style='width:200px;height:27px' />";
    }

    function add_horas_registro() {
        return '<input type="time"  value=""  style="width:200px;height:27px"  name="hora_registro" id="hora_registro" step="1" required="true" /> ';
    }

    function add_horas() {
        return '<input type="time"  value=""  style="width:200px;height:27px"  name="hora" id="hora" step="1" required="true" /> ';
    }

    public function operativo() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('operativo');
            //$crud->required_fields('id_usuario', 'id_distrito_operativo', 'zona', 'direccion_1', 'id_tipo_operativo', 'fecha', 'hora', 'descripcion_operativo', 'hojas');
            $crud->columns('id_usuario', 'id_distrito_operativo', 'id_intervencion', 'verificacion', 'direccion_1', 'id_tipo_operativo', 'id_entidad', 'fecha', 'nro_dia', 'mes', 'hora', 'descripcion_operativo', 'nro_formulario', 'hoja_ruta');
            $crud->add_fields('id_usuario', 'id_distrito_operativo', 'id_intervencion', 'zona', 'direccion_1', 'id_tipo_operativo', 'nro_dia', 'fecha', 'hora', 'descripcion_operativo', 'hojas', 'imagen_operativo');
            $crud->edit_fields('id_usuario', 'direccion_1', 'id_tipo_operativo', 'nro_dia', 'fecha', 'mes', 'descripcion_operativo', 'hojas', 'pos_x', 'pos_y', 'pos_x_p', 'pos_y_p', 'imagen_operativo', 'nro_formulario', 'hoja_ruta');
            $crud->set_subject('operativo');

            $crud->set_relation('id_usuario', 'users', 'username');


            //    $crud->set_relation('id_avenida', 'avenida', 'nombre');

            $crud->set_relation('id_tipo_operativo', 'tipo_operativo', 'nombre_o');
            $crud->set_relation('id_intervencion', 'intervencion', 'nombre_intervencion');
            $crud->set_relation('id_distrito_operativo', 'distrito', 'nombre');
            $crud->set_relation('id_entidad', 'entidades', 'nombre_entidad');
            $crud->set_relation('mes', 'mes', 'nombre');
            $crud->callback_add_field('hora', array($this, 'add_horas'));
            $crud->callback_edit_field('hora', array($this, 'add_horas'));
            $crud->callback_column('verificacion', array($this, 'activado_verificacion'));
            //   $crud->set_relation('id_zona', 'zona', 'nombre');
            //    $crud->set_relation('id_calle', 'calle', 'nombre_c');
            $crud->set_field_upload('imagen_operativo', 'assets/uploads/operativos');
            /*      $this->load->library('gc_dependent_select');
              $fields = array(
              // first field:
              'id_distrito' => array(// first dropdown name
              'table_name' => 'distrito', // table of country
              'title' => 'nombre', // country title
              'relate' => null // the first dropdown hasn't a relation
              ),
              // second field
              'id_zona' => array(// second dropdown name
              'table_name' => 'zona', // table of state
              'title' => 'nombre', // state title
              'id_field' => 'id', // table of state: primary key
              'relate' => 'id_distrito', // table of state:
              'data-placeholder' => 'select state' //dropdown's data-placeholder:
              ),
              // third field. same settings
              'id_calle' => array(
              'table_name' => 'calle',
              //  'where' => "post_code>'167'", // string. It's an optional parameter.
              //      'order_by' => "state_title DESC", // string. It's an optional parameter.
              'title' => 'id: {id} / city : {nombre}', // now you can use this format )))
              'id_field' => 'id',
              'relate' => 'id_zona',
              'data-placeholder' => 'select city'
              )
              );

              $config = array(
              'main_table' => 'calle',
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
              $output->output.= $js; */
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function activado_verificacion($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('operativo', array('operativo.id_operativo' => $row->id_operativo))->row();
        if ($data->verificacion == '1') {
            return '<a href="' . base_url() . 'admin_crud/save_active_operativo/' . $row->id_operativo . '" title="Activado" style="position:relative; top:1px;"><img src="' . base_url() . 'assets/img/active-icon.png" width="25"/></a>';
        } else {
            return '<a href="' . base_url() . 'admin_crud/save_active_operativo/' . $row->id_operativo . '" title="Desactivado" style="position:relative; top:1px;"><img src="' . base_url() . 'assets/img/descactive-icon.png" width="25" /></a>';
        }
    }

    function save_active_operativo($id_template) {
        $this->administracion_model->save_active_operativo($id_template); //llamamos a la funciÃ³n getData() del modelo creado anteriormente.
        redirect(base_url() . 'admin_crud/operativo');
    }

    public function tipo_operativo() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tipo_operativo');
            $crud->required_fields('nombre_o');
            $crud->columns('id', 'nombre_o', 'descripcion', 'estado');
            $crud->add_fields('nombre_o', 'descripcion');
            $crud->edit_fields('nombre_o', 'descripcion');
            $crud->set_subject('tipo_operativo');
            $crud->callback_column('estado', array($this, 'activado_tipo_operativo'));
            $crud->unset_read();
            $output = $crud->render();
            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function activado_tipo_operativo($value, $row) {
        $this->db->select('*'); //seleccionamos el id y todo de employer
        $data = $this->db->get_where('tipo_operativo', array('tipo_operativo.id' => $row->id))->row();
        if ($data->estado == '1') {
            return '<a href="' . base_url() . 'admin_crud/save_active_tipo_operativo/' . $row->id . '" title="Activado" style="position:relative; top:1px;"><img src="' . base_url() . 'assets/img/active-icon.png" width="25"/></a>';
        } else {
            return '<a href="' . base_url() . 'admin_crud/save_active_tipo_operativo/' . $row->id . '" title="Desactivado" style="position:relative; top:1px;"><img src="' . base_url() . 'assets/img/descactive-icon.png" width="25" /></a>';
        }
    }

    function save_active_tipo_operativo($id_template) {
        $this->administracion_model->save_active_tipo_operativo($id_template); //llamamos a la funciÃ³n getData() del modelo creado anteriormente.
        redirect(base_url() . 'admin_crud/tipo_operativo');
    }

    public function entidades() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('entidades');
            $crud->required_fields('id_tipo_operativo', 'nombre_entidad');

            $crud->columns('id_tipo_operativo', 'id_distrito', 'id_zona', 'nombre_entidad', 'descripcion', 'estado');
            $crud->display_as('id_tipo_operativo', 'Tipo Operativo')
                    ->display_as('nombre_entidad', 'Nombre Entidad');

            $crud->add_fields('id_tipo_operativo', 'id_distrito', 'id_zona', 'nombre_entidad', 'descripcion');
            $crud->edit_fields('id_tipo_operativo', 'id_distrito', 'nombre_entidad', 'descripcion', 'id_turno', 'id_ambiente'
                    , 'transporte', 'total_aulas', 'total_profesores', 'laboratorios_quimica_fisica', 'laboratorios_informatica'
                    , 'sala_audiovisual', 'canchas', 'agua', 'luz', 'alcantarillado', 'x', 'y');
            $crud->set_relation('id_tipo_operativo', 'tipo_operativo', 'nombre_o');
            $crud->set_relation('id_turno', 'turno', 'nombre');
            $crud->set_relation('id_ambiente', 'ambiente', 'nombre');
            //  $crud->set_relation('id_zona', 'zona', 'nombre');



            $crud->set_subject('entidades');
            //      $crud->callback_column('estado', array($this, 'activado_calle'));
            $crud->unset_read();
            $crud->set_relation('id_distrito', 'distrito', 'nombre');
            $crud->set_relation('id_zona', 'zona', 'nombre');
            //    $crud->set_relation('id_turno', 'turno', 'nombre');
            //    $crud->set_relation('id_nivel', 'nivel', 'nombre');
            //    $crud->callback_add_field('inicial', array($this, '_callback_nivel_inicial'));
            //     $crud->callback_add_field('primaria', array($this, '_callback_nivel_primaria'));
            //        $crud->callback_add_field('secundaria', array($this, '_callback_nivel_secundaria'));
            //     $crud->callback_add_field('hora', array($this, 'add_horas'));
            //  $crud->set_relation('id_infraestructura', 'infraestructura', 'nombre');
            /*  $crud->callback_edit_field('agua', array($this, '_callback_agua_edit'));
              $crud->callback_add_field('agua', array($this, '_callback_agua'));
              $crud->callback_add_field('energia', array($this, '_callback_energia'));
              $crud->callback_edit_field('agua', array($this, '_callback_energia_edit'));
              $crud->set_field_upload('imagen_modulo', 'assets/uploads/modulos_policiales');
              $crud->set_field_upload('imagen_movilidad', 'assets/uploads/modulos_policiales');
              $crud->set_field_upload('imagen_television', 'assets/uploads/modulos_policiales');
              $crud->set_field_upload('imagen_computadora', 'assets/uploads/modulos_policiales');
              $crud->set_field_upload('imagen_escritorio', 'assets/uploads/modulos_policiales');
              $crud->set_field_upload('imagen_urbanizacion', 'assets/uploads/modulos_policiales'); */


            $this->load->library('gc_dependent_select');
            $fields = array(
                // first field:
                'id_distrito' => array(// first dropdown name
                    'table_name' => 'distrito', // table of country
                    'title' => 'nombre', // country title
                    'relate' => null // the first dropdown hasn't a relation
                ),
                // second field
                'id_zona' => array(// second dropdown name
                    'table_name' => 'zona', // table of state
                    'title' => 'nombre', // state title
                    'id_field' => 'id', // table of state: primary key
                    'relate' => 'id_distrito', // table of state:
                    'data-placeholder' => 'select state' //dropdown's data-placeholder:
                ),
                // third field. same settings
                'id_calle' => array(
                    'table_name' => 'calle',
                    //  'where' => "post_code>'167'", // string. It's an optional parameter.
                    //      'order_by' => "state_title DESC", // string. It's an optional parameter.
                    'title' => 'id: {id} / city : {nombre}', // now you can use this format )))
                    'id_field' => 'id',
                    'relate' => 'id_zona',
                    'data-placeholder' => 'select city'
                )
            );

            $config = array(
                'main_table' => 'calle',
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
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}
