<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function construct() {
        parent::__construct();
    }

    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA
    function subir($titulo, $imagen, $id) {
        $data = array(
            'imagen_despues' => $titulo,
            'imagen_antes' => $imagen
        );

        $this->db->where('id_monitoreo', $id);
        $this->db->update('monitoreo', $data);
    }

    function getData_blog($id) {

        $this->db->where('id_monitoreo', $id);
        $this->db->from('monitoreo'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
        $usuarios = $this->db->get();
        return $usuarios->result(); //devolvemos el resultado de lanzar la query.
    }

    function subir_resumes($titulo, $imagen) {
        $data = array(
            //'titulo' => $titulo,
            'resumes' => $imagen
        );
        $id = $_POST['id'];
        $this->db->where('id', $id);
        $this->db->update('my_profile', $data);
    }

    function subir_resumes2($titulo, $imagen) {
        $data = array(
            //'titulo' => $titulo,
            'resumes' => $imagen
        );
        $email = $_POST['email'];
        $this->db->where('email', $email);

        $this->db->update('my_profile', $data);
    }

    function subir_awards($memberships, $honors, $caja1, $caja2, $honors1) {
        $data = array(
            //'titulo' => $titulo,
            'memberships' => $imagen
        );
        $email = $_POST['email'];
        $this->db->where('email', $email);
        $this->db->update('awards', $data);
    }

}

?>