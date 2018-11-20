<?php
session_start();
if(isset($_SESSION['id'])){
  header("Location:dashboard.php");
}
require_once "header.php";
require_once "../../class/Admin.php";

//processing the login for admin

$message = "";
$truth_value = false;
if(isset($_POST['login'])) 
{
  if((!empty($_POST['email'])) && (!empty($_POST['password'])))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if($admin_object->login_admin($email, $password))
    {
      $truth_value = true;
      $message = "You have been suucessfully logged in to your dashboard";
      $url = "dashboard.php";
      header("Refresh: 2; URL='$url'");
    }else
    {
      $truth_value = false;
      $message = "Invalid username and or password";
    }

  }else
  {
    $truth_value = false;
    $message = "Please enter into the input boxes below";
  }
}
?>
  

         <br><br>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <h3><p class="login-box-msg">LOG IN</p></h3>

            <!-- displaying the message -->
            <center>
              <div class="row">
                <?php
                if(isset($_POST['login']))
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
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal" role = "form">
                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" placeholder = "Enter your email" >
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" placeholder = "Enter your password" >
                  </div>
                </div>
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-6">
                    <div class="checkbox icheck">
                      <label>
                        <input type="checkbox" id="loginrem" > Remember Me
                      </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <input type="submit" name="login" class="btn btn-primary" value="SIGN IN">
                  </div>
                </div>
                

              </form>
        </div>
      </div>
      </div>
      </div>

<?php
require_once "../../public/footer.php";
?>