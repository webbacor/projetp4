<?php

namespace Core\Entity;

/*the parent class for all 'entity' classes (mapping between an object and a table in the database).
 */
class Entity {

    /*Use the "magic" _get method to send the key via the getter (return a value without doing anything else, it can also modify or adjust a value before returning it.) The getter must exist
    $ key
    return mixed*/

    public function __get($key){
        $method = 'get' . ucfirst($key);
        if (method_exists($this, $method)) {
            return $this->$method();
        } else {
            return null;
        }
    }
}

