<?php

//define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . '/');
define('APP_PATH', ROOT . 'aplication' . '/');

require_once APP_PATH . 'Config.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Bootstrap.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';
//require_once APP_PATH . 'Registro.php';
require_once APP_PATH . 'Database.php';
//require_once APP_PATH . 'Session.php';

//Session::init();

try {
	Bootstrap::cargarControlador(new Request);	
} catch (Exception $e) {
	echo $e->getMessage();
}

?>