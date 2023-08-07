<?php
  include('./includes/conn.php');
  include('./includes/functions.php');
  include('./includes/header.php');
?>
  <section class="skills container">
    <div class="title">
      <h2>skills</h2>
      <div>
        <h2>my skills</h2>
      </div>
    </div>

<?php 
$skills = getSkillsData();
$renderedCategories = array();
foreach ($skills as $item) {
    if (!in_array($item['CATEGORY'], $renderedCategories)) {
        $renderedCategories[] = $item['CATEGORY'];
?>
        <div>
            <h2 style="text-align: center; font-size:xxx-large;"><?php echo $item['CATEGORY']; ?></h2>
        </div>
        <div class="row">
        <?php
        foreach ($skills as $itemByCategory) {
            if ($item['CATEGORY'] === $itemByCategory['CATEGORY']) {
        ?>
                <div class="item">
                    <div class="item-text">
                        <span><?php echo $itemByCategory['SKILL_NAME']; ?></span>
                        <span class="w-80"><?php echo $itemByCategory['SHOWN_TEXT']; ?></span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar w-<?php echo $itemByCategory['PERCENTAGE_VALUE']; ?>"></div>
                    </div>
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
<?php
  include('./includes/footer.php');
?>