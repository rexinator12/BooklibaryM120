<?php
if(isset($_POST['search'])){
    
    $searchT = $_POST['search_box'];
    include "dataconn.php";
    include "getBooks.class.php";
    $sql .= "where kurztitle = '{$searchT}' OR kategorie = '{$searchT}'OR autor = '{$searchT}'OR zustand = '{$searchT}'  ";
    header("location: library.php");

}