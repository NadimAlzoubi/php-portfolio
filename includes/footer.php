<footer class="footer container">
  <div class="row">
    <div class="col">
      <h3 class="footer-title">about</h3>
      <p class="text"><?php echo substr(getAboutDate('ABOUT_ME', 'about'), 0, 180); ?>... <a href="about.php" class="nav-link"><i class="fas fa-long-arrow-alt-right"></i> read more</a></p>
    </div>
    <div class="col">
      <h3 class="footer-title">links</h3>
      <div class="footer-links">
        <a href="index.php" class="text">
          <i class="fas fa-long-arrow-alt-right"></i> home
        </a>
        <a href="about.php" class="text">
          <i class="fas fa-long-arrow-alt-right"></i> about
        </a>
        <a href="resume.php" class="text">
          <i class="fas fa-long-arrow-alt-right"></i> resume
        </a>
        <a href="skills.php" class="text">
          <i class="fas fa-long-arrow-alt-right"></i> skills
        </a>
        <a href="projects.php" class="text">
          <i class="fas fa-long-arrow-alt-right"></i> projects
        </a>
        <a href="contact.php" class="text">
          <i class="fas fa-long-arrow-alt-right"></i> contact
        </a>
      </div>
    </div>
    <div class="col">
      <h3 class="footer-title">have a question?</h3>
      <div>
        <span>
          <i class="fas fa-map-marker-alt"></i>
        </span>
        <span class="text"><?php echo getAboutDate('ADDRESS', 'about'); ?></span>
      </div>
      <div>
        <span>
          <i class="fas fa-phone"></i>
        </span>
        <span class="text"><?php echo getAboutDate('PHONE_NUMBER', 'about'); ?></span>
      </div>
      <div>
        <span>
          <i class="fas fa-envelope"></i>
        </span>
        <span class="text"><?php echo getAboutDate('EMAIL', 'about'); ?></span>
      </div>
      <div class="contact-social-links" id="links1">
        <a href="<?php echo getAboutDate('LINKEDIN', 'about'); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="<?php echo getAboutDate('YOUTUBE', 'about'); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
        <a href="<?php echo getAboutDate('TELEGRAM', 'about'); ?>" target="_blank"><i class="fa-brands fa-telegram"></i></a>
      </div>
      <div class="contact-social-links" id="links1">
        <a href="<?php echo getAboutDate('FACEBOOK', 'about'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="<?php echo getAboutDate('INSTAGRAM', 'about'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="<?php echo getAboutDate('WHATSAPP', 'about'); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </div>
  <div class="footer-text">
    <p class="text">Copyright &copy; 2022 All rights reserved | Nadim Al-Zoubi</p>
  </div>
</footer>
  <!-- custom js file -->
  <script src="https://kit.fontawesome.com/80ba361832.js" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>