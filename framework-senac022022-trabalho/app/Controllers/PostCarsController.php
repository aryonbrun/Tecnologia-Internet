<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

Class PostCarsController extends AbstractControllers {

private $params; //recebe o comando do json
private $attrName; //guarda o nome do campo que esta faltando

    public function execute(){
        try{
            
            $response = ['success' =>true]; 
            //pegando a requsicao do post
            $this->params = $this->processServerElements->getInputJSONData();

            //metodo criado para conferir/validação
            $this->verificationInputvar();

            $query = "INSERT INTO trabalhopostcar (car_name, car_model,car_year) 
                      VALUES (:car_name, :car_model, :car_year)";
            
            $statement = $this->pdo->prepare($query);
            // executando
            $statement->execute([
                ':car_name'  => $this->params['car_name'],
                ':car_model' => $this->params['car_model'],
                ':car_year'  => $this->params['car_year']

            ]);
        
        
        } catch (\Exception $e) {
            $response = [
                'success'          => false,
                //pegando erro e guardando
                'message'          => $e->getmessage(),
                'missingAtribute'  => $this->attrName
            ];
        }
            view($response);

            
    }
    // metodo que verifica campo preenchidos corretamente
    public function VerificationInputVar(){

        if(!$this->params['car_name']){
            $this->attrName = 'car_name';
            throw new \Exception('Esta Faltando Nome Carro');
        }

        if(!$this->params['car_model']){
            $this->attrName = 'car_model';
            throw new \Exception('Falta Modelo Carro');               
        }

        if(!$this->params['car_year']){
            $this->attrName = 'car_year';
            throw new \Exception('Falta Ano Carro');
        }  
       

         //carro Zero ou Seminovo
         if(!$this->params['car_year'] > date('Y')){
             $this->attrName = 'car_year';
             throw new \Exception('Ano do carro maior que o atual.');
        
         }
    }

}