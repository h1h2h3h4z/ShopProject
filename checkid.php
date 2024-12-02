<?php
include("connect.php");
session_start();

    $role='';
    $array=array();
    
    if(isset($_SESSION['user_id'])){
        $array[]=array('user'=>true);
    }
    echo json_encode(array('data' => $array));

?>