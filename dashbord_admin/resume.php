<!DOCTYPE html>
<?php 
    include('./conn.php'); 
?>
<?php
    // insert function
    function insertRow($table, $columns, $values, $the_file, $target_dir, $errore_msg) {
        include('./conn.php'); 
        $columnString = implode(",", $columns);
        $valueString = "'" . implode("','", $values) . "'";
        $query = "INSERT INTO $table ($columnString) VALUES ($valueString)";
            if (mysqli_query($connect, $query)) {
                move_uploaded_file($the_file, $target_dir);
                ?>
                    <script>
                        var pop_alert = document.getElementById("pop_alert");
                        pop_alert.style.display = "flex";
                        pop_alert.innerHTML = '<div class="custom-modal"><div class="succes succes-animation icon-top"><i class="fa fa-check"></i></div><div class="succes border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">Completed successfully</p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-success" style="margin-bottom: 1rem;">Close</button></div></div>';
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        var pop_alert = document.getElementById("pop_alert");
                        pop_alert.style.display = "flex";
                        pop_alert.innerHTML = '<div class="custom-modal"><div class="danger danger-animation icon-top"><i class="fa fa-times"></i></div><div class="danger border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">A Problem Occurred<br /><span class="type"><?php echo $errore_msg ?></span></p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-danger" style="margin-bottom: 1rem;">Close</button></div></div>';
                    </script>
                <?php
            }
        }
// Example usage
// insertRow("home", ["name", "age", "gender"], ["John", "20", "male"], '', '');
?>
<!-- *************************************************************************** -->
<!-- *************************************************************************** -->
<!-- ****      ********   *************      ************                   **** -->
<!-- ****   *   *******   ************   *   **************************   ****** -->
<!-- ****   **   ******   ***********   ***   ***********************   ******** -->
<!-- ****   ***   *****   **********   *****   ********************   ********** -->
<!-- ****   ****   ****   *********   *******   *****************   ************ -->
<!-- ****   *****   ***   ********               **************   ************** -->
<!-- ****   ******   **   *******   ***********   ***********   **************** -->
<!-- ****   *******   *   ******   *************   ********   ****************** -->
<!-- ****   ********      *****   ***************   *****                   **** -->
<!-- *************************************************************************** -->
<!-- *************************************************************************** -->
<?php
    // update function
function updateRow($table, $data, $the_file, $target_dir, $id, $old_file_name, $errore_msg) {
    include('./conn.php'); 
    $query = "UPDATE $table SET ";
    foreach ($data as $key => $value) {
        $query .= "$key = '$value',";
    }
    // Remove trailing comma
    $query = rtrim($query, ",");
    $query .= " WHERE NUM = $id";
    if (mysqli_query($connect, $query)) {
        unlink("./assets/img/" . $old_file_name);
        move_uploaded_file($the_file, $target_dir);
        ?>
            <script>
                var pop_alert = document.getElementById("pop_alert");
                pop_alert.style.display = "flex";
                pop_alert.innerHTML = '<div class="custom-modal"><div class="succes succes-animation icon-top"><i class="fa fa-check"></i></div><div class="succes border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">Completed successfully</p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-success" style="margin-bottom: 1rem;">Close</button></div></div>';
            </script>
        <?php
    }else{
        ?>
            <script>
                var pop_alert = document.getElementById("pop_alert");
                pop_alert.style.display = "flex";
                pop_alert.innerHTML = '<div class="custom-modal"><div class="danger danger-animation icon-top"><i class="fa fa-times"></i></div><div class="danger border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">A Problem Occurred<br /><span class="type"><?php echo $errore_msg ?></span></p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-danger" style="margin-bottom: 1rem;">Close</button></div></div>';
            </script>
        <?php
    }
}
// Example usage
// updateRow("users", ["name" => "John", "age" => 30, "location" => "New York"], '', '', $id);
?>
<!-- *************************************************************************** -->
<!-- *************************************************************************** -->
<!-- ****      ********   *************      ************                   **** -->
<!-- ****   *   *******   ************   *   **************************   ****** -->
<!-- ****   **   ******   ***********   ***   ***********************   ******** -->
<!-- ****   ***   *****   **********   *****   ********************   ********** -->
<!-- ****   ****   ****   *********   *******   *****************   ************ -->
<!-- ****   *****   ***   ********               **************   ************** -->
<!-- ****   ******   **   *******   ***********   ***********   **************** -->
<!-- ****   *******   *   ******   *************   ********   ****************** -->
<!-- ****   ********      *****   ***************   *****                   **** -->
<!-- *************************************************************************** -->
<!-- *************************************************************************** -->

