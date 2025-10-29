<?php
session_start();
require 'db.php';

$user_id = $_SESSION['user_id'] ?? null;
$id = $_POST['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id && $user_id) {
  $stmt = $conn->prepare("DELETE FROM enrollment WHERE id = ? AND user_id = ?");
  $stmt->bind_param("ii", $id, $user_id);
  $stmt->execute();
}

header("Location: profile.php");
exit;
