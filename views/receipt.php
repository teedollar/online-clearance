<?php
@session_start();


require_once "../class/Staff.php";
require_once "../class/File.php";
require_once "../class/Status.php";
require_once "../class/Student.php";

$staff_object = new Staff();
$file_object = new File();
$status_object = new Status();
$stud_object = new Student();

$stud_object->auth();

$stud_data = $staff_object->select_student_data($_SESSION['stud_id']);




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Clearance system</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
<br><br><br><br>

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<img src="../img/ui.jpg" class="img-responsive" width="120" height="100" >
		</div>
		<div class="col-md-2"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<p style="font-weight: bold; font-size: 25px; text-align: center">Clearance Receipt</p>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<p style="font-weight: bold; font-size: 18px; ">Student Information:</p>
		</div>
		<div class="col-md-2"></div>
	</div>
	

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="text-align: right; font-size: 15px; padding: 33px ">
			<table>
				<tr>
					<th>Full Name :</th><td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($stud_data['surname']." ".$stud_data['othername']) ?></td>
				</tr>
				<tr>
					<th>Matric number :</th><td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $stud_data['matric_no'] ?></td>
				</tr>
				<tr>
					<th>Program of Study :</th><td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper("B.SC. ".$stud_data['dept']) ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-2"></div>
	</div>


	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">         
	  <table class="table table-striped" style="text-align: left;">
	    <thead>

	      <tr>
	        <th>Type</th>
	        <th>Signature</th>
	      </tr>
	    </thead>
	    <tbody>
    <?php 
    	$lib_sign = $stud_object->clearance_receipt($_SESSION['stud_id'], 4, 3);
        $lib_msg = "";
        $library = $stud_object->clearance_status($_SESSION['stud_id'], 4, 3);
        if(strlen($library) > 0){
          if($library == 1){
            $lib_msg = "<img src='$lib_sign' class='img-responsive' width='45' height='6'>";
          }
          else if($library == 0){
            $lib_msg = "";
          }
        }
        else{
          $lib_msg = "";
        }
        

      ?>
      <tr>
        <td>Library Clearance</td>
        <td><?php echo $lib_msg; ?></td>
      </tr>

      <?php 
      	$hall_sign = $stud_object->clearance_receipt($_SESSION['stud_id'], 3, $_SESSION['hall_id']);
        $hall_msg = "";
        $hall = $stud_object->clearance_status($_SESSION['stud_id'], 3, $_SESSION['hall_id']);
        if(strlen($hall) > 0){
          if($hall == 1){
            $hall_msg = "<img src='$hall_sign' class='img-responsive' width='45' height='6'>";
          }
          else if($hall == 0){
            $hall_msg = "";
          }
        }
        else{
          $hall_msg = "";
        }
        

      ?>

      <tr>
        <td>Hall Clearance</td>
        <td><?php echo $hall_msg; ?></td>
      </tr>

      <?php 
      	$fac_sign = $stud_object->clearance_receipt($_SESSION['stud_id'], 1, $_SESSION['fac_id']);
        $fac_msg = "";
        $fac = $stud_object->clearance_status($_SESSION['stud_id'], 1, $_SESSION['fac_id']);
        if(strlen($fac) > 0){
          if($fac == 1){
            $fac_msg = "<img src='$fac_sign' class='img-responsive' width='45' height='6'>";
          }
          else if($fac == 0){
            $fac_msg = "";
          }
        }
        else{
          $fac_msg = "";
        }
        

      ?>
      <tr>
        <td>Faculty Clearance</td>
        <td><?php echo $fac_msg; ?></td>
      </tr>
      

      <?php 
      	$dept_sign = $stud_object->clearance_receipt($_SESSION['stud_id'], 2, $_SESSION['dept_id']);
        $dept_msg = "";
        $dept = $stud_object->clearance_status($_SESSION['stud_id'], 2, $_SESSION['dept_id']);
        if(strlen($dept) > 0){
          if($dept == 1){
            $dept_msg = "<img src='$dept_sign' class='img-responsive' width='45' height='6'>";
          }
          else if($dept == 0){
            $dept_msg = "";
          }
        }
        else{
          $dept_msg = "";
        }
        

      ?>
      <tr>
        <td>Department Clearance</td>
        <td><?php echo $dept_msg; ?></td>
      </tr>


      <?php 
      	$bursary_sign = $stud_object->clearance_receipt($_SESSION['stud_id'], 4, 1);
        $bsr_msg = "";
        $bursary = $stud_object->clearance_status($_SESSION['stud_id'], 4, 1);
        if(strlen($bursary) > 0){
          if($bursary == 1){
            $bsr_msg = "<img src='$bursary_sign' class='img-responsive' width='45' height='6'>";
          }
          else if($bursary == 0){
            $bsr_msg = "";
          }
        }
        else{
          $bsr_msg = "";
        }
        

      ?>
      <tr>
        <td>Bursary Clearance</td>
        <td><?php echo $bsr_msg; ?></td>
      </tr>


      <?php 
      	$jaja_sign = $stud_object->clearance_receipt($_SESSION['stud_id'], 4, 2);
        $jaja_msg = "";
        $jaja = $stud_object->clearance_status($_SESSION['stud_id'], 4, 2);
        if(strlen($jaja) > 0){
          if($jaja == 1){
            $jaja_msg = "<img src='$jaja_sign' class='img-responsive' width='45' height='6'>";
          }
          else if($jaja == 0){
            $jaja_msg = "";
          }
        }
        else{
          $jaja_msg = "";
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
<br><br>







</div>



</body>