<?php
    include('../includes/conn.php'); 
    include('../includes/functions.php');
    include('../includes/adminHeader.php');
?>
<?php
    $id = $_GET['id'];
    if(isset($_POST['save_changes'])){
        projectData('update', $id);
    }
?>
<style>
    .horizontal{
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    .horizontal div{
        width: 48%;
    }
</style>
<div id="page-wrapper" >	
    <div id="page-inner"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                        Edit Project
                    </div> 
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data">
                            <?php
                                $projects = getProjectDataById($id);
                                foreach($projects as $project){
                            ?>
                            <div class="horizontal">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" value="<?php echo $project['TITLE']; ?>" name="title" required />
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" value="<?php echo $project['PROJECT_NAME']; ?>" name="name" required />
                                </div>
                            </div>
                            <div class="horizontal"> 
                                <div class="form-group">
                                    <label for="">Summary</label>
                                    <input type="text" class="form-control" value="<?php echo $project['SUMMARY']; ?>" name="summary" required />
                                </div>
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="hidden" name="date_old" value="<?php echo $project['LAUNCH_DATE']; ?>">
                                    <input type="date" class="form-control" name="date" />
                                    <span>Old date: <?php echo $project['LAUNCH_DATE']; ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea id="textarea" class="form-control" rows="4" name="description" required><?php echo $project['DESCRIPTION']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Attached link</label>
                                <input type="text" class="form-control" value="<?php echo $project['ATTACHED_LINK']; ?>" name="attached_link" />
                            </div>
                            <div class="horizontal"> 
                                <div class="form-group">
                                    <label for="">Shown link text</label>
                                    <input type="text" class="form-control" value="<?php echo $project['SHOWN_LINK_TEXT']; ?>" name="shown_link_text" />
                                </div>
                                <div class="form-group">
                                    <label for="">Cover image</label>
                                    <input type="hidden" name="cover_img_old" value="<?php echo $project['COVER_IMG']; ?>">
                                    <input type="file" class="form-control" name="cover_img"/>
                                    <span>Old cover image: <?php echo $project['COVER_IMG']; ?></span>
                                </div>
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
<?php
  include('../includes/adminFooter.php');
?>