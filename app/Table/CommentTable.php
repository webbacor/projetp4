<?php
namespace App\Table;

use Core\Table\Table;

// The CommentTable class is the comment entity model

class CommentTable extends Table{

    // $ table name of the table in the database
    protected $table = 't_comment';

    // Get comments on a ticket
    // $ id id of the 'billet'
    // return commentEntity table
    
    public function getComments($id){
		return $this->query("		
		SELECT t_comment.id as comId, usr_id as userId, name, content, commentDate
		FROM t_comment
		INNER JOIN t_user ON usr_id = t_user.id
		WHERE bil_id = ?
		ORDER BY t_comment.id desc", [$id]);		
    }

	public function add($billetID, $userID){
	
		$sSql = [
			'content' => $_POST['content'],
			'bil_id' => $billetID,
			'usr_id' => $userID
		];			
		
		$res = $this->create($sSql);
	}

    // get comments with (or without) the number of comments reported and the name of the author.
    // return an Array object in commentEntity.
   
    public function getCommentsWithReported(){
	    return $this->query("
                            
        SELECT com.id as comId, content, name, com.usr_id, count(rep.com_id) as reported 
        FROM `t_comment` as com             
        LEFT JOIN t_report as rep ON com.id = rep.com_id
        LEFT JOIN t_user on com.usr_id = t_user.id
        GROUP BY com.id, content
        ORDER BY Reported DESC");
    }
}