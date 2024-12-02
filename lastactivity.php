<?php
include("connect.php");
session_start();


$id=$_SESSION['user_id'];
$upadte=mysqli_query($conn,"UPDATE `user` SET `last_activity`=now() WHERE userid=$id");
?>