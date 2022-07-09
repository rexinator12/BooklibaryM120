<?php
 session_start();
 if(empty($_SESSION["userID"])){
  $_SESSION["status"] = "You must login!";
    header("location: login.php");
 } else
 {
 ?>
<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="css.css">
  <?php
     include 'dataconn.php';
     include 'getBooks.class.php';
     include 'ViewLibrary.class.php';
    ?>
    <?php 
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>        


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 <body>
    <title>Hello, world!</title>
    <?php require_once 'webbuild/header.php';?>
    <form>
            <b>Search: </b> <input type='text' name='search_box' value=''/>
            <button class='input-group-text'><i class='fa fa-search'></i></button>
    </form>
    <select class="col-md-4-select" aria-label="Default select example" name="fillt" id="fillt">
  <option value="" disabeld="" selected="">Open this select menu</option>
  <option value="1">Alte Drucke, Bibeln, Klassische Autoren in den Originalsprachen</option>
  <option value="2">Geographie und Reisen</option>
  <option value="3">Geschichtswissenschaften</option>
  <option value="4">Naturwissenschaften</option>
  <option value="5">Kinderbücher</option>
  <option value="6">Moderne Literatur und Kunst</option>
  <option value="7">Moderne Kunst und Künstlergraphik</option>
  <option value="8">Kunstwissenschaften</option>
  <option value="9">Architektur</option>
  <option value="10">Technik</option>
  <option value="11">Naturwissenschaften - Medizin</option>
  <option value="12">Ozeanien</option>
  <option value="13">Afrika</option>
  </select>
  
  
    
  
      
    <?php
      $library = new ViewLibrary();
      $library->showAllBooks();
      
      for($pageNumber = 1; $pageNumber<=$maxP;$pageNumber++){?>
      <a herf="?page=<?= $pageNumber?>"><?= $pageNumber ?></a>
    <?php } ?>
    

    </tbody>
    </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <?php //require_once 'webbuild/footer.php'
    }
    ?> 
  </body>
</html>