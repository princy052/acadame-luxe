<?php
session_start();

$name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$method = $_POST['method'] ?? '';
$course = $_POST['course'] ?? '';
$fee = $_POST['fee'] ?? '';

if (!$name || !$email || !$course || !$fee || !$method) {
  echo "Invalid access.";
  exit;
}
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
