<?php
class library extends dbh{
    protected function getAllBooks(){

        $sql = "SELECT kurztitle, kategorie, autor, zustand from buecher limit 20";
        if(isset($_GET['search_box'])){
          $search ='%'.$_GET['search_box'].'%';
          $sql = "SELECT kurztitle, kategorie, autor, zustand from buecher where kurztitle like '$search'";  


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