<?php 
include ("connect.php");
session_start();

$id=$_SESSION['user_id'] ;
echo $id;
?>