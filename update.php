<?php
session_start();
require 'db.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $conn->prepare("UPDATE enrollment SET paid = ? WHERE id = ? AND user_id = ?");
  $stmt->bind_param("iii", $_POST['paid'], $_POST['id'], $_SESSION['user_id']);
  $stmt->execute();
}
header("Location: profile.php");
exit;
?>
