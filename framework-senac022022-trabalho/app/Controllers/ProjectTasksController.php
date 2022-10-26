<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

use App\FrameworkTools\Database\DatabaseConnection;

class ProjectTasksController extends AbstractControllers {


    //RETORNANDO OS ITENS
    public function getCar() {
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqCar = $databaseConnection
            ->query("SELECT * FROM car;")   
                ->fetchAll();
        
            view($reqCar);
    }

    //RETORNANDO ITENS PELA ID
    public function getCarById(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;

        foreach($requestsVariables as $value){
            $valueofVariable = $value["value"];

        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqcar = $databaseConnection
            ->query("SELECT * FROM car WHERE car.id_car = '[$valueOfVariable}';")
                ->fetchAll();

            view($reqCar);
    }

    // RETORNA ITENS COM DETERMINADO NOME
    public function getCarByname(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;        

        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqCar = $databaseConnection
            ->query("SELECT * FROM car WHERE car.name = '{$valueOfVariable}';")
                ->fetchAll();
        
        view($reqCar);
    }

    //  RETORNA PARTICIPANTE - VENDEDORES -
    public function getSeller(){

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqSeller = $databaseConnection 
            ->query("SELECT * FROM seller;")
                ->fecthAll();

            view($reqSeller);
    }

    // RETORNA PARTICIPANTES PELA ID
    public function getSellerById(){

        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;

        foreach ($requestsVariables as $value) {
            $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqSeller = $databaseConnection
            ->query("SELECT * FROM seller WHERE seller.id_seller = '{$valueOfVariable}';")
                ->fetchAll();

            view($reqSeller);

    
    }     
    
    //RETORNA ITENS MAIS VENDIDOS POR PARTICIPANTES - VENDEDOR-
    public function getSellerByname(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;

        foreach ($requestVariables as $value) {
            $valueOfVariable = $value["value"];

        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqSeller = $databaseConnection
            ->query("SELECT * FROM seller WHERE seller.name = '{$valueOfVariable}';")
                ->fethAll();

            view($reqSeller);

    }
    // RETORNA ITENS POR NOME -NAMESELLER-
    public function getSellerName(){

        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;

        foreach ($requestsVariables as $value) {
            $valueofVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $reqSell = $databaseConnection
            ->query("SELECT * FROM car WHERE car.id_CAR IN (SELECT sells.id_car FROM sells WHERE seller.name = 
                    (SELECT seller.id_seller FROM seller WHERE  seller.name = '{$valueOfVariable}))")
                ->fetchAll();
    }

       // retorna todos os carros vendidos por nameSeller 
       public function getSellByName(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $reqSell = $databaseConnection
            ->query("SELECT * FROM car WHERE car.id_car IN (SELECT sells.id_car FROM sells WHERE sells.id_seller = 
                   (SELECT seller.id_seller FROM seller WHERE seller.name = '{$valueOfVariable}'));")
                ->fetchAll();

        view($reqSell);
    }


    // RETORNA TODOS OS USUARIOS - COMPRADORES -
    public function getBuyers(){


        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqBuyer = $databaseConnection
            ->query("SELECT * FROM buyer;")
                ->fetchAll();

            view($reqBuyer);
    }

    // RETORNA TODOS OS USUARIOS - COMPRADORES - COM ID DETERMINADO
    public function getBuyersById(){
        
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;    

        foreach($requestVariables as $value) {
            $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqBuyer = $databaseConnection
            ->query("SELECT * FROM buyer WHERE buyer.id_buyer = '{$valueofVariable}';")
                ->fetchAll();
            
            view($reqBuyer);
    
    }

    //RETORNA USUARIOS - COMPRADORES - POR NAME
    public function getCarsByBuyerName(){

        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;

        foreach ($requestVariables as $value) {
            $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConneciton::start()->getPDO();
        $reqBuyer = $databaseConnection
            ->query("SELECT name, last_name FROM buyer WHERE buyer.name = '{$valueOfVariable}':")
                ->fetchAll();
            
            view($reqbuyer);

    }

    // RETORNA ITENS - CARROS - COMPRADOS POR NAME
    public function getCarsByBuyersName(){

        $requestVariables = $this->processServerElements->getVariables();
        $valueOfVariable;

        foreach($requestVariables as $value){
            $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqCars = $databaseConnection
            ->query("SELECT * FROM car WHERE car.id_car IN
                    (SELECT sells.id_car FROM sells WHERE sells.id_buyer = 
                    (SELECT buyer.id_buyer FROM buyer WHERE buyer.name = '{$valueOfVariable}';")
                ->fetchAll();
            
            view($reqCars);
    }
}