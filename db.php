<?php
$conn = new mysqli("localhost", "root", "", "microproject");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
