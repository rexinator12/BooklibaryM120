<?php
class library extends dbh{
    protected function getAllBooks(){

        $sql = "SELECT kurztitle, kategorie, autor, zustand from buecher limit 20";
        if(isset($_POST['search'])){
    
          $searchT = $_POST['search_box'];
          $sql .= "where kurztitle = '{$searchT}' OR kategorie = '{$searchT}'OR autor = '{$searchT}'OR zustand = '{$searchT}'  ";
         header("Location: library.php");
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