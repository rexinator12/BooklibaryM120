<?php
class OpenView extends ViewLibrary{
     function ViewBooks(){
    if(isset($_GET['view'])){
        $title = $_GET['view'];
        $sql = "SELECT b.kurztitle, k.kategorie, b.autor, b.zustand from buecher as b JOIN kategorien as k where b.kategorie = k.ID AND b.kurztitle = $title";
        $result = $this->connect()->query($sql);
        
    }
}
}