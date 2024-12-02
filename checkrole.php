<?php
include("connect.php");
session_start();
$id = $_SESSION['user_id'];
    $role='';
    $array=array();
    $checkadmin=mysqli_query($conn,"SELECT * FROM user WHERE userid=$id");
    $rowcheck=mysqli_fetch_assoc($checkadmin);
    if($rowcheck['role']=='admin'){
        $array[]=array('goto'=>'admin');
    }else{
        $array[]=array('goto'=>'user');
    }
    echo json_encode(array('role' => $array));

?>