<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Illuminate\Database\Capsule\Manager as Capsule;
$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['intendencia']['hostname'] = 'localhost';
$db['intendencia']['username'] = 'root';
$db['intendencia']['password'] = '';
$db['monitoreo']['hostname'] = 'localhost';
$db['monitoreo']['username'] = 'root';
$db['monitoreo']['password'] = '';
$db['comando']['hostname'] = 'localhost';
$db['comando']['username'] = 'root';
$db['comando']['password'] = '';
$db['alumbrado']['hostname'] = 'localhost';
$db['alumbrado']['username'] = 'root';
$db['alumbrado']['password'] = '';

/*

$db['default']['hostname'] = '172.16.7.66';
$db['default']['username'] = 'omsc';
$db['default']['password'] = 'omsc'; 
*/

$db['default']['database'] = 'dtmu';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


$db['alumbrado']['database'] = 'dtmu_alumbrado_publico';
$db['alumbrado']['dbdriver'] = 'mysql';
$db['alumbrado']['dbprefix'] = '';
$db['alumbrado']['pconnect'] = FALSE;
$db['alumbrado']['db_debug'] = TRUE;
$db['alumbrado']['cache_on'] = FALSE;
$db['alumbrado']['cachedir'] = '';
$db['alumbrado']['char_set'] = 'utf8';
$db['alumbrado']['dbcollat'] = 'utf8_general_ci';
$db['alumbrado']['swap_pre'] = '';
$db['alumbrado']['autoinit'] = TRUE;
$db['alumbrado']['stricton'] = FALSE;


$db['intendencia']['database'] = 'observatorio_intendencia_v2';
$db['intendencia']['dbdriver'] = 'mysql';
$db['intendencia']['dbprefix'] = "";
$db['intendencia']['pconnect'] = FALSE;
$db['intendencia']['db_debug'] = TRUE;
$db['intendencia']['cache_on'] = FALSE;
$db['intendencia']['cachedir'] = "";
$db['intendencia']['char_set'] = "utf8";
$db['intendencia']['dbcollat'] = "utf8_general_ci";
$db['intendencia']['swap_pre'] = "";
$db['intendencia']['autoinit'] = TRUE;
$db['intendencia']['stricton'] = FALSE;


$db['monitoreo']['database'] = 'observatorio_monitoreo';
$db['monitoreo']['dbdriver'] = 'mysql';
$db['monitoreo']['dbprefix'] = "";
$db['monitoreo']['pconnect'] = FALSE;
$db['monitoreo']['db_debug'] = TRUE;
$db['monitoreo']['cache_on'] = FALSE;
$db['monitoreo']['cachedir'] = "";
$db['monitoreo']['char_set'] = "utf8";
$db['monitoreo']['dbcollat'] = "utf8_general_ci";
$db['monitoreo']['swap_pre'] = "";
$db['monitoreo']['autoinit'] = TRUE;
$db['monitoreo']['stricton'] = FALSE;


$db['comando']['database'] = 'observatorio_comando';
$db['comando']['dbdriver'] = 'mysql';
$db['comando']['dbprefix'] = "";
$db['comando']['pconnect'] = FALSE;
$db['comando']['db_debug'] = TRUE;
$db['comando']['cache_on'] = FALSE;
$db['comando']['cachedir'] = "";
$db['comando']['char_set'] = "utf8";
$db['comando']['dbcollat'] = "utf8_general_ci";
$db['comando']['swap_pre'] = "";
$db['comando']['autoinit'] = TRUE;
$db['comando']['stricton'] = FALSE;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $db['default']['hostname'],
    'database'  => $db['default']['database'],
    'username'  => $db['default']['username'],
    'password'  => $db['default']['password'],
    'charset'   => $db['default']['char_set'],
    'collation' => $db['default']['dbcollat'],
    'prefix'    => $db['default']['dbprefix']
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

/* End of file database.php */
/* Location: ./application/config/database.php */