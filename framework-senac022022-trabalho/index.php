<?php

$mainPosition = __DIR__;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-type: text/html; charset=utf-8");

#require_once("{$mainPosition}\bootstrap\Env.php");
// HELPER E USADO DIRETO E SERA - REQUIREDS -
require_once("{$mainPosition}\helper\helper.php"); 
// ARQ GUARDA CONFIGURASÇÕES DO USE
require_once("{$mainPosition}\\vendor\autoload.php");

// ALTERA PRA USO DO BOOTSTRAP
use Bootstrap\Env; 

use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementations\FactoryMethods\FactoryProcessServerElements;
use App\FrameworkTools\Implementations\Route\RouteProcess;
use App\FrameworkTools\Abstracts\AbstractFactoryMethods;

Env::execute();

$factoryProcessServerElement = new FactoryProcessServerElements();
$factoryProcessServerElement->operation();

// $processServerElements = ProcessServerElements::start();
// dd($processServerElements);


RouteProcess::execute();