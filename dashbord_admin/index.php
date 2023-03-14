<!DOCTYPE html>
<?php
    include('./conn.php'); 
?>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Dashboard</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
				<div id="sideNav">
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
                        <a class="active-menu" href="index.php"><i class="fa fa-table"></i> Dashboard</a>
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
		  <div class="header"> 
                        <h1 class="page-header">
                            Summary
                        </h1>
						<ol class="breadcrumb">
					  <li class="active">Dashboard Data</li>
					</ol> 						
		</div>
            <div id="page-inner"> 
            <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="panel panel-default">
        <div class="panel-heading">
        Home page
        </div> 
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Description</th>
                            <th>Picture Name</th>
                            <th>Picture</th>
                        </tr>
                    </thead>
<?php
      $sql_s = 'SELECT * FROM home';
      $result = mysqli_query($connect, $sql_s);
      if(isset($result)){
        while($row = mysqli_fetch_assoc($result)){
?>
<tbody>
<tr>
<td style=" padding: 10px;"><?php echo $row['FIRST_NAME'] ?></td>
<td style=" padding: 10px;"><?php echo $row['LAST_NAME'] ?></td>
<td style=" padding: 10px;"><?php echo $row['DESCRIP'] ?></td>
<td style=" padding: 10px;"><?php echo $row['FILE_LINK'] ?></td>
<td style=" padding: 10px;"><img src="./assets/img/<?php echo $row['FILE_LINK'] ?>" width="35px"></td>
</tr>
        </tbody>
<?php
      }
    }
?>
            </table>
        </div>
    </div>
    </div>

    </div>
    </div>
    <!-- /. ROW  -->













               
            <div class="row">
                <div class="col-md-12">









                     <!--   Basic Table  -->
                     <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="panel panel-default">
        <div class="panel-heading">
            About page
        </div> 
        <div class="panel-body">
            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Summary</th>
                            <th>Date_of_birth</th>
                            <th>E-mail</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th>CV file</th>
                        </tr>
                    </thead>
<?php
      $sql_s = 'SELECT * FROM about';
      $result = mysqli_query($connect, $sql_s);
      if(isset($result)){
        while($row = mysqli_fetch_assoc($result)){
?>
<tbody>
<tr>
<td style=" padding: 10px;"><?php echo $row['SUMMARY'] ?></td>
<td style=" padding: 10px;"><?php echo $row['DATE_OF_BIRTH'] ?></td>
<td style=" padding: 10px;"><?php echo $row['E_MAIL'] ?></td>
<td style=" padding: 10px;"><?php echo $row['PHONE_NUMBER'] ?></td>
<td style=" padding: 10px;"><?php echo $row['ADDRESS'] ?></td>
<td style=" padding: 10px;"><?php echo $row['CV_FILE'] ?></td>
</tr>
</tbody>
<?php
      }
    }
?>
            </table>
        </div>
    </div>
    </div>

    </div>
    </div>
    <!-- /. ROW  -->
                      <!-- End  Basic Table  -->










                </div>
            </div>
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                      <!--    Striped Rows Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Skills page
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
                        </tr>
                    </thead>
<?php
      $sql_s = 'SELECT * FROM skills ORDER BY SKILL_CATEGORY';
      $result = mysqli_query($connect, $sql_s);
      $id_num = 1;
      if(isset($result)){
        while($row = mysqli_fetch_assoc($result)){
?>
<tbody>
<tr>
<td style=" padding: 10px;"><?php echo $id_num++ ?></td>
<td style=" padding: 10px;"><?php echo $row['SKILL_CATEGORY'] ?></td>
<td style=" padding: 10px;"><?php echo $row['SKILL_NAME'] ?></td>
<td style=" padding: 10px;"><?php echo $row['SKILL_RATIO'] . "%" ?></td>
</tr>
        </tbody>
<?php
      }
    }
?>
            </table>
                            </div>
                        </div>
                    </div>
                    <!--  End  Striped Rows Table  -->
                </div>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Resume page
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                            <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 1%;">No.</th>
                            <th>Category</th>
                            <th>Title</thstyle=>
                            <th>Descriotion</th>
                            <th>Date</thstyle=>
                            <th>File Name</th>
                        </tr>
                    </thead>
