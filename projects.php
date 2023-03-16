<!DOCTYPE html>
<?php
     include('./dashbord_admin/conn.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Projects</title>
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
    <style>
    img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
        display: none;
    }
</style>
  </head>
  <body>
    
    <!-- navbar section -->
    <nav class = "navbar">
      <div class = "container">
        <div class = "brand-and-toggler">
          <a href = "index.php" class = "navbar-brand">Nadim<span style="color: var(--green)">.</span></a>
          <button type = "button" class = "navbar-toggler" id = "navbar-toggler">
            <span>
              <i class = "fas fa-bars"></i>
            </span>
          </button>
        </div>

        <div class = "navbar-collapse">
          <ul class = "navbar-nav">
            <li class = "nav-item">
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
            <li class = "nav-item nav-active">
              <a href = "projects.php" class = "nav-link">projects</a>
            </li>
            <!-- <li class = "nav-item">
              <a href = "blog.php" class = "nav-link">blog</a>
            </li> -->
            <li class = "nav-item">
              <a href = "contact.php" class = "nav-link">contact</a>
            </li>
            <!-- <li class = "nav-item">
              <a href = "../ar/index.php" class = "nav-link">Arabic <i class="fa fa-language"></i></a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- end of navbar section -->


    <!-- projects page -->
    <section class = "projects container">
      <div class = "title">
        <h2>projects</h2>
        <div>
          <h2>My projects</h2>
        </div>
      </div>

      <p class = "text">These are my projects that I've done so far.</p>

    </section>
