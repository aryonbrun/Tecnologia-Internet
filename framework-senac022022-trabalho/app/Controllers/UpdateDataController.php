<?php

namespace App\Controllers;

use App\FrameworkTools\Controllers\AbstractControllers;

class updateDataController extends AbstractControllers {

    public function exec() {
        $missingAttribute;
        //vetor
        $response =[
            'success' => true
        ];  
        
        try {
        
            $requestVariable = $this->processServerElements->getVariable();

            if ((!$requestVariables) || (sizeof($resquestVariables)) === 0) {
                $missingAttribute = 'variableisEmpty';
                throw new Execption ("You Need to inform userid variable");
            }

            foreach ($requestVariables as $requestVariable) {
                if ($requestVariable ['name'] == 'userId') {
                    $userId = $rquestVariable['value'];
                }
            }

            if (!$userId) {
                $missingAttribute = 'userIdIsNull';
                throw new \Exception ("You need to informe userId variable");
            }
            //se nao criar o pdo ; ja criado no abstract controller
            $users = $this->pdo->quert("SELEC * FROM user WHERE id_user = '{$userId}';")
                    ->fetchAll();
            dd($users);

        } catch (\Throwabel $th) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }    
        view($response);
        // dd($requestVariable);
    }

}