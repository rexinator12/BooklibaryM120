<?php
 session_start();
 if(empty($_SESSION["userID"])){
  $_SESSION["status"] = "You must login!";
  header("location: ../login.php");
 } else
 {
 ?>
<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="css.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 <body>
    <title>Hello, world!</title>
    <?php require_once 'webbuild/header.php';
        require_once 'dataconn.php';
        require_once 'Model/getBooks.class.php';

//nachdem man den augensymbol drückt, wird dies ausgeführt. Detailreichere inhalt. 
        class OpenView extends dbh{
          function ViewBooks(){
    if(isset($_GET['view'])){
        $id = $_GET['view'];
        $sql = "SELECT b.kurztitle, b.title, k.kategorie, b.autor, b.zustand, b.foto from buecher as b JOIN kategorien as k where b.kategorie = k.ID AND b.id = $id";
        $result = $this->connect()->query($sql);
        while($row = $result->fetch()) {
          $data[] = $row;
          echo "<div class='View'>";
          echo "<img src='".$row['foto']."' width='230px'height='200px'>";
          echo "</br><h4>Titel:</h4><p> ".$row['kurztitle']."</p></br>";
          echo "</br><h4>Inhaltsverzeichnis:</h4><p>".$row['title']."</p></br>";
          echo "</br><h4>Kategorie:</h4><p> ".$row['kategorie']."</p></br>";
          echo "</br><h4>Autor:</h4><p> ".$row['autor']."</p></br>";
          echo "</br><h4>Zustand:</h4><p> ".$row['zustand']."</p></br>";
          echo "</div>";
          
    }
    


        
    }
  }
}
$view = new OpenView();
$view->ViewBooks();

    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <?php //require_once 'webbuild/footer.php';
      }
 
    ?>
  </body>
</html>