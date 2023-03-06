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
    <title>About - Admin</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- Custom-Alert -->
    <link rel="stylesheet" href="assets/css/custom-alert.css" /> 
</head>
<div class="page-wrapper-alt" id="pop_alert">
</div>
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
                        <a class="active-menu" href="about.php"><i class="fa fa-info"></i> About</a>
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
                        <a href="resume.php"><i class="fa fa-file-text"></i> Resume</a>
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
        <div id="page-wrapper">
            <div id="page-inner"> 
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  فورم الاضافة  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<div class="row" id="dataForm">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                Data Form
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./about.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Summary</label>
                            <textarea class="form-control" placeholder="Summary about you" name="summary" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Date Of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="file" class="form-check-input" name="cv_file">
                            <label class="form-check-label" for="">choose your CV file (PDF)</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="send" id="send_btn1">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  الاضافة  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $send = $_POST['send'];
    if(isset($send)){
        $summary = str_replace("'","\'", $_POST['summary']);
        $date_of_birth = str_replace("'","\'", $_POST['date_of_birth']);
        $email = str_replace("'","\'", $_POST['email']);
        $phone_number = str_replace("'","\'", $_POST['phone_number']);
        $address = str_replace("'","\'", $_POST['address']);
        $file_name =  $_FILES['cv_file']['name'];
        if(strpos($file_name, "'") >= 0){
            $errore_msg = "File name contains quotes";
        }
        if($file_name == ""){
            $file_name = "No file selected";
        }
        $the_file = $_FILES['cv_file']['tmp_name'];
        $target_dir = "./assets/img/" . $file_name;
        insertRow("about", ["SUMMARY", "DATE_OF_BIRTH", "E_MAIL", "PHONE_NUMBER", "ADDRESS", "CV_FILE"], [$summary, $date_of_birth, $email, $phone_number, $address, $file_name], $the_file, $target_dir, $errore_msg);
    }
?>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  جدول قاعدة البيانات  /////////////////////////////// -->
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
                                <th>Summary</th>
                                <th>Date_of_birth</th>
                                <th>E-mail</th>
                                <th>Phone number</th>
                                <th>Address</th>
                                <th>CV file</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <style>
                            td{
                                padding: 0.2rem;
                            }
                        </style>
                        <tbody>
                            <?php
                                $sql_s = 'SELECT * FROM about';
                                $result = mysqli_query($connect, $sql_s);
                                if(isset($result)){
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td id="counter_id1"><?php echo $row['SUMMARY'] ?></td>
                                    <td><?php echo $row['DATE_OF_BIRTH'] ?></td>
                                    <td><?php echo $row['E_MAIL'] ?></td>
                                    <td><?php echo $row['PHONE_NUMBER'] ?></td>
                                    <td><?php echo $row['ADDRESS'] ?></td>
                                    <td><?php echo $row['CV_FILE'] ?></td>
                                    <td>
                                        <form action="./about.php" method="POST">
                                            <input type="submit" name="del" value="Delete" class="btn btn-danger">
                                            <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                                            <input type="hidden" name="file_name" value="<?php echo $row['CV_FILE'] ?>">
                                            <button type="submit" style="margin-left: 15px;" name="edit_btn" id="edit_btn" class="btn btn-primary">Edit</button>
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
        dataForm.setAttribute('style');
    }
</script>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  فورم التعديل  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $edit_btn = $_POST['edit_btn'];
    if(isset($edit_btn)){
        $id = $_POST['id'];
        $sql_update = 'SELECT * FROM about WHERE NUM = ' . $id;
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
                    <form action="./about.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">New Summary</label>
                            <textarea id="foucs_name" class="form-control" placeholder="Enter your summary" name="new_summary" id="update1"><?php echo $row['SUMMARY']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">New Date of birth</label>
                            <input value="<?php echo $row['DATE_OF_BIRTH']; ?>" type="date" class="form-control" name="new_date_of_birth" id="update2">
                        </div>
                        <div class="form-group">
                            <label for="">New E-mail</label>
                            <input value="<?php echo $row['E_MAIL'] ?>" type="email" class="form-control" placeholder="Enter New E-mail" name="new_email" id="">
                        </div>
                        <div class="form-group">
                            <label for="">New Phone Number</label>
                            <input value="<?php echo $row['PHONE_NUMBER'] ?>" type="number" class="form-control" placeholder="Enter New Number" name="new_number" id="">
                        </div>
                        <div class="form-group">
                            <label for="">New Address</label>
                            <input value="<?php echo $row['ADDRESS'] ?>" type="text" class="form-control" placeholder="Enter New Address" name="new_address" id="">
                        </div>
                        <div class="form-group">
                            <label for="">The old file was: <?php echo $row['CV_FILE'] ?></label><br />
                            <label for="">Check this box if you want to delete it <input type="checkbox" name="checkbox_to_del" id="checkbox_to_del"></label><br />
                            <label for="">Or choose new file</label>
                            <input type="file" class="form-control" name="new_cv_file" id="new_cv_file">
                            <input type="hidden" name="old_cv_file" value="<?php echo $row['CV_FILE'] ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                        <button type="submit" class="btn btn-primary" name="update" id="update_btn">Update</button>
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
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  حذف  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $del = $_POST['del'];
    if(isset($del)){
        $file_name = $_POST['file_name'];
        $id = $_POST['id'];
        deleteRow("about", $id, $file_name);
    }
?>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  تعديل  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $update_btn = $_POST['update'];
    if(isset($update_btn)){
        $id = $_POST['id'];
        $new_summary = str_replace("'","\'", $_POST['new_summary']);
        $new_date_of_birth = str_replace("'","\'", $_POST['new_date_of_birth']);
        $new_email = str_replace("'","\'", $_POST['new_email']);
        $new_number = str_replace("'","\'", $_POST['new_number']);
        $new_address = str_replace("'","\'", $_POST['new_address']);
        $checkbox_to_del = $_POST['checkbox_to_del'];
        $old_file_name = $_POST['old_cv_file'];
        $new_file_name = str_replace("'","\'", $_FILES['new_cv_file']['name']);
        $the_file = $_FILES['new_cv_file']['tmp_name'];
        if($new_file_name == ""){
            $file_name = $old_file_name;
            if($checkbox_to_del == true){
                unlink("./assets/img/" . $old_file_name);
                $file_name = "No file selected";
            }
        } else {
            $file_name = $_FILES['new_cv_file']['name'];
            if($checkbox_to_del == true){
                unlink("./assets/" . $old_file_name);
                $file_name = "No file selected";
            }    
        }
        $target_dir = "./assets/img/" . $file_name;
        if(strpos($file_name, "'") >= 0){
            $errore_msg = "File name contains quotes";
        }
        updateRow("about", ["SUMMARY" => $new_summary, "DATE_OF_BIRTH" => $new_date_of_birth, "E_MAIL" => $new_email, "PHONE_NUMBER" => $new_number, "ADDRESS" => $new_address, "CV_FILE" => $file_name], $the_file, $target_dir, $id, $old_file_name, $errore_msg);
  }
?>
                </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
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