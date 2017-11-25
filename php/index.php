<?php
/**
	SLIM FRAMEWORK IMPLEMENTATION
**/
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Gets autotload from vendor
require '../vendor/autoload.php';

//Creates default error handler from Slim website if something goes wrong
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);



//Generates new application
$app = new \Slim\App($c);


//Accesses customers.php page
require_once('../app/api/registerstudent.php');

//Runs application
$app->run();