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

//the login function checks in the database if the name and password provided by the user are correct.
// return boolean returns true if the user exists and the password is correct otherwise returns false.
   
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

    //Check if the user is logged in.
    public function logged(){
        return isset($_SESSION['auth']);
    }

    //Check if the administrator is logged in
    public function isAdmin(){
		if (!isset($_SESSION['role'])){
			return false;
		}
		return ($_SESSION['role'] === 'admin');
	}

    //check if the user is blocked
    public function isLocked() {
        if (!isset($_SESSION['isLocked'])){
            return false;
        }

        return ($_SESSION['isLocked'] == 1);
    }

}