<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

/*Class UsersController est l'entité contrôleur pour les utilisateurs
 son rôle est d’obtenir des données du modèle et de les transférer à la vue
 Extends ajoute une vérification d'authentification */
class UsersController extends AppController {

    /* Constructeur UsersController.
     appeler le constructeur parent, redéfinir le modèle et créer l'instance du modèle
     */
    public function __construct(){
        Parent::__construct();

        $this->template = 'sheet';

        $this->loadModel('user');
    }

    /*function login -  Authentifie l'utilisateur et le redirige selon ses droits (admin ou utilisateur) */
    public function login() {

        $errors = false;
        $locked = false;

        if(!empty($_POST)) {

            $auth = new DBAuth(App::getInstance()->getDb());

            if($auth->login($_POST['userName'], $_POST['password'])) {
				if (!$auth->isLocked()) {

				    // si l'utilisateur n'est pas bloqué, vérifiez si c'est l'administrateur?
                    if($auth->isAdmin()) {
                        header('Location: index.php?p=admin.billets.index');
                        exit;
                    } elseif (isset($_GET['billetId'])) {
                        header('Location: index.php?p=billets.show&id=' . $_GET['billetId']);
                        exit;
                    } else {
                        header('Location: index.php');
                        exit;
                    }
				} else { // Utilisateur verrouillé
				    $locked = true;
				    unset($_SESSION['name']);
				    unset($_SESSION['auth']);
                }
            } else { //mauvaise connexion
                $errors = true;
            }
        }

        $title = 'Authentification';

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors', 'title','locked'));
    }

    /*function logout - Déconnection de l'utilisation */
    public function logout(){
		session_destroy();
		header('Location: index.php');
	}

    /*function add pour la Creation d'un nouvel utilisateur*/
    public function add() {

        $errors = false;
        $messageError = "";

        if (!empty($_POST)) {

            // vérifier si cet email existe déjà
            /*if ($this->user->emailExists()) {
                $errors = true;
                $messageError = "Cette adresse e-mail est déjà associée à un compte. Veuilez en choisir une autre";
            }*/

            //vérifier si cet utilisateur existe déjà
            if ($this->user->nameExists($_POST['userName'])) {
                $errors = true;
                $messageError = "Ce nom ou pseudo est déja pris. Veuillez en choisir un autre";
            }

            if ($errors == false) {
                if ($_POST['password'] === $_POST['password2']){
                    $result = $this->user->create([
                        'name' => $_POST['userName'],
                        //'email' => $_POST['email'],
                        'password' => sha1($_POST['password']),
                        'salt' => '',
                        'role' => $_POST['role']
                    ]);
                   //Si la création est réussie, l'utilisateur est connecté
                    if($result){
                        return $this->login();
                    }
                } else {
                    $errors = true;
                    $messageError = "Les mots de passe saisis ne sont pas identiques ! Veuillez corriger.  ";
                }
            }
        }

        $title = 'Creation de compte';

        $form = new BootstrapForm($_POST);
        $this->render('users.new', compact('form', 'errors', 'messageError', 'title'));
    }

   /*//fonction requestNewPassword pour permettre aux utilisateurs de demander un nouveau mot de passe.
    public function requestNewPassword()
    {
        $error = false;
        $mailNotFound = false;
        $mailSend = false;

        //Le formulaire est-il affiché?
        if (!empty($_POST)) {
            //on Vérifie si l'email existe et on obtient l'identifiant de l'utilisateur si l'email existe?
            $theUser = $this->user->emailExists();

            if ($theUser) {
                $mailNotFound = false;
               //envoie l'e-mail avec le lien pour réinitialiser le mot de passe
                $mailSend = $this->sendEmail();
            } else {
                $mailNotFound = true;
            }
        }

        $title = 'Demande de réinitialisation de mot de passe. ';

        $form = new BootstrapForm($_POST);
        $this->render('users.requestNewPassword', compact('form', 'title', 'error', 'mailNotFound','mailSend'));
    }
	*/
    /*//fonction sendEmail - envoyer l'email
    public  function sendEmail()
    {
        $to      = $_POST['email'];
        $subject = 'Réinitialisation de mot de passe';

        $message = 'Bonjour !' ."\r\n" ."\r\n";
        $message .= 'Vous avez effectué une demande pour changer votre mot de passe sur http://Alaska' . "\r\n";
        $message .= 'Cliquez sur ce lien pour changer votre mot de passe : ' . "\r\n";
        $message .= 'http://alaska/index.php?p=users.changePassword' . "\r\n";

        $headers = 'From: alaska@gmail.com' . "\r\n" .
            'Reply-To: o.majch@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        return  mail($to, $subject, $message, $headers);
    }
*/
    //fonction changePassword
    /*public function changePassword()
    {
        $error = false;
        $mailNotFound = false;
        $passNotEqual = false;
        $userId = "";

        //Le formulaire est-il affiché?
        if (!empty($_POST)) {
            // si l'utilisateur est connecté
            if (isset($_SESSION['auth'])) {
                $userId = $_SESSION['auth'];
            } else {
               //l'utilisateur n'est pas connecté, l'identification se fait par email.
                $theUser = $this->user->emailExists();
                if ($theUser) {
                    $userId = $theUser->id;
                    $mailNotFound = false;
                } else { // mail introuvable
                    $mailNotFound = true;
                }
            }

            // Vérifie le mail et récupère l'identifiant de l'utilisateur
            if (!empty($userId)) {
                // Verifie le MP
                if ($_POST['password'] === $_POST['password2']) {
                    $fields = [
                        'password' => sha1($_POST['password'])
                    ];
                    // Mettre à jour dans la base de données le mot de passe.
                    $result = $this->user->update($userId, $fields);
                    if ($result) {
                        $_SESSION['newPassword'] = true;
                        header("location: index.php?p=users.login");
                        exit;
                    }
                } else {
                    $passNotEqual = true;
                }
            }
        }

        $title = 'Changement de mot de passe. ';

        $form = new BootstrapForm($_POST);
        $this->render('users.changePassword', compact('form', 'title', 'error', 'mailNotFound', 'passNotEqual'));
    }
	*/
     /*fonction edit Modifier le compte d'utilisateur.*/
    /*public function edit(){

       //l'utilisateur doit être connecté pour éditer son compte
        if (!isset($_SESSION['auth'])) {
            $mess ="Vous devez être connecté pour pouvoir modifier votre compte !";
            App::error($mess);
            return;
        }

        $errors = false;
        $result = false;
        $messageError = '';

        if (!empty($_POST)) {

            if ($errors == false) {
                $result = $this->user->update($_POST['id'], [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                  
                ]);

                if($result){
                    $_SESSION['name'] = $_POST['name'] ;
                    header( "location: index.php" );
                    exit;
                }
            }
        }

        $data = $this->user->find($_SESSION['auth']);

        $this->template = 'sheet';
        $title = 'Compte';

        $form = new BootstrapForm($data);
        $this->render('users.edit', compact('form', 'title','errors', 'messageError'));
    }*/
}
