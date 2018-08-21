<?php
namespace Core\HTML;

//ClassBootstrapForm
//classe de formulaire avec la classe bootstrap
class BootstrapForm extends Form {

  //cette fonction entoure un code html avec la classe bootstrap en div ou span
      //$html Code HTML à entourer
      //$tag type d'ambiance ex div, span etc.
      //retour chaîne
    protected function surround($html, $tag = 'div'){
        if($tag === 'div'){
            return "<div class=\"form-group\">{$html}</div>";
        } elseif ($tag === 'span'){
            return "<span class=\"form-group\">{$html}</span>";
        }
    }
//cette fonction crée un champ de saisie avec libellé et options avec contrôle de formulaire de classe bootstrap
    
      //$name nom du champ
      //$label label du champ
      //Array $options : options pour l'entrée (par exemple: text, textarea etc ...)
      //boolean $required indique si le champ nécessite l'attribut requis.
      //retour chaîne
     
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


//Cette fonction crée un champ select avec label et options avec la classe bootstrap.
     // $Name nom du champ
     //$label label du champ
     //Array $options : options (contenu de la liste) pour la sélection
     //retour chaîne
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

    //Créer un bouton de soumission avec la classe bootstrap 
    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}