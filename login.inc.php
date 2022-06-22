<?php

if(isset($_POST["submit"]))
{    echo "1";
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo "1";
    include "dataconn.php";
    echo "1";
    include "login.class.php";
    echo "1";
    include "login-contr.class.php";
    echo "1";
    $login = new loginer($username,$password);
    echo "1";
    $login->loginUser();
    echo "1";
    header("Location: index.php");

 
   

}