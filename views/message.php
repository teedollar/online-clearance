<?php
require_once "../public/staffheader.php";

$stud_id = $_GET['stud_id'];
$stud_data = $staff_object->select_student_data($stud_id);
$stud_files = $staff_object->select_a_student_to_sign($stud_id, $_SESSION['staff_id']);

?>
    <br><br><br>
    <div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <marquee><b> <?php echo $stud_data['surname']." ".$stud_data['othername']." - ".$stud_data['dept']." - ".$stud_data['matric_no'] ?></b></marquee>
     </div>
     <div class="col-md-2"></div>
     </div>
        <section id="organisations" class="section-padding">
          
            
           
        </section>
        
        </div>
  

      

<?php
require_once "../public/footer.php";
?>