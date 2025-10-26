<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$course = $_POST['course'] ?? 'Web Development';
$fee = $_POST['fee'] ?? '999';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enroll | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="page-wrapper">
    <header>
      <h1>Enroll in <?= htmlspecialchars($course) ?></h1>
      <p class="tagline">Secure your spot and complete payment</p>
      <form action="logout.php" method="POST" class="logout-form">
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </header>

    <main class="enroll-container">
      <form action="confirm.php" method="POST">
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required>

        <label for="payment">Payment Method</label>
        <select name="payment" id="payment" required>
          <option value="">Select</option>
          <option value="GPay">GPay</option>
          <option value="PhonePe">PhonePe</option>
          <option value="Paytm">Paytm</option>
          <option value="Card">Credit/Debit Card</option>
        </select>

        <input type="hidden" name="course" value="<?= htmlspecialchars($course) ?>">
        <input type="hidden" name="fee" value="<?= htmlspecialchars($fee) ?>">

        <button type="submit">Confirm & Pay ₹<?= htmlspecialchars($fee) ?></button>
      </form>
    </main>

    <footer>© 2025 Academe Luxe | Secure. Simple. Smart.</footer>
  </div>
</body>
</html>
