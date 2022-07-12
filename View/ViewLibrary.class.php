
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php

class ViewLibrary extends library{
  //sicht der library
    public function showAllBooks(){
            $datas = $this->getAllBooks();
            $admin = $_SESSION["admin"];
            echo "
            <div class='table'>
            <table>
            <tbody>";
            echo" <thead>
            <tr>
            <th scope='col'>Titel</th>
            <th scope='col'>kategorie</th>
            <th scope='col'>autor</th>
            <th scope='col'>zustand</th>
            <th scope='col'>Öffnen</th>";
            if($admin == 1){
            echo"<th scope='col'>coque</th>
            <th scope='col'>Löschen</th>";
                }
            echo"
            </tr>
          </thead>";
          //mit schlaufe alle daten ausgeben
            foreach ($datas as $data){

                echo "<tr>";
        echo "<td>". $data['kurztitle'] . "</td>";
        echo "<td>". $data['kategorie'] . "</td>";
        echo "<td>". $data['autor'] . "</td>";
        echo "<td>". $data['zustand'] . "</td>";
        echo "</td>";
        //für Detailreichere ansicht
        echo "<td><a href='openView.php?view=". $data['id']."' class='btn btn-primary'>👁️</a></td>";

        if($admin == 1){
        echo "<td> <form action='#' method='POST'></form><input class='btn btn-primary' type='submit' value='✎'></td>";
        echo "<td> <form action='#' method='POST'>  </form><input class='btn btn-danger' type='submit' value='🗑'></td>";
        }
        echo "</td>";
        echo "</tr>";
        echo "</tbody>";

        
        
           // }
        //}else{
         //   echo "Keine Datenübereinstimmung";
        //}
        
    
}

}
}