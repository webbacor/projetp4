<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

/*Class UsersController is the controller entity for users
 its role is to get data from the model and transfer them to the view
 Extends adds authentication verification*/
class UsersController extends AppController {

    /* UsersController constructor.
     call the parent constructor, redefine the template, and create the instance of the template
     */
    public function __construct(){
        Parent::__construct();

        $this->template = 'sheet';

        $this->loadModel('user');
    }

    /*function login - Authenticates and redirects the user according to their rights (admin or user) */
    public function login() {

        $errors = false;
        $locked = false;

        if(!empty($_POST)) {

            $auth = new DBAuth(App::getInstance()->getDb());

            if($auth->login($_POST['userName'], $_POST['password'])) {
				if (!$auth->isLocked()) {

				    // if the user is not blocked, check if it is the administrator?
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
				} else { // Locked user
				    $locked = true;
				    unset($_SESSION['name']);
				    unset($_SESSION['auth']);
                }
            } else { //bad connection
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

    /*function logout - disconnection from use*/
    public function add() {

        $errors = false;
        $messageError = "";

        if (!empty($_POST)) {

            // check if this email already exists
            /*if ($ this-> user-> emailExists ()) {
                $ errors = true;
                $ messageError = "This e-mail address is already associated with an account, please choose another one";
            }*/

            // check if this user already exists
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
                   // If the creation is successful, the user is logged in
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

}
