<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $duration = $_POST['duration'];
  $description = $_POST['description'];
  $fee = $_POST['fee'];

  $stmt = $conn->prepare("INSERT INTO courses (title, duration, description, fee) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $title, $duration, $description, $fee);

  if ($stmt->execute()) {
    header("Location: admin_dashboard.php");
    exit;
  } else {
    $error = "Failed to add course.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Course | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <div>Academe Luxe Admin</div>
    <div>Logged in as <strong>Admin</strong></div>
    <a href="admin_logout.php" class="admin-btn">Logout</a>
  </div>
  <div class="nav">
    <a href="admin_dashboard.php">Dashboard</a>
  </div>
  <div class="container">
    <h2>Add New Course</h2>
    <?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="POST">
      <label>Course Title</label>
      <input type="text" name="title" required>

      <label>Duration</label>
      <input type="text" name="duration" required>

      <label>Description</label>
      <textarea name="description" required></textarea>

      <label>Fee (₹)</label>
      <input type="number" name="fee" required>

      <button type="submit">Add Course</button>
    </form>
  </div>
</body>
</html>
