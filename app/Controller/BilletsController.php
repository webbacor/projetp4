<?php

namespace App\Controller;

use Core\Controller\Controller;

/*The TicketsController class is the ticket controller and Commentary
  its role is to get data from the model and transfer it to the view
  Extends adds authentication verification
 */

class BilletsController extends AppController {

    /* Builder TicketsController.
      Define the view path and model via the parent constructor and load templates required by that controller.*/

    public function __construct() {
        parent::__construct();

        $this->loadModel('billet');
        $this->loadModel('comment');
        $this->loadModel('report');
    }

    /*This function gets all lines with the 'Published' status of the TicketTable template and the transfer data arrives at the view.
     */
    public function index() {

       // direction of the order by (ASC or DESC) for the ticket list.
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

    //post a ticket and its comments
     
    public function show() {

        // Request data from the model.
        $billet = $this->billet->find($_GET['id']);
		$comments = $this->comment->getComments($_GET['id']);

        $this->template = 'sheet';
        $title = '';

        $this->render('billets.show', compact('billet','comments', 'title'));
    }

	/*Add a comment and update the comment list */
	public function addComment() {
		
		$this->comment->add($_GET['id'], $_GET['userID'], $_GET['comment']);
		//Refresh data.
		$this->show();
	}
}