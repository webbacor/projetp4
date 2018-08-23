<?php

// définit le chemin racine de l'application
define('ROOT', dirname(__DIR__));


// initialisation application
require ROOT . '/app/App.php';
App::load();

  // verifie si un parametre de page existe
    if(isset($_GET['p'])){
         //paramètre la variable $page si un paramètre de page existe ($ _GET ['p'])
       $page = $_GET['p'];
    }else{
    //page par défaut si aucun paramètre.
        $page = 'Billets.index';
    }

   /* détermine le chemin, le contrôleur et l’action (fonction à appeler).
    le masque pour l'url possède les 2 masques possibles suivants:
    path.controllerName.action par exemple: admin.billet.index
    ou controllerName.action par exemple: billet.index*/
$page = explode('.', $page); //retourne le tableau des chaines
    if($page[0] == 'admin'){
       $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
       $action = $page[2];
    } else{
       $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
       $action = $page[1];
    }


// création et action du contrôleur nécessaire.
$controller = new $controller();
$controller->$action();

?>