<?php
  include('./includes/conn.php');
  include('./includes/functions.php');
  include('./includes/header.php');
?>
    <!-- projects page -->
    <section class="projects container">
      <div class="title">
        <h2>projects</h2>
        <div>
          <h2>My projects</h2>
        </div>
      </div>
      <!-- <p class="text">These are my projects that I've done so far.</p> -->
    </section>
<style>
  @media (max-width: 576px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  @media (min-width: 577px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  @media (min-width: 768px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  @media (min-width: 992px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  @media (min-width: 1440px){
    .parent {
      margin: 1.5rem;
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 30px;
      grid-row-gap: 30px;
      
    }
  }
  .parent form img{
  width: 100%;
  aspect-ratio: 16/10;
  object-fit: cover;
  border-radius: 5px;
  }
  .parent{
    margin-bottom: 4rem;
  }
  .proForm{
    position: relative !important;
    border-radius: 5px !important;
    transition: all 0.2s !important;

  } 
  .proTitle{
    transition: all 0.2s !important;
    width: max-content;
  }
  .proForm:hover + p{
    transform: translateX(4rem);
    font-weight: 900;
    color: #287bff;
  }
  .proForm::before{
    content: '' !important;
    position: absolute !important;
    width: 100% !important;
    height: 100% !important;
    background-color: #111111d9 !important;
    border-radius: 5px !important;
    transition: all 0.2s !important;
    opacity: 0 !important;
  } 
  .proForm.op{
    transform: translateY(-4px) !important;
  }
  .proForm.op::before{
    opacity: 1 !important;
  }
  .proForm.op .btnmo{
    opacity: 1 !important;
  }
  .proForm .btnmo{
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    outline: none !important;
      background-color: #11111100 !important;
      color: #fff !important;
      padding: 0.4rem !important;
      width: 5rem !important;
      border-radius: 5px !important;
      border: 1px solid !important;
      opacity: 0 !important;
  }
  .btnmo:hover{
    background-color: #0866C6 !important;
    transition: all 0.2s !important;
    cursor: pointer !important;
  }

</style>
  <center id="no-project" style="font-size: x-large; box-shadow: 0px 3px 12px 5px #f5f5f512; padding: 1rem; width: fit-content; border-radius: 6px; margin: 0 auto">
  There are no projects currently
  </center>
  <div class="parent" id="parentDiv">
      <?php
    $projects = getProjectData();
    foreach($projects as $project){
      ?>
         <div>
           <div class="proForm">
             <img src="./assets/<?php echo $project['COVER_IMG']; ?>">
             <input type="hidden" name="project_id" value="<?php echo base64_encode($project['PROJECT_ID']); ?>">
             <a href="./project-details.php?id=<?php echo base64_encode($project['PROJECT_ID']); ?>" style="text-align: center" class="btnmo">View</a>
           </div>
           <p class="proTitle" style="padding: 0;"><?php echo $project['PROJECT_NAME']; ?></p>
           <span style="font-size: small; text-align: center; opacity: 0.7"><?php echo $project['TITLE']; ?></span>
         </div>
         <?php
      }
?>
</div>
<script>
  let parentDiv=document.getElementById('parentDiv');
  let noProject=document.getElementById('no-project');
  let proForm=document.querySelectorAll('.proForm').forEach(function(e) {
  // Do something with each element
  e.onmouseover=() => {
    e.classList.add('op');
  }
  e.onmouseout=() => {
    e.classList.remove('op');
  }
  });
  if (parentDiv.innerHTML.length > 5) {
    noProject.style.display='none';
  }
</script>
    <!-- end of projects page -->
<?php
  include('./includes/footer.php');
?>