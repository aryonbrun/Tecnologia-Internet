<?php

namespace App\FrameworkTools\Abstracts\Controllers;

use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Database\DatabaseConnection;

abstract class AbstractControllers {

    protected $processServerElements;
    protected $pdo;

    public function __construct() {
        $typeofAPI = env('TYPE_API');
        header("Content-Type: application/$typeofAPI"); // sempre colocoar aspas dupla quando contatenar com a variavel

        $this->processServerElements = ProcessServerElements::start();
        $this->pdo = DatabaseConnection::start()->getPDO();
    }
}