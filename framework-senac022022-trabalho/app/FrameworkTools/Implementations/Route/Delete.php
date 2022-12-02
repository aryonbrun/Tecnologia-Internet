<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\AryonController;

trait Delete {
    private static function delete() {
        switch (self::$processServerElements -> getRoute()) {
            case '/aryon04':
                return (new AryonController) -> aryon04();


        }
    }
}    