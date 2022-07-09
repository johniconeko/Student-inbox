<?php
session_start();
unset($_SESSION['USER_ID']);
session_destroy();
session_unset();
header("Location: login.php?logout=true");

?>