<?php

 
namespace App\Entity;

//use
use Core\Entity\Entity;

/*Class BilletEntity is used as a data transfer object for the Billet entity. */
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
    
	
//getters & setters
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