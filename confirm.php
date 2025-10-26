<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$name = $_POST['name'] ?? 'example';
$email = $_POST['email'] ?? 'example@gmail.com';
$course = $_POST['course'] ?? 'Web Development';
$fee = $_POST['fee'] ?? '999';
$payment = $_POST['payment'] ?? 'GPay';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Confirmation | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="page-wrapper">
    <header class="confirm-header">
      <div class="checkmark">✔</div>
      <h1>Enrollment Successful</h1>
      <p class="tagline">Thank you for joining Academe Luxe</p>
      <form action="logout.php" method="POST" class="logout-form">
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </header>

    <main class="confirm-container">
      <div class="card confirm">
        <h2>You're Enrolled!</h2>
        <p>We've received your details and payment method.</p>
        <div class="details">
          <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
          <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
          <p><strong>Course:</strong> <?= htmlspecialchars($course) ?></p>
          <p><strong>Fee:</strong> ₹<?= htmlspecialchars($fee) ?></p>
          <p><strong>Payment Method:</strong> <?= htmlspecialchars($payment) ?></p>
        </div>
      </div>
    </main>

    <footer>© 2025 Academe Luxe | Confirmation Receipt</footer>
  </div>
</body>
</html>
