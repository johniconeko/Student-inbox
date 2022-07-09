<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
    

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">

    <div>
      

    </div>

    <h1 class="mt-5"><?= isset($_GET['id']) ? "Edit " : "Add " ?>Office</h1>
        <?php

      if(isset($_GET['success']) && $_GET['success']=='true'){
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
              Successfully $action an Office!
              </div>";
      }

      require_once("includes/sql_connection.php");
      $office_id = "";
      $office_name = "";
      $office_location = "";

      if(isset($_GET['id'])){
        $office_id = $_GET['id'];
        $sql = "SELECT * FROM tbl_office WHERE OFFICE_ID = '$office_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            $office_name = $row['OFFICE_NAME'];
            $office_location = $row['OFFICE_LOCATION'];
          }
        }

      }

    ?>
   
      <form name='office' method="post" action="<?= isset($_GET['id']) ? "edit-" : "add-" ?>office.php">

      <div class="row mb-2">
        <div class="col-sm-4">
          <label for="office_name" class="form-label">Office name</label>
          <input type="text" class="form-control" id="office_name" name="office_name" placeholder="" value='<?= $office_name; ?>' required>
          <div class="invalid-feedback">
            Valid office name is required.
          </div>

        </div>
          <div class="col-sm-4">
          <label for="office_location" class="form-label">Office Location</label>       
          <select class='form-control' id="office_location" name="office_location" value='<?= $office_location; ?>' required> 
            <?php 
              $sql = "SELECT * FROM tbl_region";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $office_name  = $row['region_m'];
                  $office    = $row['region_c'];

                  $selected = isset($_GET['edit']) && $office_id == $office ? "selected" : "";
                  echo "<option value='$office' $selected>$office_name</option>";
                }                
                
              }
            ?>
          </select>

        </div>



        <div class='row mb-1'>
          <div class="class-sm-4">
            <?= isset($_GET['id']) ? "<input type='hidden' name='office_id' value='".$_GET['id']."' />" : "" ?>
          <input type="submit" name="Submit">          
        </div>
        </div>
         </div>

      </form>

        <button onclick="myFunction()">Show List</button>

          <div id="myDIV" style="display:none">
      <div class='row mb-1'>
        <h1 class='mt-5'>Offices</h1>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Office Name</th>
      <th scope="col">Office Location</th>
      <th scope="col">Actions</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("includes/sql_connection.php");
      $sql = "SELECT * FROM tbl_office LEFT JOIN tbl_region ON tbl_office.OFFICE_LOCATION = tbl_region.region_c";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $display="";
        while($row = $result->fetch_assoc()) {
          $display.="<tr>";
          $display.="<td> ".$row['OFFICE_ID']."</td>";
          $display.="<td> ".$row['OFFICE_NAME']."</td>";
          $display.="<td> ".$row['region_m']."</td>";
          $display.='<td><button type="button" onclick="location.href=\'office.php?edit=true&id='.$row['OFFICE_ID'].'\'">Edit</button></td>';
          $display.='<td><button type="button" onclick="location.href=\'delete-office.php?id='.$row['OFFICE_ID'].'\'">Delete</button></td>';
          $display.='<td><button type="button" onclick="location.href=\'view-employee.php?id='.$row['OFFICE_ID'].'\'">View employee/s of this office</button></td>';
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
