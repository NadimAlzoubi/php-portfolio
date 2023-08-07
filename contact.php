<?php
  include('./includes/conn.php');
  include('./includes/functions.php');
  include('./includes/header.php');
?>
<section class="contact container">
  <div class="title">
    <h2>contact</h2>
    <div>
      <h2>get in touch</h2>
    </div>
  </div>
  <p class="text">You can contact me anywhere, anytime.</p>
  <div class="row">
    <div class="col-left">
      <h2>feel free to ask me!</h2>
      <div class="contact-info">
        <span><i class="fas fa-envelope-open"></i></span>
        <h3>
          <span class="text">mail me</span> <br>
          <?php echo getAboutDate('EMAIL', 'about') ?>
        </h3>
      </div>
      <div class="contact-info">
        <span><i class="fas fa-phone-square-alt"></i></span>
        <h3>
          <span class="text">call me</span> <br>
          <?php echo getAboutDate('PHONE_NUMBER', 'about') ?>
        </h3>
      </div>
      <div class="contact-social-links">
        <a href="<?php echo getAboutDate('WHATSAPP', 'about') ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
        <a href="<?php echo getAboutDate('TELEGRAM', 'about') ?>" target="_blank"><i class="fa-brands fa-telegram"></i></a>
        <a href="tel:<?php echo getAboutDate('PHONE_NUMBER', 'about') ?>" target="_blank"><i class="fa-solid fa-phone"></i></a>
      </div>
    </div>
  </div>
  <div class="col-right">
    <form action="https://formsubmit.co/nadim.alzoubi.99@gmail.com" class="contact-form" method="POST">
      <div class="form-group">
        <input type="text" placeholder="your name" name="name" required>
        <input type="email" placeholder="your email" name="email" required>
        <input type="text" placeholder="your subject" name="_subject">
      </div>
      <textarea rows="7" placeholder="your message" name="messag" required></textarea>
      <button type="submit" class="btn">send message</button>
    </form>
  </div>
</section>
<?php
  include('./includes/footer.php');
?>