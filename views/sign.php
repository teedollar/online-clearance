<?php
require_once "../public/staffheader.php";
?>
    <br><br><br>
      <b><center> List of Students</center></b>
        

<div class="container">
<br><br>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Matric Number</th>
        <th>Department</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
     <?php
        $all_student = $staff_object->select_students_to_sign($_SESSION['staff_id']);
        if(count($all_student) > 0)
        {
          foreach ($all_student as $key => $value) 
          {
          
          ?>
            <tr>
              <td><?php echo $value['surname']." ".$value['othername'] ?></td>
              <td><?php echo $value['matric_no'] ?></td>
              <td><?php echo $value['dept'] ?></td>
              <td><a href="details.php?stud_id=<?php echo $value['id'] ?>"><input type="submit" class="btn btn-primary" value="View"></a></td>
            </tr>
          <?php
          }
        }else
        {
          ?>
          <tr><td></td><td colspan="3"> All students' documents have been attended to</td></td></tr>
          <?php
        }

        ?>

      
    </tbody>
  </table>
</div>

<?php
require_once "../public/footer.php";
?>