<?php
 
// package name
namespace App\Controller\Admin;

//use : 
use \App;
use \Core\Auth\DBAuth;

/**
Creating an AppController class
 Class AppController is the back office application controller.
 Extends AppController adds an authentication check in the constructor.
**/
class AppController extends \App\Controller\AppController{
 /**Our class inherits attributes and methods from \ App \ Controller \ AppController
     AppController construction
     */

    public function __construct(){
		
        // We call the construct () method of the parent class
        parent::__construct();
		
        // restrict building to APP
        $app = App::getInstance();

        // Check if the user is an administrator in the DBAuth class.
        $auth = new DBAuth($app->getDb());
        
        // forbidden if he is not an administrator
        if(!$auth->isAdmin()){
            $this->forbidden();
        }
		
		// New template for the back office
		$this->template = 'backoffice';
    }

}

