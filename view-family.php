<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
    

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">

    <h1 class="mt-5"><?= isset($_GET['id']) ? "Edit " : "Add " ?>Child</h1>
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
      $child_id = "";
      if(isset($_GET['child_id'])){
        $child_id = $_GET['child_id'];
        $sql = "SELECT * FROM tbl_child WHERE CHILD_ID = '$child_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            $last_name = $row['LAST_NAME'];
            $first_name = $row['FIRST_NAME'];
            $middle_name = $row['MIDDLE_NAME'];
            $birth_date = $row['BIRTH_DATE'];
            $child_id = $row['CHILD_ID'];

          }
        }

      }

    ?>
    
      <form name='child' method="post" action="<?= isset($_GET['child_id']) ? "edit-" : "add-" ?>child.php">

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

        <div class='row mb-1'>
          <div class="class-sm-4">
            <?= isset($_GET['child_id']) ? "<input type='hidden' name='child_id' value='".$_GET['child_id']."' />" : "" ?>
            <?= isset($_GET['parent_id']) ? "<input type='hidden' name='parent_id' value='".$_GET['parent_id']."' />" : "" ?>
          <input type="submit" name="Submit">          
        </div>
        </div>
         </div>

      </form>

      <h1 class="mt-5">Parent</h1>
      <?php
      include "includes/sql_connection.php";

      $EMP_ID = $_GET['parent_id'];

      $sql = "SELECT * FROM tbl_employee WHERE tbl_employee.EMP_ID = '$EMP_ID'";
    // echo $sql;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $display="";
        while($row = $result->fetch_assoc()) {
          $display.="<tr>";
          $display.="<td> ".$row['FIRST_NAME']."</td>";
          $display.="<td> ".$row['MIDDLE_NAME']."</td>";
          $display.="<td> ".$row['LAST_NAME']."</td>";
          $display.="</tr>";

        }
        echo $display;
      } else {
        echo "<tr><td colspan=6> 0 results</td></tr> ";
      }

      ?>

    <h1 class="mt-5">Family</h1>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Birth Date</th>
      <th scope="col">Parent</th>
      <th scope="col">Actions</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("includes/sql_connection.php");

    $EMP_ID = $_GET['parent_id'];

      $sql = "SELECT tbl_child.CHILD_ID as 'CHILD_ID',  tbl_child.FIRST_NAME as 'FIRST_NAME', tbl_child.MIDDLE_NAME as 'MIDDLE_NAME', tbl_child.LAST_NAME as 'LAST_NAME', tbl_child.BIRTH_DATE as 'BIRTH_DATE', tbl_family.PARENT_ID as 'PARENT_ID'  FROM tbl_family LEFT JOIN tbl_employee ON tbl_family.PARENT_ID = tbl_employee.EMP_ID LEFT JOIN tbl_child ON tbl_family.CHILD_ID = tbl_child.CHILD_ID WHERE tbl_family.PARENT_ID = '$EMP_ID'";
    // echo $sql;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $display="";
        while($row = $result->fetch_assoc()) {
          $display.="<tr>";
          $display.="<td> ".$row['CHILD_ID']."</td>";
          $display.="<td> ".$row['FIRST_NAME']."</td>";
          $display.="<td> ".$row['MIDDLE_NAME']."</td>";
          $display.="<td> ".$row['LAST_NAME']."</td>";
          $display.="<td> ".$row['BIRTH_DATE']."</td>";
          $display.="<td> ".$row['PARENT_ID']."</td>";
          $display.='<td><button type="button" onclick="location.href=\'view-family.php?parent_id='.$row['PARENT_ID'].'&child_id='.$row['CHILD_ID'].'\'">Edit</button></td>';
          $display.='<td><button type="button" onclick="location.href=\'delete-child.php?id='.$row['CHILD_ID'].'\'">Delete</button></td>';
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

</main>

<?php
  include "includes/footer.php";
?>
