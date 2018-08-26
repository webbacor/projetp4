<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

/** Class AppController is the front office application controller
Extends adds authentication verification*/
class AppController extends Controller{

    /* Constructeur AppController.
     * define the path of view and the modele     */
    public function __construct(){

        $this->viewPath = ROOT . '/app/Views/';
		$this->template = 'default';
    }

// create a model instance via App-> getTable ()
        
    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}