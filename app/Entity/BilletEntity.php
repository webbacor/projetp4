<?php

// package name
namespace App\Entity;

//use
use Core\Entity\Entity;

/*Class BilletEntity is used as a data transfer object for the Billet entity.*/
class BilletEntity Extends Entity {

    // id Billet id.
     protected $id;

    // title Billet 
    protected $title;

    //Comment Billet 
    protected $content;

    //chapter billet
    protected $chapter;
	
	//URL du billeT
    private $url;	
	

    //getters
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

    // return an extract of the content
    public function  getExtract($long){
        if (strlen($this->content) > $long) {
            return substr($this->content, 0,$long) . ' ...';
        } else {
            return $this->content;
        }
    }
}