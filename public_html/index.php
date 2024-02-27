<?php

@ini_set('log_errors','On');
@ini_set('display_errors','Off');
@ini_set('error_reporting', E_ALL );
@ini_set('display_startup_errors', 'On');
error_reporting(E_ALL);

@ini_set("memory_limit","1000M");
@ini_set('max_execution_time', '1000');

if (!defined('BASEDIR')) {
##define('BASEDIR', $_SERVER["DOCUMENT_ROOT"], true);
define('BASEDIR', __DIR__, true);
}

require_once(BASEDIR."/apps/config.php");

header("Content-type: text/html; charset=tis-620;");

if(empty($_SERVER['REDIRECT_URL'])){
    $url = null;
}else{
    $url = $_SERVER['REDIRECT_URL'];
}

$theme = new cc_theme();
$theme->url($url);
$theme->exec();
$theme->run();

return;
?>

