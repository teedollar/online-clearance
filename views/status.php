<?php
require_once "../public/stdheader.php";

?>
    <br><br><br>
      <b><center>My Clearance Status</center></b>
        

<div class="container">
<br><br>   
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">         
  <table class="table table-striped">
    <thead>

      <tr>
        <th>Type</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        $lib_msg = "";
        $library = $stud_object->clearance_status($_SESSION['stud_id'], 4, 3);
        if(strlen($library) > 0){
          if($library == 1){
            $lib_msg = "<p style='color: darkgreen'>Cleared</p>";
          }
          else if($library == 0){
            $lib_msg = "<p style='color: yellow'>Pending</p>";
          }
        }
        else{
          $lib_msg = "<p style='color: darkred'>Documents not yet submitted</p>";
        }
        

      ?>
      <tr>
        <td>Library Clearance</td>
        <td><?php echo $lib_msg; ?></td>
      </tr>

      <?php 
        $hall_msg = "";
        $hall = $stud_object->clearance_status($_SESSION['stud_id'], 3, $_SESSION['hall_id']);
        if(strlen($hall) > 0){
          if($hall == 1){
            $hall_msg = "<p style='color: darkgreen'>Cleared</p>";
          }
          else if($hall == 0){
            $hall_msg = "<p style='color: yellow'>Pending</p>";
          }
        }
        else{
          $hall_msg = "<p style='color: darkred'>Documents not yet submitted</p>";
        }
        

      ?>

      <tr>
        <td>Hall Clearance</td>
        <td><?php echo $hall_msg; ?></td>
      </tr>

      <?php 
        $fac_msg = "";
        $fac = $stud_object->clearance_status($_SESSION['stud_id'], 1, $_SESSION['fac_id']);
        if(strlen($fac) > 0){
          if($fac == 1){
            $fac_msg = "<p style='color: darkgreen'>Cleared</p>";
          }
          else if($fac == 0){
            $fac_msg = "<p style='color: yellow'>Pending</p>";
          }
        }
        else{
          $fac_msg = "<p style='color: darkred'>Documents not yet submitted</p>";
        }
        

      ?>
      <tr>
        <td>Faculty Clearance</td>
        <td><?php echo $fac_msg; ?></td>
      </tr>
      

      <?php 
        $dept_msg = "";
        $dept = $stud_object->clearance_status($_SESSION['stud_id'], 2, $_SESSION['dept_id']);
        if(strlen($dept) > 0){
          if($dept == 1){
            $dept_msg = "<p style='color: darkgreen'>Cleared</p>";
          }
          else if($dept == 0){
            $dept_msg = "<p style='color: yellow'>Pending</p>";
          }
        }
        else{
          $dept_msg = "<p style='color: darkred'>Documents not yet submitted</p>";
        }
        

      ?>
      <tr>
        <td>Department Clearance</td>
        <td><?php echo $dept_msg; ?></td>
      </tr>


      <?php 
        $bsr_msg = "";
        $bursary = $stud_object->clearance_status($_SESSION['stud_id'], 4, 1);
        if(strlen($bursary) > 0){
          if($bursary == 1){
            $bsr_msg = "<p style='color: darkgreen'>Cleared</p>";
          }
          else if($bursary == 0){
            $bsr_msg = "<p style='color: yellow'>Pending</p>";
          }
        }
        else{
          $bsr_msg = "<p style='color: darkred'>Documents not yet submitted</p>";
        }
        

      ?>
      <tr>
        <td>Bursary Clearance</td>
        <td><?php echo $bsr_msg; ?></td>
      </tr>


      <?php 
        $jaja_msg = "";
        $jaja = $stud_object->clearance_status($_SESSION['stud_id'], 4, 2);
        if(strlen($jaja) > 0){
          if($jaja == 1){
            $jaja_msg = "<p style='color: darkgreen'>Cleared</p>";
          }
          else if($jaja == 0){
            $jaja_msg = "<p style='color: yellow'>Pending</p>";
          }
        }
        else{
          $jaja_msg = "<p style='color: darkred'>Documents not yet submitted</p>";
        }
        

      ?>
      <tr>
        <td>Jaja Clinic Clearance</td>
        <td><?php echo $jaja_msg; ?></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="col-md-2"></div>
</div>
</div>

<br><br>

<?php
require_once "../public/footer.php";
?>