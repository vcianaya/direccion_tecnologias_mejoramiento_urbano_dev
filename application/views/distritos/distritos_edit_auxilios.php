<?php

$id_faltas = $this->uri->segment(3);

$edit = $this->auxilios_model->auxilios_edit($id_faltas);
foreach ($edit as $e):
//$e->pos_x;
endforeach;

$this->load->library('googlemaps');
$config = array();
$config['center'] = $e->pos_y . ', ' . $e->pos_x;
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
$this->load->view('distritos/distritos_general');
$this->load->view('distritos/distrito_1');
$this->load->view('distritos/distrito_2');
$this->load->view('distritos/distrito_3');

$marker = array();
$marker['position'] = $e->pos_y . ',' . $e->pos_x;
$marker['draggable'] = true;
$marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';

$this->googlemaps->add_marker($marker);

?>
