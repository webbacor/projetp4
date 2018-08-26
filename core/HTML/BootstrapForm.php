<?php
namespace Core\HTML;

//ClassBootstrapForm
//form class with the bootstrap class
class BootstrapForm extends Form {

  //this function surrounds an html code with the bootstrap class in div or span
      // $ html HTML code to surround
      // $ environment type tag ex div, span etc.
      // return string
    protected function surround($html, $tag = 'div'){
        if($tag === 'div'){
            return "<div class=\"form-group\">{$html}</div>";
        } elseif ($tag === 'span'){
            return "<span class=\"form-group\">{$html}</span>";
        }
    }
//this function creates an input field with labels and options with bootstrap class form control
    
      // $ name field name
      // $ label label of the field
      // Array $ options: options for the entry (for example: text, textarea etc ...)
      // boolean $ required indicates whether the field requires the required attribute.
      // return string
     
    public function input($name, $label, $options = [], $required = false){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $tag = isset($options['tag']) ? $options['tag'] : 'div';

        $label = '<label>' . $label . '</label>';
        $requiredField = ($required) ? ' required' : "";

        if($type === 'textarea') { // case textarea
            $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } elseif ($type === 'tinytextarea'){ // case textarea avec extension tinyMCE
            $input = '<textarea id="tinytextarea" name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else{
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control"' . $requiredField . '>';
        }

        return $this->surround($label . $input, $tag);
    }


//This function creates a select field with label and options with the bootstrap class.
     // $ Name field name
     // $ label label of the field
     // Array $ options: options (list contents) for selection
     // return string
    public function select($name, $label, $options){
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    //Create a submit button with the bootstrap class
    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}