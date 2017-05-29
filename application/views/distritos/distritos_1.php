<?php



$this->load->library('googlemaps');
$config = array();
$config['center'] ='-16.506602830615456, -68.1624944201966 ';
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

$this->load->view('distritos/distritos_general_1');
//$this->load->view('distritos/distrito_1');
//$this->load->view('distritos/distrito_2');
//$this->load->view('distritos/distrito_3');
/// $villa_bolivar

$marker = array();

$marker['position'] = '-16.506602830615456, -68.1624944201966 ';
$marker['draggable'] = true;
$marker['ondragend'] = 'showCoords(event.latLng.lat(), event.latLng.lng());';


$this->googlemaps->add_marker($marker);

?>
