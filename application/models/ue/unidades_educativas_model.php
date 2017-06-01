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

	 function get_zona()
	 {
	 	$query =  $this->load->database('video_camaras', TRUE)
	 	->get('zona');
	 	return $query->result();
	 }
}
