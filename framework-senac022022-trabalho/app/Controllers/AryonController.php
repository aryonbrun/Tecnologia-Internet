<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;


class AryonController extends AbstractControllers {

    private $params;
    private $attrName;

    // metodo get
    public function aryon01() {
        $requestsVariables = $this -> processServerElements -> getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
            if($value["name_pet"] == "name_pet") {
                $valueOfVariable = $value["value"];
            }
        }

        $databaseConnection = DatabaseConnection::start() -> getPDO();

        $pets = $databaseConnection
                ->query ("SELECT * FROM petshop;")
                ->fetchAll();

        view($pets);
    }
    
    //P metodo post
    public function aryon02() {
        try {
            
            $response = ['success' => true];

            $this -> params = $this -> processServerElements -> getInputJSONData();
    
           
            
            $query = "INSERT INTO petshop (name_pet,type_service) VALUES (:name_pet,:type_service)";
            
            $statement = $this -> pdo -> prepare($query);     
            $statement -> execute([
                ':name_pet' => $this->params["name_pet"],
                ':type_service' => $this->params["type_service"] 
            ]);

        } catch (\Exception $erro) {
            $response = [
                'success' => false,
                'message' => $erro -> getMessage(),
                'missingAttribute' => $this -> attrName
            ];
        }

        view($response);
    }

    // metodo put
    public function aryon03() {
        
            $response = ['sucess'=> true];

        try {

            $requestsVariables = $this -> processServerElements -> getVariables();

            if ((!$requestsVariables) || (sizeof($requestsVariables) === 0)) {
                $missingAttribute = 'id_petshjop';
                throw (new \Exception ("insert variable in URL"));
            }

            foreach ($requestsVariables as $requestsVariables) {
                if ($requestsVariables ['name'] === 'id_petshop') {
                    $idPetShop = $requestsVariables ['value'];
                }
            }

            $pet = $this -> pdo -> query ("SELECT * FROM petshop WHERE id_petshop =
                '{$idPetShop}';
            ");

            if (sizeof($pet) === 0) {
                $missingAttribute = 'id_petshop';
                throw new \Exception ("record did not found");
            }

            $params = $this -> processServerElements -> getInputJSONData();

            if ((!$params) || sizeof($params) === 0) {
                $missingAttribute = 'params';
                throw new \Exception ("you need to inform some data");
            }

            $updateStructureQuery = "";
            $toStatement = []; //

            foreach ($params as $key => $value) {

                if (!in_array($key,['name_pet','type_servikce'])) {
                    $missingAttribute = 'keynotacceptable';
                    throw new \Exception ($key);
                }
                
                if ($key === 'name_pet') {
                    $updateStructureQuery .= "name_pet = :name_pet,"; //adicionando na query
                    $toStatement [':name_pet'] = $value;
                }

                if ($key === 'type_service') {
                    $updateStructureQuery .= "type_service = :type_service,";
                    $toStatement [':type_service'] = $value;
                }
            }
            
            $newStringElementsSQL = substr ($updateStructureQuery, 0, -1);
            $sql = "UPDATE petshop SET {$newStringElementsSQL} WHERE id_petshop =
                '{$idPetShop}'
                ";            

            $statement = $this -> pdo -> prepare ($sql);
            $statement -> execute ($toStatement);
        } catch (\Exception $erro) {

            $response = [
                'sucess' => false, 
                'message' => $erro -> getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }

        view ($response);
    
    }


    // metodo delete
    public function aryon04() {

        $requestsVariables = $this -> processServerElements -> getVariables();
        $response = ['sucess' => true];
        $idshop;
        $missingAttribute;

        try {
            
            foreach($requestsVariables as $valueVariable) {
                if ($valueVariable ['name'] === 'id_petshop') {
                    $idPetShop = $valueVariable ['value'];
                }
            }

            if (!$idPetShop) {
                $missingAttribute = 'id_petshop';
                throw new \Exception ("you need to inform petshop ID");
            }

            $pets = $this -> pdo -> query ("SELECT * FROM petshop WHERE id_petshop =
                '{$idPetShop}';
            ") -> fectAll();

            if (sizeof($pets) === 0) {
                $missingAttribute = 'petDontExists';
                throw new \Exception ("no record of this pet");
            }

            $sql = 'DELETE FROM petshop WHERE id_petshop = :id_petshop;';

            $statement = $this -> pdo -> prepare($sql);
            $statement -> execute (['id_petshop' => $idPetShop]);

        } catch (\Ecepetion $erro) {
            $response = [
                'sucess' => false,
                'message' => $erro ->getMessage(),
                'missiAtttribute' => $missingAttribute
            ];
        }

        view ($response);

    }

}

