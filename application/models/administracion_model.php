<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administracion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function save_active_accesorios_robados($id_template) {

        $this->db->select('*');

        $data = $this->db->get_where('accesorios_robados', array('accesorios_robados.id' => $id_template))->row();

        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('accesorios_robados');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('accesorios_robados');
        }
    }

    function save_active_monitoreo($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('monitoreo', array('monitoreo.id_monitoreo' => $id_template))->row();
        if ($data->verificacion1 == 1) {
            $this->db->where('id_monitoreo', $id_template);
            $this->db->set('verificacion1', 0);
            return $this->db->update('monitoreo');
        } else {
            $this->db->where('id_monitoreo', $id_template);
            $this->db->set('verificacion1', 1);
            return $this->db->update('monitoreo');
        }
    }

    //vero
    function save_active_autopartes_robadas($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('autopartes_robadas', array('autopartes_robadas.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('autopartes_robadas');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('autopartes_robadas');
        }
    }

    function save_active_avenida($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('avenida', array('avenida.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('avenida');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('avenida');
        }
    }

    function save_active_calle($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('calle', array('calle.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('calle');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('calle');
        }
    }

    function save_active_causa($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('causa', array('causa.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('causa');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('causa');
        }
    }

    function save_active_clase_vehiculo($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('clase_vehiculo', array('clase_vehiculo.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('clase_vehiculo');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('clase_vehiculo');
        }
    }

    function save_active_clasificacion($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('clasificacion', array('clasificacion.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('clasificacion');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('clasificacion');
        }
    }

    function save_active_delito($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('delito', array('delito.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('delito');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('delito');
        }
    }

    function save_active_distrito($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('distrito', array('distrito.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('distrito');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('distrito');
        }
    }

    function save_active_division($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('division', array('division.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('division');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('division');
        }
    }

    function save_active_documentos_robados($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('documentos_robados', array('documentos_robados.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('documentos_robados');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('documentos_robados');
        }
    }

    function save_active_mes($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('mes', array('mes.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('mes');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('mes');
        }
    }

    function save_active_naturaleza($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('naturaleza', array('naturaleza.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('naturaleza');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('naturaleza');
        }
    }

    function save_active_tipo_caso($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('tipo_caso', array('tipo_caso.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('tipo_caso');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('tipo_caso');
        }
    }

    function save_active_tipo_denuncia($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('tipo_denuncia', array('tipo_denuncia.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('tipo_denuncia');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('tipo_denuncia');
        }
    }

    function save_active_tipo_operativo($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('tipo_operativo', array('tipo_operativo.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('tipo_operativo');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('tipo_operativo');
        }
    }

    function save_active_tipo_servicio($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('tipo_servicio', array('tipo_servicio.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('tipo_servicio');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('tipo_servicio');
        }
    }

    function save_active_tipo_violencia($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('tipo_violencia', array('tipo_violencia.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('tipo_violencia');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('tipo_violencia');
        }
    }

    function save_active_zona($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('zona', array('zona.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('zona');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('zona');
        }
    }

    //vero
    ////jc sg


    function save_active_delito_felcc($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('delito_felcc', array('delito_felcc.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('delito_felcc');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('delito_felcc');
        }
    }

    function save_active_tipo_caso_monitoreo($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('tipo_caso_monitoreo', array('tipo_caso.id' => $id_template))->row();
        if ($data->estado == 1) {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 0);
            return $this->db->update('tipo_caso_monitoreo');
        } else {
            $this->db->where('id', $id_template);
            $this->db->set('estado', 1);
            return $this->db->update('tipo_caso_monitoreo');
        }
    }

    function save_active_operativo($id_template) {
        $this->db->select('*');
        $data = $this->db->get_where('operativo', array('operativo.id_operativo' => $id_template))->row();
        if ($data->verificacion == 1) {
            $this->db->where('id_operativo', $id_template);
            $this->db->set('verificacion', 0);
            return $this->db->update('operativo');
        } else {
            $this->db->where('id_operativo', $id_template);
            $this->db->set('verificacion', 1);
            return $this->db->update('operativo');
        }
    }

}
