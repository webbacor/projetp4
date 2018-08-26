<?php

/// define the root path of the application
define('ROOT', dirname(__DIR__));


// initialization application
require ROOT . '/app/App.php';
App::load();

  // check if a page parameter exists
    if(isset($_GET['p'])){
         // set the $ page variable if a page parameter exists ($ _GET ['p'])
       $page = $_GET['p'];
    }else{
    // default page if no parameters.
        $page = 'Billets.index';
    }

   /* determines the path, controller, and action (function to call).
    the mask for the url has the following 2 possible masks:
    path.controllerName.action for example: admin.billet.index
    or controllerName.action for example: billet.index */
$page = explode('.', $page); //return the chain table
    if($page[0] == 'admin'){
       $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
       $action = $page[2];
    } else{
       $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
       $action = $page[1];
    }


// creation and action of the necessary controller.
$controller = new $controller();
$controller->$action();

?>