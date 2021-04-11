<?php
//load config
include('config_db.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database) or die("Invalid ....");
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
?> 