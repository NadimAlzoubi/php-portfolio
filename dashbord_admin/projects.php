<!DOCTYPE html>
<?php 
    include('./conn.php'); 
?>
<?php
    // insert function
    function insertRow($table, $columns, $values, $cover_pic, $all_pics, $file_link) {
        include('./conn.php'); 
        $columnString = implode(",", $columns);
        $valueString = "'" . implode("','", $values) . "'";
        $query = "INSERT INTO $table ($columnString) VALUES ($valueString)";
        // Check if any cover file were uploaded
        if (!empty($cover_pic['name'])) {
            move_uploaded_file($cover_pic['tmp_name'], "./assets/projects_files/" . $cover_pic['name']);
        }
        // Check if any file were uploaded
        if (!empty($file_link['name'])) {
            move_uploaded_file($file_link['tmp_name'], "./assets/projects_files/" . $file_link['name']);
        }
        // Check if any files were uploaded
        if (!empty($all_pics['name'][0])) {
            // Loop through the uploaded files
            for ($i = 0; $i < count($all_pics['name']); $i++) {
                // Get the file name and temporary location
                $pic_name = $all_pics['name'][$i];
                $tmp_name = $all_pics['tmp_name'][$i];      
                move_uploaded_file($tmp_name, "./assets/projects_files/" . $pic_name);
            }
        }
        if (mysqli_query($connect, $query)) {
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
                    pop_alert.innerHTML = '<div class="custom-modal"><div class="danger danger-animation icon-top"><i class="fa fa-times"></i></div><div class="danger border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">A Problem Occurred<br /><span class="type"><?php echo ''; ?></span></p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-danger" style="margin-bottom: 1rem;">Close</button></div></div>';
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
function updateRow($table, $data, $new_cover_pic, $new_all_pics_files, $new_file_link, $id, $errore_msg) {
    include('./conn.php'); 
    $query = "UPDATE $table SET ";
    foreach ($data as $key => $value) {
        $query .= "$key = '$value',";
    }
    // Remove trailing comma
    $query = rtrim($query, ",");
    $query .= " WHERE ID = $id";
    if (mysqli_query($connect, $query)) {
        if (!empty($new_cover_pic['name'])) {
            $pic_name = $new_cover_pic['name'];
            $tmp_name = $new_cover_pic['tmp_name'];      
            move_uploaded_file($tmp_name, "./assets/projects_files/" . $pic_name);
        }
        if (!empty($new_all_pics_files['name'][0])) {
            // Loop through the uploaded files
            for ($i = 0; $i < count($new_all_pics_files['name']); $i++) {
                // Get the file name and temporary location
                $pic_name = $new_all_pics_files['name'][$i];
                $tmp_name = $new_all_pics_files['tmp_name'][$i];      
                move_uploaded_file($tmp_name, "./assets/projects_files/" . $pic_name);
            }
        }
        if (!empty($new_file_link['name'])) {
            $pic_name = $new_file_link['name'];
            $tmp_name = $new_file_link['tmp_name'];      
            move_uploaded_file($tmp_name, "./assets/projects_files/" . $pic_name);
        }
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
        $query = "DELETE FROM " . $table . " WHERE ID = " . $row_id;
        if (mysqli_query($connect, $query)) {
            unlink("./assets/projects_files/" . $file_name)
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
    <title>Projects - Admin</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
	
    <link href="assets/css/select2.min.css" rel="stylesheet" >
	<link href="assets/css/checkbox3.min.css" rel="stylesheet" >
        <!-- Custom Styles-->
        <link href="assets/css/custom-styles.css" rel="stylesheet" />
        <link href="../css/resp-grid.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style>
            .succes {
                background-color: #4BB543;
              }
              .succes-animation {
                box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .4);
              }
              .danger {
                background-color: #CA0B00;
              }
              .danger-animation {
                box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .4);
              }
              .custom-modal {
                z-index: 99999999;
                position: absolute;
                width: 350px;
                min-height: 250px;
                background-color: #fff;
                border-radius: 30px;
                margin: 40px 10px;
                animation: succes-div 0.4s ease-out;
              }
              .custom-modal .content { 
                position: absolute;
                width: 100%;
                text-align: center;
                bottom: 0;
              }
              .custom-modal .content .type {
                font-size: 18px;
                color: #999;
              }
              .custom-modal .content .message-type {
                font-size: 24px;
                color: #000;
              }
              .custom-modal .border-bottom {
                position: absolute;
                width: 300px;
                height: 20px;
                border-radius: 0 0 30px 30px;
                bottom: -20px;
                margin: 0 25px;
              }
              .custom-modal .icon-top {
                position: absolute;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                top: -30px;
                margin: 0 125px;
                font-size: 30px;
                color: #fff;
                line-height: 100px;
                text-align: center;
              }
              .page-wrapper-alt {
                position: fixed;
                height: 100vh;
                background-color: #111;
                display: none;
                align-items: center;
                justify-content: center;
                padding: 80px 0;
                width: 100%;
                z-index: 99999;
                opacity: 0.8;
              }
              @keyframes succes-div { 
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
              }

              </style>

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
                        <a href="resume.php"><i class="fa fa-file-text"></i> Resume</a>
                    </li>
                    
                    <li>
                        <a class="active-menu" href="projects.php"><i class="fa fa-tasks"></i> Projects</a>
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


        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <!-- البيانات الظاهرة للمستخدم -->
                    <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                        Data Form / Add Somthig
                    </div> 
                    <div class="panel-body">
                    <form action="./projects.php" method="POST" enctype="multipart/form-data">
                        <div class="sub-title">
                            Choose a project cover photo
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="cover_pic" />
                        </div>
                        <div class="sub-title">
                            Write a simple description of the project
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="simple_des" />
                        </div>
                        <div class="sub-title">
                            Select all project images
                        </div>
                        <div class="form-group">
                            <input id="allFiles" type="file" class="form-control" name="all_pics[]" multiple>
                        </div>
                        <div class="sub-title">
                        Write a full project description. (You can use brackets, dashes, and underscores, and to make text bold, put it in double brackets)
                        </div>
                        <div class="form-group">
                            <textarea id="textarea" onkeydown="handleKeyDown(event)" class="form-control" rows="4" name="full_des"></textarea>
                        </div>
                        <div class="sub-title">
                            Choose file link
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file_link" />
                        </div>
                        <button type="submit" class="btn btn-primary" name="project_send">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>


<?php
//how to know lenght of array in php?
// insert
// insert
// insert
if (isset($_POST['project_send'])) {
    $cover_pic = $_FILES['cover_pic'];
    $cover_pic_name = $cover_pic['name'];
    $simple_des = $_POST['simple_des'];
    $full_des = $_POST['full_des'];
    $all_pics = $_FILES['all_pics'];
    $all_pics_names = ($all_pics['name']);
    $file_link = $_FILES['file_link'];
    $file_link_name = $file_link['name'];
    insertRow("projects", ["COVER_IMG" ,"TITLE", "FULL_DES", "ATTACH"], [$cover_pic_name, $simple_des, $full_des, $file_link_name], $cover_pic, $all_pics, $file_link);
    
    $project_id = mysqli_query($connect, "SELECT ID FROM projects ORDER BY ID DESC LIMIT 1");
    $row = mysqli_fetch_assoc($project_id);

   for($i = 0; $i < count($all_pics_names); $i++){
       insertRow("projects_img", ["PROJECT_ID", "IMG"], [$row['ID'], $all_pics_names[$i]], '', $all_pics, '');
   }


}
?>
<script>
    var kkk = document.getElementById("allFiles");
    kkk.onchange = () => {
        console.log(kkk);
    }
    // <textarea id="textarea" onkeydown="handleKeyDown(event)"></textarea>
    //   function handleKeyDown(event) {
    //     // Check if the Enter key was pressed
    //     if (event.keyCode === 13) {
    //       // Insert a line break
    //       event.target.value += '\n';
    //         console.log(event.target.value);
    //       // Prevent the default action of the Enter key
    //       event.preventDefault();
    //     }
    //   }
</script>
<?php
    // $O_T = str_replace("((","<b>", $_POST['new_email']);
    // $C_T = str_replace("))","</b>", $O_T);
    // // Get the textarea value
    // $text = $_POST['textarea'];
    // // Convert newlines to <br> tags
    // $text = nl2br($text);
    // echo $text;
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
                                <th>Cover pic</th>
                                <th>Title</th>
                                <th>All pics</th>
                                <th>Descriotion</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql_s = 'SELECT * FROM projects';
                            $result = mysqli_query($connect, $sql_s);
                            $id_num = 1;
                            if(isset($result)){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td style=" padding: 10px;"><?php echo $id_num++ ?></td>
                                <td style=" padding: 10px;"><?php echo $row['COVER_IMG'] ?></td>
                                <td style=" padding: 10px;"><?php echo $row['TITLE'] ?></td>
                                <td style=" padding: 10px;">
                                    <?php
                                        $sql_img = 'SELECT * FROM projects_img';
                                        $result_img = mysqli_query($connect, $sql_img);
                                        if(isset($result_img)){
                                            while($row_img = mysqli_fetch_assoc($result_img)){
                                                echo '<span><img style="width:40px; margin: 3px" src="../dashbord_admin/assets/projects_files/' . $row_img['IMG'] . '" /></span>';
                                            }
                                        }      
                                    ?>
                                </td>
                                <td style=" padding: 10px;"><?php echo $row['FULL_DES'] ?></td>
                                <td style=" padding: 10px;"><?php echo $row['ATTACH'] ?></td>
                                <td style=" padding: 10px;">
                                    <form action="./projects.php" method="POST">
                                        <input type="submit" name="delete_project" value="Delete" class="btn btn-danger">
                                        <!-- <input type="hidden" name="del_file_hidden" value="<?php // echo $row['FILE_LINK'] ?>"> -->
                                        <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
                                        <button type="submit" style="margin-left: 15px;" name="edit_proj_btn" id="edit_proj_btn" class="btn btn-primary">Edit</button>
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

<?php
    $delete_project = $_POST['delete_project'];
    if(isset($delete_project)){
        $id = $_POST['id'];
        deleteRow("projects", $id, '');
    }
?>

<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  فورم التعديل  ////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $edit_proj_btn = $_POST['edit_proj_btn'];
    if(isset($edit_proj_btn)){
        $id = $_POST['id'];
        $sql_update = 'SELECT * FROM projects WHERE ID = ' . $id;
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
                    <form action="./projects.php" method="POST" enctype="multipart/form-data" id="editForm">
                        <div class="form-group">
                            <label for="">project cover photo</label><br />
                            <label for="">The old file was: <?php echo $row['COVER_PIC_NAME']; ?></label><br />
                            <label for="">choose new file</label>
                            <input type="file" class="form-control" name="new_cover_pic" id="new_cover_pic"/>                            
                            <input type="hidden" name="old_cover_pic" value="<?php echo $row['COVER_PIC_NAME']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Write new simple description for the project</label>
                            <input type="text" class="form-control" name="new_simple_des" value="<?php echo $row['SIMPLE_DES']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">project images</label><br />
                            <label for="">This is old files, check images that you want to delete it: </label><br />

                            <?php 
                                $imageNames = unserialize($row['ALL_PICS_NAMES']);
                                echo '<div class="parent-custom" style="align-items: flex-end; justify-content: center;">';
                                foreach ($imageNames as $index => $imageName) {
                                    // Generate the img element
                                    $img = '<img style="width: 60px" src="./assets/projects_files/' . $imageName . '">';
                                    // Generate the input element
                                    $box_name = "delete_" . $index;
                                    $input = '<input type="checkbox" name="' . $box_name . '" value="' . $index . '">';
                                    // Output the img and input elements
                                    echo '<div style="margin: 0 10px; display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 1rem">' . $img . $input . '</div>';
                                }
                                echo '</div>';
                            ?>
                            <label for="">or choose new files</label>
                            <input type="file" class="form-control" name="new_all_pics[]" multiple/>                            
                            <!-- <input type="hidden" name="old_all_pics" value="<?php // echo $row['ALL_PICS_NAMES'] ?>"> -->
                        </div>
                        <div class="form-group">
                            <label for="">Write new full project description. (You can use brackets, dashes, and underscores, and to make text bold, put it in double brackets)</label>
                            <textarea style="height: 100px;" class="form-control" name="new_full_des"><?php echo $row['FULL_DES'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">The old file was: <?php echo $row['FILE_LINK'] ?></label><br />
                            <label for="">Check this box if you want to delete it <input type="checkbox" name="checkbox_to_del" id="checkbox_to_del"></label><br />
                            <label for="">Or choose new file</label>
                            <input type="file" class="form-control" name="new_file_link" id="new_file_link">
                            <input type="hidden" name="old_file_link" value="<?php echo $row['FILE_LINK'] ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
                        <button type="submit" class="btn btn-primary" name="proj_update_btn">Update</button>
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
    $proj_update_btn = $_POST['proj_update_btn'];
    if(isset($proj_update_btn)){

        $id = $_POST['id'];

        $new_cover_pic = $_FILES['new_cover_pic'];

        if(!empty($_FILES['new_cover_pic']['name'])){
            $new_cover_pic_name = $_FILES['new_cover_pic']['name'];
        } else {
            $new_cover_pic_name = $_POST['old_cover_pic'];
        }

        $new_simple_des = str_replace("'", "\'", $_POST['new_simple_des']);

        $new_all_pics_files = $_FILES['new_all_pics'];

        if (!empty($_FILES['new_all_pics']['name'][0])) {
            $sql_qq = 'SELECT ALL_PICS_NAMES FROM projects WHERE ID = ' . $id;
            $result_qq = mysqli_query($connect, $sql_qq);
            if(isset($result_qq)){
                while($row_qq = mysqli_fetch_assoc($result_qq)){
                    $old_pics1 = unserialize($row['ALL_PICS_NAMES']);
                }
                $new_pics1 = $_FILES['new_all_pics']['name'];
                $new_all_pics_arr = array_merge($old_pics1, $new_pics1);
                $new_all_pics = serialize($new_all_pics_arr);
            }
        } else {
            $sql_qq = 'SELECT ALL_PICS_NAMES FROM projects WHERE ID = ' . $id;
            $result_qq = mysqli_query($connect, $sql_qq);
            if(isset($result_qq)){
                while($row_qq = mysqli_fetch_assoc($result_qq)){
                    $imageNames = unserialize($row['ALL_PICS_NAMES']);
                    foreach ($imageNames as $index => $imageName) {
                        $box_name = "'delete_" . $index . "'";
                        $checkbox = $_POST[$box_name];
                        if (isset($checkbox)) {
                            // The checkbox was checked
                            unset($imageNames[$index]);
                            unlink("./assets/projects_files/" . $imageName);
                        }
                    }
                    // Reindex the array
                    $new_all_pics_arr = array_values($imageNames);
                    $new_all_pics = serialize($new_all_pics_arr);
                }   
            }
        }

        $new_full_des = $_POST['new_full_des'];

        $new_file_link = $_FILES['new_file_link'];
        $old_file_link = $_POST['old_file_link'];

        $checkbox_to_del = $_POST['checkbox_to_del'];
        if(empty($_FILES['new_file_link']['name'])){ 
            $new_file_name = $old_file_link;
            if($checkbox_to_del == true){
                unlink("./assets/projects_files/" . $new_file_name);
                $new_file_name = "No file selected";
            }
        }else{
            $new_file_name = $_FILES['new_file_link']['name'];
            unlink("./assets/projects_files/" . $old_file_link);
            if($checkbox_to_del == true){
                unlink("./assets/projects_files/" . $new_file_name);
                $new_file_name = "No file selected";
            }    
        }
        if(strpos($new_file_name, "'") >= 0){
            $errore_msg = "File name contains quotes";
        }
        updateRow("projects", ["COVER_PIC_NAME" => $new_cover_pic_name, "SIMPLE_DES" => $new_simple_des, "ALL_PICS_NAMES" => $new_all_pics, "FULL_DES" => $new_full_des, "FILE_LINK" => $new_file_name], $new_cover_pic, $new_all_pics_files, $new_file_link, $id,$errore_msg);
        // insertRow("projects", ["COVER_PIC_NAME" ,"SIMPLE_DES", "ALL_PICS_NAMES", "FULL_DES", "FILE_LINK"], [$cover_pic_name, $simple_des, $all_pics_names, $full_des, $file_link_name], $cover_pic, $all_pics, $file_link);

    }
?>













<!-- 

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Basic example</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="checkbox">
                                          <div class="checkbox3 checkbox-round">
                                            <input type="checkbox" id="checkbox-1">
                                            <label for="checkbox-1">
                                              Check me out
                                            </label>
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">					
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Inline form</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label for="exampleInputName2">Name</label>
                                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                                        </div>
                                        <button type="submit" class="btn btn-default">Send invitation</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Horizontal form</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                              <div class="checkbox3 checkbox-round checkbox-check checkbox-light">
                                                <input type="checkbox" id="checkbox-10">
                                                <label for="checkbox-10">
                                                  Remember me
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
               
			<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
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
	<script src="assets/js/select2.full.min.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>    
</body>
</html>











<!-- 



                    
                                    <div>
                                        <input type="checkbox" class="toggle-checkbox" name="my-checkbox" checked>
                                    </div>
                                    <div class="sub-title">Select</div>
                                    <div>
                                        <select class="selectbox">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                            <optgroup label="Mountain Time Zone">
                                                <option value="AZ">Arizona</option>
                                                <option value="CO">Colorado</option>
                                                <option value="ID">Idaho</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Utah</option>
                                                <option value="WY">Wyoming</option>
                                            </optgroup>
                                            <optgroup label="Central Time Zone">
                                                <option value="AL">Alabama</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TX">Texas</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="WI">Wisconsin</option>
                                            </optgroup>
                                            <optgroup label="Eastern Time Zone">
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="IN">Indiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="OH">Ohio</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WV">West Virginia</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
    
                        <div class="sub-title">Checkboxes and radios </div>
                            <div>
                                <div class="checkbox3 checkbox-round">
                                    <input type="checkbox" id="checkbox-2">
                                          <label for="checkbox-2">
                                            Option one is this and that&mdash;be sure to include why it's great
                                          </label>
                                        </div>
                                        <div class="checkbox3 checkbox-round">
                                          <input type="checkbox" id="checkbox-3" disabled="">
                                          <label for="checkbox-3">
                                            Option two is disabled
                                          </label>
                                        </div>
                                        <div class="radio3">
                                          <input type="radio" id="radio1" name="radio1" value="option1">
                                          <label for="radio1">
                                            Option one is this and that&mdash;be sure to include why it's great
                                          </label>
                                        </div>
                                        <div class="radio3">
                                          <input type="radio" id="radio2" name="radio1" value="option2">
                                          <label for="radio2">
                                            Option two can be something else and selecting it will deselect option one
                                          </label>
                                        </div>
                                        <div class="sub-title">Inline</div>
                                        <div>
                                          <div class="checkbox3 checkbox-inline checkbox-check checkbox-light">
                                            <input type="checkbox" id="checkbox-fa-light-1" checked="">
                                            <label for="checkbox-fa-light-1">
                                              Option1
                                            </label>
                                          </div>
                                          <div class="checkbox3 checkbox-success checkbox-inline checkbox-check checkbox-round checkbox-light">
                                            <input type="checkbox" id="checkbox-fa-light-2" checked="">
                                            <label for="checkbox-fa-light-2">
                                              Option Round
                                            </label>
                                          </div>
                                          <div class="checkbox3 checkbox-danger checkbox-inline checkbox-check  checkbox-circle checkbox-light">
                                            <input type="checkbox" id="checkbox-fa-light-3" checked="">
                                            <label for="checkbox-fa-light-3">
                                              Option Circle
                                            </label>
                                          </div>
                                        </div>
                                        <div>
                                          <div class="radio3 radio-check radio-inline">
                                            <input type="radio" id="radio4" name="radio2" value="option1" checked="">
                                            <label for="radio4">
                                              Option 1
                                            </label>
                                          </div>
                                          <div class="radio3 radio-check radio-success radio-inline">
                                            <input type="radio" id="radio5" name="radio2" value="option2">
                                            <label for="radio5">
                                              Option 2
                                            </label>
                                          </div>
                                          <div class="radio3 radio-check radio-warning radio-inline">
                                            <input type="radio" id="radio6" name="radio2" value="option3">
                                            <label for="radio6">
                                              Option 3
                                            </label>
                                          </div>
                                        </div>
                                    </div> 

 -->