<?php

namespace Core\Controller;

//Class Controller est la classe mère de tous les contrôleurs. il implémente le contrôleur dans le modèle de conception MVC.
class Controller{

    //$viewPath le répertoire principal de la vue.
    protected $viewPath;

    //$template le modèle pour la vue
    protected $template;


// * cette fonction est chargée d'afficher les données.
//$view affiche le nom et le chemin du fichier de vue.
//$variables toutes les variables nécessaires à la vue.
    protected function render($view, $variables = []) {

        // commence à mettre en mémoire tampon
        ob_start();

        //extraire les variables du tableau
        extract($variables);

        //réclame la vue
        require($this->viewPath . str_replace('.', '/', $view) . '.php');

        // place le tampon dans $content ($content est utilisé dans le modèle ci-dessous).
        $content = ob_get_clean();		

        //exiger le modèle pour l'affichage final
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    //interdire l'action
    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Accès interdit');
    }

    //page non trouvée
    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}