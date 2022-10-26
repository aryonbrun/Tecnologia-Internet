<?php

namespace App\Controlllers;

use App\FrameworkTools\Abstract\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

Class InsertDataController extends AbstractControllers{
    
    public function execute() {

        $pdo = DatabaseConnection::start()->getPDO();
    
        $params = $this->processServerElements->getINputJSONDATA();

        $query = "INSERT INTO user (name, last_name, age) VALUES (:name, :last_name, :age)";

        $statement->execute([
            // PARAMETROS CRIADO
            ':name' =>$params["name"],
            ':last_name' => $paramns["lastname"],
            ':age' => $params["age"]
        ]);


        view([

            'success'=> true

        ]);
    
    
    
    }
}