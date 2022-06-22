<?php

if(isset($_POST["submit"]))
{ 
    $username = $_POST["username"];
    $password = $_POST["password"];
    include "dataconn.php";
    include "login.class.php";
    include "login-contr.class.php";
    $login = new loginer($username,$password);
    $login->loginUser();
   
    header("Location: index.php");

 
   

}