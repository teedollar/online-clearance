<?php
require_once "../public/stdheader.php";

$select_student_data = $staff_object->select_student_data($_SESSION['stud_id']);
//uploading the files
$truth_value = false;
$message = "";


//hall clearance processing

if(isset($_POST['hall_file_submit']))
{

    if(!empty($_FILES['hall_file']['name']))
    {
      $filename = $_FILES['hall_file']['name'];
      $filesize = $_FILES['hall_file']['size'];
      
        move_uploaded_file($_FILES['hall_file']['tmp_name'], 'file_upload/'.$filename);
          $file_path = 'file_upload/'.$filename;

          if($stud_object->upload_files($_SESSION['stud_id'], $filename, $file_path, 3, $_SESSION['hall_id'], date("Y/m/d")))
          {

            $truth_value = true;
            $message = "Your file has been uploaded successfully ";
          }else
          {
            $truth_value = false;
            $message = "Looks like something went wrong with the file upload";
          }

    }else
    {
      $truth_value = false;
      $message = "Please choose a file to upload";
    }

}


##################################################################################


//department clearance processing

if(isset($_POST['dept_file_submit']))
{

    if(!empty($_FILES['dept_file']['name']))
    {
      $filename = $_FILES['dept_file']['name'];
      $filesize = $_FILES['dept_file']['size'];
      
        move_uploaded_file($_FILES['dept_file']['tmp_name'], 'file_upload/'.$filename);
          $file_path = 'file_upload/'.$filename;

          if($stud_object->upload_files($_SESSION['stud_id'], $filename, $file_path, 2, $_SESSION['dept_id'], date("Y/m/d")))
          {

            $truth_value = true;
            $message = "Your file has been uploaded successfully ";
          }else
          {
            $truth_value = false;
            $message = "Looks like something went wrong with the file upload";
          }

    }else
    {
      $truth_value = false;
      $message = "Please choose a file to upload";
    }

}


##################################################################################


//faculty clearance processing

if(isset($_POST['fac_file_submit']))
{

    if(!empty($_FILES['fac_file']['name']))
    {
      $filename = $_FILES['fac_file']['name'];
      $filesize = $_FILES['fac_file']['size'];
      
        move_uploaded_file($_FILES['fac_file']['tmp_name'], 'file_upload/'.$filename);
          $file_path = 'file_upload/'.$filename;

          if($stud_object->upload_files($_SESSION['stud_id'], $filename, $file_path, 1, $_SESSION['fac_id'], date("Y/m/d")))
          {

            $truth_value = true;
            $message = "Your file has been uploaded successfully ";
          }else
          {
            $truth_value = false;
            $message = "Looks like something went wrong with the file upload";
          }

    }else
    {
      $truth_value = false;
      $message = "Please choose a file to upload";
    }

}


##################################################################################


//faculty clearance processing

if(isset($_POST['lib_file_submit']))
{

    if(!empty($_FILES['lib_file']['name']))
    {
      $filename = $_FILES['lib_file']['name'];
      $filesize = $_FILES['lib_file']['size'];
      
        move_uploaded_file($_FILES['lib_file']['tmp_name'], 'file_upload/'.$filename);
          $file_path = 'file_upload/'.$filename;

          if($stud_object->upload_files($_SESSION['stud_id'], $filename, $file_path, 4, 3, date("Y/m/d")))
          {

            $truth_value = true;
            $message = "Your file has been uploaded successfully ";
          }else
          {
            $truth_value = false;
            $message = "Looks like something went wrong with the file upload";
          }

    }else
    {
      $truth_value = false;
      $message = "Please choose a file to upload";
    }

}


##################################################################################


//faculty clearance processing

