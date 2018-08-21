<?php

//nom de package 
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
	

    //les getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getChapter() {
        return $this->chapter;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getUrl() {
        return 'index.php?p=billets.show&id=' . $this->id;
    }

    //renvoi un extrait du contenu
    public function  getExtract($long){
        if (strlen($this->content) > $long) {
            return substr($this->content, 0,$long) . ' ...';
        } else {
            return $this->content;
        }
    }
}