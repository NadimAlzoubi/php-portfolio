<?php
    include('../includes/conn.php'); 
    include('../includes/functions.php');
    include('../includes/adminHeader.php');
?>
<?php
  $id = $_GET['id'];
  if(isset($_POST['save_changes'])){
    skillData('update', $id);
  }
?>
<div id="page-wrapper">
    <div id="page-inner"> 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                        Edit Skill
                    </div> 
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form method="POST" enctype="multipart/form-data">
                                <?php
                                    $skills = getSkillDateById($id);
                                    foreach ($skills as $item) {
                                ?>
                                <div class="form-group">
                                    <label for="">Skill name</label>
                                    <input type="text" class="form-control" value="<?php echo $item['SKILL_NAME']; ?>" name="name" required>
                                </div>    
                                <div class="form-group">
                                    <label for="">Category *</label>
                                    <select class="form-control" id="select_category" name="category" required>
                                        <option value="<?php echo $item['CATEGORY']; ?>"><?php echo $item['CATEGORY']; ?></option>
                                        <option value="custom_value">Enter custom value</option>
                                        <?php 
                                            $cats = getSkillsCat();
                                            foreach($cats as $cat){  
                                        ?>
                                        <option value="<?php echo $cat['CATEGORY'] ?>"><?php echo $cat['CATEGORY'] ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                    <input style="margin-top: 0.8rem;" type="text" class="form-control" required name="custom_category" disabled placeholder="Enter custom value" id="custom_value_input">
                                </div>
                                <div class="form-group">
                                    <label for="">skill ratio (<span id="show_range_value"><?php echo $item['PERCENTAGE_VALUE']; ?></span>%)</label>
                                    <input type="range" class="form-control" name="percentage_value" required min="5" max="100" step="5" value="<?php echo $item['PERCENTAGE_VALUE']; ?>" id="range_value">
                                </div>
                                <div class="form-group">
                                    <label for="">Shown text</label>
                                    <input type="text" class="form-control" value="<?php echo $item['SHOWN_TEXT']; ?>" name="shown_text" required placeholder="ex: WPM, %, etc..">
                                </div>
                                <button type="submit" class="btn btn-primary" name="save_changes">Save</button>
                                <?php
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->
<script>
     //////////////////التحقق من اختيار الفئة////////////////
     var select_category = document.getElementById("select_category");
    var custom_value_input = document.getElementById("custom_value_input");
    select_category.onchange = () => {
        if(select_category.value == "custom_value"){
            custom_value_input.removeAttribute("disabled");
            custom_value_input.removeAttribute("placeholder");
        }else{
            custom_value_input.setAttribute("disabled", "");
            custom_value_input.setAttribute("placeholder", "Enter custom value");
        }
    }
     var show_range_value = document.getElementById("show_range_value");
    var range_value = document.getElementById("range_value");
    show_range_value.textContent = range_value.value;
    range_value.oninput = () => {
        show_range_value.textContent = range_value.value;
    }
</script>
<?php
  include('../includes/adminFooter.php');
?>