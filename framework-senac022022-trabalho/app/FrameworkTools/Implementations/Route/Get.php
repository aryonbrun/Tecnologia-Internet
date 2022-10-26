<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\HelloWorldController;
use App\Controllers\TrainQueryController;
use App\Controllers\AryonController;

trait Get {
    
    private static function get() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/hello-world':
                return (new HelloWorldController)->execute();
            break;

            case '/train-query':
                return (new TrainQueryController)->execute();
            break;
            case '/aryon01':
                return (new AryonController)->aryon01();
            break;
        }
    }
}
