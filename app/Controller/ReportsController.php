<?php

namespace App\Controller;

use Core\Controller\Controller;

/* class ReportController is the controller of the reporting entity*/
// Extends adds authentication verification
class ReportsController extends AppController{

    public function __construct(){
		
        parent::__construct();
		
        $this->loadModel('Report');
    }

    // add a report for the comment
  
    public function add(){
		
		$res = $this->Report->add($_GET['comId'], $_SESSION['auth']);
		
		if ($res){
			// If successful, update the data via the controller's show method
			$bc = new BilletsController;
			$bc->show();
		} else {
			$texte = 'il y a une erreur dans l\'exécution de la requete.
			dans la fonction ReportsController.add';
			\App::error($texte);	
		}		
	}

     // Cancel the report for the comment
	
	public function cancel(){
		
		$res = $this->Report->cancel($_GET['reportId']);

		if ($res){
			$bc = new \App\Controller\BilletsController;				
			$bc->show();
		} else {
			$texte = 'il y a une erreur dans l\'exécution de la requete.
			dans la fonction ReportsController.delete';
			\App::error($texte);	
		}
	}
}