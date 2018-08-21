<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/*Class Comments Controller est le contrôleur pour l'entité Commentaires
 son rôle est d’obtenir des données du modèle et de les transférer pour la visualistion*/

class CommentsController extends AppController{

   /* Constructeur CommentsController.
     Définir le chemin de vue et le modèle via le constructeur parent et les modèles de chargement requis par ce contrôleur.
     */

    public function __construct(){
        parent::__construct();
        $this->loadModel('comment');
        $this->loadModel('report');
    }

    /*  * Demander tous les commentaires avec le compteur signalé du modèle et transmettre les données arriver à la vue. */

    public function index(){

        $title = 'Administrateur';

        $comments = $this->comment->getCommentsWithReported();

        $this->render('admin.Comments.index', compact('comments', 'title'));
    }

 /* Modifier un commentaire et revenir à la liste de commentaires de rafraîchissement*/
    public function edit(){
        if (!empty($_POST)) {
            $result = $this->comment->update($_GET['comId'], [
                'content' => $_POST['content']                
            ]);
            if($result){
                //redirection
                header('Location: ' . $this->getLocation());
                exit;
            }
        }

        $post = $this->comment->find($_GET['comId']);

        $title = 'Edition d\'un commentaire';

        $form = new BootstrapForm($post);
        $this->render('admin.comments.edit', compact('form', 'title'));
    }

    /*Supprimer un commentaire et revenir à la liste de commentaires de rafraîchissement*/

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->comment->delete($_POST['comId']);
            return $this->index();
        }
    }

   /* cette fonction définit la page à déplacer en fonction de l'origine de l'appel (du front office ou du back office)
     *
     * return $link URL du lien pour la redirection.
     */
    public function getLocation() {

        $link = '';

         // si l'appel par administrateur depuis le front office $ _GET ['from'] est défini.
        if (isset($_GET['from'])) {
            $link = 'index.php?p='. $_GET['from'] . '&id=' . $_GET['billetId'];
         /*sinon si $ _GET ['from'] n'est pas défini, l'appel provient du back-office.*/
        } else {
            $link = 'index.php?p=admin.comments.index';
        }
        return $link;
    }
}