<?php
namespace App\Table;

use Core\Table\Table;

//ReportTable est le modèle de l'entité Report
class ReportTable extends Table{

    //$table nom de la table dans la base de données
     
    protected $table = 't_report';
 
	//Ajouter un rapport
    //$comId commentaire id
    //$usrId ID utilisateur
    //return booléen le résultat de la requête

	public function add($comID, $userID){
		
		$sSql = [
			'com_id' => $comID,
			'usr_id' => $userID
		];			
		
		$res = $this->create($sSql);
		
		return $res;				
	}
	
	//Annuler un rapport (supprimer)
    //$reportID l'id du rapport
    //Return booléen le résultat de la requête
	public function cancel($reportID){
		
		$res = $this->delete($reportID);				
		return $res;		
	}
	

	//Tester si un rapport existe pour ce commentaire et l'utilisateur actuel
	//$comID id de commentaire
	//$usrId ID utilisateur
	//Return int / false l'identifiant du rapport s'il existe ou pas.
	
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

	//retourne la totalité des rapports pour un commentaire
	//$comId commentaire id
    //return totalite du rapport pour ce commentaire
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