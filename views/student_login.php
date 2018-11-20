<?php
  require_once "../public/header1.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student login</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <style type="text/css">
    body{

    }
  </style>
</head>

<body>

<?php
  //processing the login for admin

$message = "";
$truth_value = false;
if(isset($_POST['student_login'])) 
{
  if((!empty($_POST['matric_no'])) && (!empty($_POST['password'])))
  {
    $matric_no = $_POST['matric_no'];
    $password = $_POST['password'];
    
    if($stud_object->login_student($matric_no, $password))
    {
      $truth_value = true;
      $message = "You have been suucessfully logged in to your dashboard";
      $url = "stddashboard.php";
      header("Refresh: 2; URL='$url'");
    }else
    {
      $truth_value = false;
      $message = "Invalid username or password";
    }

  }else
  {
    $truth_value = false;
    $message = "Please enter into the input boxes below";
  }
}
?>

<!--Students log in pop up-->

    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title text-center form-title"> Student Login Page</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p style="color:green" class="login-box-msg">Use your matric no as password for first time log in</p>

            <center>
              <div class="row">
                <?php
                if(isset($_POST['student_login']))
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
            <div class="form-group">
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method= "post">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Matric number" id="stud_matric" type="text" name="matric_no" autocomplete="on" />

                 
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="stud_password" type="password" name="password" autocomplete="off" />
                 
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="checkbox icheck">
                      <label>
                                <input type="checkbox" id="loginrem" > Remember Me
                              </label>
                    </div>
                  </div>
                  <!--onclick="userlogin() " -->
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat"  name="student_login" >Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- students loging pop up ends -->
</body>

