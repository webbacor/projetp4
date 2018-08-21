<?php

use Core\Config;
use Core\Database\MysqlDatabase;

// Class App est chargé d'effectuer l'initialisation de l'application et des opérations principales:
// enregistrer les 'autoloaders'
// commencer la session
// créer une instance de base de données et de table *
// aide methode static https://www.youtube.com/watch?v=7E_0FvRotl4
  
class App {

    private $db_instance;
    private static $_instance;


//cette fonction statique implémente le modèle de conception singleton pour cette classe
//création de l'unique objet représentant l'accès à la base de données, et de stocker la référence à cet objet dans une variable globale du programme afin que l'on puisse y accéder de n'importe où dans le script. 
//   aide https://apprendre-php.com/tutoriels/tutoriel-45-singleton-instance-unique-d-une-classe.html
// return App l'instance statique de la classe App
  
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

//démarrer la session et charger l'autochargeur (conçu pour charger automatiquement toutes les autres classes)
//return vide
     
    public static function load(){
		session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }


// Responsable de la gestion des erreurs
//$error l'erreur à afficher
   
    public static function error($error = ""){
		echo $error;
	}

//fabrication pour la classe de table
//$name le nom de la classe recherchée
//@return \Core\Table\Table  à la classe table

    public function getTable($name){
        $class_name = '\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

//fabrication pour la classe Mysqldatabase 
//return a PDO class
	
    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

//fonction pour debuger "espion"
//contenu du fichier $text
     
    public static function spy($text){
        file_put_contents("spy.log", $text);
    }
}