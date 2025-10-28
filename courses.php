<?php
session_start();
require 'db.php';
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
$user_name = $_SESSION['user_name'];
$courses = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Courses | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <div>Academe Luxe</div>
    <div>Logged in as <strong><?= htmlspecialchars($user_name) ?></strong></div>
    <a href="admin_login.php" class="admin-btn">Admin Login</a>
  </div>
  <div class="nav">
    <a href="courses.php">Courses</a>
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
  </div>
  <div class="container">
    <h2>Available Courses</h2>
    <?php if ($courses->num_rows > 0): ?>
      <?php while ($row = $courses->fetch_assoc()): ?>
        <div class="enrollment">
          <strong><?= htmlspecialchars($row['title']) ?></strong><br>
          Duration: <?= htmlspecialchars($row['duration']) ?><br>
          <?= htmlspecialchars($row['description']) ?><br>
          Fee: ₹<?= htmlspecialchars($row['fee']) ?><br>
          <form method="POST" action="enroll.php">
  <input type="hidden" name="course" value="<?= htmlspecialchars($row['title']) ?>">
  <input type="hidden" name="fee" value="<?= htmlspecialchars($row['fee']) ?>">
  <input type="hidden" name="email" value="<?= $_SESSION['user_email'] ?? 'unknown@example.com' ?>">
  <input type="hidden" name="phone" value="0000000000">
  <button type="submit">Enroll</button>
</form>

          
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No courses available.</p>
    <?php endif; ?>
  </div>
</body>
</html>
