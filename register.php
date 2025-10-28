<?php
session_start();
require 'db.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash the password securely
  $hashed = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (name, email, password_hash, created_at) VALUES (?, ?, ?, NOW())");
  $stmt->bind_param("sss", $name, $email, $hashed);

  if ($stmt->execute()) {
    header("Location: login.php");
    exit;
  } else {
    $error = "Registration failed. Try again.";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Register | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <div>Academe Luxe</div>
    <div>Logged in as <strong>Guest</strong></div>
    <a href="admin_login.php" class="admin-btn">Admin Login</a>
  </div>
  <div class="container">
    <h2>Student Registration</h2>
    <?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="POST">
      <label>Name</label>
      <input type="text" name="name" required>
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button type="submit">Register</button>
    </form>
    <div class="switch-link">
      <a href="login.php">Already registered? Login</a>
    </div>
  </div>
</body>
</html>
