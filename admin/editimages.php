<?php
    include('../includes/conn.php'); 
    include('../includes/functions.php');
    include('../includes/adminHeader.php');
?>
<?php
    if(isset($_GET['proid'])){$proid = $_GET['proid'];}
    if(isset($_GET['imgid'])){$imgid = $_GET['imgid'];}
    if(isset($_GET['imgname'])){$imgna = $_GET['imgname'];}
    if(isset($_POST['save_changes'])){
        if(projectImages($proid)){
            echo '<script>alert("Updated successfully!"); window.location.href = "./editimages.php?proid=' . $proid . '";</script>';
        }
    }
    if(isset($imgid)){
        if(deleteImgFromDb($imgid, $proid)){
            deleteFile($imgna);
        }
    }

?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                        Edit Project images
                    </div>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data">
                            <?php
                                $projects = getProjectDataById($proid);
                                foreach ($projects as $project) {
                            ?>
                            <div class="form-group">
                                <label for="">Images</label>
                                <input type="file" accept="image/jpeg, image/png, image/jpg" multiple class="form-control" name="project_images[]"/>
                                <br />
                                <button type="submit" class="btn btn-primary" name="save_changes">Save images</button>
                            </div>
                            <div class="form-group">
                                <label>Uploaded Images: </label>
                                <div class="row">
                                    <?php
                                        $images = getProjectImagesByProjectId($proid);
                                        $imageNames = array();
                                        foreach ($images as $img) {
                                            $imageNames[$img['IMG_ID']] = $img['IMAGE_NAME'];
                                        }
                                        foreach ($imageNames as $imgId => $imgName) {
                                    ?>
                                    <div class="col" style="display: flex; align-items:center; justify-content:flex-start; gap: 5rem">
                                        <img style="width: 40%;" src="../assets/<?php echo $imgName; ?>" alt="Image">
                                        <b>Image name: <?php echo $imgName; ?></b>
                                        <a href="./editimages.php?proid=<?php echo $proid; ?>&imgid=<?php echo $imgId; ?>&imgname=<?php echo $imgName; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                    <br />
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
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