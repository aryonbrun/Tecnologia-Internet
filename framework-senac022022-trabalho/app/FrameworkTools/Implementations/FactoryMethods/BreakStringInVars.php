<?php

namespace App\FrameworkTools\Implementations\FactoryMethods;

// e a parte de uma classe
// pegando uma parte da classe e colocando em outro lugar
trait BreakStringInVars {


    public function breakStringInVars($requestUri){
        $uriAndvars = explode ("?", $requestUri);

        if (!isset($urlAndVars[1])){
            return;
        }

        $stringWithvars = $urlAndVars[1];
        $arrayWithVars = explode("&",$stringWithvars);

        //função callback
        return array_map(function($element){
            $nameAndValue = explode ("=", $element); //pasando metodo como arhgumento em outro metodo
            return[
                "name" => $nameAndValue[0],
                "value" => $nameAndValue[1]
            ];
        }, $arrayWithVars);
        
        dd($varsOfUrl);
        
    //     $varsOfUrl = array_map(function($element) {
    //         return explode ("=", $element);
    //     }, $arrayWithVars);

    //     DD($varsOfUrl);
    }
}