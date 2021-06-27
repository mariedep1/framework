<?php 

class Rendering
{


    /**
    * 
    * genère l'affichage du template avec les donnéees interpolées
    * 
    *@param string $template
    *@param array $données
    * @return void
    */

    public static function render(string $template, array $données) :void{

        extract($données);
        //extract crée des variables à partir d'un tableau, le nom de la clé devient le nom de la variable et la valeur devient la valeur de la variable.

        //on démarre la mémoire tampon
        ob_start();

        //effectue le require pour récupérer le bon template
        require_once "templates/".$template.".html.php";
        
        //on récupère les données et on arrête la mémoire tampon 
        $contenuDeLaPage = ob_get_clean();
        
        
        //recupère le template layout qui s'affiche à chaque fois 
        require_once "templates/layout.html.php";

    }




}