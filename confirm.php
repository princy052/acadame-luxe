<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$payment = $_POST['payment'];
$fee = $_POST['fee'];

$sql = "INSERT INTO microprojectrequest (Name, Email, Course, Payment_Status) 
        VALUES ('$name', '$email', '$course', '$payment')";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><b>Enrollment Confirmed</b></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:lightblue";>
  <header>
    <h1><b>✅ Enrollment Successful</b></h1>
    <p><i>Thank you for joining Academé Luxe</i></p>
  </header>

  <div class="container">
    <?php
    if ($conn->query($sql) === TRUE) {
      echo "<div style='text-align:center; margin-bottom:30px;'>
              <h2 style='color:#00bfa5;'>🎉 You're Enrolled!</h2>
              <p>We've received your details and payment method.</p>
            </div>
            <div style='background:#f9f9f9; padding:20px; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.05);'>
              <p><strong>Name:</strong> $name</p>
              <p><strong>Email:</strong> $email</p>
              <p><strong>Course:</strong> $course</p>
              <p><strong>Fee:</strong> ₹$fee</p>
              <p><strong>Payment Method:</strong> $payment</p>
            </div>";
    } else {
      echo "<h2>Oops! Something went wrong.</h2>";
      echo "<p>Error: " . $conn->error . "</p>";
    }
    $conn->close();
    ?>
  </div>

  <footer>
    <p>© 2025 Princy's Academy | Confirmation Receipt</p>
  </footer>
</body>
</html>
