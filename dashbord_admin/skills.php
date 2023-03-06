<!DOCTYPE html>
<?php 
    include('./conn.php'); 
?>
<?php
    // insert function
    function insertRow($table, $columns, $values) {
        include('./conn.php'); 
        $columnString = implode(",", $columns);
        $valueString = "'" . implode("','", $values) . "'";
        $query = "INSERT INTO $table ($columnString) VALUES ($valueString)";
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
                        pop_alert.innerHTML = '<div class="custom-modal"><div class="danger danger-animation icon-top"><i class="fa fa-times"></i></div><div class="danger border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">A Problem Occurred</p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-danger" style="margin-bottom: 1rem;">Close</button></div></div>';
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
function updateRow($table, $data, $id) {
    include('./conn.php'); 
    $query = "UPDATE $table SET ";
    foreach ($data as $key => $value) {
        $query .= "$key = '$value',";
    }
    // Remove trailing comma
    $query = rtrim($query, ",");
    $query .= " WHERE NUM = $id";
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
                pop_alert.innerHTML = '<div class="custom-modal"><div class="danger danger-animation icon-top"><i class="fa fa-times"></i></div><div class="danger border-bottom"></div><div class="content"><p class="type">Alert</p><p class="message-type">A Problem Occurred</p><button onClick="window.location.href=window.location.href" id="alert_close_btn" class="btn btn-danger" style="margin-bottom: 1rem;">Close</button></div></div>';
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
    function deleteRow($table, $row_id) {
        include('./conn.php');
        $query = "DELETE FROM " . $table . " WHERE NUM = " . $row_id;
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
    <title>Skills - Admin</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
                        <a href="about.php"><i class="fa fa-info"></i> About</a>
                    </li> 
					 
					 <li>
                        <a class="active-menu" href="skills.php"><i class="fa fa-star"></i> Skills<span class="fa arrow"></span></a>
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
                <!-- /. ROW  -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  فورم الاضافة  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- <div class="row"> -->
<div class="row" id="dataForm1">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- ////////////////////////////////  فورم اضافة summary  /////////////////////////////// -->
        <div class="panel panel-default">
            <div class="panel-heading bg-secondary" style="background-color: #bbb;">
                Data Form
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./skills.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Write somthig as a summary</label>
                            <textarea style="height: 100px;" class="form-control" placeholder="Summary about your skills" name="skills_summary" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="summary_send" id="send_btn1">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $summary_send = $_POST['summary_send'];
    if(isset($summary_send)){
        $skills_summary = str_replace("'", "\'", $_POST['skills_summary']);
        insertRow("skills_summary", ["SKILLS_SUMMARY"], [$skills_summary]);
    }
?>
<!-- ////////////////////////////////  جدول قاعدة summary  /////////////////////////////// -->
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql_s = 'SELECT * FROM skills_summary';
                                $result = mysqli_query($connect, $sql_s);
                                if(isset($result)){
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td style="padding: 10px;" id="counter_id1"><?php echo $row['SKILLS_SUMMARY'] ?></td>
                                    <td>
                                        <form action="./skills.php" method="POST">
                                            <input type="submit" name="del_skills_summary" value="Delete" class="btn btn-danger">
                                            <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                                            <button type="submit" style="margin-left: 15px;" name="edit_summary_btn" id="edit_btn" class="btn btn-primary">Edit</button>
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
    var dataForm1 = document.getElementById("dataForm1");
    var counter_id1 = document.getElementById("counter_id1");
    if(counter_id1.textContent.length != 0){
        send_btn1.setAttribute('disabled', '');
        dataForm1.setAttribute('style', 'display: none');
    }else{
        send_btn1.removeAttribute('disabled');
        dataForm1.removeAttribute('style');
    }
</script>
<?php
    $edit_summary_btn = $_POST['edit_summary_btn'];
    if(isset($edit_summary_btn)){
        $id = $_POST['id'];
        $sql_update = 'SELECT * FROM skills_summary WHERE NUM = ' . $id;
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
                    <form action="./skills.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Write somthig new as a summary</label>
                            <textarea style="height: 100px;" class="form-control" placeholder="Summary about your skills" name="new_skills_summary" id="foucs_skills_summary" required><?php echo $row['SKILLS_SUMMARY'] ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                        <button type="submit" class="btn btn-primary" name="update_summary_btn" id="update_summary_btn">Update</button>
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
<!-- update -->
<?php
    $update_summary_btn = $_POST['update_summary_btn'];
    if(isset($update_summary_btn)){
    $id = $_POST['id'];
    $new_skills_summary = str_replace("'", "\'", $_POST['new_skills_summary']);
    updateRow("skills_summary", ["SKILLS_SUMMARY" => $new_skills_summary] ,$id);
  }
?>
<!-- delete -->
<?php
    $del_skills_summary = $_POST['del_skills_summary'];
    if(isset($del_skills_summary)){
        $id = $_POST['id'];
        deleteRow("skills_summary", $id);
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
                Data Form / Add Skill
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="./skills.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Create a category</label>
                            <select class="form-control" id="select_category" name="select_category" required>
                                <option value="">--Choose--</option>
                                <option value="custom_value">Enter custom value</option>
                                <?php
                                    $sql_s = 'SELECT DISTINCT SKILL_CATEGORY FROM skills';
                                    $result = mysqli_query($connect, $sql_s);
                                    if(isset($result)){
                                        while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $row['SKILL_CATEGORY'] ?>"><?php echo $row['SKILL_CATEGORY'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <input style="margin-top: 0.5rem;" type="text" class="form-control" required name="select_custom_category" disabled placeholder="Enter custom value" id="custom_value_input">
                        </div>
                        <div class="form-group">
                            <label for="">Skill name</label>
                            <input type="text" class="form-control" name="skill_name" required>
                        </div>
                        <div class="form-group">
                            <label for="">skill ratio (<span id="show_range_value"></span>%)</label>
                            <input type="range" class="form-control" name="skill_ratio" required min="5" max="100" step="5" value="50" id="range_value">
                        </div>
                        <button type="submit" class="btn btn-primary" name="send">Submit</button>
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
    var show_range_value = document.getElementById("show_range_value");
    var range_value = document.getElementById("range_value");
    show_range_value.textContent = range_value.value;
    range_value.oninput = () => {
        show_range_value.textContent = range_value.value;
    }
</script>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  الاضافة  /////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $send = $_POST['send'];
    if(isset($send)){
        if(empty($_POST['select_custom_category'])){
            $category = str_replace("'", "\'", $_POST['select_category']);
        }else{
            $category = str_replace("'", "\'", $_POST['select_custom_category']);
        }
        $skill_name = str_replace("'", "\'", $_POST['skill_name']);
        $skill_ratio = $_POST['skill_ratio'];
        insertRow("skills", ["SKILL_CATEGORY", "SKILL_NAME", "SKILL_RATIO"], [$category, $skill_name, $skill_ratio]);
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
                                <th>No.</th>
                                <th>Category</th>
                                <th>Skill name</th>
                                <th>Skill ratio</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql_s = 'SELECT * FROM skills ORDER BY SKILL_CATEGORY';
                                $result = mysqli_query($connect, $sql_s);
                                $id_num = 1;
                                if(isset($result)){
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td style=" padding: 10px;"><?php echo $id_num++ ?></td>
                                    <td style=" padding: 10px;"><?php echo $row['SKILL_CATEGORY'] ?></td>
                                    <td style=" padding: 10px;"><?php echo $row['SKILL_NAME'] ?></td>
                                    <td style=" padding: 10px;"><?php echo $row['SKILL_RATIO'] . "%" ?></td>
                                    <td style=" padding: 10px; display:flex;">
                                        <form action="./skills.php" method="POST">
                                            <input type="submit" name="del" value="Delete" class="btn btn-danger">
                                            <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                                            <button type="submit" style="margin-left: 15px;" name="edit_skill_btn" id="edit_skill_btn" class="btn btn-primary">Edit</button>
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
    $edit_skill_btn = $_POST['edit_skill_btn'];
    if(isset($edit_skill_btn)){
        $id = $_POST['id'];
        $sql_update = 'SELECT * FROM skills WHERE NUM = ' . $id;
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
                    <form action="./skills.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Change category</label>
                            <select class="form-control" id="select_category_edit" name="new_select_category" required>
                                <option value="<?php echo $row['SKILL_CATEGORY'] ?>"><?php echo $row['SKILL_CATEGORY'] ?></option>
                                <option value="custom_value">Enter custom value</option>
                                <?php
                                    $sql_sk = 'SELECT DISTINCT SKILL_CATEGORY FROM skills';
                                    $result_in = mysqli_query($connect, $sql_sk);
                                    if(isset($result_in)){
                                        while($row_in = mysqli_fetch_assoc($result_in)){
                                ?>
                                <option value="<?php echo $row_in['SKILL_CATEGORY'] ?>"><?php echo $row_in['SKILL_CATEGORY'] ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <input style="margin-top: 0.5rem;" type="text" class="form-control" required name="select_new_custom_category" disabled placeholder="Enter custom value" id="custom_value_input_edit">
                        </div>
                        <div class="form-group">
                            <label for="">New skill name</label>
                            <input type="text" class="form-control" name="new_skill_name" required value="<?php echo $row['SKILL_NAME'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">New skill ratio (<span id="show_range_value_edit"></span>%)</label>
                            <input type="range" class="form-control" name="new_skill_ratio" required min="5" max="100" step="5" value="<?php echo $row['SKILL_RATIO'] ?>" id="range_value_edit">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row['NUM'] ?>">
                        <button type="submit" class="btn btn-primary" name="skill_update_btn">Update</button>
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
    var show_range_value_edit = document.getElementById("show_range_value_edit");
    var range_value_edit = document.getElementById("range_value_edit");
    show_range_value_edit.textContent = range_value_edit.value;
    range_value_edit.oninput = () => {
        show_range_value_edit.textContent = range_value_edit.value;
    }
</script>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  حذف  //////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $del = $_POST['del'];
    if(isset($del)){
        $id = $_POST['id'];
        deleteRow("skills", $id);
    }
?>
<!-- /////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////  تعديل  ///////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////// -->
<?php
    $skill_update_btn = $_POST['skill_update_btn'];
    if(isset($skill_update_btn)){
        $id = $_POST['id'];
        if(empty($_POST['select_new_custom_category'])){
            $new_select_category = str_replace("'", "\'", $_POST['new_select_category']);
        }else{
            $new_select_category = str_replace("'", "\'", $_POST['select_new_custom_category']);
        }
        $new_skill_name = str_replace("'", "\'", $_POST['new_skill_name']);
        $new_skill_ratio = $_POST['new_skill_ratio'];
        updateRow("skills", ["SKILL_CATEGORY" => $new_select_category, "SKILL_NAME" => $new_skill_name, "SKILL_RATIO" => $new_skill_ratio], $id);
    }
?>             
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    </div>
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Chart Js -->
    <script type="text/javascript" src="assets/js/Chart.min.js"></script>  
    <script type="text/javascript" src="assets/js/chartjs.js"></script> 
     <!-- Morris Chart Js -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>