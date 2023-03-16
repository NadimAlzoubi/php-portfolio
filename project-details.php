<!DOCTYPE html>
<?php
    include('./dashbord_admin/conn.php'); 
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project-details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- utility css file -->
    <link rel="stylesheet" href="css/utility.css">
    <!-- style css file -->
    <link rel = "stylesheet" href = "css/style.css">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
  </head>
  <body>
    
    <!-- navbar section -->
    <nav class = "navbar">
      <div class = "container">
        <div class = "brand-and-toggler">
          <a href = "index.php" class = "navbar-brand"><?php $result_name = mysqli_query($connect, 'SELECT FIRST_NAME FROM home'); echo mysqli_fetch_assoc($result_name)['FIRST_NAME']; ?><span style="color: var(--green)">.</span></a>
          <button type = "button" class = "navbar-toggler" id = "navbar-toggler">
            <span>
              <i class = "fas fa-bars"></i>
            </span>
          </button>
        </div>

        <div class = "navbar-collapse">
          <ul class = "navbar-nav">
            <li class = "nav-item nav-active">
              <a href = "index.php" class = "nav-link">home</a>
            </li>
            <li class = "nav-item">
              <a href = "about.php" class = "nav-link">about</a>
            </li>
            <li class = "nav-item">
              <a href = "resume.php" class = "nav-link">resume</a>
            </li>
            <!-- <li class = "nav-item">
              <a href = "services.php" class = "nav-link">services</a>
            </li> -->
            <li class = "nav-item">
              <a href = "skills.php" class = "nav-link">skills</a>
            </li>
            <li class = "nav-item">
              <a href = "projects.php" class = "nav-link">projects</a>
            </li>
            <!-- <li class = "nav-item">
              <a href = "blog.php" class = "nav-link">blog</a>
            </li> -->
            <li class = "nav-item">
              <a href = "contact.php" class = "nav-link">contact</a>
            </li>

            <!-- <li class = "nav-item">
              <a href = "./login.php" class = "nav-link">Arabic <i class="fa fa-language"></i></a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- end of navbar section -->

<style>
    .home{
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    .project-summry{
        width: 50%;
        margin: 4rem 1rem 0 0;
    }
    .project-summry a{
        color: #287bff;
    }
    .project-imgs{
        width: 90%;
    }
    .project-imgs img{
        margin: 4rem 0 0 0;
        border-radius: 3px;
    }
    @media (max-width: 768px){
        .home{
            flex-direction:column;
        }
        .project-summry{
            width: 100% !important;
        }
        .project-imgs{
            width: 100% !important;
        }
    }
</style>

    <!-- home page -->
    <section class = "home container">
        <div class = "project-summry">
            <h2><?php echo $_POST['title']; ?></h2>
            <h4>Descriotion</h4>
            <p><?php echo $_POST['full_des']; ?></p>
            <?php
                if(!$_POST['attach'] == null){
                    echo '<h3>Attachment - <a href="' . $_POST['attach'] . '">Download</a></h3><br>';
                }
            ?>
        </div>
        <div class = "project-imgs">
            <?php
                if(isset($_POST['view'])){
                    $project_id = $_POST['project_id'];
                }
                $query = "SELECT * FROM projects_img WHERE PROJECT_ID = " . $project_id;
                $result = mysqli_query($connect, $query);
                if(isset($result)){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<img src="./dashbord_admin/assets/projects_files/' . $row['IMG'] . '">';
                    }
                }
            ?>
         
        </div>
      
       
      </div>
    </section>
    <!-- end of home page -->
    

    <!-- footer -->
    <footer class = "footer container">
      <div class = "row">
        <div class = "col">
          <h3 class = "footer-title">about</h3>
          <p class = "text">I'm a 23 years old junior web developer and programmer, graduated from Damascus University and obtained a technical diploma in computer engineering<br/><a href = "about.php" class = "nav-link"><i class = "fas fa-long-arrow-alt-right"></i> read more</a></p>
        </div>

        <div class = "col">
          <h3 class = "footer-title">links</h3>
          <div class = "footer-links">
            <a href = "index.php" class = "text">
              <i class = "fas fa-long-arrow-alt-right"></i>
              home
            </a>
            <a href = "about.php" class = "text">
              <i class = "fas fa-long-arrow-alt-right"></i>
              about
            </a>
            <a href = "projects.php" class = "text">
              <i class = "fas fa-long-arrow-alt-right"></i>
              projects
            </a>
            <a href = "contact.php" class = "text">
              <i class = "fas fa-long-arrow-alt-right"></i>
              contact
            </a>
          </div>
        </div>

        <!-- <div class = "col">
          <h3 class = "footer-title">more</h3>
          <div class = "footer-links">
            <a href = "#" class = "text">
              <i class = "fas fa-long-arrow-alt-right"></i>
              web design
            </a>
            <a href = "#" class = "text">
              <i class = "fas fa-long-arrow-alt-right"></i>
              web development
            </a>
            <a href = "#" class = "text">
              <i class = "fas fa-long-arrow-alt-right"></i>
              business strategy
            </a>
            <a href = "#" class = "text">
              <i class = "fas fa-long-arrow-alt-right"></i>
              graphics design
            </a>
          </div>
        </div> -->

        <div class = "col">
          <h3 class = "footer-title">have a question?</h3>
          <div>
            <span>
              <i class = "fas fa-map-marker-alt"></i>
            </span>
            <span class = "text">Al Ghais Street. Alkhalidiya, Abu Dhabi, UAE</span>
          </div>

          <div>
            <span>
              <i class = "fas fa-phone"></i>
            </span>
            <span class = "text">+971 50 443 0587</span>
          </div>

          <div>
            <span>
              <i class = "fas fa-envelope"></i>
            </span>
            <span class = "text">nadim.alzoubi.99@gmail.com</span>
          </div>
          <div class = "contact-social-links" id="links1">
            <a href = "https://www.linkedin.com/in/nadim-alzoubi-b63435224" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href = "https://www.youtube.com/channel/UCNkkMS_7GP1bGYXkzMMzTmw" target="_blank"><i class = "fab fa-youtube"></i></a>
            <a href = "https://t.me/Nadim_alzoubi" target="_blank"><i class="fa-brands fa-telegram"></i></a>
          </div>
          <div class = "contact-social-links" id="links1">
            <a href = "https://www.facebook.com/nadim.alzoubi.54" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
            <a href = "https://www.instagram.com/nadim_alzoubi_99" target="_blank"><i class = "fab fa-instagram"></i></a>
            <a href = "https://wa.me/+971504430587" target="_blank"><i class = "fab fa-whatsapp"></i></a>
          </div>
        </div>
      </div>

      <div class = "footer-text">
        <p class = "text">Copyright &copy; 2022 All rights reserved | Nadim Al-Zoubi</p>
      </div>
    </footer>
    <!-- end of footer -->


    <!-- custom js file -->
    <script src="https://kit.fontawesome.com/80ba361832.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>