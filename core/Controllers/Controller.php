<?php 

namespace Controllers;


//Cette classe ne peut pas être instancier 
abstract class Controller
{
    protected $model;
    protected $modelName;
    
    public function __construct()
    {
        $this->model = new $this->modelName(); //la propiété model est une instance de la class modelName. Dans la class enfant, model correspond donc à un nouvelle instance de la classe qui est passée dans la propriété modelName; 

    
    }

   


}