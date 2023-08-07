<?php
    include('../includes/conn.php'); 
    include('../includes/functions.php');
    include('../includes/adminHeader.php');
?>
<?php
  if(isset($_POST['save_changes'])){
    editAboutDate();
  }
?>
<!-- /. NAV SIDE  -->
  <div id="page-wrapper" >
    <div class="header"> 
		</div>
    <div id="page-inner"> 
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Edit
            </div> 
            <form method="POST" enctype="multipart/form-data">
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
                        $id = $_GET['id'];
                        $abouts = getAboutDateById($id);
                        foreach($abouts as $about){
                      ?>
                      <tr>
                        <td>First Name</td>
                        <td><input name="first_name" class="form-control" class="form-control" type="text" value="<?php echo $about['FIRST_NAME'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td><input name="last_name" class="form-control" type="text" value="<?php echo $about['LAST_NAME'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Job title</td>
                        <td><input name="job_title" class="form-control" type="text" value="<?php echo $about['JOB_TITLE'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Date of birth</td>
                        <td>
                          <input name="date_of_birth" class="form-control" type="date">
                          <input name="date_of_birth_old" value="<?php echo $about['DATE_OF_BIRTH'] ?>" type="hidden">
                          <span><?php echo $about['DATE_OF_BIRTH'] ?></span>
                        </td>
                      </tr>
                      <tr>
                        <td>About Me</td>
                        <td><textarea name="about_me" class="form-control" name=""><?php echo $about['ABOUT_ME'] ?></textarea></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td><input name="address" class="form-control" type="text" value="<?php echo $about['ADDRESS'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td><input name="phone" class="form-control" type="text" value="<?php echo $about['PHONE_NUMBER'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><input name="email" class="form-control" type="text" value="<?php echo $about['EMAIL'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Linkedin link</td>
                        <td><input name="linkedin" class="form-control" type="text" value="<?php echo $about['LINKEDIN'] ?>"></td>
                      </tr>
                      <tr>
                        <td>YouTube link</td>
                        <td><input name="youtube" class="form-control" type="text" value="<?php echo $about['YOUTUBE'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Facebook link</td>
                        <td><input name="facebook" class="form-control" type="text" value="<?php echo $about['FACEBOOK'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Instagram link</td>
                        <td><input name="instagram" class="form-control" type="text" value="<?php echo $about['INSTAGRAM'] ?>"></td>
                      </tr>
                      <tr>
                        <td>WhatsApp link</td>
                        <td><input name="whatsapp" class="form-control" type="text" value="<?php echo $about['WHATSAPP'] ?>"></td>
                      </tr>
                      <tr>
                        <td>Telegram link</td>
                        <td><input name="telegram" class="form-control" type="text" value="<?php echo $about['TELEGRAM'] ?>"></td>
                      </tr>
                      <tr>
                        <td>CV File</td>
                        <td>
                          <input name="cv_file" class="form-control" type="file">
                          <input name="cv_file_old" value="<?php echo $about['CV_FILE_NAME'] ?>" type="hidden">
                          <span><?php echo $about['CV_FILE_NAME'] ?></span>
                        </td>
                      </tr>
                      <tr>
                        <td>Nice/Cover image</td>
                        <td>
                          <input name="cover_img" class="form-control" type="file">
                          <input name="cover_img_old" value="<?php echo $about['COVER_IMG_NAME'] ?>" type="hidden">
                          <span><?php echo $about['COVER_IMG_NAME'] ?></span>
                        </td>
                      </tr>
                      <tr>
                        <td>Personal image</td>
                        <td>
                          <input name="personal_img" class="form-control" type="file">
                          <input name="personal_img_old" value="<?php echo $about['PERSONAL_IMG_NAME'] ?>" type="hidden">
                          <span><?php echo $about['PERSONAL_IMG_NAME'] ?></span>
                        </td>
                      </tr>
                      <tr>
                        <td>Options</td>
                        <td>
                          <input name="id" type="hidden" value="<?php $about['ID'] ?>" />
                          <input class="btn btn-primary" name="save_changes" type="submit" value="Save changes">
                        </td>
                      </tr>
                      <?php 
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
  include('../includes/adminFooter.php');
?>