<?php
    // delete function
    function deleteRow($table, $row_id, $file_name) {
        include('./conn.php');
        $query = "DELETE FROM " . $table . " WHERE NUM = " . $row_id;
        if (mysqli_query($connect, $query)) {
            unlink("./assets/img/" . $file_name)
            ?>
                <script>
                    var pop_alert = document.getElementById("pop_alert");
                    pop_alert.style.display = "flex";
                    pop_alert.innerHTML = '<div class="custom-modal"><div class="succes succes-animation icon-top"><i class="fa fa-check"></i></div><div class="succes border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">Completed successfully</p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-success" style="margin-bottom: 1rem;">Close</button></div></div>';
                </script>
            <?php
        }else{
            ?>
                <script>
                    var pop_alert = document.getElementById("pop_alert");
                    pop_alert.style.display = "flex";
                    pop_alert.innerHTML = '<div class="custom-modal"><div class="danger danger-animation icon-top"><i class="fa fa-times"></i></div><div class="danger border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">A Problem Occurred</p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-danger" style="margin-bottom: 1rem;">Close</button></div></div>';
                </script>
            <?php
        }
    }
// Example usage
//deleteRow("users", 3); // deletes the row with id 3 from the "users" table
?>
<!-- ///////////////////////////////////////////// -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Resume - Admin</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/select2.min.css" rel="stylesheet" >
	<link href="assets/css/checkbox3.min.css" rel="stylesheet" >
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- Custom-Alert -->
    <link rel="stylesheet" href="assets/css/custom-alert.css" /> 
</head>
<div class="page-wrapper-alt" id="pop_alert">
</div>
<style>
    thead tr th:nth-child(1){
        width: 1%;
    }
</style>
<body> 
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-capitalize" href="index.php"><strong><i class="icon fa fa-sitemap"></i> <?php $result_name = mysqli_query($connect, 'SELECT FIRST_NAME FROM home'); echo mysqli_fetch_assoc($result_name)['FIRST_NAME']; ?>.</strong></a>
				<div id="sideNav" href="">
		<i class="fa fa-bars icon"></i> 
		</div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php"><i class="fa fa-table"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="home.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="about.php"><i class="fa fa-info"></i> About</a>
                    </li> 
					 
					 <li>
                        <a href="skills.php"><i class="fa fa-star"></i> Skills<span class="fa arrow"></span></a>
                        <!-- <ul class="nav nav-second-level">
                            <li>
                                <a href="chart.php">Basic skills</a>
                            </li>
                            <li>
                                <a href="morris-chart.php">programming skills</a>
                            </li>
							</ul> -->
					 </li>	
							
                    <li>
                        <a class="active-menu" href="resume.php"><i class="fa fa-file-text"></i> Resume</a>
                    </li>
                    
                    <li>
                        <a href="projects.php"><i class="fa fa-tasks"></i> Projects</a>
                    </li>


                    <li>
                        <a href="contact.php"><i class="fa fa-comments"></i> Contact<span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <a href="footer.php"><i class="fa fa-fw fa-file"></i> Footer & Social media</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >		
            <div id="page-inner">     
                <!-- /. ROW  -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  فورم الاضافة  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<div class="row" id="dataForm">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <!-- ////////////////////////////////  فورم اضافة summary  /////////////////////////////// -->
        <div class="panel panel-default">
            <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                Data Form
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./resume.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Write somthig as a resume</label>
                            <textarea style="height: 100px;" class="form-control" placeholder="Resume about your self and career. Attention: don't use single or double quotes" name="resume_summary" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="resume_send" id="send_btn1">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
      $resume_send = $_POST['resume_send'];
      if(isset($resume_send)){
        $resume_summary = str_replace("'", "\'", $_POST['resume_summary']);
        insertRow("resume_summary", ["RESUME_SUMMARY"], [$resume_summary], '', '', '');
      }
