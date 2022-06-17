<?php
class Register extends dbh {
    protected function setUser($username, $firstn, $lastn, $password, $mail){
        $stmt = $this->connect()->prepare('INSERT INTO benutzer (benutzername, vorname, name, passwort, email ) values (?,?,?,?,?);');
    

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    if(!stmt->execute(array($username,$firstn, $lastn, $hashedPass, $mail))){
        $stmt = null;
        header("location: index.php?error=stmtfailed");
        exit;
    }
    $stmt = null;
}



    protected function checkUser($username, $mail){
        $stmt = $this->connect()->prepare('SELECT benutzername from benutzer where benutzername = ? or email = ?;');
    
    if(!$stmt->execute(array($username, $mail))){
        $stmt = null;
        header("location: index.php?error=stmtfailed");
        exit();
    }
    $resultCheck;

    if($stmt->rowCount() > 0){
        $resultCheck = false;
    } else{
        $resultCheck = true;
    }
    return $resultCheck;
}

}