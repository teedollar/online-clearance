<?php
require_once "../public/stdheader.php";

$select_student_data = $staff_object->select_student_data($_SESSION['stud_id']);
$message = "";
$truth_value = false;

//changing password
if(isset($_POST['savePassword'])) 
{
  if((!empty($_POST['curr_password'])) && (!empty($_POST['new_password'])) && (!empty($_POST['cnew_password'])))
  {
    $curr_password = $_POST['curr_password'];
    $new_password = $_POST['new_password'];
    $cnew_password = $_POST['cnew_password'];

    if(($stud_object->check_password($_SESSION['stud_id'])) == $curr_password)
    {
      if(strlen($new_password) >= 6)
      {
        if($new_password == $cnew_password)
        {
          if($stud_object->change_password($_SESSION['stud_id'], $new_password))
          {
            $truth_value = true;
            $message = "Your password has been changed successfully. You will be logged out shortly";
            $url = "logout.php";
            header("Refresh: 2; URL='$url'");
          }else
          {
            $truth_value = false;
            $message = "Invalid username or password";
          }
        }else
        {
          $truth_value = false;
          $message = "The passwords do not match";
        }
      }else
    {
      $truth_value = false;
      $message = "The password length should be at least 6";
    }
  }else
  {
    $truth_value = false;
    $message = "Incorrect current password ";
  }
}else
{
  $truth_value = false;
  $message = "Please enter into the input boxes below";
 }
}

//changing password ends here



?>
<br><br>
<div class="container">
<h3><center> Profile | <?php echo $select_student_data['surname']." ".$select_student_data['othername'] ?> </center></h3><br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10"><br>
      <p style="color: darkgreen">
        <center> To change your password, Enter your current password and the new password twice in the two boxes and press the <b>Save Password</b> button </center>
      </p>
    </div>
    <div class="col-md-1"></div>
  </div>
 <center>
  <div class="row">
    <?php
      if(isset($_POST['savePassword']))
      {
        if($truth_value == true){
        ?>
          <div class="alert alert-success">
            <?php echo $message; ?>
          </div>
          <?php
        }
        if($truth_value == false){
        ?>
          <div class="alert alert-danger">
            <?php echo $message; ?>
            </div>
        <?php
        }
      }
      ?>
  </div>
</center>
 <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
     
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-horizontal" role="form">
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Current Password</label>
              <div class="col-sm-7">
                <input type="password" name="curr_password" class="form-control" >
              </div>
              <div class="col-sm-2"></div>
          </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">New Password</label>
              <div class="col-sm-7">
                <input type="password" name="new_password" class="form-control" >
              </div>
              <div class="col-sm-2"></div>
          </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Re-type Password</label>
              <div class="col-sm-7">
                <input type="password" name="cnew_password" class="form-control" >
              </div>
              <div class="col-sm-2"></div>
          </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-7 control-label"></label>
              <div class="col-sm-3">
                <input type="submit" name="savePassword" class="btn btn-primary" value = "Save 
                Password">
              </div>
              <div class="col-sm-2"></div>
          </div>
      </form>      


    </div>
    <div class="col-md-1"></div>
  </div>
  <br>
  </div>
<?php
require_once "../public/footer.php";
?>