<style>
  @media (max-width: 576px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  @media (min-width: 577px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  @media (min-width: 768px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  @media (min-width: 992px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  @media (min-width: 1440px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  .parent form img{
  width: 100%;
  aspect-ratio: 16/10;
  object-fit: cover;
  border-radius: 5px;
}
.parent{
  margin-bottom: 4rem;
}
.proForm{
  position: relative !important;
  border-radius: 5px !important;
  transition: all 0.2s !important;

} 
.proTitle{
  transition: all 0.2s !important;
  width: max-content;
}
.proForm:hover + p{
  transform: translateX(4rem);
  font-weight: 900;
  color: #287bff;
}
.proForm::before{
  content: '' !important;
  position: absolute !important;
  width: 100% !important;
  height: 100% !important;
  background-color: #111111d9 !important;
  border-radius: 5px !important;
  transition: all 0.2s !important;
  opacity: 0 !important;
} 
.proForm.op{
  transform: translateY(-4px) !important;
}
.proForm.op::before{
  opacity: 1 !important;
}
.proForm.op .btnmo{
  opacity: 1 !important;
}
.proForm .btnmo{
  position: absolute !important;
  top: 50% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) !important;
  outline: none !important;
    background-color: #11111100 !important;
    color: #fff !important;
    padding: 0.4rem !important;
    width: 5rem !important;
    border-radius: 5px !important;
    border: 1px solid !important;
    opacity: 0 !important;
}
.btnmo:hover{
  background-color: #0866C6 !important;
  transition: all 0.2s !important;
  cursor: pointer !important;
}

</style>

  <center id="no-project" style="font-size: x-large; box-shadow: 0px 3px 12px 5px #f5f5f512; padding: 1rem; width: fit-content; border-radius: 6px; margin: 0 auto">
  There are no projects currently
  </center>

  <div class="parent" id="parentDiv">
    <?php
      $sql_s = 'SELECT * FROM projects';
      $result = mysqli_query($connect, $sql_s);
      if(isset($result)){
          while($row = mysqli_fetch_assoc($result)){
              $proId = $row['ID'];
    ?>
    <form action="./project-details.php" method="POST">
      <div class="proForm">
        <img src="./dashbord_admin/assets/projects_files/<?php echo $row['COVER_IMG']; ?>">
        <input type="hidden" name="project_id" value="<?php echo $row['ID']; ?>">
        <input type="hidden" name="attach" value="<?php echo $row['ATTACH']; ?>">
        <input type="hidden" name="title" value="<?php echo $row['TITLE']; ?>">
        <input type="hidden" name="full_des" value="<?php echo $row['FULL_DES']; ?>">
        <button class="btnmo" type="submit" name="view">View</button>
      </div>
      <p class="proTitle"><?php echo $row['TITLE']; ?></pc>
    </form>
    <?php
        }
      }
    ?>
</div>



<script>
  let parentDiv = document.getElementById('parentDiv');
  let noProject = document.getElementById('no-project');
  let proForm = document.querySelectorAll('.proForm').forEach(function(e) {
  // Do something with each element
  e.onmouseover = () => {
    e.classList.add('op');
  }
  e.onmouseout = () => {
    e.classList.remove('op');
  }
  });


  


  if (parentDiv.innerHTML.length > 5) {
    noProject.style.display = 'none';
  }
  
 
</script>


































      <!-- <h3>1) Web app for college managment.</h3>

      <p class="text" style="text-align: left; margin-left: 0; width: 100%;">
        - Have built a responsive web app using (HTML, CSS, JS, PHP,
        MySQL) as a graduation project to manage the college and archive
        and store its data in order to help students and facilitate their
        access to the information they need such as announcements,
        subjects, exam results. This project also included the ability to
        communicate with the college administration.<br />
        - You can see the full project through the report I prepared in Arabic,
        which contains a detailed explanation of the project.
        <br/>
        <a href="https://drive.google.com/file/d/1iP-qRm6Y5xdJAWI15basfghGwom6yjX8/view?usp=sharing">Click here to download the report</a>
        <br/>
        <a href="https://tcc-daraa.42web.io" target="_blank">Click here to view the website</a>
      </p>

      <div class="carousel-container">
        <div class="mySlides animate">
          <img src="./assets/1.png" alt="slide" />
          <div class="number">1 / 9</div>
          <div class="text-pro">Ads Home Page</div>
        </div>
      
        <div class="mySlides animate">
          <img src="./assets/2.png" alt="slide" />
          <div class="number">2 / 9</div>
          <div class="text-pro">Library</div>
        </div>
      
        <div class="mySlides animate">
          <img src="./assets/3.png" alt="slide" />
          <div class="number">3 / 9</div>
          <div class="text-pro">Library</div>
        </div>
      
        <div class="mySlides animate">
          <img src="./assets/4.png" alt="slide" />
          <div class="number">4 / 9</div>
          <div class="text-pro">Login To Profile</div>
        </div>
      
        <div class="mySlides animate">
          <img src="./assets/5.png" alt="slide" />
          <div class="number">5 / 9</div>
          <div class="text-pro">Student Profile</div>
        </div>
      
        <div class="mySlides animate">
          <img src="./assets/6.png" alt="slide" />
          <div class="number">6 / 9</div>
          <div class="text-pro">Student Profile</div>
        </div>
      
        <div class="mySlides animate">
          <img src="./assets/7.png" alt="slide" />
          <div class="number">7 / 9</div>
          <div class="text-pro">College Staff</div>
        </div>
      
        <div class="mySlides animate">
          <img src="./assets/8.png" alt="slide" />
          <div class="number">8 / 9</div>
          <div class="text-pro">Call Us</div>
        </div>
      
        <div class="mySlides animate">
          <img src="./assets/9.png" alt="slide" />
          <div class="number">9 / 9</div>
          <div class="text-pro">Login To The System</div>
        </div>

      
        <a class="prev" onclick="prevSlide()">&#10094;</a>
        <a class="next" onclick="nextSlide()">&#10095;</a>
      
        <div class="dots-container">
          <span class="dots" onclick="currentSlide(1)"></span>
          <span class="dots" onclick="currentSlide(2)"></span>
          <span class="dots" onclick="currentSlide(3)"></span>
          <span class="dots" onclick="currentSlide(4)"></span>
          <span class="dots" onclick="currentSlide(5)"></span>
          <span class="dots" onclick="currentSlide(6)"></span>
          <span class="dots" onclick="currentSlide(7)"></span>
          <span class="dots" onclick="currentSlide(8)"></span>
          <span class="dots" onclick="currentSlide(9)"></span>
        </div>
      </div> -->
      
      
      <!-- Full-width images with number and caption text -->
<!-- 
<div>
      <h3>2) YouTube Channel.</h3>
      <p class="text" style="text-align: left; margin-left: 0; width: 100%;">
        - I have a YouTube channel called (N - Designs) in which I post some graphic designs using web languages and also some simple web Apps.
        <br>
        <a href="https://www.youtube.com/channel/UCNkkMS_7GP1bGYXkzMMzTmw" target="_blank">Click here to go to the channel</a>
      </p>

      <div class = "row">
        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/JTdslKY34iY" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>

        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/ZhbBfDivFj8" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>

        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/_kQmCY4q-Vg" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>

        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/ZuFz4go7I7k" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>

        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/ESyPhFjQyEw" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>

        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/8HX7DgkuYYY" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>
        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/jWC7e513q04" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>
        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/wGQBQ7kMyTw" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>
        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/St__KAIQSSA" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>
        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/U8c3-yAeb70" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>
        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/VFMP9W3OkIg" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>
        <div class = "item">
          <div class = "item-overlay">
            <a href = "https://youtu.be/vYGlAwT6wqI" target="_blank">Link <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            <h3>web design</h3>
          </div>
        </div>
      </div>
</div>

 -->












    <!-- </section> -->








    <!-- end of projects page -->

    
    

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