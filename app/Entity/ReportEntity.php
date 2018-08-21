<?php

namespace App\Entity;

use Core\Entity\Entity;


class ReportEntity Extends Entity {
    //Id rapport commentaire
    protected $id;
    
    //Id commentaire
    protected $com_id;
	
    //id dans le journal 
    protected $usr_id;
	
	//date dans le rapport 
    protected $reportDate;
	

// The getters ..........
	
    public function getId() {
        return $this->id;
    }

    public function getComId() {
        return $this->com_id;
    }

	public function getUsrId() {
        return $this->usr_id;
    }

	public function getReportDate(){
		return $this->reportDate;
	}

	public function setId($id) {
        $this->id = $id;
        return $this;
    }

// The setters ..................

    public function setComId($id) {
        $this->com_id = $id;
        return $this;
    }
	
    public function setUsrId($id) {
        $this->Usr_id = $id;
        return $this;
    }    
	
	
}