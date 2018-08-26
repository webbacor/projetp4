<?php

use Core\Config;
use Core\Database\MysqlDatabase;

// Class App is responsible for initializing the application and main operations:
// register the 'autoloaders'
// start the session
// create a database and table instance *
// help method static https://www.youtube.com/watch?v=7E_0FvRotl4
  
class App {

    private $db_instance;
    private static $_instance;


// this static function implements the singleton design pattern for this class
// create the single object representing access to the database, and store the reference to this object in a global variable of the program so that it can be accessed from anywhere in the script.
// help https://learning-php.com/tutorials/select-handle-45-singleton-instance-unique-of-class.html
// return App the static instance of the App class
  
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

// start the session and load the autoloader (designed to automatically load all other classes)
// return empty
     
    public static function load(){
		session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }


// Responsible for error management
// $ error the error to display
    public static function error($error = ""){
		echo $error;
	}

// manufacturing for the table class
// $ name the name of the class sought
// @ return \ Core \ Table \ Table to the table class

    public function getTable($name){
        $class_name = '\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

// build for Mysqldatabase class
// return a PDO class
	
    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

// function to debug "spy"
// contents of the $ text file
     
    public static function spy($text){
        file_put_contents("spy.log", $text);
    }
}