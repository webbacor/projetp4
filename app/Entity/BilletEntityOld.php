<?php

/nom de package 
namespace App\Entity;

//utiliser :
use Core\Entity\Entity;

/*Class BilletEntity est utilisé comme objet de transfert de données pour l'entité Billet. */
class BilletEntity Extends Entity {
    // id Billet id.
     protected $id;

    // titre Billet 
    protected $title;

    //Commentaire Billet 
    protected $content;

    //chapitre du billet
    protected $chapter;
    
    //URL du billeT
    private $url;   
    
	
//les getters et setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
	
	public function setUrl() {
		$this->url = $url;
		return $this;
	}
	
	public function getUrl() {
		return 'index.php?p=billets.show&id=' . $this->id;
	}
}