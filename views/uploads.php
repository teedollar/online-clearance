<?php
require_once "../public/stdheader.php";
?>
    <br><br><br>
      <b><center> My Uploads</center></b>
        <section id="organisations" class="section-padding">
          <div class="container">
          
            <div class="row">
            <?php
             $file = $stud_object->my_upload($_SESSION['stud_id']);
             if(count($file) > 0){
                 foreach ($file as $key => $value) {
                
                ?>
                <div class="col-md-5">
                  <div class="col-md-5">
                    <img src="<?php echo $value['file'] ?> " width="200" height="180" class="img-responsive">
                  </div>
                    <div class="col-md-7">
                      <p>File name:<?php echo $value['file_name'] ?></p>
                      <p>Uploaded on:<?php echo $value['date_uploaded'] ?></p>
                    </div>
                  </div>
                  <div class="col-md-1"><br><br><br><br><br><br><br><br></div>
                  
                  <?php

                }
              }else
              {
                ?>
                  <center>You have not uploaded any file yet</center>
                <?php
              }

            ?>
              
          </div>
        </div>
      </section>
  
<?php
require_once "../public/footer.php";
?>