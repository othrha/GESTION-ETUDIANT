<?php
require_once 'config.php';
class users{
    private string $username;
    private string $email;
    private  $password;

    public function __construct($username,$email, $password){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }


    public function selectEmail(){
        $req = $GLOBALS['db']->prepare("SELECT * FROM users WHERE email=:email");
        $req->bindValue(':email', $this->email);
        $req->execute();
        $res = $req->fetch();
        return $res;
    }

    public function addUsers(){
        $req = $GLOBALS['db']->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $req->bindValue(':username', $this->username);
        $req->bindValue(':email', $this->email);
        $req->bindValue(':password', $this->password);
        $res = $req->execute();
        return $res;
    }

    public function conexion(){
        $req = $GLOBALS['db']->prepare('SELECT * FROM users WHERE email= :email AND password= :password');
        $req->bindValue(':email', $this->email);
        $req->bindValue(':password', $this->password);
        $req->execute();
        $count_row = $req->rowCount();
        $data = $req->fetch();
        return array($count_row, $data);      
    }
}





