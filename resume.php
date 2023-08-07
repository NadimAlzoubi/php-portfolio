<?php
  include('./includes/conn.php');
  include('./includes/functions.php');
  include('./includes/header.php');
?>
    <!-- resume page -->
    <section class="resume container">
      <div class="title">
        <h2>resume</h2>
        <div>
          <h2>resume</h2>
        </div>
      </div>

      <p class="text">
      <?php //echo getAboutDate('ADDRESS', 'about'); ?>
      </p>

<?php
            
  $resume = getResumeData();
  $renderedCategories = array();
  foreach ($resume as $item) {
    if (!in_array($item['CATEGORY'], $renderedCategories)) {
      $renderedCategories[] = $item['CATEGORY'];
      ?>
      <div class="title">
        <h2><?php echo $item['CATEGORY']; ?></h2>
      </div>
      <div class="row">
      <?php
      foreach ($resume as $itemByCategory) {
        if ($item['CATEGORY'] === $itemByCategory['CATEGORY']) {
          ?>
          <div class="item">
            <div class="icon">
              <i class="<?php echo $itemByCategory['ICON']; ?>"></i>
            </div>
            <?php
            if ($itemByCategory['DATE_FROM']) {
              if ($itemByCategory['DATE_FROM'] === $itemByCategory['DATE_TO']) {
                echo '<span>' . $itemByCategory['DATE_FROM'] . '</span>';
              } else {
                echo '<span>' . $itemByCategory['DATE_FROM'] . ' → ' . $itemByCategory['DATE_TO'] . '</span>';
              }
            }
            echo '<h2>' . $itemByCategory['TITLE'] . '</h2>';
            echo '<p class="text">' . $itemByCategory['DESCRIPTION'] . '</p><br />';
            if ($itemByCategory['ATTACHED_LINK']) {
              ?>
              <a href="./assets/<?php echo $itemByCategory['ATTACHED_LINK']; ?>" target="_blank" rel="noopener noreferrer">
                <?php echo $itemByCategory['SHOWN_LINK_TEXT']; ?> ↗
              </a>
              <?php
            }
            ?>
          </div>
          <?php
        }
      }
          ?>
      </div>
      <?php
    }
  }
      ?>
    </section>
    <!-- end of resume page -->  
<?php
  include('./includes/footer.php');
?>