<?php

namespace Core;

//Config class manages application configuration settings
class Config
{
    // $ setting contains all parameters
    private $settings = [];

    //$_instance is the instance of the class
    private static $_instance;

    //  singleton design pattern for this class.
    // $ files the file containing the parameters.
    // return Config $ _instance
    public static function getInstance($file)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }


    // Configuration builder.
    // $ files the file containing the parameters.
    public function __construct($file)
    {
        $this->settings = require($file);
    }


    // return the value of the key $ key (or null if it is not defined)
    // $ key the key to find in the configuration of an area []
    // @return mixed | null
    public function get($key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }

}