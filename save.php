<?php
include("connect.php");
session_start();
$pid=$_POST['postid'];
$usid=$_SESSION['user_id'];

$insert=mysqli_query($conn,"INSERT INTO `mycart`(`user_id`, `post_id`) VALUES ('$usid','$pid')");
if($insert){
    echo 'sucess';
}
?>