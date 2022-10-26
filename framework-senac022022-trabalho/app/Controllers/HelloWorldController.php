<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class HelloWorldControllers extends AbstractControllers {

    public function execute(){

        // header('Content-Type:  application/json');
        $requestVariables = $this->processServerelements->getVariables();
        $valueofVariable;

        foreach ($requestVariables as $value) {
            if($value["name"] == "info") { //aplicamos o nome da variavel como INFO
                $valueofVariable = $value["value"]; //e o valor continua o mesmo
            }
        }

        view([
            "name" => "Api to Learning",
            "version" => 1.0,
            "value_of_variable" => $valueofVariable,
            "manager_developer" => "Aryon Brunetti",
            "web_site_company" => "netocord.ml"

    ]); //comando ECHO imprime

        // echo json_encode(["name" => "Api to Learning",
        //     "version" =>1.0,0
        //     "manager_developer" => "Aryon Brunetti",
        //     "web_site_company" => "netocord.ml"
        // ]); //comando ECHO imprime
    }
}
