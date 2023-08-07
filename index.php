<?php
  include('./includes/conn.php');
  include('./includes/functions.php');
  include('./includes/header.php');
?>
<section class="home container">
  <div class="row">
    <div class="row-left">
      <h3>hello!</h3>
      <h1>i'm 
        <span>
          <?php echo getAboutDate('FIRST_NAME', 'about'); ?>
          <br />
          <?php echo getAboutDate('LAST_NAME', 'about') ?>
        </span>
      </h1>
      <h2>
        <?php echo getAboutDate('JOB_TITLE', 'about') ?>
      </h2>
      <div class="home-pg-btn">
        <a href="contact.php" class="btn">hire me</a>
        <a href="projects.php" class="btn">my works</a>
      </div>
    </div>
    <div class="row-right">
      <div class="img-border">
        <div class="img-container">
          <img src="./assets/<?php echo getAboutDate('COVER_IMG_NAME', 'about'); ?>" alt="my photo" style="border-radius: 30px;">
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  include('./includes/footer.php');
?>