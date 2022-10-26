<?php

function dd($input){
    var_dump($input); //mostra o vlaor da  variavel 
    die();
}
function env($nameOfVariable){
    return $_ENV[$nameOfVariable];
}
function view($input){
    echo json_encode($input);
}