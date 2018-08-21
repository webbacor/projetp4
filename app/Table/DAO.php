<?php

//Package namespace Alaska\src\DAO;

//classe Abstraite  DAO pour lier les tables
// aide https://openclassrooms.com/fr/courses/26832-apprenez-a-programmer-en-java/26830-lier-ses-tables-avec-des-objets-java-le-pattern-dao
abstract class DAO 
{
    // Connexion à la base de données
    private $db;

    //constructeur 
    //Objet de connexion à la base de données
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    //Donne accès à l'objet de connexion à la base de données
    //return objet PDO Objet de connexion à la base de données
    
    protected function getDb() {
        return $this->db;
    }

    //Construit un objet de domaine à partir d'une ligne de base de données.
    //Doit être remplacé par les classes enfants.
    protected abstract function buildDomainObject(array $row);
}
