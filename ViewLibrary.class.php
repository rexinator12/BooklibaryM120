<?php
class ViewLibrary extends library{
    public function showAllBooks(){
            $datas = $this->getAllBooks();
            foreach ($datas as $data){
                echo "<tr>";
        echo "<td>". $data['kurztitle'] . "</td>";
        echo "<td>". $data['kategorie'] . "</td>";
        echo "<td>". $data['autor'] . "</td>";
        echo "<td>". $data['zustand'] . "</td>";
        echo "</td>";
        echo "<td> <form action='#' method='POST'></form><input class='btn btn-primary' type='submit' value='✎'></td>";
        echo "<td> <form action='#' method='POST'>  </form><input class='btn btn-danger' type='submit' value='L'></td>";
        echo "</td>";
        echo "</tr>";
        echo "</tbody>";
            }
        
    }
}