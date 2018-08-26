<?php
namespace App\Table;

use Core\Table\Table;

//ReportT// ReportTable is the report entity model
class ReportTable extends Table{

    // $ table name of the table in the database
     
    protected $table = 't_report';
 
	// Add a report
    // $ comId comment id
    // $ usrId user ID
    // return boolean the result of the query

	public function add($comID, $userID){
		
		$sSql = [
			'com_id' => $comID,
			'usr_id' => $userID
		];			
		
		$res = $this->create($sSql);
		
		return $res;				
	}
	
	// Cancel a report (delete)
    // $ reportID the id of the report
    // return boolean the result of the query
	public function cancel($reportID){
		
		$res = $this->delete($reportID);				
		return $res;		
	}
	

	// Test if a report exists for this comment and the current user
	// $ comID comment id
	// $ usrId user ID
	// Return int / false the identifier of the report if it exists or not.
	
	public function isReported($comID, $userID){
		
		$report = $this->query("		
		SELECT id
		FROM t_report
		WHERE com_id = ? AND usr_id = ?" , [$comID,$userID], true);
		
		if ($report){
			return $report->getId();
		} else {
			return false;
		}		
	}

	// return all the reports for a comment
	// $ comId comment id
    // return the whole report for this comment
	public function totalReported ($comId){
		
		$reports = $this->query("		
		SELECT id
		FROM t_report
		WHERE com_id = ?" , [$comId]);		
		
		if ($reports){
			return count($reports);
		} else {
			return 0;
		}
	}
}