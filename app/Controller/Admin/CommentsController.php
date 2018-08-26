<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/*Class Comments Controller is the controller for the entity Comments
 its role is to obtain data from the model and transfer it for visualization*/

class CommentsController extends AppController{

   /* Constructor CommentsController.
     Define the view path and model via the parent constructor and load templates required by that controller.
     */

    public function __construct(){
        parent::__construct();
        $this->loadModel('comment');
        $this->loadModel('report');
    }

    /*  Request all comments with the reported counter of the model and transmit the data to the view. */

    public function index(){

        $title = 'Administrateur';

        $comments = $this->comment->getCommentsWithReported();

        $this->render('Admin.Comments.index', compact('comments', 'title'));
    }

 /* Edit a comment and return to the refresh comment list*/
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
        $this->render('Admin.Comments.edit', compact('form', 'title'));
    }

    /*Delete a comment and return to the refresh comment list*/

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->comment->delete($_POST['comId']);
            return $this->index();
        }
    }

   /* this function defines the page to move according to the origin of the call (front office or back office)
     *
     * return $ link URL of the link for the redirection.
     */
    public function getLocation() {

        $link = '';

         // if the administrator call from the front office $ _GET ['from'] is set.
        if (isset($_GET['from'])) {
            $link = 'index.php?p='. $_GET['from'] . '&id=' . $_GET['billetId'];
         /*otherwise if $ _GET ['from'] is not defined, the call comes from the back office.*/
        } else {
            $link = 'index.php?p=admin.comments.index';
        }
        return $link;
    }
}