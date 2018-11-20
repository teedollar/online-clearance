<?php
session_start();
if(!(isset($_SESSION['id']))){
  header("Location:index.php");
}
require_once "adminheader.php";
require_once "../../class/Admin.php";

$fetch_faculty = $admin_object->fetch_faculty();
$fetch_hall = $admin_object->fetch_hall();

//inserting the staff data into the staff table
$message = "";
$truth_value = false;
if(isset($_POST['addStudent']))
{
  if((!empty($_POST['sname'])) && (!empty($_POST['oname'])) && (!empty($_POST['email'])) && (!empty($_POST['address'])) && (!empty($_POST['phone_number'])) && (!empty($_POST['matric_no'])) && (!empty($_POST['faculty'])) && (!empty($_POST['department'])) && (!empty($_POST['hall'])))
  {
    if(is_numeric($_POST['matric_no']))
    {
      if($admin_object->add_student($_POST['sname'], $_POST['oname'], $_POST['address'], $_POST['email'], $_POST['phone_number'], $_POST['matric_no'], $_POST['faculty'], $_POST['department'], $_POST['hall']))
      {
        $truth_value = true;
        $message = "The student has been successfully added to the selected dapartment";
      }else
      {
        $truth_value = false;
        $message = "The student could not be assigned to the selected department";
      }
    }else
    {
      $truth_value = false;
      $message = "Invalid matric number";
    }
  }
  else
  {
      $truth_value = false;
      $message = "Please fill all fields";
  }

}

//Displaying the latest added student at the right side of the page in a table
$all_student = $admin_object->newest_added_student();

?>

  
      <br><br>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <h3><p class="login-box-msg">ADD STUDENTS</p></h3>
            <center>
              <div class="row">
                <?php
                if(isset($_POST['addStudent']))
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
              <form action="addstudent.php" method="POST" class="form-horizontal" role="form">
                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-3 control-label">Surname</label>
                  <div class="col-sm-9">
                    <input type="text" name="sname" class="form-control" value="<?php if(isset($_POST['sname']) && $truth_value == false) { echo $_POST['sname']; } ?>" placeholder= "Enter your surname">
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-3 control-label">Othernames</label>
                  <div class="col-sm-9">
                    <input type="text" name="oname" class="form-control" value="<?php if(isset($_POST['oname']) && $truth_value == false) { echo $_POST['oname']; } ?>" placeholder= "Enter your othername">
                  </div>
                </div>

                 <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-3 control-label">Home address</label>
                  <div class="col-sm-9">
                    <textarea name="address" class="form-control" placeholder="Enter your address"><?php if(isset($_POST['address']) && $truth_value == false) { echo $_POST['address']; } ?></textarea>
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" value="<?php if(isset($_POST['email']) && $truth_value == false) { echo $_POST['email']; } ?>" placeholder= "Enter your email">
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-3 control-label">Phone number</label>
                  <div class="col-sm-9">
                    <input type="text" name="phone_number" class="form-control" value="<?php if(isset($_POST['phone_number']) && $truth_value == false) { echo $_POST['phone_number']; } ?>" placeholder= "Enter your phone number">
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-3 control-label">Matric No</label>
                  <div class="col-sm-9">
                    <input type="text" name="matric_no" class="form-control" value="<?php if(isset($_POST['matric_no']) && $truth_value == false) { echo $_POST['matric_no']; } ?>" placeholder= "Enter your matric number">
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="pre_section_list" class="col-sm-3 control-label">Faculty</label>
                  <div class="col-sm-9">
                    <select name= "faculty" class="form-control" id="faculty">
                      <option value="">--Select a faculty--</option>
                        <?php
                          foreach ($fetch_faculty as $key => $value) 
                          {
                            ?> 
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="pre_section_list" class="col-sm-3 control-label">Department</label>
                  <div class="col-sm-9">
                    <select name= "department" class="form-control" id="department">
                      <option value="">--Select a department--</option>
                      
                    </select>
                  </div>
                </div>

                <div class="form-group"> 
                  <label for="pre_section_list" class="col-sm-3 control-label">Residence hall</label>
                  <div class="col-sm-9">
                    <select name= "hall" class="form-control" id="hall">
                      <option value="">--Select a hall of reidence--</option>
                        <?php
                          foreach ($fetch_hall as $key => $value) 
                          {
                            ?> 
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php
                          }
                        ?>
                    </select>
                  </div>
                </div>



                <div class="form-group"> 
                  <label for="inputEmail3" class="col-sm-9 control-label"></label>
                  <div class="col-sm-3">
                    <input type="submit" name="addStudent" class="btn btn-primary" value="ADD STUDENT">
                  </div>
                </div>
                
              </form>
              </div>

              <div class="col-sm-1"></div>

              <div class="col-sm-4">
                <div class="row">
                  <b>Newest added students</b>
                </div>
                <div class="row">
                  <h3><hr> </h3>
                </div>
                <div class="row">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Surname</th>
                        <th>Department</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_student as $key => $value) 
                    {
                      ?>
                      <tr>
                        <td><?php echo ($key + 1) ?></td>
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

        
<?php
// require_once "../../public/footer.php";
?>
<script src="../../js/jquery.min.js"></script>
<script>
  $(document).ready(function()
  {

  $('#faculty').change(function(){
  $('#faculty option:selected').each(function(){
  var val = $(this).val();
  if (val != '') {
     $.ajax(
      {
        url:"fetch_dept.php",
        type:"POST",
        data:{facID:val},
        success:function(response)
        {
          $('#department').html(response);
        }
      });
  }else{
    $('#department').html("");
  }
  });
  }).change();
  });
</script>