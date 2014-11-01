<?php

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	require 'Slim/Slim.php';
	\Slim\Slim::registerAutoloader();

	$app = new \Slim\Slim(array('debug'=> true));

	$app->get('/', function(){
		echo "Hello";
	});
	$app->get('/hello/:name', function($name){
		echo "Hello, $name";
	});

	$app->run();
?>