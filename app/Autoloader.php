<?php
namespace App;
// Class Autoloader is responsible for automatically loading the necessary classes (using spl_autoload_register) for app.
class Autoloader{

    //cette fonction appelle la fonction spl_autoload_register
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    // function necessary for the needs of the class.
    // Name of the string class $ to load
    
    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
           
            require __DIR__ . '/' . $class . '.php';
        }
    }

}