<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/* The TicketsController class is the controller of the Billet Entity
 its role is to get data from the model and transfer it to be visible
 */

// Extends TicketsController adds an authentication check in AppController
class BilletsController extends AppController{
 /* Builder TicketsController.
   Define the view path and model via the parent constructor and load templates required by that controller.
     */
    public function __construct(){
     // We call the construct () method of the parent class 
        parent::__construct();
        // loading the ticket template
        $this->loadModel('billet');
    }

/* the index function retrieves all the lines of the model (classTilletTable) and transfers the data for which are visible */
   
    public function index() {

        $posts = $this->billet->all('chapter');

        $title = 'Administrateur';

        $this->render('Admin.Billets.index', compact('posts', 'title'));
    }

/* This function adds a TITLE line to the table via the template (BilletTable class) if the $ _POST is present.*/
    
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
        $this->render('Admin.Billets.edit', compact('form', 'title'));
    }

  /* This function updates an EDITION line of the table via the template (BilletTable class) if the $ _POST is present.*/

    public function edit(){

        if (!empty($_POST)){
            $fields = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'chapter' => $_POST['chapter'],
                'status' => $_POST['status']
            ];


            $result = $this->billet->update($_GET['id'], $fields);
            
            
            header('Location: ' . $this->getLocation());
            exit;
        }

        // the code below is only executed if $ _POST is empty
        $post = $this->billet->find($_GET['id']);

        $title = 'Edition d\'un billet';

        $form = new BootstrapForm($post);
        $this->render('Admin.Billets.edit', compact('form','title'));
    }

 /* this function defines the page to move according to the origin of the call (front office or back office)
     *
     * return $ link URL of the link for the redirection.
     */
    
    public function getLocation() {

        $link = '';

     // if the administrator call from the front office $ _GET ['from'] is set.
        if (isset($_GET['from'])) {
            $link = 'index.php?p='. $_GET['from'] . '&id=' . $_GET['id'];

       /*otherwise if $ _GET ['from'] is not defined, the call comes from the back office.*/
        } else {
            $link = 'index.php?p=admin.billets.index';
        }
        return $link;
    }

    /*Delete a ticket and return to the list of refreshment tickets*/
    public function delete(){
        if (!empty($_POST)) {
            $result = $this->billet->delete($_POST['id']);
            return $this->index();
        }
    }
}