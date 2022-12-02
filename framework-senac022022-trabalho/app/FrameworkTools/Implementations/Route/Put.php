<?php

namespace App\FrameworkTools\Implementations\Route;
use App\Controllers\AryonController;

trait Put {

    private static function put() {
        switch (!self::$processServerElements->getRoute()) {
            case '/update-data':
                return view(['test' => true]);
            break;
            
            case '/aryon03':
                return (new AryonController) -> aryon03(); 
            break;       
        }
    }
}