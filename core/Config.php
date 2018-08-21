<?php

namespace Core;

//Classe Config gère les paramètres de configuration de l'application
class Config
{
    //$setting contient tous les paramètres
    private $settings = [];

    //$_instance est l'instance de la classe
    private static $_instance;

    // modèle de conception singleton pour cette classe.
    //$file le fichier contenant les paramètres.
    //return Config $ _instance
    public static function getInstance($file)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }


    //Constructeur de configuration.
    //$file le fichier contenant les paramètres.
    public function __construct($file)
    {
        $this->settings = require($file);
    }


    //renvoie la valeur de la clé $key (ou null si elle n'est pas définie)
    //$ key la clé pour trouver dans la configuration d'une aire []
    // @return mixed | null
    public function get($key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }

}