<?php
namespace App\Table;

use Core\Table\Table;

// model of the ticket entity
 class BilletTable extends Table{

   // name of the table in the database
    protected $table = 't_billet';

    // return the entire line where the status is "Published";
     // $ way how will the command be handled by (ASC or DESC)
     // Return for BilletEntity table
   
    public function getPublished($way = 'ASC'){
        $sql = "SELECT * 
        FROM t_billet 
        WHERE status = ? 
        ORDER BY chapter " . $way;
        return $this->query($sql, ['Publié']);
    }

    // Get a specific "ticket" from the database
    // $ id in the id of the line
    // return \ App \ Entity \ TicketEntity or null if not found
    
    public function find($id){
		return $this->query("		
		SELECT *
		FROM t_billet            
		WHERE id = ?", [$id], true);		
    }
}