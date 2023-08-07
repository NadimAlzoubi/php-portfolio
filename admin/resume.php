<?php
    include('../includes/conn.php'); 
    include('../includes/functions.php');
    include('../includes/adminHeader.php');
?>
<?php
    if (isset($_GET['did'])) {$id = $_GET['did'];}
    if (isset($_GET['oldfile'])) {$oldfile = $_GET['oldfile'];}
    if(isset($_POST['save_resume'])){
        resumeData('insert', '');
    }    
    if(isset($id)){
        resumeData('delete', $id);
        deleteFile($oldfile);
    }    
?>
<div id="page-wrapper" >		
    <div id="page-inner">    
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                        Add Data
                    </div> 
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="./resume.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Title *</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Category *</label>
                                    <select class="form-control" id="select_category" name="category" required>
                                        <option value="">--Choose--</option>
                                        <option value="Education">Education</option>
                                        <option value="Experiences">Experiences</option>
                                        <option value="Courses">Courses</option>
                                        <option value="Languages">Languages</option>
                                        <option value="Intrestes">Intrestes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea style="height: 100px;" class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Date *</label>
                                    <div style="display: flex; align-items:center; justify-content:flex-start; gap: 1rem">
                                        <label for="">From </label>
                                        <input style="width:30%" type="number" class="form-control" name="date_from" min="1970" max="2040" placeholder="ex: 2018">
                                        <label for="">To </label>
                                        <input style="width:30%" type="number" class="form-control" name="date_to" min="1970" max="2040" placeholder="ex: 2022">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Choose File (ex: certificate)</label>
                                    <input type="file" class="form-control" name="attached_file">
                                </div>
                                <div class="form-group">
                                    <label for="">Link content</label>
                                    <input type="text" class="form-control" name="shown_link_text">
                                </div>
                                <div class="form-group">
                                    <label for="">Icon (font awesome)</label>
                                    <input type="text" class="form-control" name="icon">
                                </div>
                                <button type="submit" class="btn btn-primary" name="save_resume">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- ////////////////////////////////  جدول البيانات  /////////////////////////////// -->
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
                                        $resume = getResumeData();
                                        $renderedCategories = array();
                                        foreach ($resume as $item) {
                                    ?>
                                    <tr>
                                        <th>Title</th>
                                        <th><?php echo $item['TITLE'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <th><?php echo $item['CATEGORY'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <th><?php echo $item['DESCRIPTION'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Date from</th>
                                        <th><?php echo $item['DATE_FROM'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Date to</th>
                                        <th><?php echo $item['DATE_TO'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Link</th>
                                        <th><?php echo $item['ATTACHED_LINK'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Link content</th>
                                        <th><?php echo $item['SHOWN_LINK_TEXT'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Logo icon</th>
                                        <th><?php echo $item['ICON'] ?> <i class="<?php echo $item['ICON'] ?>"></i></th>
                                    </tr>
                                    <tr>
                                        <th>Action</th>
                                        <th>
                                            <a class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete?')) { window.location.href = './resume.php?did=<?php echo $item['ID']; ?>&oldfile=<?php echo $item['ATTACHED_LINK']; ?>'; }">Delete</a>
                                            <a class="btn btn-warning" href="./editresume.php?id=<?php echo $item['ID']; ?>&oldfile=<?php echo $item['ATTACHED_LINK']; ?>">Edit</a>
                                        </th>
                                    </tr>
                                    <tr colspan=2 style="background-color: #000">
                                        <th></th>
                                        <th></th>
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