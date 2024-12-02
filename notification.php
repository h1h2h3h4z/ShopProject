<?php
include("connect.php");
session_start();
$id=$_SESSION['user_id'] ;
$ins=mysqli_query($conn,"UPDATE `buy` SET `readn`='yes' WHERE userrecieverid=$id");


?>