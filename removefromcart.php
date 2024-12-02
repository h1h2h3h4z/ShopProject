<?php
include ("connect.php");
session_start();
$id=$_SESSION['user_id'];
$pid=$_GET['product'];
$remove=mysqli_query($conn,"DELETE from mycart where user_id=$id and post_id=$pid ");


?>