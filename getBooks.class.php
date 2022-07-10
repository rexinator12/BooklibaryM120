<?php
class library extends dbh{
    protected function getAllBooks(){
      $sql ="SELECT COUNT(ID) FROM buecher";
      $statement =$this->connect()->query($sql);
      $maxE = 6098;

      $page=1;
      if(isset($_GET['page'])){
        $page = (int)$_GET['page'];
      }
      $datensatze = 20;
      $maxP = (int)ceil($maxE/$datensatze);
      $page =max(1,min($maxP,$page));
      $offset = ($page - 1) * $datensatze; 
      
        $sql = "SELECT b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID limit $offset,$datensatze";
        if(isset($_GET['search_box'])){
          $search ='%'.$_GET['search_box'].'%';
          $sql = "SELECT b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID AND kurztitle like '$search'";  


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