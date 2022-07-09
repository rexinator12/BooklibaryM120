
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color:#35363a";>
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="library.php">Library</a>
        </li>
        <li class="nav-item dropdown">
          
        </li>
        <?php 
          if($_SESSION["admin"]==1)
          {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="user.php" tabindex="-1" >User</a>
        </li>
        <?php
          }else
          {}
            ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php 
          if(isset($_SESSION["userID"]))
          {
        ?>
          <a class="nav-link"><?php echo $_SESSION["username"]; ?></a>
          <li><a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
        <?php
          }else
          {
            ?>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php
          }
          ?>
      
    </ul>
         
    </div>
  </div>
</nav>
</header>