<?php
    include('../includes/conn.php'); 
    include('../includes/functions.php');
    include('../includes/adminHeader.php');
?>
<?php
    if(isset($_POST['save_skill'])){
        skillData('insert', '');
    }    
    if(isset($_GET['did'])){
        skillData('delete', $_GET['did']);
    }    
?>
<div id="page-wrapper">
    <div id="page-inner"> 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                        Add Skill
                    </div> 
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="./skills.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                        <label for="">Skill name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>    
                                <div class="form-group">
                                    <label for="">Category *</label>
                                    <select class="form-control" id="select_category" name="category" required>
                                        <option value="">--Choose--</option>
                                        <option value="custom_value">Enter custom value</option>
                                        <?php 
                                            $cat = getSkillsCat();
                                            foreach($cat as $item){  
                                        ?>
                                        <option value="<?php echo $item['CATEGORY'] ?>"><?php echo $item['CATEGORY'] ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                    <input style="margin-top: 0.8rem;" type="text" class="form-control" required name="custom_category" disabled placeholder="Enter custom value" id="custom_value_input">
                                </div>
                                <div class="form-group">
                                    <label for="">skill ratio (<span id="show_range_value"></span>%)</label>
                                    <input type="range" class="form-control" name="percentage_value" required min="5" max="100" step="5" value="50" id="range_value">
                                </div>
                                <div class="form-group">
                                    <label for="">Shown text</label>
                                    <input type="text" class="form-control" name="shown_text" required placeholder="ex: WPM, %, etc..">
                                </div>
                                <button type="submit" class="btn btn-primary" name="save_skill">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- ////////////////////////////////  جدول قاعدة RESUME  /////////////////////////////// -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Database Table
                    </div> 
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $skills = getSkillsData();
                                        foreach ($skills as $item) {
                                    ?>
                                    <tr>
                                        <th>Skill name</th>
                                        <th><?php echo $item['SKILL_NAME'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <th><?php echo $item['CATEGORY'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Percentage</th>
                                        <th><?php echo $item['PERCENTAGE_VALUE'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Shown text</th>
                                        <th><?php echo $item['SHOWN_TEXT'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Action</th>
                                        <th>
                                            <a class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete?')) { window.location.href = './skills.php?did=<?php echo $item['ID']; ?>'; }">Delete</a>
                                            <a class="btn btn-warning" href="./editaskill.php?id=<?php echo $item['ID']; ?>">Edit</a>
                                        </th>
                                    </tr>
                                    <tr style="background-color: #333;">
                                        <th colspan="2"></th>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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