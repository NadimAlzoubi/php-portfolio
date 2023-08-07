<?php
  include('../includes/conn.php'); 
  include('../includes/functions.php');
  include('../includes/adminHeader.php');
?>
<div id="page-wrapper" >
  <div class="header"> 
  </div>
  <div id="page-inner"> 
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            About Data
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
                    $abouts = getAllAboutDate();
                    foreach($abouts as $about){
                  ?>
                  <tr>
                    <th>First Name</th>
                    <td><?php echo $about['FIRST_NAME'] ?></td>
                  </tr>
                  <tr>
                    <th>Last Name</th>
                    <td><?php echo $about['LAST_NAME'] ?></td>
                  </tr>
                  <tr>
                    <th>Job title</th>
                    <td><?php echo $about['JOB_TITLE'] ?></td>
                  </tr>
                  <tr>
                    <th>Date of birth</th>
                    <td><?php echo $about['DATE_OF_BIRTH'] ?></td>
                  </tr>
                  <tr>
                    <th>About Me</th>
                    <td><?php echo $about['ABOUT_ME'] ?></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td><?php echo $about['ADDRESS'] ?></td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td><?php echo $about['PHONE_NUMBER'] ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><?php echo $about['EMAIL'] ?></td>
                  </tr>
                  <tr>
                    <th>Linkedin link</th>
                    <td><?php echo $about['LINKEDIN'] ?></td>
                  </tr>
                  <tr>
                    <th>YouTube link</th>
                    <td><?php echo $about['YOUTUBE'] ?></td>
                  </tr>
                  <tr>
                    <th>Instagram link</th>
                    <td><?php echo $about['INSTAGRAM'] ?></td>
                  </tr>
                  <tr>
                    <th>WhatsApp link</th>
                    <td><?php echo $about['WHATSAPP'] ?></td>
                  </tr>
                  <tr>
                    <th>Telegram link</th>
                    <td><?php echo $about['TELEGRAM'] ?></td>
                  </tr>
                  <tr>
                    <th>CV File</th>
                    <td><?php echo $about['CV_FILE_NAME'] ?> <a href="../assets/<?php echo $about['CV_FILE_NAME'] ?>" style="margin-left: 1em;" target="_blank">view ↗</a></td>
                  </tr>
                  <tr>
                    <th>Nice/Cover image</th>
                    <td><?php echo $about['COVER_IMG_NAME'] ?> <img src="../assets/<?php echo $about['COVER_IMG_NAME'] ?>" style="width: 50px; margin-left: 1em" /></td>
                  </tr>
                  <tr>
                    <th>Personal image</th>
                    <td><?php echo $about['PERSONAL_IMG_NAME'] ?>  <img src="../assets/<?php echo $about['PERSONAL_IMG_NAME'] ?>" style="width: 50px; margin-left: 1em" /></td>
                  </tr>
                  <tr>
                    <th>Options</th>
                    <td>
                      <a href="./editabout.php?id=<?php echo $about['ID'] ?>" class="btn btn-success">Edit</a>
                    </td>
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