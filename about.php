<?php
  include('./includes/conn.php');
  include('./includes/functions.php');
  include('./includes/header.php');
?>
<section class="about container">
  <div class="title">
    <h2>about</h2>
    <div>
      <h2>about me</h2>
    </div>
  </div>
  <div class="row">
    <div class="row-left">
      <img src="./assets/<?php echo getAboutDate('PERSONAL_IMG_NAME', 'about'); ?>" alt="<?php echo getAboutDate('PERSONAL_IMG_NAME', 'about'); ?>" style="border-radius: 20px;">
    </div>
    <div class="row-right">
      <p class="text">
        <?php echo getAboutDate('ABOUT_ME', 'about'); ?>
      </p>
      <div class="about-content">
        <ul>
          <li class="text">
            <span>Name: </span>
            <span style="text-transform: capitalize">
              <?php echo getAboutDate('FIRST_NAME', 'about'); ?> 
              <?php echo getAboutDate('LAST_NAME', 'about'); ?>
            </span>
          </li>
          <li class="text">
            <span>Date of Birth: </span>
            <span><?php echo getAboutDate('DATE_OF_BIRTH', 'about'); ?></span>
          </li>
          <li class="text">
            <span>Email: </span>
            <span><?php echo getAboutDate('EMAIL', 'about'); ?></span>
          </li>
          <li class="text">
            <span>Phone: </span>
            <span><?php echo getAboutDate('PHONE_NUMBER', 'about'); ?></span>
          </li>
          <li class="text">
            <span>Address: </span>
            <span><?php echo getAboutDate('ADDRESS', 'about'); ?></span>
          </li>
        </ul>
      </div>
      <a href="./assets/<?php echo getAboutDate('CV_FILE_NAME', 'about'); ?>" class="btn" style="color: #111;" download>download cv</a>
      <span style="margin: 0 1.5rem;"> OR </span>
      <a href="./assets/<?php echo getAboutDate('CV_FILE_NAME', 'about'); ?>" class="btn" style="color: #111;">view cv</a>
    </div>
  </div>
</section>
<?php
  include('./includes/footer.php');
?>