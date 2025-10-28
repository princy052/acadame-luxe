<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("DELETE FROM enrollment WHERE id = ? AND user_id = ?");
  $stmt->bind_param("ii", $id, $user_id);
  $stmt->execute();
}

header("Location: profile.php");
exit;
?>
