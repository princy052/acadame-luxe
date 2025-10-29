<?php
session_start();
require 'db.php';

$name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$method = $_POST['method'] ?? '';
$course = $_POST['course'] ?? '';
$fee = $_POST['fee'] ?? '';
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id || !$name || !$email || !$course || !$fee || !$method) {
  echo "Invalid access.";
  exit;
}

// ✅ Insert enrollment into database
$stmt = $conn->prepare("INSERT INTO enrollment (user_id, course, fee, enrolled_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("isi", $user_id, $course, $fee);
$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Enrollment Confirmation | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <div>Academe Luxe</div>
    <div>Logged in as <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></div>
    <a href="logout.php" class="admin-btn">Logout</a>
  </div>

  <div class="nav">
    <a href="courses.php">Courses</a>
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="container">
    <h2>Enrollment Successful</h2>
    <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($phone) ?></p>
    <p><strong>Course:</strong> <?= htmlspecialchars($course) ?></p>
    <p><strong>Fee:</strong> ₹<?= htmlspecialchars($fee) ?></p>
    <p><strong>Payment Method:</strong> <?= htmlspecialchars($method) ?></p>
    <p>Your enrollment has been recorded. You can view your courses in your profile.</p>
  </div>
</body>
</html>
