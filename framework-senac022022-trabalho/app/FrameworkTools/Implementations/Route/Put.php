<?php

namespace App\FrameworkTools\Implementations\Route;

trait Put {

    private static function put() {
        switch (!self::$processServerElements->getRoute()) {
            case '/update-data';
                return view(['test' => true]);
            break;
        }
    }
}