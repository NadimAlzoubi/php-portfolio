<?php
    include('../includes/conn.php'); 
    include('../includes/functions.php');
    include('../includes/adminHeader.php');
?>
<?php
    $id = $_GET['id'];
    $oldfile = $_GET['oldfile'];
    if(isset($_POST['save_changes'])){
        if(resumeData('update', $id)){
            deleteFile($oldfile);
        }
    }    
?>
<div id="page-wrapper" >		
    <div id="page-inner">    
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                        Edit resume
                    </div> 
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form method="POST" enctype="multipart/form-data">
                                <?php
                                    $resume = getResumeDataById($id);
                                    $renderedCategories = array();
                                    foreach ($resume as $item) {
                                ?>  
                                <div class="form-group">
                                    <label for="">Title *</label>
                                    <input type="text" class="form-control" value="<?php echo $item['TITLE'] ?>" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Category *</label>
                                    <select class="form-control" id="select_category" name="category" required>
                                        <option value="<?php echo $item['CATEGORY'] ?>"><?php echo $item['CATEGORY'] ?></option>
                                        <option value="Education">Education</option>
                                        <option value="Experiences">Experiences</option>
                                        <option value="Courses">Courses</option>
                                        <option value="Languages">Languages</option>
                                        <option value="Intrestes">Intrestes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea style="height: 100px;" class="form-control" value="<?php echo $item['DESCRIPTION'] ?>" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Date *</label>
                                    <div style="display: flex; align-items:center; justify-content:flex-start; gap: 1rem">
                                        <label for="">From </label>
                                        <input style="width:30%" type="number" class="form-control" value="<?php echo $item['DATE_FROM'] ?>" name="date_from" min="1970" max="2040" placeholder="ex: 2018">
                                        <label for="">To </label>
                                        <input style="width:30%" type="number" class="form-control" value="<?php echo $item['DATE_TO'] ?>" name="date_to" min="1970" max="2040" placeholder="ex: 2022">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Choose File (ex: certificate)</label>
                                    <input type="file" class="form-control" name="attached_file">
                                    <input type="hidden" value="<?php echo $item['ATTACHED_LINK'] ?>" name="attached_file_old">
                                    <span><?php echo $item['ATTACHED_LINK'] ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Shown text</label>
                                    <input type="text" class="form-control" value="<?php echo $item['SHOWN_LINK_TEXT'] ?>" name="shown_link_text">
                                </div>
                                <div class="form-group">
                                    <label for="">Icon (font awesome)</label>
                                    <input type="text" class="form-control" value="<?php echo $item['ICON'] ?>" name="icon">
                                </div>
                                <button type="submit" class="btn btn-primary" name="save_changes">Save changes</button>
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
<?php
  include('../includes/adminFooter.php');
?>