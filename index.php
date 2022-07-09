<?php
  include "includes/header.php";
  include "includes/navbar.php";
?>
    

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Dashboard</h1>
   
    <div><button onclick="window.location = 'employee.php'">+Add/Delete/View Employee</button>
    </div>
    <br>
    <div><button onclick="window.location = 'office.php'">+Add/Delete/View Office</button></div> 
  </div>
</main>

<?php
  include "includes/footer.php";
?>
