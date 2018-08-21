<?php

namespace App\Entity;

use Core\Entity\Entity;

//utilisée comme objet de transfert de données pour l’entité des commentaires
class CommentEntity Extends Entity {
    //id commentaire
    protected $comId;	
    
    //contenu commentaire.
    protected $content;
	
    //Nom dans le commentaire
    protected $name;
	
	//date dans le commentaire
    protected $commentDate;



//fonction publique getId 
// retourne $this-> id;  

    public function getComId() {
        return $this->comId;
    }

    public function getName() {
        return $this->name;
    }

    public function getContent() {
        return $this->content;
    }


	public function getCommentDate(){
		return $this->commentDate;
	}
	
	public function getTotalReport(){
		return $this->totalReport;
	}
	
}