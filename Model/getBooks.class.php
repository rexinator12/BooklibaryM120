<?php
class library extends dbh{
    protected function getAllBooks(){
    //hier wird die Seitenanzeige angezeigt
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
    //hier sind die befehle von den formular. Wenn die form gefüllt werden und gesendet werden, wird es hier verarbeitet
        $sql = "SELECT b.id, b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID limit $start,$numberpage";
        if(isset($_GET['titel'],$_GET['kat'],$_GET['autor'],$_GET['zustand'] )){
          $titel ='%'.$_GET['titel'].'%';
          $kat = $_GET['kat'];
          $autor = '%'.$_GET['autor'].'%';
          $zustand = '%'.$_GET['zustand'].'%';   
          $sql = "SELECT b.id, b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID AND b.kurztitle like '$titel' AND b.kategorie = $kat AND b.autor like '$autor' AND b.zustand like '$zustand'";  
        }
        
        if(isset($_GET['tit'])){
          $tit = $_GET['tit'];
          $sql = "SELECT b.id, b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID  Order by b.kurztitle  $tit limit $start,$numberpage";
        }
        if(isset($_GET['katego'])){
          $katego = $_GET['katego'];
          $sql = "SELECT b.id, b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID Order by k.kategorie $katego limit $start,$numberpage";
        }if(isset($_GET['zustandT'])){
          $zustandT =$_GET['zustandT'];
          $sql = "SELECT b.id, b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID Order by b.zustand $zustandT limit $start,$numberpage";
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
