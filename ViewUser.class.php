<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
class ViewUsers extends Users{
    public function showAllUsers(){
            $datas = $this->getAllUsers();
            $admin = $_SESSION["admin"];
            //echo $admin;
            //if(!empty($datas)){
            echo "
            <div class='table'>
            <table>
            <tbody>";
            echo" <thead>
            <tr>
            <th scope='col'>Benutzername</th>
            <th scope='col'>Name</th>
            <th scope='col'>Vorname</th>
            <th scope='col'>E-Mail</th>";
            if($admin == 1){
            echo"<th scope='col'>coque</th>
            <th scope='col'>Löschen</th>";
                }
            echo"
            </tr>
          </thead>";
            foreach ($datas as $data){

                echo "<tr>";
        echo "<td>". $data['benutzername'] . "</td>";
        echo "<td>". $data['name'] . "</td>";
        echo "<td>". $data['vorname'] . "</td>";
        echo "<td>". $data['email'] . "</td>";
        echo "</td>";
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