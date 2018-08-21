<?php

namespace App\Controller;

use Core\Controller\Controller;

/* class ReportController est le contrôleur de l'entité de rapport*/
//Extends ajoute une vérification d'authentification 
class ReportsController extends AppController{

    public function __construct(){
		
        parent::__construct();
		
        $this->loadModel('Report');
    }

    //ajouter un rapport pour le commentaire
  
    public function add(){
		
		$res = $this->Report->add($_GET['comId'], $_SESSION['auth']);
		
		if ($res){
			// En cas de succès, on actualise les données via la méthode show du contrôleur
			$bc = new BilletsController;
			$bc->show();
		} else {
			$texte = 'il y a une erreur dans l\'exécution de la requete.
			dans la fonction ReportsController.add';
			\App::error($texte);	
		}		
	}

     //Annuler le rapport pour le commentaire
	
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