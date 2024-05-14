<?php

namespace App\Core;

use PDO;

class SQL
{
    private $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:host=mariadb;dbname=esgi;port=3306","esgi","esgipwd");
        }catch (\Exception $e){
            die("Erreur SQL : ".$e->getMessage());
        }
    }

    public function save()
    {
        //Vous ne devez ecrire en dure le nom de la table ou des colonnes à inserer en bdd
        //echo get_called_class();
        $sql = ".....";

    }

}