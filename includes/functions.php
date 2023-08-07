<?php
  function deleteFile($filePath) {
    $targetDir = '../assets/';
    unlink($targetDir . $filePath);
  }
  //-------------------------------
  function renameFileAndUpload($file){
    $targetDir = '../assets/';
    $originalFileName = basename($file["name"]);
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . date('dhs') . '.' . $fileExtension;
    $targetFilePath = $targetDir . $newFileName;
    $allowedTypes = array("jpg", "jpeg", "png", "pdf");
    if (in_array($fileExtension, $allowedTypes)) {
      move_uploaded_file($file["tmp_name"], $targetFilePath);
      return $file = $newFileName;
    } else {
      return false;
    }
  }
?>
<!-- -------------------- ABOUT ------------------- -->
<!-- -------------------- ABOUT ------------------- -->
<!-- -------------------- ABOUT ------------------- -->
<!-- -------------------- ABOUT ------------------- -->
<!-- -------------------- ABOUT ------------------- -->
<!-- -------------------- ABOUT ------------------- -->
<!-- -------------------- ABOUT ------------------- -->
<?php
  function getAboutDate($column, $table){
    global $connect;
    $query = "SELECT $column FROM $table";
    $result = mysqli_query($connect, $query);
    $column != '*' ? $data = mysqli_fetch_assoc($result)[$column] : $data = mysqli_fetch_assoc($result); 
    return $data;
  }
  //---------------------------------
  function getAllAboutDate(){
    global $connect;
    $query = "SELECT * FROM about";
    $result = mysqli_query($connect, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }
  //---------------------------------
  function getAboutDateById($id){
    global $connect;
    $query = "SELECT * FROM about WHERE ID = $id";
    $result = mysqli_query($connect, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }
  //----------------------------
  function editAboutDate(){
    global $connect;
    $error_msg = null;
    $fn =   mysqli_real_escape_string($connect, $_POST['first_name']);
    $ln =   mysqli_real_escape_string($connect, $_POST['last_name']);
    $jt =   mysqli_real_escape_string($connect, $_POST['job_title']);
    $dob=   mysqli_real_escape_string($connect, $_POST['date_of_birth']);
    $dob_o= mysqli_real_escape_string($connect, $_POST['date_of_birth_old']);
    $am =   mysqli_real_escape_string($connect, nl2br($_POST['about_me']));
    $ad =   mysqli_real_escape_string($connect, $_POST['address']);
    $ph =   mysqli_real_escape_string($connect, $_POST['phone']);
    $em =   mysqli_real_escape_string($connect, $_POST['email']);
    $li =   mysqli_real_escape_string($connect, $_POST['linkedin']);
    $yo =   mysqli_real_escape_string($connect, $_POST['youtube']);
    $fa =   mysqli_real_escape_string($connect, $_POST['facebook']);
    $in =   mysqli_real_escape_string($connect, $_POST['instagram']);
    $wh =   mysqli_real_escape_string($connect, $_POST['whatsapp']);
    $te =   mysqli_real_escape_string($connect, $_POST['telegram']);
    $cv_o = mysqli_real_escape_string($connect, $_POST['cv_file_old']);
    $co_o = mysqli_real_escape_string($connect, $_POST['cover_img_old']);
    $pe_o = mysqli_real_escape_string($connect, $_POST['personal_img_old']);
    $cv = $_FILES['cv_file'];
    $co = $_FILES['cover_img'];
    $pe = $_FILES['personal_img'];
    if(empty($dob)){$dob = $dob_o;}
    if($cv['name'] !== ''){
      $cv = renameFileAndUpload($cv);
      if($cv === false){
        $cv = $cv_o;
        $error_msg .= 'Error: Unsupported CV file format: jpg, jpeg, png, pdf.\n';
      }else{deleteFile($cv_o);}
    }else{$cv = $cv_o;}
    if($co['name'] !== ''){
      $co = renameFileAndUpload($co);
      if($co === false){
        $co = $co_o;
        $error_msg .= 'Error: Unsupported cover image format: jpg, jpeg, png, pdf.\n';
      }else{deleteFile($co_o);}
    }else{$co = $co_o;}
    if($pe['name'] !== ''){
      $pe = renameFileAndUpload($pe);
      if($pe === false){
        $pe = $pe_o;
        $error_msg .= 'Error: Unsupported personal image format: jpg, jpeg, png, pdf.\n';
      }else{deleteFile($pe_o);}
    }else{$pe = $pe_o;}
//--------------------------------
    $query = "UPDATE about SET FIRST_NAME='$fn', LAST_NAME='$ln', JOB_TITLE='$jt', DATE_OF_BIRTH='$dob', ABOUT_ME='$am', ADDRESS='$ad', PHONE_NUMBER='$ph', EMAIL='$em', LINKEDIN='$li', YOUTUBE='$yo', FACEBOOK='$fa', INSTAGRAM='$in', WHATSAPP='$wh', TELEGRAM='$te', CV_FILE_NAME='$cv', COVER_IMG_NAME='$co', PERSONAL_IMG_NAME='$pe'";
    if($error_msg == null){
      if(mysqli_query($connect, $query)){
        echo '<script>alert("saved successfully!")</script>';
      }
    } else {
      echo '<script>alert("' . $error_msg . '")</script>';
    }
  }
?>
<!-- -------------------- RESUME ------------------- -->
<!-- -------------------- RESUME ------------------- -->
<!-- -------------------- RESUME ------------------- -->
<!-- -------------------- RESUME ------------------- -->
<!-- -------------------- RESUME ------------------- -->
<!-- -------------------- RESUME ------------------- -->
<!-- -------------------- RESUME ------------------- -->
<!-- -------------------- RESUME ------------------- -->
<?php
  function getResumeData(){
    global $connect;
    $query = "SELECT * FROM resume";
    $result = mysqli_query($connect, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }
  //---------------------------------
  function getResumeDataById($id){
    global $connect;
    $query = "SELECT * FROM resume WHERE ID = $id";
    $result = mysqli_query($connect, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
    return $data;
  }
  //------------------------------
  function resumeData($option, $resumeId){
    global $connect;
    $error_msg = null;
    $ti = mysqli_real_escape_string($connect, $_POST['title']);
    $ca = mysqli_real_escape_string($connect, $_POST['category']);
    $de = mysqli_real_escape_string($connect, $_POST['description']);
    $df = mysqli_real_escape_string($connect, $_POST['date_from']);
    $dt = mysqli_real_escape_string($connect, $_POST['date_to']);
    $st = mysqli_real_escape_string($connect, $_POST['shown_link_text']);
    $ic = mysqli_real_escape_string($connect, $_POST['icon']);
    $af_o = mysqli_real_escape_string($connect, $_POST['attached_file_old']);
    $af = $_FILES['attached_file'];
    
    if($af['name'] !== '' && $option !== 'delete'){
      $af = renameFileAndUpload($af);
      if($af === false){
        $af = $af_o;
        $error_msg .= 'Error: Unsupported file format: jpg, jpeg, png, pdf.\n';
      }else{deleteFile($af_o);}
    }else{$af = $af_o;}

    if($option == 'insert'){
      $query = "INSERT INTO resume (TITLE, DESCRIPTION, CATEGORY, DATE_FROM, DATE_TO, ATTACHED_LINK, SHOWN_LINK_TEXT, ICON) VALUES ('$ti','$de','$ca','$df','$dt','$af','$st','$ic')";
      if (empty($ti)||empty($ca)){$error_msg .= 'Error: Some data is missing\n';}
    } else if($option == 'update'){
      $query = "UPDATE resume SET TITLE='$ti', DESCRIPTION='$de', CATEGORY='$ca', DATE_FROM='$df', DATE_TO='$dt', ATTACHED_LINK='$af', SHOWN_LINK_TEXT='$st', ICON='$ic' WHERE ID = $resumeId";
      if (empty($ti)||empty($ca)){$error_msg .= 'Error: Some data is missing\n';}
    } else if($option == 'delete'){
      $query = "DELETE FROM resume WHERE ID = $resumeId";
    }
    if($error_msg == null){
      if(mysqli_query($connect, $query)){
        if($option == 'insert'){
          echo '<script>alert("Saved successfully!"); window.location.href = "./resume.php";</script>';
        }else if($option == 'update'){
          echo '<script>alert("Updated successfully!"); window.location.href = "./resume.php";</script>';
        }else if($option == 'delete'){
          echo '<script>alert("Deleted successfully!"); window.location.href = "./resume.php";</script>';
        }
        return true;
      }
    } else {
      echo '<script>alert("' . $error_msg . '")</script>';
      return false;
    }
  }
?>
<!-- -------------------- SKILLS ------------------- -->
<!-- -------------------- SKILLS ------------------- -->
<!-- -------------------- SKILLS ------------------- -->
<!-- -------------------- SKILLS ------------------- -->
<!-- -------------------- SKILLS ------------------- -->
<!-- -------------------- SKILLS ------------------- -->
<!-- -------------------- SKILLS ------------------- -->
<?php
  function getSkillsData(){
    global $connect;
    $query = "SELECT * FROM skills ORDER BY CATEGORY";
    $result = mysqli_query($connect, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
  }
  // ------------------------------------------------------
  // ------------------------------------------------------
function getSkillDateById($id){
  global $connect;
  $query = "SELECT * FROM skills WHERE ID = '$id'";
  $result = mysqli_query($connect, $query);
  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
  }
  return $data;
}
// ------------------------------------------------------
// ------------------------------------------------------
  function getSkillsCat(){
    global $connect;
    $query = "SELECT DISTINCT CATEGORY FROM skills ORDER BY CATEGORY";
    $result = mysqli_query($connect, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
  }
// ------------------------------------------------------
// ------------------------------------------------------
  function skillData($option, $skillId){
    global $connect;
    $error_msg = null;
    $sn = mysqli_real_escape_string($connect, $_POST['name']);
    $ca = mysqli_real_escape_string($connect, $_POST['category']);
    $pv = mysqli_real_escape_string($connect, $_POST['percentage_value']);
    $st = mysqli_real_escape_string($connect, $_POST['shown_text']);
    $cc = mysqli_real_escape_string($connect, $_POST['custom_category']);
    if(!empty($cc)){$ca = $cc;}
    if($option == 'insert'){
      $query = "INSERT INTO skills (SKILL_NAME, CATEGORY, PERCENTAGE_VALUE, SHOWN_TEXT) VALUES ('$sn','$ca','$pv','$st')";
      if (empty($sn)||empty($ca)||empty($pv)||empty($st)) {$error_msg .= 'Error: Some data is missing';}
    } else if($option == 'update'){
      $query = "UPDATE skills SET SKILL_NAME='$sn', CATEGORY='$ca', PERCENTAGE_VALUE='$pv', SHOWN_TEXT='$st' WHERE ID = $skillId";
      if (empty($sn)||empty($ca)||empty($pv)||empty($st)) {$error_msg .= 'Error: Some data is missing';}
    } else if($option == 'delete'){
      $query = "DELETE FROM skills WHERE ID = $skillId";
    }
    if($error_msg == null){
      if(mysqli_query($connect, $query)){
        if($option == 'insert'){
          echo '<script>alert("Saved successfully!"); window.location.href = "./skills.php";</script>';
        }else if($option == 'update'){
          echo '<script>alert("Updated successfully!"); window.location.href = "./skills.php";</script>';
        }else if($option == 'delete'){
          echo '<script>alert("Deleted successfully!"); window.location.href = "./skills.php";</script>';
        }
      }
    } else {
      echo '<script>alert("' . $error_msg . '")</script>';
    }
  }
?>
<!-- -------------------- PROJECTS ------------------- -->
<!-- -------------------- PROJECTS ------------------- -->
<!-- -------------------- PROJECTS ------------------- -->
<!-- -------------------- PROJECTS ------------------- -->
<!-- -------------------- PROJECTS ------------------- -->
<!-- -------------------- PROJECTS ------------------- -->
<!-- -------------------- PROJECTS ------------------- -->
<!-- -------------------- PROJECTS ------------------- -->
<?php
  function getProjectData(){
    global $connect;
    $query = "SELECT * FROM projects";
    $result = mysqli_query($connect, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
  }
// ------------------------------------------------------
function getProjectDataById($id){
  global $connect;
  $query = "SELECT * FROM projects WHERE PROJECT_ID = $id";
  $result = mysqli_query($connect, $query);
  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
  }
  return $data;
}
// ------------------------------------------------------
function projectData($option, $projectId){
  global $connect;
  $error_msg = null;
  $ti = mysqli_real_escape_string($connect, $_POST['title']);
  $na = mysqli_real_escape_string($connect, $_POST['name']);
  $su = mysqli_real_escape_string($connect, $_POST['summary']);
  $de = mysqli_real_escape_string($connect, $_POST['description']);
  $da_o = mysqli_real_escape_string($connect, $_POST['date_old']);
  $da = mysqli_real_escape_string($connect, $_POST['date']);
  $al = mysqli_real_escape_string($connect, $_POST['attached_link']);
  $st = mysqli_real_escape_string($connect, $_POST['shown_link_text']);
  $co_o = mysqli_real_escape_string($connect, $_POST['cover_img_old']);
  $co = $_FILES['cover_img'];
  if(empty($da)){$da = $da_o;}
  if($co['name'] !== '' && $option !== 'delete'){
    $co = renameFileAndUpload($co);
    if($co === false){
      $co = $co_o;
      $error_msg .= 'Error: Unsupported file format: jpg, jpeg, png, pdf.\n';
    }else{deleteFile($co_o);}
  }else{$co = $co_o;}
  if($option == 'insert'){
    $query = "INSERT INTO projects(TITLE, PROJECT_NAME, SUMMARY, DESCRIPTION, LAUNCH_DATE, ATTACHED_LINK, SHOWN_LINK_TEXT, COVER_IMG) VALUES ('$ti','$na','$su','$de','$da','$al','$st','$co')";
    if (empty($ti)||empty($na)||empty($su)||empty($de)) {$error_msg .= 'Error: Some data is missing';}
  } else if($option == 'update'){
    $query = "UPDATE projects SET TITLE='$ti', PROJECT_NAME='$na', SUMMARY='$su', DESCRIPTION='$de', LAUNCH_DATE='$da', ATTACHED_LINK='$al', SHOWN_LINK_TEXT='$st', COVER_IMG='$co' WHERE PROJECT_ID = $projectId";
    if (empty($ti)||empty($na)||empty($su)||empty($de)) {$error_msg .= 'Error: Some data is missing';}
  } else if($option == 'delete'){
    $query = "DELETE FROM projects WHERE PROJECT_ID = $projectId";
  }
  if($error_msg == null){
    if(mysqli_query($connect, $query)){
      if($option == 'insert'){
        echo '<script>alert("Saved successfully!"); window.location.href = "./projects.php";</script>';
      }else if($option == 'update'){
        echo '<script>alert("Updated successfully!"); window.location.href = "./projects.php";</script>';
      }else if($option == 'delete'){
        echo '<script>alert("Deleted successfully!"); window.location.href = "./projects.php";</script>';
      }
    }
  } else {
    echo '<script>alert("' . $error_msg . '")</script>';
  }
}
//----------------------------------------
function getProjectImagesByProjectId($id){
  global $connect;
  $query = "SELECT * FROM project_images WHERE PROJECT_ID = $id";
  $result = mysqli_query($connect, $query);
  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
  }
  return $data;
}
//----------------------------------------
function deleteImgFromDb($imgid, $proid){
  $error_msg = null;
  global $connect;
  $query = "DELETE FROM project_images WHERE IMG_ID = $imgid";
  if($error_msg == null){
    if(mysqli_query($connect, $query)){
        echo '<script>alert("Updated successfully!"); window.location.href = "./editimages.php?proid=' . $proid . '";</script>';
        return true;
    } else {
        echo '<script>alert("Failed!"); window.location.href = "./editimages.php?proid=' . $proid . '";</script>';
        return false;
    } 
  } else {
    echo '<script>alert("' . $error_msg . '"); window.location.href = "./editimages.php?proid=' . $proid . '";</script>';
    return false;
  }
}
///////////////////////
function renameMultiFilesAndUpload($files) {
    $targetDir = '../assets/';
    $allowedTypes = array("jpg", "jpeg", "png");
    $uploadedFileNames = array();
    foreach ($files["name"] as $key => $originalFileName) {
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        
        if (!in_array(strtolower($fileExtension), $allowedTypes)) {
            return false; // Return false immediately if an unsupported file type is found
        }
        $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . date('YHis') . '.' . $fileExtension; // Use a proper date format
        $targetFilePath = $targetDir . $newFileName;
        if (move_uploaded_file($files["tmp_name"][$key], $targetFilePath)) {
            $uploadedFileNames[] = $newFileName;
        }
    }
    return $uploadedFileNames;
}
//----------------------------------------
function projectImages($proid) {
    $error_msg = null;
    global $connect;
    $pro_imgs = $_FILES['project_images'];
    if (!empty($pro_imgs['name'][0])) {
        $uploadedFiles = renameMultiFilesAndUpload($pro_imgs);
        $uploadResult = '';
        if ($uploadedFiles !== false) {
          foreach ($uploadedFiles as $file) {
            $uploadResult .= $file . ' \n';
          }
          echo "<script>alert('Uploaded file: " . ' \n' . $uploadResult . "')</script>";
        }
        if ($uploadedFiles === false) {
            $error_msg = 'Error: Unsupported file format. Only jpg, jpeg, and png formats are allowed.';
        }
        if($error_msg == null){
          foreach ($uploadedFiles as $file) {
            $query = "INSERT INTO project_images(PROJECT_ID, IMAGE_NAME) VALUES ('$proid','$file')";
            if(!mysqli_query($connect, $query)){
              echo '<script>alert("Failed!"); window.location.href = "./editimages.php?proid=' . $proid . '";</script>';
              return false;
            } 
          }
          return true;
        } else {
            echo '<script>alert("' . $error_msg . '"); window.location.href = "./editimages.php?proid=' . $proid . '";</script>';
            return false;
          }
    }
}
?>