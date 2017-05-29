<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function construct() {
        parent::__construct();
    }
    
    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA
    function subir($titulo,$imagen,$id)
    {
        $data = array(
            'titulo' => $titulo,
            'ruta' => $imagen,
            'id_desaparecido' => $id
        );
        return $this->db->insert('foto_desaparecido', $data);
    }
}
