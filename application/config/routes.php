<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "login";
$route['404_override'] = '';
$route['reporte_poste']= 'reportes/reporte/poste';
$route['detalle_area/(:any)']= 'reportes/reporte/reportePoste/$1';
$route['camaras_ue']= 'camaras_ue/camaras_ue/register_ue';
