<?php

namespace Core\Controller;

//Class Controller is the mother class of all controllers. it implements the controller in the MVC design model.
class Controller{

    //$viewPath the main directory of the view.
    protected $viewPath;

    //$template the model for the sight
    protected $template;


// * this function is responsible for displaying the data.
// $ view displays the name and path of the view file.
// $ variables all variables needed for the view.
    protected function render($view, $variables = []) {

        // begins to buffer
        ob_start();

        //extract the variables from the table
        extract($variables);

        //ask for sight
        require($this->viewPath . str_replace('.', '/', $view) . '.php');

        //place the buffer in $ content ($ content is used in the template below).
        $content = ob_get_clean();		

        //exiger le modèle pour l'affichage final
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    //prohibit action
    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Accès interdit');
    }

    //Page not found
    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}