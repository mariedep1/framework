<?php


//permet de lancer automatiquement les require_once 
spl_autoload_register(function($class){

    $correctClass= str_replace("\\","/",$class);

    require_once "core/".$correctClass.".php";

});

//autolaod  renvoit l'erreur de l'instanciation du controller s'il n'arrive pas à faire le require