<?php
$servername="localhost"; //DB hostname
$username="short"; //DB Username
$password=""; //DB password
$databasename="urlshort"; //DB Name

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>