<?php
//hier werden die daten genommen von register.inc und werden kontrolliert
class regichange extends Register{
    private $username;
    private $mail;
    private $firstn;
    private $lastn;
    private $password;
    private $reppassword;
    private $admin;

    public function __construct($username,$mail,$firstn,$lastn,$password,$reppassword, $admin){
        $this->username = $username;
        $this->mail = $mail;
        $this->firstn = $firstn;
        $this->lastn = $lastn;
        $this->password = $password;
        $this->reppassword = $reppassword;
        $this->admin = $admin;
        
    }
    public function registered(){
        if($this->emptyIn() == false){
            header("location: ../index.php?error=emptyinput");
            exit;
        }
        if($this->invalidUsername() == false){
            header("location: ../index.php?error=invalidUsername");
            exit;
        }
        if($this->invalidMail() == false){
            header("location: ../index.php?error=invalidMail");
            exit;
        }
        if($this->invalidFirstn() == false){
            header("location: ../index.php?error=invalidFirstname");
            exit;
        }
        if($this->invalidLastn() == false){
            header("location: ../index.php?error=invalidLastname");
            exit;
        }
        if($this->checkPass() == false){
            header("location: ../index.php?error=checkPass");
            exit;
        }
        if($this->checkIfexist() == false){
            header("location: ../index.php?error=checkIfexist");
            exit;
        }

        $this->setUser($this->username, $this->firstn, $this->lastn, $this->password, $this->mail, $this->admin);

    }
//parameter für gültige eingaben
    private function emptyIn(){
        $result;
        if(empty($this->username) || empty($this->firstn) || empty($this->lastn) || empty($this->mail)|| empty($this->password)|| empty($this->reppassword) ){
            $result = false;

        } else{
            $result = true;
        }
        return $result;
    }
    private function invalidUsername(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;

        } else{
            $result = true;
        }
        return $result;
    }
    private function invalidMail(){
        $result;
        if(!filter_var($this->mail, FILTER_VALIDATE_EMAIL)){
            $result = false;

        } else{
            $result = true;
        }
        return $result;
    }
    private function invalidFirstn(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->firstn)){
            $result = false;

        } else{
            $result = true;
        }
        return $result;
    }
    private function invalidLastn(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->lastn)){
            $result = false;

        } else{
            $result = true;
        }
        return $result;
    }

    private function checkPass(){
        $result;
        if($this->password !== $this->reppassword){
            $result = false;

        } else{
            $result = true;
        }
        return $result;
    }
    private function checkIfexist(){
        $result;
        if(!$this->checkUser($this->username, $this->mail)){
            $result = false;

        } else{
            $result = true;
        }
        return $result;
    }
}