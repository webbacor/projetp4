<?php
namespace Core\Database;

use \PDO;
use PDOException;

// creation de la classe pour l'accés à la base de données
 
class MysqlDatabase extends Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    /*fonction construction MysqlDatabase 
     $db_name, $db_user, $db_pass, $db_host
     */
    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /*retourner une instance de PDO */
    private function getPDO(){
        if($this->pdo === null) {
            try {
                $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host .';charset=utf8',
                    $this->db_user, $this->db_pass);

            } catch (PDOException $e) {
                \App::error('La connexion à la base de donnée a échouée : ' .$e->getMessage());
               die();
            }

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    /*
     * Exécute la fonction de requête pdoExecutes the pdo query function
        traitement de la requete SQL
        $class_name class le nom de la classe pour PDO::FETCH_CLASS (à envoyer)
        $one récupère (un si $one est vrai sinon tout)
        return (array, bool ou mixed)
     */
    public function query($statement, $class_name = null, $one = false){
        $req = $this->getPDO()->query($statement);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $req;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;
    }

    /* préparer et executer la fonction PDO
            aide dans  http://php.net/manual/en/pdo.prepare.php
            et http://php.net/manual/en/pdostatement.fetch.php
     $statement la requete SQL pour préparer la fonction de PDO
     $attributes, les attributs pour la fonction exécuter de PDO
     $class_name, le nom de la class pour PDO::FETCH_CLASS à envoyer
     bool $one récupère (un si $one est vrai sinon tout)
     * @return array|bool|mixed
     */

    public function prepare($statement, $attributes, $class_name = null, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $data = $req->fetch();
        } else{
            $data = $req->fetchAll();
        }
        return $data;
    }

    /*Exécute la fonction LastInsertId de PDO pour obtenir le dernier identifiant de la dernière ligne insérée dans la base de données.
        aide  http://php.net/manual/en/pdo.lastinsertid.php
    retour chaine
    */
    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }

}