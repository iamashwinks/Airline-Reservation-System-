<?php   
session_start();  
unset($_SESSION['sess_eid']);  
session_destroy();  
header("location:emplogin.php");  
?> 