<?php

if(isset($_POST["submit"]))
{
    //hier werden di daten in Variabeln gespeichert
    $username = $_POST["username"];
    $mail = $_POST["mail"];
    $firstn = $_POST["firstname"];
    $lastn = $_POST["lastname"];
    $password = $_POST["password"];
    $reppassword = $_POST["reppassword"];
    $admin = null;

    include "../dataconn.php";
    include "../Model/register.class.php";
    include "register-contr.class.php";
    //hier werden die daten an register-contr.class weitergegeben
    $register = new regichange($username,$mail,$firstn,$lastn,$password,$reppassword, $admin);
    $register->registered();
    header("location: ../index.php");

 
   

}