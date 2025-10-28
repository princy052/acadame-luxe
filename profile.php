<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT id, course, fee, enrolled_at FROM enrollment WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Profile | Academe Luxe</title>
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
    <h2>Your Enrollments</h2>

    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="enrollment">
          <strong><?= htmlspecialchars($row['course']) ?></strong><br>
          Fee: ₹<?= htmlspecialchars($row['fee']) ?><br>
          Enrolled on: <?= htmlspecialchars($row['enrolled_at']) ?><br>

          <form method="POST" action="remove.php" onsubmit="return confirm('Remove this enrollment?');">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit">Remove</button>
          </form>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>You have not enrolled in any courses yet.</p>
    <?php endif; ?>
  </div>
</body>
</html>
