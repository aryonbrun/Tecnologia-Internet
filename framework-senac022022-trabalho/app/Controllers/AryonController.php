<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;


class AryonController extends AbstractControllers{

    private $params;
    private $attrName;


    public function aryon01() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
            if($value["name_pet"] == "name_pet") {
                $valueOfVariable = $value["value"];
            }
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $pets = $databaseConnection
                ->query("SELECT * FROM petshop;")
                ->fetchAll();

        view($pets);
    }
    
    
    public function aryon02() {
        try {
            
            $response = ['success'=> true];

            $this->params = $this->processServerElements->getInputJSONData();
    
           
            
            $query = "INSERT INTO petshop (name_pet,type_service) VALUES (:name_pet,:type_service)";
            
            $statement = $this->pdo->prepare($query);     
            $statement->execute([
                ':name_pet' => $this->params["name_pet"],
                ':type_service' => $this->params["type_service"] 
            ]);

        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $this->attrName
            ];
        }

        view($response);
    }

    

}