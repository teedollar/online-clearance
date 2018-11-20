<?php
session_start();
if(!(isset($_SESSION['id']))){
  header("Location:index.php");
}
require_once "adminheader.php";
?>
<br>


<div class="container"><br>
<h3><center> Welcome Admin    |      Today: <?php echo date("D, d m, Y") ?> </center></h3><br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <p style="color: darkgreen">
      <center>
        Dear admin, welcome to UI clearance portal!. <?php if(isset($_SESSION['id'])) echo "I am logged in"; else echo "I am logged out";;; ?></center>
      </p>
    </div>
    <div class="col-md-1"></div>
  </div>
  <br>
 <hr class="bottom-line">
 <br>
 <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-8">
      <p>
        Assign clearnce officers to some sections that are yet to have clearance officers
      </p>
      <p>
        Click on "Assign staff on the tab above to assign them into various sections.
      </p>
      <p>
        Click on "Assign staff on the tab above to assign them into various sections.
      </p>
      <p>
        Students can also be added by clicking on the "Add students" tab above.
      </p>
    </div>
    <div class="col-md-1"></div>
  </div>
  <br>
  </div>

<?php
require_once "../../public/footer.php";
?>