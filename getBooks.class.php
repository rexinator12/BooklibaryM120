<?php
class library extends dbh{
    protected function getAllBooks(){
        $sql = "SELECT kurztitle, kategorie, autor, zustand from buecher limit 20";
    $result = $this->connect()->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
            $data[] = $row;
      }
    } else {
      echo "0 results";
    }
    return $data;
    }
}