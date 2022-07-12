<?php
session_start();
if(isset($_POST["submit"]))
{ //daten werden in variabeln gespeichert
    $username = $_POST["username"];
    $password = $_POST["password"];
    include "../dataconn.php";
    include "../Model/login.class.php";
    include "login-contr.class.php";
        //hier werden die daten an login-contr.class weitergegeben
    $login = new loginer($username,$password);
    $login->loginUser();
    header("Location: ../index.php");

 
   

}