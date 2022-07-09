<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
    

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">

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
   
      

      <div class='row mb-1'>
  <h1 class='mt-5'>Employee List</h1>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Birth Date</th>
      <th scope="col">Office</th>
      <!-- <th scope="col">Actions</th> -->
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("includes/sql_connection.php");
    $OFFICE_ID = $_GET['id'];
      $sql = "SELECT tbl_employee.EMP_ID as 'OFFICE_ID', tbl_employee.OFFICE_ID as 'OFFICE_NAME', tbl_employee.FIRST_NAME as 'FIRST_NAME', tbl_employee.MIDDLE_NAME as 'MIDDLE_NAME', tbl_employee.LAST_NAME as 'LAST_NAME', tbl_employee.BIRTH_DATE as 'BIRTH_DATE' FROM tbl_office LEFT JOIN tbl_employee ON tbl_office.OFFICE_ID = tbl_employee.OFFICE_ID WHERE tbl_office.OFFICE_ID = $OFFICE_ID";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $display="";
        while($row = $result->fetch_assoc()) {
          $display.="<tr>";
          $display.="<td> ".$row['OFFICE_ID']."</td>";
          $display.="<td> ".$row['FIRST_NAME']."</td>";
          $display.="<td> ".$row['MIDDLE_NAME']."</td>";
          $display.="<td> ".$row['LAST_NAME']."</td>";
          $display.="<td> ".$row['BIRTH_DATE']."</td>";
          $display.="<td> ".$row['OFFICE_NAME']."</td>";
         // $display.='<td><button type="button" onclick="location.href=\'employee.php?id='.$row['EMP_ID'].'\'">Edit</button></td>';
       //   $display.='<td><button type="button" onclick="location.href=\'delete-employee.php?id='.$row['EMP_ID'].'\'">Delete</button></td>';
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
</main>

<?php
  include "includes/footer.php";
?>
