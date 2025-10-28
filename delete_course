<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];

  $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

header("Location: admin_dashboard.php");
exit;
?>
