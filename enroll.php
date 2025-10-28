<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$course = $_POST['course'] ?? '';
$fee = $_POST['fee'] ?? '';

if (!$course || !$fee) {
  echo "Invalid access.";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Enroll in <?= htmlspecialchars($course) ?> | Academe Luxe</title>
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
    <h2>Enroll in <?= htmlspecialchars($course) ?></h2>
    <p><strong>Fee:</strong> ₹<?= htmlspecialchars($fee) ?></p>

    <form method="POST" action="confirm.php">
      <label>Full Name</label>
      <input type="text" name="full_name" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>" required>

      <label>Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['user_email'] ?? '') ?>" required>

      <label>Phone</label>
      <input type="text" name="phone" required>

      <label>Payment Method</label>
      <select name="method" required>
        <option value="">Select</option>
        <option value="UPI">UPI</option>
        <option value="Card">Debit/Credit Card</option>
        <option value="NetBanking">Net Banking</option>
      </select>

      <input type="hidden" name="course" value="<?= htmlspecialchars($course) ?>">
      <input type="hidden" name="fee" value="<?= htmlspecialchars($fee) ?>">

      <button type="submit">Pay</button>
    </form>
  </div>
</body>
</html>
