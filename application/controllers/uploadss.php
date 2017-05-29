<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('upload_model');
    }

    function index() {
        //CARGAMOS LA VISTA DEL FORMULARIO
        $this->load->view('monitoreo/registros_monitoreo');
    }

    //FUNCIÓN PARA SUBIR LA IMAGEN Y VALIDAR EL TÍTULO
    function do_upload() {
      
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $config['max_width'] = '2024';
            $config['max_height'] = '2008';

            $this->load->library('upload', $config);
            //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
            // $this->upload->do_upload();
            //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
            //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
           /// $this->create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $id = $this->input->post('id');
            $titulo = $this->input->post('userfile');
            $imagen = $file_info['file'];
            $subir = $this->upload_model->subir($titulo, $imagen, $id);
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen;
            //$data['usuarios'] = $usuarios;


            $usuarios = $this->upload_model->getData_blog($id); //llamamos a la función getData() del modelo creado anteriormente.
            $data['usuarios'] = $usuarios;

            echo "<script> window.alert('record stored'); </script> ";

            redirect('monitoreo/registros_monitoreo');
       
    }

    function do_upload_resume() {
        $this->form_validation->set_rules('titulo', 'titulo');
        $this->form_validation->set_message('required', 'El %s no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
        //SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'doc|docx|pdf|rtf|txt';
            $tam_megas = 20; //Tamanyo maximo del archivo en megas
            $config['max_size'] = $tam_megas * 1024; //
            // $config['max_size'] = '2000';
            // $config['max_width'] = '2024';
            //$config['max_height'] = '2008';

            $this->load->library('upload', $config);
            //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
            if (!$this->upload->do_upload()) {
                $this->load->model('users_model');
                $usuarios = $this->users_model->getData_blog($_POST['id']); //llamamos a la función getData() del modelo creado anteriormente.
                $data['usuarios'] = $usuarios;
                $error = array('error' => $this->upload->display_errors());

                $this->load->helper('state_helper');
                $this->template->write('title', 'Welcome to mininoo');
                $this->template->write_view('styles', 'clients/styles');

                $this->template->write_view('header', 'clients/header_inicio', $data);
                $this->template->write_view('content', 'clients/post_resume', $error);
                $this->template->write_view('content', 'clients/footer');

                $this->template->render();
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
                $this->_create_thumbnail($file_info['file_name']);
                $data = array('upload_data' => $this->upload->data());
                $titulo = $this->input->post('titulo');
                $imagen = $file_info['file_name'];
                $subir = $this->upload_model->subir_resumes($titulo, $imagen);
                $data['titulo'] = $titulo;
                $data['imagen'] = $imagen;
                //$data['usuarios'] = $usuarios;

                $this->load->model('users_model');
                $usuarios = $this->users_model->getData_blog($_POST['id']); //llamamos a la función getData() del modelo creado anteriormente.
                $data['usuarios'] = $usuarios;

                echo "<script> window.alert('record stored'); </script> ";

                $this->load->helper('state_helper');
                $this->template->write('title', 'Welcome to mininoo');
                $this->template->write_view('styles', 'clients/styles');

                $this->template->write_view('header', 'clients/header_inicio', $data);
                $this->template->write_view('content', 'clients/contact_resumes', $data);
                $this->template->write_view('content', 'clients/footer');

                $this->template->render();
            }
        } else {
            //SI EL FORMULARIO NO SE VÁLIDA LO MOSTRAMOS DE NUEVO CON LOS ERRORES
            $this->index();
        }
    }

    //FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function _create_thumbnail($filename) {
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'uploads/' . $filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image'] = 'uploads/thumbs/';
        $config['width'] = 300;
        $config['height'] = 300;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

}

/////////////////////// prueba haber ///////////////////


function do_awards() {
    $this->form_validation->set_rules('memberships', 'memberships');
    $this->form_validation->set_message('required', 'El %s no puede ir vacío!');
    $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
    $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
    //SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
    if ($this->form_validation->run() == TRUE) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload', $config);
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('photo_1', $error);
        } else {
            //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
            //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $titulo = $this->input->post('titulo');
            $imagen = $file_info['file_name'];
            $subir = $this->upload_model->subir_awards($memberships, $honors, $caja1, $honors1, $honors2);
            $data['memberships'] = $titulo;
            $data['honors'] = $imagen;
            $this->load->view('photo_1', $data);
        }
    } else {
        //SI EL FORMULARIO NO SE VÁLIDA LO MOSTRAMOS DE NUEVO CON LOS ERRORES
        $this->index();
    }
}

/* class Upload extends CI_Controller {


  function Upload()
  {
  parent:: __construct();
  $this->load->helper(array('form', 'url'));

  }

  function index()
  {
  $this->load->view('formulario_carga', array('error' => ' ' ));
  }
  function do_upload()
  {
  $config['upload_path'] = './uploads/';
  $config['allowed_types'] = 'gif|jpg|png';
  $config['max_size']	= '100';
  $config['max_width']  = '1024';
  $config['max_height']  = '768';

  $this->load->library('upload', $config);

  if ( ! $this->upload->do_upload())
  {
  $error = array('error' => $this->upload->display_errors());

  $this->load->view('formulario_carga', $error);
  }
  else
  {
  $data = array('upload_data' => $this->upload->data());

  $this->load->view('upload_success', $data);
  }
  }
  }

  /*
  function Upload()
  {
  //parent:: Controller();
  parent:: __construct();
  $this->load->helper(array('form', 'url'));
  }

  function index()
  {
  $this->load->view('formulario_carga', array('error' => ' ' ));
  }
  function do_upload()
  {
  $config['upload_path'] = './uploads/';
  $config['allowed_types'] = 'gif|jpg|png';
  $config['max_size']	= '100';
  $config['max_width']  = '1024';
  $config['max_height']  = '768';

  $this->load->library('upload', $config);

  if ( ! $this->upload->do_upload())
  {
  $error = array('error' => $this->upload->display_errors());

  $this->load->view('formulario_carga', $error);
  }
  else
  {
  $data = array('upload_data' => $this->upload->data());

  $this->load->view('upload_success', $data);
  }
  }
  } */
?>