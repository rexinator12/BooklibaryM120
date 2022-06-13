<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="css.css">
  <?php
     include 'webbuild/dataconn.php'
    ?>
    <?php 
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 <body>
    <title>Hello, world!</title>
    <?php require_once 'webbuild/header.php';?>
    <div class="table">
    <table>
      <thead>
        <tr>
        <th scope="col">kurztitle</th>
        <th scope="col">kategorie</th>
        <th scope="col">autor</th>
        <th scope="col">zustand</th>
        <th scope="col">coque</th>
        <th scope="col">Löschen</th>
        </tr>
      </thead>
      <tbody>
    <?php
    $sql = "SELECT kurztitle, kategorie, autor, zustand from buecher limit 20";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row['kurztitle'] . "</td>";
        echo "<td>". $row['kategorie'] . "</td>";
        echo "<td>". $row['autor'] . "</td>";
        echo "<td>". $row['zustand'] . "</td>";
        echo "</td>";
        echo "<td> <form action='#' method='POST'></form><input class='btn btn-primary' type='submit' value='✎'></td>";
        echo "<td> <form action='#' method='POST'>  </form><input class='btn btn-danger' type='submit' value='L'></td>";
        echo "</td>";
        echo "</tr>";
        echo "</tbody>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
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
    ?> 
  </body>
</html>