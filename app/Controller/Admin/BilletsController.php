<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/* La classe BilletsController est le contrôleur de l'entité Billet
 son rôle est d’obtenir des données du modèle et de les transférer pour qu'il soit visible 
 */

// Extends BilletsController ajoute une vérification d'authentification dans AppController
class BilletsController extends AppController{
 /* Constructeur BilletsController.
   Définir le chemin de vue et le modèle via le constructeur parent et les modèles de chargement requis par ce contrôleur.
     */
    public function __construct(){
     // On appelle la méthode construct() de la classe parente   
        parent::__construct();
        //chargement du modele billet
        $this->loadModel('billet');
    }

/* la fonction index récupère toutes les lignes du modèle (classe BilletTable) et transfère les données pour quelles soient visibles*/
   
    public function index() {

        $posts = $this->billet->all('chapter');

        $title = 'Administrateur';

        $this->render('admin.Billets.index', compact('posts', 'title'));
    }

/* Cette fonction ajoute une ligne TITRE dans la table via le modèle (classe BilletTable) si le $_POST est présent.*/
    
    public function add(){
        if (!empty($_POST)) {
            $result = $this->billet->create([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'chapter' => $_POST['chapter'],
                'status' => $_POST['status']
            ]);

            if($result){
                return $this->index();
            }
        }

        $title = 'Création d\'un billet';

        $form = new BootstrapForm($_POST);
        $this->render('admin.billets.edit', compact('form', 'title'));
    }

  /* Cette fonction met à jour une ligne EDITION de la table via le modèle (classe BilletTable) si le $_POST est présent.*/

    public function edit(){

        if (!empty($_POST)){
            $fields = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'chapter' => $_POST['chapter'],
                'status' => $_POST['status']
            ];


            $result = $this->billet->update($_GET['id'], $fields);
            
            //header( "refresh:5;url=index.php?p=admin.Billets.index" );
            header('Location: ' . $this->getLocation());
            exit;
        }

        // le code ci-dessous n'est exécuté que si $ _POST est vide
        $post = $this->billet->find($_GET['id']);

        $title = 'Edition d\'un billet';

        $form = new BootstrapForm($post);
        $this->render('admin.billets.edit', compact('form','title'));
    }

 /* cette fonction définit la page à déplacer en fonction de l'origine de l'appel (du front office ou du back office)
     *
     * return $link URL du lien pour la redirection.
     */
    
    public function getLocation() {

        $link = '';

     // si l'appel par administrateur depuis le front office $ _GET ['from'] est défini.
        if (isset($_GET['from'])) {
            $link = 'index.php?p='. $_GET['from'] . '&id=' . $_GET['id'];
       /*sinon si $ _GET ['from'] n'est pas défini, l'appel provient du back-office.*/
        } else {
            $link = 'index.php?p=admin.Billets.index';
        }
        return $link;
    }

    /*Supprimer un billet et revenir à la liste des billets de rafraîchissement*/
    public function delete(){
        if (!empty($_POST)) {
            $result = $this->billet->delete($_POST['id']);
            return $this->index();
        }
    }
}