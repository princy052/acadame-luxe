<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit;
}

$courses = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <div>Academe Luxe Admin</div>
    <div>Logged in as <strong>Admin</strong></div>
    <a href="admin_logout.php" class="admin-btn">Logout</a>
  </div>

  <div class="nav">
    <a href="add_course.php">Add Course</a>
    <a href="admin_dashboard.php">Dashboard</a>
  </div>

  <div class="container">
    <h2>Available Courses</h2>

    <?php if ($courses->num_rows > 0): ?>
      <?php while ($row = $courses->fetch_assoc()): ?>
        <div class="enrollment">
          <strong><?= htmlspecialchars($row['title']) ?></strong><br>
          Duration: <?= htmlspecialchars($row['duration']) ?><br>
          Description: <?= htmlspecialchars($row['description']) ?><br>
          Fee: ₹<?= htmlspecialchars($row['fee']) ?><br>

          <form method="POST" action="delete_course.php" onsubmit="return confirm('Delete this course?');">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit">Delete</button>
          </form>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No courses available.</p>
    <?php endif; ?>
  </div>
</body>
</html>
