<?php
session_start();
if(!(isset($_SESSION['id']))){
  header("Location:index.php");
}
require_once "adminheader.php";
require_once "../../class/Admin.php";

//echo "<br><br><br><br><br><br><br><br>";

//selectAllPre_section
//$admin_object = new Admin();
$pre_section = $admin_object->selectAllPre_section();

//inserting the staff data into the staff table
$message = "";
$truth_value = false;
if(isset($_POST['assignstaff']))
{
  if((!empty($_POST['sname'])) && (!empty($_POST['oname'])) && (!empty($_POST['email'])) && (!empty($_POST['address'])) && (!empty($_POST['phone_number'])) && (!empty($_POST['pre_section_list'])) && (!empty($_POST['section_list'])))
  {
    if($admin_object->assign_staff($_POST['sname'], $_POST['oname'], $_POST['address'], $_POST['email'], $_POST['sname'], $_POST['phone_number'], $_POST['pre_section_list'], $_POST['section_list']))
    {
      $truth_value = true;
      $message = "The staff has been successfully assigned to the selected section";
    }else
    {
      $truth_value = false;
      $message = "The staff could not be assigned to the selected section";
    }
  }
  else
  {
      $truth_value = false;
      $message = "Please fill all fields";
  }

}

//Displaying the latest assigned staff at the right side of the page in a table
$all_staff = $admin_object->role_assigned();

?>

      <br><br>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <h3><p class="login-box-msg">ASSIGN STAFF</p></h3>
            <center>
              <div class="row">
                <?php
                if(isset($_POST['assignstaff']))
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
            <div class="col-sm-7">
              <form action="assignstaff.php" method="POST" class="form-horizontal" role = "form">
                <div class="form-group"> 
                  <label for="sname" class="col-sm-3 control-label">Surname</label>
                  <div class="col-sm-9">
                    <input type="text" name="sname" class="form-control" value="<?php if(isset($_POST['sname']) && $truth_value == false) { echo $_POST['sname']; } ?>" placeholder= "Enter your surname">
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="oname" class="col-sm-3 control-label">Othernames</label>
                  <div class="col-sm-9">
                    <input type="text" name="oname" class="form-control" value="<?php if(isset($_POST['oname']) && $truth_value == false) { echo $_POST['oname']; } ?>" placeholder= "Enter your Othernames">
                  </div>
                </div>

                 <div class="form-group"> 
                  <label for="address" class="col-sm-3 control-label">Home address</label>
                  <div class="col-sm-9">
                    <textarea name="address" class="form-control" placeholder= "Enter your home address"><?php if(isset($_POST['address']) && $truth_value == false) { echo $_POST['address']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="email" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" value="<?php if(isset($_POST['email']) && $truth_value == false) { echo $_POST['email']; } ?>" placeholder= "Enter your email">
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="phone_number" class="col-sm-3 control-label">Phone number</label>
                  <div class="col-sm-9">
                    <input type="text" name="phone_number" class="form-control" value="<?php if(isset($_POST['phone_number']) && $truth_value == false) { echo $_POST['phone_number']; } ?>" placeholder= "Enter your phone number">
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="pre_section_list" class="col-sm-3 control-label">Section</label>
                  <div class="col-sm-9">
                    <select name= "pre_section_list" class="form-control" id="pre_section_list">
                      <option value="">--Select a section--</option>
                        <?php
                          foreach ($pre_section as $key => $value) 
                          {
                            ?> 
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['pre_section_name'] ?></option>
                            <?php
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="section_list" class="col-sm-3 control-label">Section name</label>
                  <div class="col-sm-9">
                    <select name= "section_list" class="form-control" id="section_list">
                      <option value="">--Select a section--</option>
                      
                    </select>
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-9 control-label"></label>
                  <div class="col-sm-3">
                    <input type="submit" name="assignstaff" class="btn btn-primary" value="ASSIGN">
                  </div>
                </div>
                
              </form>
              </div>

              <div class="col-sm-1"></div>

              <div class="col-sm-4">
                <div class="row">
                  <b>Latest Sections assigned to staff</b>
                </div>
                <div class="row">
                  <h3><hr> </h3>
                </div>
                <div class="row">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Surname</th>
                        <th>Names</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach ($all_staff as $key => $value) {
                        ?>
                          <tr>
                          <td><?php echo $value['surname'] ?></td>
                          <td><?php echo $value['name'] ?></td>
                        </tr>
                        <?php
                      }
                      
                    ?>
                    </tbody>
                  </table>
                  </div>

              </div>
            </div>
          </div>
        </div>


<script src="../../js/jquery.min.js"></script>
<script>
  $(document).ready(function()
  {

  $('#pre_section_list').change(function(){
  $('#pre_section_list option:selected').each(function(){
  var val = $(this).val();
  if (val != '') {
     $.ajax(
      {
        url:"fetch_section.php",
        type:"POST",
        data:{pre_section_list:val},
        success:function(response)
        {
          $('#section_list').html(response);
          //alert(response);
        }
      });
  }else{
    $('#section_list').html("");
  }
  });
  }).change();
  });
</script>