<?php
namespace Core\Table;

use Core\Database\Database;


//cette classe est la classe mère pour toutes les classes de la table. il implémente le modèle dans le modèle de conception MVC.

class Table
{
   //$table le nom de la table dans la base de données
    protected $table;

    //Base de données $db l’objet de base de données.**
    protected $db;

    //Construction de table
    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }


    //Renvoyer toutes les lignes du tableau
    //$sortBy nom du champ pour la commande par
    //retourne mixed
  
    public function all($sortBy = 'id'){
        return $this->query('SELECT * FROM ' . $this->table . ' ORDER BY ' . $sortBy);
    }


    //retourner une ligne avec un identifiant spécifique
    //$id l'identifiant de la ligne voulue
     //return  classe d'instance d'entité (ou sous-classe d'entité) ou false en cas d'échec.
    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    // Mettre à jour la ligne identifiée par l'identifiant
    //$id l'identifiant de la ligne à mettre à jour
    //Array $champs les champs à mettre à jour
    //@return boolean renvoie le résultat de la requête.
    public function update($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    //supprimer la ligne identifiée par l'identifiant
    //$id l'identifiant de la ligne à supprimer
    //@return boolean renvoie le résultat de la requête.
    public function delete($id){
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    //Créer une nouvelle ligne dans la table
     //Array $champs les champs et les valeurs associées.
     //@return boolean renvoie le résultat de la requête.**
    public function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    //extraire d'une ligne une valeur de paire
    //$key
     //$value
    // retour au tableau
    public function extract($key, $value){
        $records = $this->all();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    //Exécuter la fonction de préparation à partir de MysqlDatabase s'il y a des attributs sinon la fonction de requête est exécutée.
    //$statement la requête SQL
    //$attribue les attributs de la requête SQL
    //$one  (un si $ one est vrai autrement tout)
    //retourne mixed
    public function query($statement, $attributes = null, $one = false){

        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {			
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }

}