<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/*
 Class UsersController est l'entité contrôleur pour les utilisateurs
 son rôle est d’obtenir des données du modèle et de les transférer à la vue
 Extends ajoute une vérification d'authentification 
 */
class UsersController extends AppController{

    /* Définir le chemin de vue et le modèle via le constructeur parent et les modèles de chargement requis par ce contrôleur.*/
    public function __construct(){
        parent::__construct();
        $this->loadModel('user');
    }

/* Demander à tous les utilisateurs du modèle et transmettre les données arriver à la vue.*/
     
    public function index() {

        $users = $this->user->all('name');

        $title = 'Administrateur';
        $this->render('admin.Users.index', compact('users', 'title'));
    }

    /*Demander au modèle d'ajouter un enregistrement dans la base de données.
     */
    public function add(){
        if (!empty($_POST)) {
            $result = $this->user->create([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'role' => $_POST['role'],
                'password' => sha1($_POST['password'])
            ]);
            if($result){
                return $this->index();
            }
        }

        $title = 'Création d\'un utilisateur';

        $form = new BootstrapForm($_POST);
        $this->render('admin.users.add', compact('form', 'title'));
    }

    /*Modifier un compte utilisateur*/

    public function edit(){

        if (!empty($_POST)) {

            $fields =  ['name' => $_POST['name'],
                       //['email' => $_POST['email'],
                        'role' => $_POST['role'],
                        'isLocked' => 0];

            if (isset($_POST['isLocked']) && $_POST['isLocked']=='on') {
                $fields['isLocked'] =  1;
            }

            $result = $this->user->update($_GET['id'], $fields);

            if($result){
                return $this->index();
            }
        }

        $data = $this->user->find($_GET['id']);

        $title = 'Edition d\'un utilisateur';

        $form = new BootstrapForm($data);
        $this->render('admin.users.edit', compact('form', 'title'));
    }

     /*Supprimer un commentaire et revenir à la liste de commentaires de rafraîchissement*/
    public function delete(){
        if (!empty($_POST)) {
            $result = $this->user->delete($_POST['id']);
            return $this->index();
        }
    }
}