<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Explore Courses</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:lightblue";>
  <header>
    <h1><b>Academé Luxe</b></h1>
    <p><i>Choose your course and enroll with ease</i></p>
  </header>

  <section class="catalog">
    <?php
    $courses = [
      ["Web Development", "8 weeks", "Learn HTML, CSS, JavaScript, and PHP to build full-stack websites.", 999],
      ["Data Structures", "6 weeks", "Master algorithms, recursion, and problem-solving techniques.", 799],
      ["Cloud Computing", "10 weeks", "Deploy apps on AWS, manage cloud services, and learn DevOps basics.", 1199],
      ["Machine Learning", "12 weeks", "Explore supervised and unsupervised learning, build models with Python.", 1499]
    ];
    foreach ($courses as $course) {
      echo "<div class='card'>
              <h3>$course[0]</h3>
              <p>Duration: $course[1]</p>
              <p>$course[2]</p>
              <p class='fee'>Fee: ₹$course[3]</p>
              <form action='enroll.php' method='POST'>
                <input type='hidden' name='course' value='$course[0]'>
                <input type='hidden' name='fee' value='$course[3]'>
                <button class='btn' type='submit'>Enroll Now</button>
              </form>
            </div>";
    }
    ?>
  </section>

  <footer>
    <p>© 2025 Academé Luxe | Learn. Grow. Succeed.</p>
  </footer>
</body>
</html>
