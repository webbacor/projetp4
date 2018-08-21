<?php
namespace Core\HTML;

//Formulaire de classe
//Utiliser pour générer un formulaire rapidement et facilement.
class Form{

    //$data données utilisées par formulaire
    private $data;

    //Tag utilisé pour entourer les champs
    public $surround = 'p';

    //constructeur de formulaire
    public function __construct($data = array()){
        $this->data = $data;
    }


    //Cette fonction entoure un code HTML.
    //$html Code HTML à entourer
    //retour chaîne
    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    //récupérer la valeur d'un tableau ou la valeur d'une propriété d'objet
    //Retour chaine ou null (en cas d'index inexistant)
    public function getValue($index){

        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }


    //cette fonction crée un champ de saisie avec libellé et options
    //$name nom de la propriété de l'entrée
    //$label laber de l'entrée
    //array  options : options pour l'entrée (par exemple: text, textarea, radio etc ...)
    //retour chaîne
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }

    //creation d'un bouton submit*
    //retour chaine
    public function submit(){
        return $this->surround('<button type="submit">Envoyer</button>');
    }

}