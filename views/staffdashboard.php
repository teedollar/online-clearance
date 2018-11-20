<?php
require_once "../public/staffheader.php";

$staff_data = $staff_object->select_staff_data($_SESSION['staff_id']);
?>
<br><br>
<div class="container"><br>
<h3><center> Dashboard | <?php echo $staff_data['surname']." ".$staff_data['othername'] ?>  </center></h3><br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <p style="color: darkgreen">
      <center>
        Dear <?php echo $staff_data['surname'] ?>, welcome to your dashboard!. You need to upload your signature, ignore if already uplaoded.</center>
      </p>
    </div>
    <div class="col-md-1"></div>
  </div>
  <br>
 <hr class="bottom-line">
 <br>
 <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <p>
        You can change your password and also, upload your signature by clicking on the <b><i>Profile</i></b> link above.
      </p>
      <p>
        You can alson sign students' documents by clicking on the <b><i>Sign Documents</i></b> link above.
      </p>
    </div>
    <div class="col-md-1"></div>
  </div>
  <br>
  <hr class="bottom-line">
  <center>
     <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <p>You can also start signing students documents <a href="sign.php"> here </a></p>
    </div>
    <div class="col-md-1"></div>
    </div>
  </center>
  </div>
  
<?php
require_once "../public/footer.php";
?>
