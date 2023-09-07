<?php
session_start();
$hostname="localhost";
$username="root";
$password="";
$database="d008";
$con = new mysqli($hostname,$username,$password,$database);
if (mysqli_connect_errno())
       die(mysqli_connect_error()); 
 define('BASE_URL', '//localhost/ming_website');
?>