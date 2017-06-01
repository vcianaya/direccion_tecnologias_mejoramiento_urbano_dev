<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades_educativas_model extends CI_Model {
	function get_nivel()
	{
		$query = $this->load->database('video_camaras', TRUE)
		->select('*')
		->get('nivel');
		return $query->result();
	}

	function get_distrito()
	{
		$query = $this->load->database('video_camaras', TRUE)
		->select('*')
		->get('distrito');
		return $query->result();
	}

	function get_zona()
	{
		$query =  $this->load->database('video_camaras', TRUE)
		->get('zona');
		return $query->result();
	}

	function get_tipo_medidor()
	{
		$query = $this->load->database('video_camaras',TRUE)
		->get('tipo_medidor');
		return $query->result();
	}

	function get_poligon()
	{
		$query = $this->load->database('video_camaras',TRUE)
		->select('ad.lat,ad.lng,d.numero as distrito')
		->from('distrito as d')
		->join('area_distrito as ad', 'd.id = ad.distrito')
		->get();
		return $query->result();
	}
}
