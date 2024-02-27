<?php

require_once(BASEDIR."/apps/themes.php");

if (!defined('ENVIRONMENT')) {
##define('ENVIRONMENT', $_SERVER["DOCUMENT_ROOT"], true);
define('ENVIRONMENT', 'production', true);
}

$db_connect_api = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
    'portable' => '3308',
	'username' => '',
	'password' => '',
	'database' => '',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db_groups = array(
    "build_api" => $db_connect_api
);

return;
?>

