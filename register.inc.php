<?php

if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $mail = $_POST["mail"];
    $firstn = $_POST["firstname"];
    $lastn = $_POST["lastname"];
    $password = $_POST["password"];
    $reppassword = $_POST["reppassword"];
    $admin = 0;

    include "dataconn.php";
    include "register.class.php";
    include "register-contr.class.php";
    $register = new regichange($username,$mail,$firstn,$lastn,$password,$reppassword, $admin);
    $register->registered();
    header("location: index.php");

 
   

}