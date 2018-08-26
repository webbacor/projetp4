<?php
namespace Core\Table;

use Core\Database\Database;


//this class is the parent class for all classes in the table. it implements the model in the MVC design model.

class Table
{
   //$tables the name of the table in the database
    protected $table;

    // Database $ db the database object. **
    protected $db;

    //Table construction *
    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }


    // Return all rows in the table
    // $ sortBy field name for the command by
    // returns mixed
  
    public function all($sortBy = 'id'){
        return $this->query('SELECT * FROM ' . $this->table . ' ORDER BY ' . $sortBy);
    }


    // return a line with a specific identifier
    // $ id the identifier of the desired line
     // return instance class of entity (or entity subclass) or false on failure.
    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    // Update the line identified by the identifier
    // $ id the identifier of the line to update
    // Array $ fields fields to update
    // @ return boolean returns the result of the query.
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

    // delete the line identified by the identifier
    // $ id the identifier of the line to delete
    // @ return boolean returns the result of the query.
    public function delete($id){
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    // Create a new row in the table
     // Array $ fields the fields and associated values.
     // @ return boolean returns the result of the query. **
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

    // retrieve a value from a line
    // $ key
     // $ value
    // back to the board
    public function extract($key, $value){
        $records = $this->all();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    // Execute the preparation function from MysqlDatabase if there are attributes otherwise the query function is executed.
    // $ statement the SQL query
    // $ assigns the attributes of the SQL query
    // $ one (one if $ one is true otherwise)
    // returns mixed
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