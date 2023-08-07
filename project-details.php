<?php
  include('./includes/conn.php');
  include('./includes/functions.php');
  include('./includes/header.php');
?>
<style>
    .home{
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    .project-summry{
        width: 50%;
        margin: 4rem 1rem 0 0;
    }
    .project-summry a{
        color: #287bff;
    }
    .project-imgs{
        width: 75%;
    }
    .project-imgs img{
        margin: 4rem 0 0 0;
        border-radius: 3px;
    }
    @media (max-width: 768px){
        .home{
            flex-direction:column;
        }
        .project-summry{
            width: 100% !important;
        }
        .project-imgs{
            width: 100% !important;
        }
    }
</style>
    <!-- home page -->
    <section class="home container">
        <div class="project-summry">
        <?php
          $sql = "SELECT * FROM PROJECTS WHERE PROJECT_ID = " . base64_decode($_GET['id']);
          $result = mysqli_query($connect, $sql);
          if(isset($result)){
            while($row=mysqli_fetch_assoc($result)){
              ?>
            <div class="about-content">
            <ul>
              <li class="text">
              <span style="opacity: 0.5">Project name: </span>
              <span><?php echo $row['PROJECT_NAME']; ?></span>
              </li>
              <li class="text">
              <span style="opacity: 0.5">Category: </span>
                <span><?php echo $row['TITLE']; ?></span>
              </li>
              <li class="text">
              <span style="opacity: 0.5">Summary: </span>
                <span><?php echo $row['SUMMARY']; ?></span>
              </li>
              <li class="text">
              <span style="opacity: 0.5">Launch date: </span>
                <span><?php echo $row['LAUNCH_DATE']; ?></span>
              </li>
            </ul>
          </div>
              <h4>Description</h4>
              <p><?php echo $row['DESCRIPTION']; ?></p>
              <?php
                if(!$row['ATTACHED_LINK'] == null){
                    echo '<h3>Attachment - <a href="' . $row['ATTACHED_LINK'] . '">' . $row['SHOWN_LINK_TEXT'] . ' <i class="fa-solid fa-arrow-up-right-from-square"></i></a></h3><br>';
                }
              ?>
              <?php
            }
          }
            ?>
            <a href="./projects.php">Back to projects <i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="project-imgs">
            <?php               
                $query = "SELECT * FROM project_images WHERE PROJECT_ID = " . base64_decode($_GET['id']);
                $result = mysqli_query($connect, $query);
                if(isset($result)){
                    while($row = mysqli_fetch_assoc($result)){
                      echo '<img src="./assets/' . $row['IMAGE_NAME'] . '">';
                    }
                }
            ?>
         
        </div>
      
       
      </div>
    </section>
    <!-- end of home page -->
<?php
  include('./includes/footer.php');
?>