?>
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
                                <th style="width: 80%;">Resume</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql_s = 'SELECT * FROM resume_summary';
                            $result = mysqli_query($connect, $sql_s);
                            if(isset($result)){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td style="padding: 10px;" id="counter_id1"><?php echo $row['RESUME_SUMMARY'] ?></td>
                            <td>
                                <form action="./resume.php" method="POST">
                                    <input type="submit" name="del_resume_summary" value="Delete" class="btn btn-danger">
                                    <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                                    <button type="submit" style="margin-left: 15px;" name="edit_resume_btn" id="edit_btn" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->
<script>
    var send_btn1 = document.getElementById("send_btn1");
    var dataForm = document.getElementById("dataForm");
    var counter_id1 = document.getElementById("counter_id1");
    if(counter_id1.textContent.length != 0){
        send_btn1.setAttribute('disabled', '');
        dataForm.setAttribute('style', 'display: none');
    }else{
        send_btn1.removeAttribute('disabled');
        dataForm.removeAttribute('style');
    }
</script>
<?php
    $edit_resume_btn = $_POST['edit_resume_btn'];
    if(isset($edit_resume_btn)){
        $id = $_POST['id'];
        $sql_update = 'SELECT * FROM resume_summary WHERE NUM = ' . $id;
        $result = mysqli_query($connect, $sql_update);
        if(isset($result)){
            while($row = mysqli_fetch_assoc($result)){
?>
<!-- ////////////////////////////////  فورم التعديل summary  /////////////////////////////// -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                <span>Edit Form</span>
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./resume.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Write somthig new as a resume</label>
                            <textarea style="height: 100px;" class="form-control" placeholder="Resume about your self and career. Attention: don't use single or double quotes" name="new_resume_summary" id="foucs_resume_summary" required><?php echo $row['RESUME_SUMMARY'] ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                        <button type="submit" class="btn btn-primary" name="update_resume_btn" id="update_resume_btn">Update</button>
                        <button class="btn btn-primary" style="margin-left: 10px;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
        }
    }
}
?>
<?php
    $update_resume_btn = $_POST['update_resume_btn'];
    if(isset($update_resume_btn)){
    $id = $_POST['id'];
    $new_resume_summary = str_replace("'", "\'", $_POST['new_resume_summary']);
    updateRow("resume_summary", ["RESUME_SUMMARY" => $new_resume_summary], '', '',$id, '', '');
  }
?>
<!-- delete -->
<?php
    $del_resume_summary = $_POST['del_resume_summary'];
    if(isset($del_resume_summary)){
    $id = $_POST['id'];
    deleteRow("resume_summary", $id, '');
  }
?>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                Data Form / Add Somthig Resume
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./resume.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Create a category *</label>
                            <select class="form-control" id="select_category" name="select_category" required>
                                <option value="">--Choose--</option>
                                <option value="Education">Education</option>
                                <option value="Courses & Trainings">Courses & Trainings</option>
                                <option value="Experiences">Experiences</option>
                            </select>
                            <!-- <input style="margin-top: 0.5rem;" type="text" class="form-control" required name="select_custom_category" disabled placeholder="Enter custom value" id="custom_value_input"> -->
                        </div>
                        <div class="form-group">
                            <label for="">Title *</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea style="height: 100px;" class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Year (from <span id="show_range_value"></span> to <span id="show_range_value2"></span>) *</label>
                            <div style="display: flex; align-items:center; justify-content:flex-start; gap: 1rem">
                                <label for="">From </label>
                                <input style="width:30%" type="number" class="form-control" name="year_from" required min="1975" max="2040" id="range_value" placeholder="ex: 2018">
                                <label for="">To </label>
                                <input style="width:30%" type="number" class="form-control" name="year_to" required min="1975" max="2040" id="range_value2" placeholder="ex: 2022">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Choose File (ex: certificate)</label>
                            <input type="file" class="form-control" name="resume_file">
                        </div>
                        <button type="submit" class="btn btn-primary" name="resume_send_cat">Submit</button>
                    </form>
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
 //////////////////التحقق من اختيار الفئة////////////////
    // ////////////////////////
    var show_range_value = document.getElementById("show_range_value");
    var range_value = document.getElementById("range_value");
    show_range_value.textContent = range_value.value;
    range_value.oninput = () => {
        show_range_value.textContent = range_value.value;
    }
 //////////////////التحقق من اختيار الفئة2////////////////
    // ////////////////////////
    var show_range_value2 = document.getElementById("show_range_value2");
    var range_value2 = document.getElementById("range_value2");
    show_range_value2.textContent = range_value2.value;
    range_value2.oninput = () => {
        show_range_value2.textContent = range_value2.value;
    }
</script>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  الاضافة  //////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
      $resume_send_cat = $_POST['resume_send_cat'];
      if(isset($resume_send_cat)){
        $category = str_replace("'", "\'", $_POST['select_category']);
        $title = str_replace("'", "\'", $_POST['title']);
        $description = str_replace("'", "\'", $_POST['description']);
        $year_from = $_POST['year_from'];
        $year_to = $_POST['year_to'];
        $the_file = $_FILES['resume_file']['tmp_name'];
        $file_check = $_FILES['resume_file']['name'];
        if($file_check == ""){
            $file_name = "No file selected";
        }else{
            $file_name = $_FILES['resume_file']['name'];
        }
        $target_dir = "./assets/img/" . $file_name;
        if(strpos($file_name, "'") >= 0){
            $errore_msg = "File name contains quotes";
        }
        insertRow("resum_", ["CATEGORY" ,"TITLE" ,"DESCRIPTION" ,"DATE_FROM" ,"DATE_TO" ,"FILE_LINK"], [$category, $title, $description, $year_from, $year_to, $file_name], $the_file, $target_dir, $errore_msg);
      }
?>

<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  جدول قاعدة البيانات  ////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
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
                                <th style="width: 1%;">No.</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Descriotion</th>
                                <th>Date</th>
                                <th>File Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql_s = 'SELECT * FROM resum_ ORDER BY CATEGORY';
                            $result = mysqli_query($connect, $sql_s);
                            $id_num = 1;
                            if(isset($result)){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td style=" padding: 10px;"><?php echo $id_num++ ?></td>
                                <td style=" padding: 10px;"><?php echo $row['CATEGORY'] ?></td>
                                <td style=" padding: 10px;"><?php echo $row['TITLE'] ?></td>
                                <td style=" padding: 10px;"><?php echo $row['DESCRIPTION'] ?></td>
                                <td style=" padding: 10px;">
                                <?php
                                    if($row['DATE_FROM'] == $row['DATE_TO']){
                                        echo $row['DATE_FROM'];
                                    }else{
                                        echo $row['DATE_FROM'] . " - " . $row['DATE_TO'];
                                    }
                                ?>
                                </td>
                                <td style=" padding: 10px;"><?php echo $row['FILE_LINK'] ?></td>
                                <td style=" padding: 10px;">
                                    <form action="./resume.php" method="POST" onsubmit="scrollToDestination(); return false;">
                                        <input type="submit" name="del" value="Delete" class="btn btn-danger">
                                        <input type="hidden" name="del_file_hidden" value="<?php echo $row['FILE_LINK'] ?>">
                                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                                        <button type="submit" style="margin-left: 15px;" name="edit_resume_btn" id="edit_resume_btn" class="btn btn-primary">Edit</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>                                     
<!-- /. ROW  -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  فورم التعديل  ////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $edit_resume_btn = $_POST['edit_resume_btn'];
    if(isset($edit_resume_btn)){
        $id = $_POST['id'];
        $sql_update = 'SELECT * FROM resum_ WHERE NUM = ' . $id;
        $result = mysqli_query($connect, $sql_update);
        if(isset($result)){
            while($row = mysqli_fetch_assoc($result)){
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                <span>Edit Form</span>
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./resume.php" method="POST" enctype="multipart/form-data" id="editForm">
                        <div class="form-group">
                            <label for="">Change category *</label>
                            <select class="form-control" name="new_select_category" required>
                                <option value="<?php echo $row['CATEGORY'] ?>"><?php echo $row['CATEGORY'] ?></option>
                                <option value="Education">Education</option>
                                <option value="Courses & Trainings">Courses & Trainings</option>
                                <option value="Experiences">Experiences</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Title *</label>
                            <input type="text" class="form-control" name="new_title" required value="<?php echo $row['TITLE'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea style="height: 100px;" class="form-control" name="new_description"><?php echo $row['DESCRIPTION'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Year (from <span id="show_range_value"></span> to <span id="show_range_value2"></span>) *</label>
                            <div style="display: flex; align-items:center; justify-content:space-between;">
                                <label for="">From </label>
                                <input style="width:30%" type="number" value="<?php echo $row['DATE_FROM'] ?>" class="form-control" name="new_year_from" required min="1975" max="2040" id="range_value" placeholder="ex: 2018">
                                <label for="">To </label>
                                <input style="width:30%" type="number" value="<?php echo $row['DATE_TO'] ?>" class="form-control" name="new_year_to" required min="1975" max="2040" id="range_value2" placeholder="ex: 2022">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">The old file was: <?php echo $row['FILE_LINK'] ?></label><br />
                            <label for="">Check this box if you want to delete it <input type="checkbox" name="checkbox_to_del" id="checkbox_to_del"></label><br />
                            <label for="">Or choose new file</label>
                            <input type="file" class="form-control" name="new_resume_file" id="new_cv_file">
                            <input type="hidden" name="old_resume_file" value="<?php echo $row['FILE_LINK'] ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                        <button type="submit" class="btn btn-primary" name="resume_update_btn">Update</button>
                        <button class="btn btn-primary" style="margin-left: 10px;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
        }
    }
}
?>
<script>
     //////////////////التحقق من اختيار الفئة////////////////   
    var select_category_edit = document.getElementById("select_category_edit");
    var custom_value_input_edit = document.getElementById("custom_value_input_edit");
    select_category_edit.onchange = () => {
        if(select_category_edit.value == "custom_value"){
            custom_value_input_edit.removeAttribute("disabled");
            custom_value_input_edit.removeAttribute("placeholder");
        }else{
            custom_value_input_edit.setAttribute("disabled", "");
            custom_value_input_edit.setAttribute("placeholder", "Enter custom value");

        }
    }
 //////////////////التحقق من اختيار الفئة////////////////
    // ////////////////////////
    var show_range_value_edit = document.getElementById("show_range_value_edit");
    var range_value_edit = document.getElementById("range_value_edit");
    show_range_value_edit.textContent = range_value_edit.value;
    range_value_edit.oninput = () => {
        show_range_value_edit.textContent = range_value_edit.value;
    }
</script>
<!-- ////////////////////////// -->
<script>
    var checkbox_to_del = document.getElementById("checkbox_to_del");
    var new_cv_file = document.getElementById("new_cv_file");
    checkbox_to_del.onclick = function(){
        if(checkbox_to_del.checked == true){
            new_cv_file.setAttribute('disabled', '');
        }else{
            new_cv_file.removeAttribute('disabled');
        }
    }
    new_cv_file.onchange = function(){
        var fileList = new_cv_file.files;
        var hasFiles = fileList.length > 0;
        if(hasFiles == true){
            checkbox_to_del.setAttribute('disabled', ''); 
        }else {
            checkbox_to_del.removeAttribute('disabled');
        }
    }
</script>
<!-- ------------------------ -->
<script>
  function scrollToDestination() {
    // Find the destination element
    var editForm = document.getElementById('editForm');
    
    // Scroll to the destination element
    editForm.scrollIntoView({behavior: 'smooth'});
  }
</script>
<!-- ////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  حذف  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $del = $_POST['del'];
    if(isset($del)){
        $id = $_POST['id'];
        $del_file_hidden = $_POST['del_file_hidden'];   
        deleteRow("resum_", $id, $del_file_hidden);
    }
?>
<!-- ///////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  تعديل  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $resume_update_btn = $_POST['resume_update_btn'];
    if(isset($resume_update_btn)){
        $id = $_POST['id'];
        $new_select_category = $_POST['new_select_category'];
        $new_title = str_replace("'", "\'", $_POST['new_title']);
        $new_description = str_replace("'", "\'", $_POST['new_description']);
        $new_year_from = $_POST['new_year_from'];
        $new_year_to = $_POST['new_year_to'];
        $old_resume_file = $_POST['old_resume_file'];
        $checkbox_to_del = $_POST['checkbox_to_del'];
        $the_file = $_FILES['new_resume_file']['tmp_name'];
        $new_file_check = $_FILES['new_resume_file']['name'];
        if($new_file_check == ""){ //  كنا عند الاولد فايل والتشيك بوكس والترو
            $new_file_name = $old_resume_file;
            if($checkbox_to_del == true){
                unlink("./assets/img/" . $new_file_name);
                $new_file_name = "No file selected";
            }
        }else{
            $new_file_name = $_FILES['new_resume_file']['name'];
            if($checkbox_to_del == true){
                unlink("./assets/img/" . $new_file_name);
                $new_file_name = "No file selected";
            }    
        }
        $new_target_dir = "./assets/img/" . $new_file_name;
        if(strpos($new_file_name, "'") >= 0){
            $errore_msg = "File name contains quotes";
        }
        updateRow("resum_", ["CATEGORY" => $new_select_category, "TITLE" => $new_title, "DESCRIPTION" => $new_description, "DATE_FROM" => $new_year_from, "DATE_TO" => $new_year_to, "FILE_LINK" => $new_file_name], $the_file, $new_target_dir, $id, $old_resume_file, $errore_msg);
        // $edit_skill_sql = "UPDATE resum_ SET CATEGORY = '$new_select_category', TITLE = '$new_title', DESCRIPTION = '$new_description', DATE_FROM = '$new_year_from', DATE_TO = '$new_year_to', FILE_LINK = '$new_file_name' WHERE NUM = '$id'";
    }
?>
<!-- /. ROW  -->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic Tabs
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#home" data-toggle="tab">Languages</a>
                    </li>
                    <li class="">
                        <a href="#profile" data-toggle="tab">Interests</a>
                    </li>
                    <!-- <li class=""><a href="#msg" data-toggle="tab">Messages</a>
                    </li>
                    <li class=""><a href="#" data-toggle="tab">Settings</a>
                    </li> -->
                </ul>
                <div class="tab-content">            
                    <div class="tab-pane fade active in" id="home">
                        <h4>Add language</h4>
                        <form action="./resume.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">language</label>
                                <input type="text" class="form-control" name="lang_name" id="" placeholder="type language name">
                            </div>
                            <div class="form-group">
                                <label for="">percentage</label>
                                <input type="number" class="form-control" name="lang_perc" id="" placeholder="type percentage">
                            </div>
                            <button type="submit" name="lang_send" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <h4>Add interest</h4>
                        <form action="./resume.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">interest</label>
                                <input type="text" name="intr_name" class="form-control" id="" placeholder="type interest name">
                            </div>
                            <button type="submit" name="intr_send" class="btn btn-primary">Submit</button>
                        </form>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //////////////////////////////dاضافة    /////////////////////////////// -->
<?php
    $lang_send = $_POST['lang_send'];
    if(isset($lang_send)){
        $lang_name = $_POST['lang_name'];
        $lang_perc = $_POST['lang_perc'];
        insertRow("lang_intr", ["LANGUAGES", "PERCENTAGE"], [$lang_name, $lang_perc], '', '', '');
    }
?>
    <!-- ////////////////////////////////  جدول قاعدة RESUME  /////////////////////////////// -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Languages Table
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Languages</th>
                                <th>percentage</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql_s = 'SELECT NUM, LANGUAGES, PERCENTAGE FROM lang_intr';
                            $result = mysqli_query($connect, $sql_s);
                            $counter_lang = 1;
                            if(isset($result)){
                                while($row = mysqli_fetch_assoc($result)){
                                    if($row['LANGUAGES'] != null && $row['PERCENTAGE'] != null){
                        ?>
                            <tr>
                                <td style="padding: 10px;" id="counter_lan"><?php echo $counter_lang++ ?></td>
                                <td style="padding: 10px;" id=""><?php echo $row['LANGUAGES'] ?></td>
                                <td style="padding: 10px;" id=""><?php echo $row['PERCENTAGE'] . '%'?></td>
                                <td>
                                    <form action="./resume.php" method="POST">
                                        <input type="submit" name="del_lang" value="Delete" class="btn btn-danger">
                                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                                        <button type="submit" style="margin-left: 15px;" name="edit_lang" id="edit_btn" class="btn btn-primary">Edit</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->
    <!-- <script>
    var send_btn_lang = document.getElementById("send_btn_lang");
    var counter_lan = document.getElementById("counter_lan");
    if(counter_lan.textContent.length != 0){
        send_btn_lang.setAttribute('disabled', '');
    }else{
        send_btn_lang.removeAttribute('disabled');
    }
</script> -->
<?php
    $edit_lang = $_POST['edit_lang'];
    if(isset($edit_lang)){
        $id = $_POST['id'];
        $sql_update = 'SELECT * FROM lang_intr WHERE NUM = ' . $id;
        $result = mysqli_query($connect, $sql_update);
            if(isset($result)){
                while($row = mysqli_fetch_assoc($result)){
?>
<!-- ////////////////////////////////  فورم التعديل summary  /////////////////////////////// -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                <span>Edit Form</span>
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./resume.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">language</label>
                            <input type="text" value="<?php echo $row['LANGUAGES'] ?>" class="form-control" name="update_lang_name" id="foucs_lang" placeholder="update language name">
                        </div>
                        <div class="form-group">
                            <label for="">percentage</label>
                            <input type="number" value="<?php echo $row['PERCENTAGE'] ?>" class="form-control" name="update_lang_perc" id="" placeholder="update type percentage">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                        <button type="submit" name="update_lang_send" class="btn btn-primary">Update</button>
                        <button class="btn btn-primary" style="margin-left: 10px;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
            }
        }
    }
?>
<?php
    $update_lang_send = $_POST['update_lang_send'];
    if(isset($update_lang_send)){
        $id = $_POST['id'];
        $update_lang_name = $_POST['update_lang_name'];
        $update_lang_perc = $_POST['update_lang_perc'];
        updateRow("lang_intr", ["LANGUAGES" => $update_lang_name, "PERCENTAGE" => $update_lang_perc], '', '', $id, '', '');
    }
?>
<!--  -->
<!--  -->
<!--  -->
<?php
    $del_lang = $_POST['del_lang'];
    if(isset($del_lang)){
        $id = $_POST['id'];
        deleteRow("lang_intr", $id, '');
    }
?>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////// اضافة مهارات ////////////////////// -->
<?php
    $intr_send = $_POST['intr_send'];
    if(isset($intr_send)){
        $intr_name = $_POST['intr_name'];
        insertRow("lang_intr", ["INTERESTS"], [$intr_name], '', '', '');
      }
?>
<!-- ////////////////////////////////  جدول قاعدة  /////////////////////////////// -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Interest Table
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Interest</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql_s = 'SELECT NUM, INTERESTS FROM lang_intr';
                            $result = mysqli_query($connect, $sql_s);
                            $counter_lang = 1;
                            if(isset($result)){
                                while($row = mysqli_fetch_assoc($result)){
                                    if($row['INTERESTS'] != null){
                        ?>
                            <tr>
                                <td style="padding: 10px;" id="counter_intr"><?php echo $counter_lang++ ?></td>
                                <td style="padding: 10px;" id=""><?php echo $row['INTERESTS'] ?></td>
                                <td>
                                    <form action="./resume.php" method="POST">
                                        <input type="submit" name="del_intr" value="Delete" class="btn btn-danger">
                                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                                        <button type="submit" style="margin-left: 15px;" name="edit_intr" id="edit_btn" class="btn btn-primary">Edit</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                                    }
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->
    <!-- <script>
    var send_btn_lang = document.getElementById("send_btnlang");
    var counter_lan = document.getElementById("counter_lan");
    if(counter_lan.textContent.length != 0){
        send_btn_lang.setAttribute('disabled', '');
    }else{
        send_btn_lang.removeAttribute('disabled');
    }
</script> -->
<?php
    $edit_intr = $_POST['edit_intr'];
    if(isset($edit_intr)){
        $id = $_POST['id'];
        $sql_update = 'SELECT * FROM lang_intr WHERE NUM = ' . $id;
        $result = mysqli_query($connect, $sql_update);
        if(isset($result)){
            while($row = mysqli_fetch_assoc($result)){
?>
<!-- ////////////////////////////////  فورم التعديل summary  /////////////////////////////// -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                <span>Edit Form</span>
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./resume.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Interest</label>
                            <input type="text" value="<?php echo $row['INTERESTS'] ?>" class="form-control" name="update_intr_name" id="foucs_intr" placeholder="update Interest name">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                        <button type="submit" name="update_intr_send" class="btn btn-primary">Update</button>
                        <button class="btn btn-primary" style="margin-left: 10px;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
        }
    }
}
?>
<!--  -->
<!--  -->
<!--  -->
<?php
    $update_intr_send = $_POST['update_intr_send'];
    if(isset($update_intr_send)){
        $id = $_POST['id'];
        $update_intr_name = $_POST['update_intr_name'];
        updateRow("lang_intr", ["INTERESTS" => $update_intr_name], '', '', $id, '', '');      
    }
?>
<?php
    $del_intr = $_POST['del_intr'];
    if(isset($del_intr)){
        $id = $_POST['id'];
        deleteRow("lang_intr", $id, '');
  }
?>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
					</div><!-- /. PAGE INNER  -->
            </div><!-- /. PAGE WRAPPER  -->
        </div><!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
