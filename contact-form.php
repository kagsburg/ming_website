<?php
include("includes/config.php");
extract($_POST);
$sql = "INSERT INTO `contact`(`name`, `website`, `email`, `message`) VALUES ('".$name."','".$website."','".$email."','".$message."')";
$result = mysqli_query($con,$sql);
if(!$result){
    die("Couldn't enter data: ". mysqli_error($con));
}

header('Location: index.php');

$mysqli->close();
?>