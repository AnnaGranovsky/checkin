<?php
require_once 'Db.php';
class Login {
    public $email;
    public $password;

    public function __construct ($email, $password){
        $this->email = trim(strip_tags($email));
        $this->password = md5(trim(strip_tags($password)));
    }
    public function login(){
        $db = Db::getInstance();
        $db_pass = $db->query("SELECT password FROM users WHERE mail='$this->email' LIMIT 1");
        if ($db_pass == null || empty($db_pass)){
            return false;
        }elseif($db_pass[0]['password'] == $this->password){
            return true;
        }else{
            return false;
        }
    }

}