<?php
      $sql_s = 'SELECT * FROM resum_ ORDER BY CATEGORY';
      $result = mysqli_query($connect, $sql_s);
      $id_num = 1;
      if(isset($result)){
        while($row = mysqli_fetch_assoc($result)){
?>
<tbody>
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
</tr>
        </tbody>
<?php
      }
    }
?>
            </table>

                        </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>
                <!-- /. ROW  -->





    <!-- ////////////////////////////////  جدول قاعدة RESUME  /////////////////////////////// -->
    <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        Languages
        </div> 
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Languages</th>
                        <th>percentage</th>
                        </tr>
                    </thead>
<?php
      $sql_s = 'SELECT NUM, LANGUAGES, PERCENTAGE FROM lang_intr';
      $result = mysqli_query($connect, $sql_s);
      $counter_lang = 1;
      if(isset($result)){
        while($row = mysqli_fetch_assoc($result)){
            if($row['LANGUAGES'] != null && $row['PERCENTAGE'] != null){
?>
<tbody>
<tr>
<td style="padding: 10px;" id="counter_lan"><?php echo $counter_lang++ ?></td>
<td style="padding: 10px;" id=""><?php echo $row['LANGUAGES'] ?></td>
<td style="padding: 10px;" id=""><?php echo $row['PERCENTAGE'] . '%'?></td>
</tr>
        </tbody>
<?php
      }
    }
}
?>

            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /. ROW  -->







    <!-- ////////////////////////////////  جدول قاعدة RESUME  /////////////////////////////// -->
    <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        Interests
        </div> 
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Interest</th>
                        </tr>
                    </thead>
<?php
      $sql_s = 'SELECT NUM, INTERESTS FROM lang_intr';
      $result = mysqli_query($connect, $sql_s);
      $counter_lang = 1;
      if(isset($result)){
        while($row = mysqli_fetch_assoc($result)){
            if($row['INTERESTS'] != null){
?>
<tbody>
<tr>
<td style="padding: 10px;" id="counter_intr"><?php echo $counter_lang++ ?></td>
<td style="padding: 10px;" id=""><?php echo $row['INTERESTS'] ?></td>
</tr>
        </tbody>
<?php
      }
    }
}
?>

            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /. ROW  -->
















                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 Projectes
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="width: 1%;">No.</th>
                                            <th>Cover pic</th>
                                            <th>Title</th>
                                            <th>All pics</th>
                                            <th>Descriotion</th>
                                            <th>Attachment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql_s = 'SELECT * FROM projects';
                                            $result = mysqli_query($connect, $sql_s);
                                            $id_num = 1;
                                            if(isset($result)){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $proId = $row['ID'];
                                        ?>
                                            <tr>
                                                <td style=" padding: 10px;"><?php echo $id_num++ ?></td>
                                                <td style=" padding: 10px;"><?php echo $row['COVER_IMG'] ?></td>
                                                <td style=" padding: 10px;"><?php echo $row['TITLE'] ?></td>
                                                <td style=" padding: 10px;">
                                                    <?php
                                                        $sql_img = 'SELECT * FROM projects_img WHERE PROJECT_ID = ' . $proId;
                                                        $result_img = mysqli_query($connect, $sql_img);
                                                        if(isset($result_img)){
                                                            $imgs_array = array();
                                                            $imgs_ids = array();
                                                            while($row_img = mysqli_fetch_assoc($result_img)){
                                                                echo '<span><img style="width:40px; margin: 3px" src="../dashbord_admin/assets/projects_files/' . $row_img['IMG'] . '" /></span>';
                                                                array_push($imgs_array, $row_img['IMG']);
                                                                array_push($imgs_ids, $row_img['ID']);
                                                            }
                                                            $imgs_arr_to_text = json_encode($imgs_array);
                                                            $imgs_ids_to_text = json_encode($imgs_ids);
                                                        }      
                                                    ?>
                                                </td>
                                                <td style=" padding: 10px;"><?php echo $row['FULL_DES'] ?></td>
                                                <td style=" padding: 10px;"><?php echo $row['ATTACH'] ?></td>
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
                        <!--End Advanced Tables -->
                    </div>
                </div>
                    <!-- /. ROW  -->
    


            <div class="row">
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Hover Rows
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
                <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Footer & Social media
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="success">
                                            <td>1</td>
                                            <td>Whatsapp</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr class="info">
                                            <td>2</td>
                                            <td>Facebook</td>
                                            <td>Thornton</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
