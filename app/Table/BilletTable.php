<?php
namespace App\Table;

use Core\Table\Table;

// modèle de l'entité Billet
 class BilletTable extends Table{

   //nom de la table dans la base de données
    protected $table = 't_billet';

    //retourner toute la ligne où le statut est "Publié"; 
     //$way façon dont va etre traité la commande par (ASC ou DESC)
     //Return pour tableau de BilletEntity
   
    public function getPublished($way = 'ASC'){
        $sql = "SELECT * 
        FROM t_billet 
        WHERE status = ? 
        ORDER BY chapter " . $way;
        return $this->query($sql, ['Publié']);
    }

    //Obtenir un «billet» spécifique de la base de données
    //$id dans l'id de la ligne
    //return \ App \ Entity \ BilletEntity ou null si non trouvé
    
    public function find($id){
		return $this->query("		
		SELECT *
		FROM t_billet            
		WHERE id = ?", [$id], true);		
    }
}