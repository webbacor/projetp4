<?php
namespace Core\Database;

use \PDO;
use PDOException;

// creation of the class for access to the database
class MysqlDatabase extends Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    /*fonction construction MysqlDatabase 
     $db_name, $db_user, $db_pass, $db_host
     */
    public function __construct($db_name, $db_user = 'db750395619', $db_pass = 'AlaskaP4*', $db_host = 'db750395619.db.1and1.com'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /*return an instance of PDO */
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
     * Execute the pdoExecutes query function the pdo query function
        processing the SQL query
        $ class_name class the name of the class for PDO :: FETCH_CLASS (to send)
        $ one recovers (one if $ one is true if not all)
        return (array, bool or mixed)
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

    /* Prepare and execute the PDO function
            help in en http://php.net/manual/en/pdo.prepare.php
            et http://php.net/manual/en/pdostatement.fetch.php
     $ statement the SQL query to prepare the PDO function
     $ attributes, the attributes for the PDO run function
     $ class_name, the class name for PDO :: FETCH_CLASS to send
     bool $ one recovers (one if $ one is true if not all)
     * @return array | bool | mixed
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

    /*Executes the LastInsertId function of PDO to get the last identifier of the last line inserted into the database.
        aide  http://php.net/manual/en/pdo.lastinsertid.php
    return chaine
    */
    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }

}