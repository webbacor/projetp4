<?php

namespace Core\Entity;

/*la classe mère pour toutes les classes 'entité' (mappage entre un objet et une table dans la base de données).
 */
class Entity {

    /*Utiliser la méthode "magic" _get pour envoyer la clé via le getter ( renvoyer une valeur sans rien faire d'autre. Il peut aussi modifier ou ajuster une valeur avant de la renvoyer. ) le getter doit exister
    $key
    return mixed  */

    public function __get($key){
        $method = 'get' . ucfirst($key);
        if (method_exists($this, $method)) {
            return $this->$method();
        } else {
            return null;
        }
    }
}

