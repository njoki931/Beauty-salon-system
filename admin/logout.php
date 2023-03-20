
<?php
session_start();
$_SESSION['errmsg']="You have successfully logout";
unset($_SESSION['cpmsaid']);
session_destroy(); // destroy session
header("location:index.php"); 
?>