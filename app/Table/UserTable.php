<?php
namespace App\Table;

use Core\Table\Table;

// UserTable is the model of the user entity
 class UserTable extends Table
{

    // $ table name of the table in the database
    protected $table = 't_user';

    // Test if the name exists in the user table
     // $ name name of the table
     // return boolean true sif exist otherwise false
    
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