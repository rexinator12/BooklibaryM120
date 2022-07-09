<?php
class Users extends dbh{
    protected function getAllUsers(){

        $sql = "SELECT benutzername, name, vorname, email from benutzer limit 20";
        if(isset($_GET['search_boxU'])){
          $search ='%'.$_GET['search_boxU'].'%';
          $sql = "SELECT benutzername, name, vorname, email from benutzer where benutzername like '$search'";  


        }
        if(isset($_POST['request'])){

          $fillt = $_POST['request'];
          echo $fillt;
          $sql = "SELECT kurztitle, kategorie, autor, zustand from buecher where kategorie = '$fillt'";  
          
      }
    $result = $this->connect()->query($sql);
    //if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch()) {
            $data[] = $row;
      }
    //} else {
    //  echo "0 results";
    //}
    return $data;
    }
}