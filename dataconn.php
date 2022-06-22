<?php
class dbh{

 protected function connect(){
  try{
  $username = "root";
  $password ="";
  $dbh = new PDO('mysql:host=localhost;dbname=libary', $username, $password);
  return $dbh;
  }
  catch(PDOEception $e){
    print "Error!: ". $e->getMessage."<br/>";
 }
}
}
