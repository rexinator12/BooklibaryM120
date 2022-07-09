<?php
session_start();
class Login extends dbh {
    protected function getUser($username, $password){
        $stmt = $this->connect()->prepare('SELECT passwort FROM benutzer where benutzername = ? OR email = ?;');
        
    if(!$stmt->execute(array($username,$password))){
        $stmt = null;
        echo $stmt;
        $_SESSION["status"] = "STMT Failed!";
        header("location: login.php?error=stmtfailed");
        exit;
    }

    if($stmt->rowCount()==0)
    {
        $stmt = null;
        $_SESSION["status"] = "User not found!";
        header("location: login.php?error=usernotfound");
        exit();
    }
    
    $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPassword = password_verify($password, $passwordHashed[0]["passwort"]);
    if($checkPassword== false)
    {
        $stmt = null;
        $_SESSION["status"] = "User not found!";
        header("location: login.php?error=usernotfoundx");
        exit();
    }
    elseif($checkPassword ==true){
        $stmt = $this->connect()->prepare('SELECT * FROM benutzer where benutzername = ? OR email = ? and passwort = ?;');
        
        if(!$stmt->execute(array($username,$username,$password))){
            $stmt = null;
            echo $stmt;
            $_SESSION["status"] = "STMT Failed!";
            header("location: login.php?error=stmtfailed");
            exit;
        }

            if($stmt->rowCount()==0){
        $stmt = null;
        $_SESSION["status"] = "User not found!";
        header("location: index.php?error=usernotfound");
        exit();
    }
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION["userID"] = $user[0]["ID"];
        $_SESSION["username"] = $user[0]["benutzername"];
        $_SESSION["admin"] = $user[0]["admin"];
        $stmt = null;
    $stmt = null;
}



    

}
}