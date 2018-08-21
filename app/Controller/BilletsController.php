<?php

namespace App\Controller;

use Core\Controller\Controller;

/* La classe BilletsController est le contrôleur des billets et Commentaire 
  son role est d'obtenir des données du modèle et de les transférer à la vue
  Extends ajoute une vérification d'authentification 
 */

class BilletsController extends AppController {

    /* Constructeur BilletsController.
      Définir le chemin de vue et le modèle via le constructeur parent et les modèles de chargement requis par ce contrôleur. */

    public function __construct() {
        parent::__construct();

        $this->loadModel('billet');
        $this->loadModel('comment');
        $this->loadModel('report');
    }

    /*Cette fonction obtient toutes les lignes avec le statut 'Publié' du modèle BilletTable et les données de transfert arrivent à la vue.
     */
    public function index() {

        // direction de la commande par (ASC ou DESC) pour la liste des billets.
        $direction = 'ASC';

        if (isset($_POST['sortBy'])) {
            $direction = $_POST['sortBy'];
            setcookie("sortDirection",$direction,time()+ (60*60*24*30));
        } elseif (isset($_COOKIE['sortDirection'])) {
            $direction = $_COOKIE['sortDirection'];
        }

        $posts = $this->billet->getPublished($direction);

        $this->render('billets.index', compact('posts'));
    }

    //affiche un billet et ses commentaires
     
    public function show() {

        // Request data from the model.
        $billet = $this->billet->find($_GET['id']);
		$comments = $this->comment->getComments($_GET['id']);

        $this->template = 'sheet';
        $title = '';

        $this->render('billets.show', compact('billet','comments', 'title'));
    }

	/*Ajouter un commentaire et actualiser la liste des commentaires */
	public function addComment() {
		
		$this->comment->add($_GET['id'], $_GET['userID'], $_GET['comment']);
		//Actualiser les données.
		$this->show();
	}
}