<?php 

namespace Model; 


class Exemple //extends Model 

{

    //on assigne sa proprité $table avec le nom de sa table dans la db 
    protected $table = "exemples"; 

    //si on extend Model, la classe Exemple a accès à ses méthodes, la classe méthode peut 
    //avoir ses propres methodes



    //Voici un exemple de méthode de la classe Exemple 
    /**
     * 
     * Retourne un tableau avec les exemples d'un autre exemple ou un booleen s'il est vide
     * @param int $autreExempleId
     * @return array|bool
     * 
     */
    public function findAllByAutreExemple(int $autreExempleId){

        $requete = $this->pdo->prepare("SELECT*FROM exemples WHERE autre_exemple_id=:autreExempleId");
        $requete->execute(['autre_exemple_id'=>$autreExempleId]);
        $items = $requete->fetchAll();
        return $items;
    }




}