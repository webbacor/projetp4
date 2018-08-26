<?php
namespace Core\HTML;

// Class form
// Use to generate a form quickly and easily.
class Form{

    //$data données u// $ data data used by formtilisées par formulaire
    private $data;

    // Tag used to surround the fields
    public $surround = 'p';

    // form constructor
    public function __construct($data = array()){
        $this->data = $data;
    }


    // This function surrounds an HTML code.
    // $ html HTML code to surround
    // return string
    protected function surround($html){
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    // retrieve the value of an array or the value of an object property
    // return string or null (if there is no index)
    public function getValue($index){

        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }


    // this function creates an input field with labels and options
    // $ name name of the property of the entry
    // $ label laber of the entry
    // array options: options for the input (for example: text, textarea, radio etc ...)
    // return string
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }

    //create a submit button *
    //return chaine
    public function submit(){
        return $this->surround('<button type="submit">Envoyer</button>');
    }

}