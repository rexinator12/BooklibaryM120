<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "libary";

// Create connection
$conn = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>