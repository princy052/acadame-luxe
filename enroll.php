<?php
include 'db.php';
$course = $_POST['course'];
$fee = $_POST['fee'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enroll | Academé Luxe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:lightblue";>
  <header>
    <h1>💳 Enroll in <?php echo $course; ?></h1>
    <p><i>Secure your spot and complete payment</i></p>
  </header>

  <div class="container">
    <form action="confirm.php" method="POST">
      <input type="hidden" name="course" value="<?php echo $course; ?>">
      <input type="hidden" name="fee" value="<?php echo $fee; ?>">

      <label for="name">👤 Full Name</label>
      <input type="text" name="name" placeholder="Your full name" required>

      <label for="email">📧 Email Address</label>
      <input type="email" name="email" placeholder="you@example.com" required>

      <label for="payment">💰 Payment Method</label>
      <select name="payment" required>
        <option value="">-- Select Payment Method --</option>
        <option value="GPay">GPay</option>
        <option value="PhonePe">PhonePe</option>
        <option value="UPI">UPI</option>
        <option value="Cash on Enrollment">Cash on Enrollment</option>
      </select>

      <button type="submit">Confirm & Pay ₹<?php echo $fee; ?></button>
    </form>

    
  </div>

  <footer>
    <p>© 2025 Academé Luxe | Secure. Simple. Smart.</p>
  </footer>
</body>
</html>
