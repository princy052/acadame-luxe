<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Courses | Academe Luxe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="page-wrapper">
    <header>
      <h1>AVAILABLE COURSES</h1>
      <p class="tagline"><I>Choose your path to mastery</I></p>
      <form action="logout.php" method="POST" class="logout-form">
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </header>

    <main class="courses-container">
      <div class="grid-2x2">
        <?php
        $courses = [
          ["Web Development", "8 weeks", "Learn HTML, CSS, JavaScript, and PHP to build full-stack websites.", 999],
          ["Data Structures", "6 weeks", "Master algorithms, recursion, and problem-solving techniques.", 799],
          ["Cloud Computing", "10 weeks", "Explore AWS, manage cloud services, and learn DevOps techniques.", 1099],
          ["Machine Learning", "12 weeks", "Explore supervised and unsupervised learning, build models with Python.", 1299]
        ];

        foreach ($courses as $course) {
          echo '<div class="card">';
          echo '<h3>' . $course[0] . '</h3>';
          echo '<p>Duration: ' . $course[1] . '</p>';
          echo '<p>' . $course[2] . '</p>';
          echo '<p class="price">₹' . $course[3] . '</p>';
          echo '<form action="enroll.php" method="POST">';
          echo '<input type="hidden" name="course" value="' . $course[0] . '">';
          echo '<input type="hidden" name="fee" value="' . $course[3] . '">';
          echo '<button type="submit">Enroll Now</button>';
          echo '</form>';
          echo '</div>';
        }
        ?>
      </div>
    </main>

    <footer>© 2025 Academe Luxe | Learn. Grow. Succeed.</footer>
  </div>
</body>
</html>
