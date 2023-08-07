<?php
    include('../includes/conn.php'); 
    include('../includes/functions.php');
    include('../includes/adminHeader.php');
?>
<?php
    if (isset($_GET['did'])) {$id = $_GET['did'];}
    if (isset($_GET['oldfile'])) {$oldfile = $_GET['oldfile'];}
    if(isset($_POST['project_send'])){
        projectData('insert', '');
    }
    if(isset($id)){
        projectData('delete', $id);
        deleteFile($oldfile);
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
                        Add Project
                    </div> 
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="horizontal">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" required />
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" required />
                                </div>
                            </div>
                            <div class="horizontal"> 
                                <div class="form-group">
                                    <label for="">Summary</label>
                                    <input type="text" class="form-control" name="summary" required />
                                </div>
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" class="form-control" name="date" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea id="textarea" class="form-control" rows="4" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Attached link</label>
                                <input type="text" class="form-control" name="attached_link" />
                            </div>
                            <div class="horizontal"> 
                                <div class="form-group">
                                    <label for="">Shown link text</label>
                                    <input type="text" class="form-control" name="shown_link_text" />
                                </div>
                                <div class="form-group">
                                    <label for="">Cover image</label>
                                    <input type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" name="cover_img" required/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="project_send">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- ///////////////////////////////////////////// -->
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
                                    $projects = getProjectData();
                                    foreach($projects as $project){
                                ?>
                                    <tr>
                                        <th>Title</th>
                                        <td><?php echo $project['TITLE']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td><?php echo $project['PROJECT_NAME']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Summary</th>
                                        <td><?php echo $project['SUMMARY']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><?php echo $project['DESCRIPTION']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td><?php echo $project['LAUNCH_DATE']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Attached link</th>
                                        <td><?php echo $project['ATTACHED_LINK']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Shown text</th>
                                        <td><?php echo $project['SHOWN_LINK_TEXT']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Cover image</th>
                                        <td><?php echo $project['COVER_IMG']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Project images</th>
                                        <td style="display: flex; align-items: center;">
                                            <?php 
                                                $images = getProjectImagesByProjectId($project['PROJECT_ID']);
                                                foreach($images as $img){
                                                    echo '<div style="display: flex; flex-direction: column; margin: 1rem;">';
                                                    echo '<img style="width: 100px" src="../assets/' . $img['IMAGE_NAME'] . '" />';
                                                    echo '<br />';
                                                    echo '<span>' . $img['IMAGE_NAME'] . '</span>';
                                                    echo '</div>';
                                                }
                                            ?>
                                            <div>
                                                <a href="./editimages.php?proid=<?php echo $project['PROJECT_ID'] ?>" class="btn btn-success">Edit images</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Options</th>
                                        <td>
                                            <a class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete?')) { window.location.href = './projects.php?did=<?php echo $project['PROJECT_ID']; ?>&oldfile=<?php echo $project['COVER_IMG']; ?>'; }">Delete</a>
                                            <a class="btn btn-warning" href="./editproject.php?id=<?php echo $project['PROJECT_ID']; ?>">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="background-color: #333;"></td>
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
<?php
  include('../includes/adminFooter.php');
?>