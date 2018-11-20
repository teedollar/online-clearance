<?php
require_once "../public/staffheader.php";

$stud_id = $_GET['stud_id'];
$stud_data = $staff_object->select_student_data($stud_id);
$signature = $staff_object->select_signature($_SESSION['staff_id']);

//executing the clearance process
$message = "";
$truth_value = false;

if(isset($_POST['clear']))
{
  if(!empty($_POST['check']))
  {
    if($signature > 0){
      if($staff_object->clear_student ($stud_data['id'], $_SESSION['pre_sec_id'], $_SESSION['sec_id']))
      {
        $message = "This student has been cleared successfully";
        $message.= "<br><a href='sign.php'>Click here to go back</a>";
        $truth_value = true;
        //$message.= "<a href='sign.php'>Click here to go back</a>";
      }else
      {
        $message = "It seems there is a problem clearing this student";
        $truth_value = false;
      }
    }else
    {
      $message = "You need to upload your signature before you can clear this student";
      $truth_value = false;
    }
  }else
  {
    $message = "You need to check the box first";
    $truth_value = false;
  }
}
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

     <br><br>
          
            
            <?php
            $stud_files = $staff_object->select_a_student_to_sign($stud_id, $_SESSION['staff_id']);

            foreach ($stud_files as $key => $value) 
            {
             ?>
              <a href="view_picture.php?p_id=<?php echo $value['file_id'] ?>"  target="blank">
                <div class="row">
                <div class="col-md-3"></div>
                  <div class="col-md-3">
                    <img src=" <?php echo $value['file'] ?>" width="200" height="180" class="img-responsive">
                  </div>
                  <div class="col-md-5">
                    <div class="detail-info">
                      <hgroup>
                      <br>
                        <p class="sm-txt">File name: <?php echo $value['file_name'] ?></p>
                        <p class="sm-txt">Date uploaded: <?php echo $value['date_uploaded'] ?></p>
                        
                      </hgroup>
                    </div>
                  </div>
                  <div class="col-md-1"><br><br></div>
                </div>
                </a>

                <br>
            <?php
            }
            ?>
            
            <a name="form"></a>
            <center>
              <div class="row">
              
                <?php
                  if(isset($_POST['clear']))
                  {
                    if($truth_value == true)
                    {
                    ?>
                      <div class="alert alert-success"><?php echo $message ?></div>
                    <?php
                    }else
                    {
                      ?>
                      <div class="alert alert-danger"><?php echo $message ?></div>
                      <?php
                    }
                  }
                  ?>
              
              </div>
            </center>
            <br><br>

          <?php
          if(count($stud_files) > 0)
          {
            ?>
          <form class="form-group" role="form" action="details.php?stud_id=<?php echo $stud_data['id'] ?>#form" method="POST">
          <div class="row">
            <div class="col-md-3"></div>

              <div class="col-md-9">
                <input type="checkbox" name="check" class="form_control">&nbsp;&nbsp;&nbsp;<b>This student has submitted all documents needed for clearance</b>
              </div>

            
          </div>

          <div class="row">
          <br>
            <div class="col-md-5"></div>

            <div class="col-md-7"><input type="submit" name="clear" class="btn btn-success" value="CLEAR STUDENT"></div>
          </div>
          </form>

          <?php
        }
        ?>

      
        
        </div>
  

      

<?php
require_once "../public/footer.php";
?>