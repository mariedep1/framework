<?php


class App 
{


        public static function process(){

            
             $controllerName= "home"; //changer la page d'accueil par défaut
             $task = "index"; 

                if(!empty($_GET['controller'])){

                    $controllerName = $_GET['controller'];

                }
                if(!empty($_GET['task'])){

                    $task = $_GET['task'];

                }


             $controllerName = ucfirst($controllerName);  //les noms de controllers commencent par une majuscule
             $controllerName = "\Controllers\\".$controllerName;  //on ajoute son namespace 
             $controller= new $controllerName(); //on fait une instance du controller
             $controller->$task(); //execute la tâche du controller


        }





}