if(isset($_POST['jaja_file_submit']))
{

    if(!empty($_FILES['jaja_file']['name']))
    {
      $filename = $_FILES['jaja_file']['name'];
      $filesize = $_FILES['jaja_file']['size'];
      
        move_uploaded_file($_FILES['jaja_file']['tmp_name'], 'file_upload/'.$filename);
          $file_path = 'file_upload/'.$filename;

          if($stud_object->upload_files($_SESSION['stud_id'], $filename, $file_path, 4, 2, date("Y/m/d")))
          {

            $truth_value = true;
            $message = "Your file has been uploaded successfully ";
          }else
          {
            $truth_value = false;
            $message = "Looks like something went wrong with the file upload";
          }

    }else
    {
      $truth_value = false;
      $message = "Please choose a file to upload";
    }

}


##################################################################################


//faculty clearance processing

if(isset($_POST['bsr_file_submit']))
{

    if(!empty($_FILES['bsr_file']['name']))
    {
      $filename = $_FILES['bsr_file']['name'];
      $filesize = $_FILES['bsr_file']['size'];
      
        move_uploaded_file($_FILES['bsr_file']['tmp_name'], 'file_upload/'.$filename);
          $file_path = 'file_upload/'.$filename;

          if($stud_object->upload_files($_SESSION['stud_id'], $filename, $file_path, 4, 1, date("Y/m/d")))
          {

            $truth_value = true;
            $message = "Your file has been uploaded successfully ";
          }else
          {
            $truth_value = false;
            $message = "Looks like something went wrong with the file upload";
          }

    }else
    {
      $truth_value = false;
      $message = "Please choose a file to upload";
    }

}

?>


<br><br>
<div class="container">
<h3><center> Welcome | <?php echo $select_student_data['surname']." ".$select_student_data['othername'] ?> </center></h3><br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <p>
        <center>
        Welcome to your dashboard. Click a section where you want be cleared and upload the necessary documents
        </center> 
      </p>
    </div>
    <div class="col-md-1"></div>
  </div>
 <hr class="bottom-line">
<center>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8">
        <div class="dvTab">
        <ul class="nav nav-tabs" role="tablist">
          <li><a data-toggle="tab" href="#hall" role = "tab">Hall</a></li>
          <li><a data-toggle="tab" href="#department" role = "tab">Department</a></li>
          <li><a data-toggle="tab" href="#faculty" role = "tab">Faculty</a></li>
          <li><a data-toggle="tab" href="#library" role = "tab">Library</a></li>
          <li><a data-toggle="tab" href="#clinic" role = "tab">Clinic</a></li>
          <li><a data-toggle="tab" href="#bursary" role = "tab">Bursary</a></li>
        </ul>
        </div>
        </div>
      </div>

 
