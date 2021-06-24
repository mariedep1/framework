<?php

namespace Controllers;


class Home //extends Controller si besoin d'un model
{
    //  protected $modelName; si besoin d'un model , on assigne la classe : \namespace\nomdeclass::class 
    // ex: \Model\Exemple::class


    /**
     * affiche l'accueil du framework
     * 
     * 
     */
    public function index()
    {
        $titreDeLaPage = "Accueil Framework";

         $message = "Bienvenue dans la documentation";
         $messageChangeable = "Changez-moi grâce au formulaire"; 


         if( !empty($_POST['messageChangeable']) ){
             $messageChangeable = $_POST['messageChangeable']; 
         }

         
        // render un template

        \Rendering::render('home/home', compact('titreDeLaPage', 'message', 'messageChangeable'));
         //render a besoin d'un template, ici le template home qui se trouve dans le dossier home des templates, et un tableau comprennant les données à afficher dans le template.La méthode compact crée un tableau associatif à partir des variables crées au dessus. Les noms des variables deviennent les clés et leurs valeurs la valeur de chaque clés

    }

   



}