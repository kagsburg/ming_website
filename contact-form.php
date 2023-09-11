<?php
include("includes/config.php");
extract($_POST);
$sql = "INSERT INTO `contact`(`name`, `website`, `email`, `message`) VALUES ('".$name."','".$website."','".$email."','".$message."')";
$result = mysqli_query($con,$sql);
if(!$result){
    die("Couldn't enter data: ". mysqli_error($con));
}
$_SESSION['msg']="Thank you for contacting us. We will get back to you soon.";
header('Location: contact');

$mysqli->close();
?>