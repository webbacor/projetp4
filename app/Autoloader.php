<?php
namespace App;
//Class Autoloader est chargé de charger automatiquement les classes nécessaires (en utilisant spl_autoload_register) pour app.

class Autoloader{

    //cette fonction appelle la fonction spl_autoload_register
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    //fonction necessaire pour les besoins de la class.
    //Nom de la classe de chaîne $ à charger
    
    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }

}