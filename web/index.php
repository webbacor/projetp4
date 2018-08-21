<!DOCTYPE html>
<html lang="fr">

<head>
       
    
  <meta charset="utf-8">
  <meta name="description" content="billet simple pour l'Alaska" />
 
  <title>J Forteroche</title>
    <link rel="stylesheet" type="text/css" href="web/css/style.css"/>
    
<!--favicon-->
      
  <link rel="shortcut icon" href="img/favicon.png" />
      
<!-- régler la mise en page par rapport aux tailles/résolutions d'écrans -->
  <meta name="viewport" content="width=device-width, initial-scale=1"/>  
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       
<!-- pour optimiser le réferencement-->
      <meta name="keywords" content="billet simple pour l'Alaska, Jean Forteroche" />
      <meta name="author" content="Corinne" />
    
 <!-- OpenGraph (pour optimiser le réferencement)FACEBOOK-->
    <meta property="og:title" content="billet simple pour Alaska Jean Forteroche"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="billet simple pour Alaska Jean Forteroche, ecrivain, blog, commentaires" />
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
   
 <!-- OpenGraph (pour optimiser le réferencement)TWITTER  -->
      <meta name=”twitter:card” content="summary" />
      <meta name=”twitter:site” content="" />
      <meta name=”twitter:title” content="billet simple pour Alaska Jean Forteroche" />
      <meta name=”twitter:description” content="billet simple pour Alaska Jean Forteroche, ecrivain, blog, commentaires"  />
      <meta name=”twitter:image” content="" />
       
</head>
<body>
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


</body>
</html>