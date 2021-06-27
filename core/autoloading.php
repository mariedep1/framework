<?php


//permet de lancer automatiquement les require_once 
spl_autoload_register(function($class){

    $correctClass= str_replace("\\","/",$class);

    require_once "core/".$correctClass.".php";

});

//autoload renvoit une erreur d'instanciation du controller s'il n'arrive pas à faire le require (erreur de syntaxe etc)