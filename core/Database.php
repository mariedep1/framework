<?php 

//permet de faire la connexion à la base de données en utilisant PDO
class Database {

    /**
     * 
     * trouve PDO
     * @return PDO
     */
    public static function getPdo() :PDO{

        //il faut changer le nom de la db ainsi que le nom et mot de passe de l'utilisateur de la db
        $pdo = new PDO('mysql:host=localhost;dbname=garages', 'garage', 'garage', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //permet de récupérer uniquement un tableau associatif, pour recupéré un objet une suffit de changer FETCH_ASSOC en FETCH_OBJ
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" 
        ]);
        
        return $pdo;

    }








}












