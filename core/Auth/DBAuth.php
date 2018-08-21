<?php
namespace Core\Auth;

use Core\Database\Database;

// Class DBAuth
 
class DBAuth {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

//la fonction login vérifie dans la base de données si le nom et le mot de passe fournis par l'utilisateur sont corrects.
//return boolean renvoie true si l'utilisateur existe et si le mot de passe est correct sinon retourne false.
   
    public function login($username, $password){
        $user = $this->db->prepare('SELECT * FROM t_user WHERE name = ?', [$username], null, true);
        if($user){
            if($user->password === sha1($password)){
                $_SESSION['auth'] = $user->id;
                $_SESSION['name'] = $user->name;
                $_SESSION['role'] = $user->role;
                $_SESSION['isLocked'] = $user->isLocked;
                return true;
            }
        }
        return false;
    }

    //Vérifiez si l'utilisateur est connecté.
    public function logged(){
        return isset($_SESSION['auth']);
    }

    //Vérifie  si l'administrateur est connecté
    public function isAdmin(){
		if (!isset($_SESSION['role'])){
			return false;
		}
		return ($_SESSION['role'] === 'admin');
	}

    //verifie si l'ulisateur est bloqué
    public function isLocked() {
        if (!isset($_SESSION['isLocked'])){
            return false;
        }

        return ($_SESSION['isLocked'] == 1);
    }

}