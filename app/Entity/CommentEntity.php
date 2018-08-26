<?php

namespace App\Entity;

use Core\Entity\Entity;

// used as a data transfer object for the comment entity
class CommentEntity Extends Entity {

    //id commentaire
    protected $comId;	
    
    //content comment.
    protected $content;
	
    //name in comment
    protected $name;
	
	//date in comment
    protected $commentDate;



// public function getId
// return $ this-> id;
    
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