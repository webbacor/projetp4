<?php
namespace App\Table;

use Core\Table\Table;

//UserTable est le modèle de l'entité utilisateur
 class UserTable extends Table
{

    //$ table nom de la table dans la base de données
     
    protected $table = 't_user';

    //Test si le nom existe dans la table des utilisateur
     //$name nom des la table
     //return boolean true sif exist sinon false
    
    public function nameExists($name)
    {
        $result = $this->query("		
		SELECT id
		FROM t_user
		WHERE name = ? ", [$name], true);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    
}