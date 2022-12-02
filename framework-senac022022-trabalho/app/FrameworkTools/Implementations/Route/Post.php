<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\InsertDataController;
use App\Controllers\AryonController;

trait Post {
    
    private static function post() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/insert-data':
                return (new InsertDataController) -> exec();
            break;
            case '/aryon02':
                return (new AryonController) -> aryon02();
            break;

        }
    }

}