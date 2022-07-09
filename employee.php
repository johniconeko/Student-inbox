<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
    

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">

    <div>
      

    </div>

    <h1 class="mt-5"><?= isset($_GET['id']) ? "Edit " : "Add " ?>Employee</h1>
        <?php

      if(isset($_GET['success']) and $_GET['success']=='true'){

      //  $action = $_GET['edit']=='true' ? "Edited" : "Added";
      //  $action = $_GET['delete']=='true' ? "Deleted" : "Added";

        if(isset($_GET['edit']) && $_GET['edit']=='true'){
          $action = "Edited";
          $alert = "warning";
        }else if (isset($_GET['delete']) && $_GET['delete']=='true'){
          $action = "Deleted";
          $alert = "danger";
        }else{
          $action = "Added";
          $alert = "success";
        }

        echo "<div class='alert alert-$alert' role='alert'>
              Successfully $action an Employee!
              </div>";
      }

      require_once("includes/sql_connection.php");
      $last_name = "";
      $first_name = "";
      $middle_name = "";
      $birth_date = "";
      $office_id = "";
      if(isset($_GET['id'])){
        $emp_id = $_GET['id'];
        $sql = "SELECT * FROM tbl_employee WHERE EMP_ID = '$emp_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            $last_name = $row['LAST_NAME'];
            $first_name = $row['FIRST_NAME'];
            $middle_name = $row['MIDDLE_NAME'];
            $birth_date = $row['BIRTH_DATE'];
            $office_id = $row['OFFICE_ID'];

          }
        }

      }

    ?>
   
      <form name='employee' method="post" action="<?= isset($_GET['parent_id']) ? "edit-" : "add-" ?>employee.php">

      <div class="row mb-2">
        <div class="col-sm-4">
          <label for="first_name" class="form-label">First name</label>
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?= $first_name; ?>" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>

        </div>
          <div class="col-sm-4">
          <label for="last_name" class="form-label">Last name</label>
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="<?= $last_name; ?>" required>
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>

        <div class="col-sm-4">
          <label for="middle_name" class="form-label">Middle name</label>
          <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="" value="<?= $middle_name; ?>" >
        </div>

        </div>  
              <div class="row mb-3">
        <div class="col-sm-4">
          <label for="birth_date" class="form-label">Date of Birth</label>
          <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="" value="<?= $birth_date; ?>" required>
          <div class="invalid-feedback">
            Valid date of birth is required.
          </div>
        </div>  

        <div class="col-sm-4">
          <label for="office_id" class="form-label">Office</label>
          <select class='form-control' id="office_id" name="office_id" value="<?= $office_id; ?>" required> 
            <?php 
              $sql = "SELECT * FROM tbl_office";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $office_name  = $row['OFFICE_NAME'];
                  $office    = $row['OFFICE_ID'];

                  $selected = isset($_GET['edit']) && $office_id == $office ? "selected" : "";
                  echo "<option value='$office' $selected>$office_name</option>";
                }                
                
              }
            ?>

          </select>
          <div class="invalid-feedback">
            Valid office ID is required.
          </div>
        </div>


        <div class='row mb-1'>
          <div class="class-sm-4">
            <?= isset($_GET['id']) ? "<input type='hidden' name='emp_id' value='".$_GET['id']."' />" : "" ?>
          <input type="submit" name="Submit">          
        </div>
        </div>
         </div>

      </form>

<button onclick="myFunction()">Show List</button>
<div id="myDIV" style="display:none">
      <div class='row mb-1'>
  <h1 class='mt-5'>Employees</h1>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Birth Date</th>
      <th scope="col">Office</th>
      <th scope="col">Actions</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("includes/sql_connection.php");
      $sql = "SELECT * FROM tbl_employee LEFT JOIN tbl_office ON tbl_employee.OFFICE_ID = tbl_office.OFFICE_ID";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $display="";
        while($row = $result->fetch_assoc()) {
          $display.="<tr>";
          $display.="<td> ".$row['EMP_ID']."</td>";
          $display.="<td> ".$row['FIRST_NAME']."</td>";
          $display.="<td> ".$row['MIDDLE_NAME']."</td>";
          $display.="<td> ".$row['LAST_NAME']."</td>";
          $display.="<td> ".$row['BIRTH_DATE']."</td>";
          $display.="<td> ".$row['OFFICE_NAME']."</td>";
          $display.='<td><button type="button" onclick="location.href=\'employee.php?id='.$row['EMP_ID'].'\'">Edit</button></td>';
          $display.='<td><button type="button" onclick="location.href=\'delete-employee.php?id='.$row['EMP_ID'].'\'">Delete</button></td>';
          $display.='<td><button type="button" onclick="location.href=\'view-family.php?parent_id='.$row['EMP_ID'].'\'">View Family</button></td>';
          $display.="</tr>";

        }
        echo $display;
      } else {
        echo "<tr><td colspan=6> 0 results</td></tr> ";
      }
      $conn->close()
    ?>
  </tbody>
</table>
      </div>

  </div>

</div>

<?php 
  include "includes/func.php";
?>
</main>

<?php
  include "includes/footer.php";
?>
