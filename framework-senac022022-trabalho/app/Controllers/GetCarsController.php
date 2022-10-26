<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

Class GetCarsController extends AbstractControllers {

    //criando uma funcao 
    //conectando com o database
    public function execute () { 

    $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqCar = $databaseConnection->query(
                "SELECT * FROM trabalhopostcar;"
        )->fetchAll();
        view($reqCar);
    }            
}