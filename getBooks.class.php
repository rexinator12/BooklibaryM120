<?php
class library extends dbh{
    protected function getAllBooks(){
      
     $numberpage = 20;
     $numrecords = 6098;
     $numlinks = ceil($numrecords/$numberpage);
     $page = isset($_GET ['start']) ? $_GET ['start'] : 1;
     $start = $page * $numberpage;
     if(!$page) $page=0;
     for($i=0;$i<=$numlinks;$i++){
      $y = $i+1;
      echo '<div class="pag">
      <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>';
        for($i=0;$i<=$numlinks;$i++){
          $y = $i+1;
        echo'<li class="page-item"><a class="page-link" href="library.php?start='.$i.'">'.$y.'</a></li>';
        };
        echo'<li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav></div>';
    }
      
        $sql = "SELECT b.id, b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID limit $start,$numberpage";
        if(isset($_GET['submit'])){
          $titel ='%'. $_POST['titel'].'%';
          //$kat = '%'.$_POST['kat'].'%';
          //$autor = '%'.$_POST['autor'].'%';
          //$zustand = '%'.$_POST['zustand'].'%';   
          $sql = "SELECT b.id, b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID AND b.kurztitle like '$titel' LIMIT $start,$numberpage";  

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
