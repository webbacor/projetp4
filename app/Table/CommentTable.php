<?php
namespace App\Table;

use Core\Table\Table;

//La classe CommentTable est le modèle de l'entité de commentaires

class CommentTable extends Table{

    //$ table nom de la table dans la base de données
    protected $table = 't_comment';

    //Obtenez les commentaires d'un billet
    //$id id de la 'billette'
    //Retour tableau de commentEntity
    
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

    // obtenir les commentaires avec (ou sans) le nombre de commentaires rapportés et le nom de l'auteur.
    //return un objet Array dans commentEntity.
   
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