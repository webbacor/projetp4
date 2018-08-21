<?php

//nom de package 
namespace App\Controller\Admin;

//utiliser : 
use \App;
use \Core\Auth\DBAuth;

/**
Création d'une classe AppController 
 Class AppController est le contrôleur d'application du back office.
 Extends AppController ajoute une vérification d'authentification dans le constructeur.
**/
class AppController extends \App\Controller\AppController{
 /** Notre classe hérite des attributs et méthodes de \App\Controller\AppController
     construction AppController
     */

    public function __construct(){
		
        // On appelle la méthode construct() de la classe parente
        parent::__construct();
		
        //restreindre la construction a APP
        $app = App::getInstance();

        //Vérifie si l'utilisateur est administrateur dans la classe DBAuth.
        $auth = new DBAuth($app->getDb());
        //interdit  si il n'est pas administrateur
        if(!$auth->isAdmin()){
            $this->forbidden();
        }
		
		//Nouveau modèle pour le back office
		$this->template = 'backoffice';
    }

}

