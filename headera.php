<?php
include ("connect.php");
session_start();
$userinfo=array();
if(isset($_SESSION['user_id'])){
    $usid=$_SESSION['user_id'];
    $not=mysqli_query($conn,"SELECT * FROM buy where userrecieverid = '$usid' and readn='no'");
    
    $i=0;
    while($row=mysqli_fetch_assoc($not)){
        $i+=1;
    }
   $select=mysqli_query($conn,"SELECT * FROM user where userid = $usid");
    $row=mysqli_fetch_assoc($select);
    $userinfo[]=array(
        'username'=>$row['username'],
        'phonenumber'=>$row['phone_number'],
        'userid'=>$row['userid'],
        'photoofuser'=>$row['photo_of_user'],
        'gender'=>$row['gender'],
        'email'=>$row['email'],
        'password'=>$row['password'],
        'active'=>$row['active'],
        'notification'=>$i,
        'userexist'=>true



);
}
else{
    $userinfo[]=array('userexist'=>false);
}
echo json_encode(array('data' => $userinfo));



?>