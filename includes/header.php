<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- utility css file -->
    <link rel="stylesheet" href="css/utility.css">
    <!-- style css file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  </head>
  <body>
    <!-- navbar section -->
    <nav class="navbar">
      <div class="container">
        <div class="brand-and-toggler">
          <a href="index.php" class="navbar-brand"><?php echo getAboutDate('FIRST_NAME', 'about'); ?><span style="color: var(--green)">.</span></a>
          <button type="button" class="navbar-toggler" id="navbar-toggler">
            <span>
              <i class="fas fa-bars"></i>
            </span>
          </button>
        </div>
        <div class="navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">home</a>
            </li>
            <li class="nav-item nav-active">
              <a href="about.php" class="nav-link">about</a>
            </li>
            <li class="nav-item">
              <a href="resume.php" class="nav-link">resume</a>
            </li>
            <li class="nav-item">
              <a href="skills.php" class="nav-link">skills</a>
            </li>
            <?php
              if(!empty(getProjectData())){
            ?>
              <li class="nav-item">
                <a href="projects.php" class="nav-link">projects</a>
              </li>
            <?php
              }
            ?>
            <li class="nav-item">
              <a href="contact.php" class="nav-link">contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>