
<a href="hello/test">test</a>
<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	require 'Slim/Slim.php';
	\Slim\Slim::registerAutoloader();

	include '../NotORM.php';
	$pdo = new PDO("mysql:host=localhost:3306;dbname=musikteam","root","");
	$db = new NotORM($pdo);



	// foreach ($db->bruger() as $bruger) { // get all applications
	//     echo "$bruger[Email]\n"; // print application title
	// }



	$app = new \Slim\Slim(array(
		'debug'=> true,
		'model'=>'development'
		));

	$app->get('/', function(){
		
	});

	$app->get('/hello/:name', function($name){
		echo "Hello, $name";
	});

	$app->get('/songs/:id', function($id){
		echo "test";
	});

	$app->run();
?>

