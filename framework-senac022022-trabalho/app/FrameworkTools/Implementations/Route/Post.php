<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\InsertDataController;
use App\Controllers\GuilhermeController;

trait Post {
    
    private static function post() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/insert-data':
                return (new InsertDataController)->exec();
            break;
            case '/germano2':
                return (new GuilhermeController)->aryon02();
            break;

        }
    }

}