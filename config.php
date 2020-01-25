<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/facebook/");
	$config['dbname'] = 'facebook';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'dfsweb';
	$config['dbpass'] = '28033011';
} else {
	define("BASE_URL", "http://localhost/mvc_psr4/");
	$config['dbname'] = 'facebook';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'dfsweb';
	$config['dbpass'] = '28033011';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}