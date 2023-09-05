<?php 
// signout user 

include("db/config.php");
session_start();
session_destroy();
header('Location:login');

exit();
?>

