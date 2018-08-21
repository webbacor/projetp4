<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

/**Class AppController est le contrôleur d'application du front office
Extends ajoute une vérification d'authentification  */
class AppController extends Controller{

    /* Constructeur AppController.
     * définir le chemin de vue et le modèle
     */
    public function __construct(){

        $this->viewPath = ROOT . '/app/Views/';
		$this->template = 'default';
    }

//creation d'une instance de modèle via l'application App-> getTable ()
        
    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}