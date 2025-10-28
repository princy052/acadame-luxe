<?php
session_start();
require 'db.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, name, password_hash FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $name, $hash);
    $stmt->fetch();

    if (password_verify($password, $hash)) {
      $_SESSION['user_id'] = $id;
      $_SESSION['user_name'] = $name;
      header("Location: courses.php");
      exit;
    } else {
      $error = "Incorrect password.";
    }
  } else {
    $error = "No account found with that email.";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <div>Academe Luxe</div>
    <div>Logged in as <strong>Guest</strong></div>
    <a href="admin_login.php" class="admin-btn">Admin Login</a>
  </div>
  <div class="container">
    <h2>Student Login</h2>
    <?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="POST">
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Password</label>
      <input type="password" name="password" required>
      <button type="submit">Login</button>
    </form>
    <div class="switch-link">
      <a href="register.php">Don't have an account? Register</a>
    </div>
  </div>
</body>
</html>
