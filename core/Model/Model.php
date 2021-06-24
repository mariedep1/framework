<?php


namespace Model; 

abstract class Model
{

    protected $pdo; 
    protected $table;
    
    public function __construct(){
        
        $this->pdo = \Database::getPdo(); //la propriété pdo fait appelle à la méthode static getPdo() de Database;
    }


    /**
     * trouve un item par son id
     * retourne un tableau ou un booléen s'il n'existe
     * @param  integer $id
     * @return array|bool
     */

    public function find( int $id) {

        $resultat = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $resultat->execute(['id'=>$id]);
        $item = $resultat->fetch();

        return $item;     

    }

      /**
     * 
     * Retourne un tableau avec tous les items 
     * @return array
     */

    public function findAll() :array{

        
        $resultat = $this->pdo ->query("SELECT * FROM {$this->table}"); 
        $items = $resultat->fetchAll();
        return $items; 

    }


    /**
     * 
     * supprime un item 
     * @param integer $id
     * @return void
     */
    public function delete(int $id) :void{

        $requeteDelete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $requeteDelete ->execute(['id'=>$id]);
    }



}