</center>

      <br>
  
  <div class="tab-content text-center">
    <div id="hall" class="tab-pane fade in active">
      <h4>Hall Clearance</h4>
      <p>Upload  the required documents by clicking on <b><i>"browse"</i></b> and then <b><i>Upload</i></b>.</p> <br>
      <center>
              <div class="row">
                <?php
                if((isset($_POST['hall_file_submit'])) || (isset($_POST['dept_file_submit'])) || (isset($_POST['fac_file_submit'])) || (isset($_POST['lib_file_submit'])) || (isset($_POST['jaja_file_submit'])) || (isset($_POST['bsr_file_submit'])))
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
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype= "multipart/form-data" method="post" class="form-horizontal" role="form" >
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Chose a file</label>
                  <div class="col-sm-4">
                    <input type="file" name="hall_file" class="form-control" >
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="hall_file_submit" class="btn btn-primary" value="Upload">
                  </div>
              </div>

              </form>
              </div>
        </div>
        <a name="hall"></a>
      </div>
  

      <a name="department"></a>
    <div id="department" class="tab-pane fade">
      <h4>Department Clearance</h4>
      <p>Upload  the required documents by clicking on <b><i>"browse"</i></b> and then <b><i>Upload</i></b>.</p> <br>
      <center>
              <div class="row">
                <?php
                if(isset($_POST['dept_file_submit']))
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
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>#department" enctype= "multipart/form-data" method="post" class="form-horizontal" role="form" >
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Chose a file</label>
                  <div class="col-sm-4">
                    <input type="file" name="dept_file" class="form-control" >
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="dept_file_submit" class="btn btn-primary" value="Upload">
                  </div>
              </div>

              </form>
              </div>
        </div>
    </div>


    <a name="faculty"></a>
    <div id="faculty" class="tab-pane fade">
      <h4>Faculty Clearance</h4>
      <p>Upload  the required documents by clicking on <b><i>"browse"</i></b> and then <b><i>Upload</i></b>.</p> <br>
      <center>
              <div class="row">
                <?php
                if(isset($_POST['fac_file_submit']))
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
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>#faculty" enctype= "multipart/form-data" method="post" class="form-horizontal" role="form" >
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Chose a file</label>
                  <div class="col-sm-4">
                    <input type="file" name="fac_file" class="form-control" >
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="fac_file_submit" class="btn btn-primary" value="Upload">
                  </div>
              </div>

              </form>
              </div>
        </div>
    </div>



    <a name="library"></a>
    <div id="library" class="tab-pane fade">
      <h4>Library Clearance</h4>
      <p>Upload  the required documents by clicking on <b><i>"browse"</i></b> and then <b><i>Upload</i></b>.</p> <br>
      <center>
              <div class="row">
                <?php
                if(isset($_POST['lib_file_submit']))
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
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>#library" enctype= "multipart/form-data" method="post" class="form-horizontal" role="form" >
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Chose a file</label>
                  <div class="col-sm-4">
                    <input type="file" name="lib_file" class="form-control" >
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="lib_file_submit" class="btn btn-primary" value="Upload">
                  </div>
              </div>

              </form>
              </div>
        </div>
    </div>



    <a name="clinic"></a>
    <div id="clinic" class="tab-pane fade">
      <h4>Jaja Clinic Clearance</h4>
      <p>Upload  the required documents by clicking on <b><i>"browse"</i></b> and then <b><i>Upload</i></b>.</p> <br>
      <center>
              <div class="row">
                <?php
                if(isset($_POST['jaja_file_submit']))
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
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>#clinic" enctype= "multipart/form-data" method="post" class="form-horizontal" role="form" >
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Chose a file</label>
                  <div class="col-sm-4">
                    <input type="file" name="jaja_file" class="form-control" >
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="jaja_file_submit" class="btn btn-primary" value="Upload">
                  </div>
              </div>

              </form>
              </div>
        </div>
  <br><br>
  </div>



  <a name="bursary"></a>
  <div id="bursary" class="tab-pane fade">
      <h4>Bursary Clearance</h4>
      <p>Upload  the required documents by clicking on <b><i>"browse"</i></b> and then <b><i>Upload</i></b>.</p> <br>
      <center>
              <div class="row">
                <?php
                if(isset($_POST['bsr_file_submit']))
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
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>#bursary" enctype= "multipart/form-data" method="post" class="form-horizontal" role="form" >
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Chose a file</label>
                  <div class="col-sm-4">
                    <input type="file" name="bsr_file" class="form-control" >
                  </div>
                  <div class="col-sm-2">
                    <input type="submit" name="bsr_file_submit" class="btn btn-primary" value="Upload">
                  </div>
              </div>

              </form>
              </div>
        </div>
      <br><br>
  </div>
  </div>
  </div>



<!-- <script src="../../js/jquery.min.js"></script>
<script>
  $(document).ready(function()
  {

    var selectedTab = $("#<%=hfTab.ClientID%>");
    var tabId = selectedTab.val() != "" ? selectedTab.val() : "hall";
    $('#dvTab a[href="#' + tabId + '"]').tab('show');
    /*$("#dvTab a").click(function(){
      selectedTab.val($(this).attr("href").substring(1));
    });*/
  });
</script>
 -->
<?php
require_once "../public/footer.php";
?>
