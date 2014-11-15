<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	require 'Slim/Slim.php';
	require './apiFactory.php';

	\Slim\Slim::registerAutoloader();


	$app = new \Slim\Slim(array(
		'debug'=> true,
		'model'=>'development'
		));

	$app->get('/', function(){
	});

	// $app->get('/hello/:name', function($name){
	// 	foreach ($db->bruger() as $bruger) { // get all applications
	// 	    echo "$bruger[Email]<br/>"; // print application title
	// 	}
	// 	// echo "Hello, $name";
	// });

	$app->get('/users/', function () {
		$users = ApiFactory::UsersApi()->getAll();

		echo $users;
		// foreach ($users as $bruger) { // get all applications
		//     echo "$bruger[Email]<br/>"; // print application title
		// }
	});

	$app->get('/songs/', function () {
		$songs = ApiFactory::SongsApi()->getAll();

		echo $songs;
	});

	$app->get('/setlists/', function() {
		$setlists = ApiFactory::SetlistsApi()->getAll();

		echo $setlists;
	});

	// $app->get('/songs/:id', function ($id) {
	// 	echo "test";
	// });

	$app->run();
?>

