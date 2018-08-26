<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/*
 Class UsersController is the controller entity for users
 its role is to get data from the model and transfer them to the view
 Extends adds authentication verification
 */
class UsersController extends AppController{

    /* Define the view path and model via the parent constructor and load templates required by that controller.*/
    public function __construct(){
        parent::__construct();
        $this->loadModel('user');
    }

/* Ask all users of the model and transmit the data to the view.*/
     
    public function index() {

        $users = $this->user->all('name');

        $title = 'Administrateur';
        $this->render('Admin.Users.index', compact('users', 'title'));
    }

    /*Ask the model to add a record to the database.
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
        $this->render('Admin.Users.add', compact('form', 'title'));
    }

    /*Edit a user account*/

    public function edit(){

        if (!empty($_POST)) {

            $fields =  ['name' => $_POST['name'],
                     
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
        $this->render('Admin.Users.edit', compact('form', 'title'));
    }

     /*Delete a comment and return to the refresh comment list*/
    public function delete(){
        if (!empty($_POST)) {
            $result = $this->user->delete($_POST['id']);
            return $this->index();
        }
    }
}