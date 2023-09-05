<?php
include("config.php");
extract($_POST);
$sql = "INSERT INTO `contact`(`name`, `website`, `email`, `message`) VALUES ('".$name."','".$website."','".$email."','".$message."')";
$result = $mysqli->query($sql);
if(!$result){
    die("Couldn't enter data: ".$mysqli->error);
}

header('Location: index.php');

$mysqli->close();
?>