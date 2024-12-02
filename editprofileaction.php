<?php
include 'connect.php';

session_start();
$user_id = $_SESSION['user_id'];

$select = mysqli_query($conn, "SELECT * FROM `user` WHERE userid = '$user_id'") or die('query failed');
$row = mysqli_fetch_assoc($select);
$username=$_GET['username'];
$email=$_GET['email'];
$image=$_GET['image'];
$oldpassword=$_GET['oldpassword'];
$oldpasswordconfirm=$_GET['oldpasswordconfirm'];
$newpassword=$_GET['newpassword'];
$newpasswordconfirm=$_GET['newpasswordconfirm'];
$response=array('name'=>['status'=>'','message'=>''],'email'=>['status'=>'','message'=>''],'oldpassword'=>['status'=>'','message'=>''],'newpassword'=>['status'=>'','message'=>''],'newpasswordconfirm'=>['status'=>'','message'=>''],'changepasssuc'=>['status'=>'','message'=>''],'image'=>['status'=>'','message'=>'']);

if(isset($username) && $username!=$row['username']){
    // echo "username: ".$username ."<br>";
    // echo "email: ".$email ."<br>";
    // echo "image: ".$image ."<br>";
    // echo "oldpassword: ".$oldpassword ."<br>";
    // echo "oldpasswordconfirm: ".$oldpasswordconfirm ."<br>";
    // echo "newpassword: ".$newpassword ."<br>";
    // echo "newpasswordconfirm: ".$newpasswordconfirm ."<br>";
    $response['name']['status']='success';
    $response['name']['message']='name updated';
    $name_up=mysqli_query($conn, "UPDATE `user` SET username = '$username' WHERE userid = '$user_id'") or die('query failed');
}
if(isset($email) && $email!=$row['email']){
    // echo "username: ".$username ."<br>";
    // echo "email: ".$email ."<br>";
    // echo "image: ".$image ."<br>";
    // echo "oldpassword: ".$oldpassword ."<br>";
    // echo "oldpasswordconfirm: ".$oldpasswordconfirm ."<br>";
    // echo "newpassword: ".$newpassword ."<br>";
    // echo "newpasswordconfirm: ".$newpasswordconfirm ."<br>";
    $response['email']['status']='success';
    $response['email']['message']='email updated';
    $name_up=mysqli_query($conn, "UPDATE `user` SET email = '$email' WHERE userid = '$user_id'") or die('query failed');
}
if($oldpasswordconfirm!="" and $oldpasswordconfirm !=$row['password']){
    
    $response['oldpassword']['status']='failed';
    $response['oldpassword']['message']='old password dont match';
    if($newpassword==""){
        $response['newpassword']['status']='itsempty';
        $response['newpassword']['message']='enter a value';
    }
    if($newpasswordconfirm==""){
        $response['newpasswordconfirm']['status']='itsempty';
        $response['newpasswordconfirm']['message']='enter a value';
    }
}
if($oldpasswordconfirm!="" and $oldpasswordconfirm ==$row['password']){
    
    $response['oldpassword']['status']='success';
    $response['oldpassword']['message']='old password dont match';
    if($newpassword==""){
        $response['newpassword']['status']='itsempty';
        $response['newpassword']['message']='enter a value';
    }
    if($newpassword!=""){
        $response['newpassword']['status']='success';
        $response['newpassword']['message']='enter a value';
    }
    if($newpasswordconfirm==""){
        $response['newpasswordconfirm']['status']='itsempty';
        $response['newpasswordconfirm']['message']='enter a value';
    }
    if($newpassword!="" && $newpasswordconfirm!=""){
        if($newpassword!=$newpasswordconfirm){
            $response['newpasswordconfirm']['status']='notmatch';
            $response['newpasswordconfirm']['message']='enter a correct confirm password';
        }
        else{
            $response['changepasssuc']['status']='success';
            $response['changepasssuc']['message']='password change success';
            $password_up=mysqli_query($conn, "UPDATE `user` SET password = '$newpassword' WHERE userid = '$user_id'") or die('query failed');
    
        }
    }
}
if($image!="" && $image!=$row['photo_of_user']){
    // echo "username: ".$username ."<br>";
    // echo "email: ".$email ."<br>";
    // echo "image: ".$image ."<br>";
    // echo "oldpassword: ".$oldpassword ."<br>";
    // echo "oldpasswordconfirm: ".$oldpasswordconfirm ."<br>";
    // echo "newpassword: ".$newpassword ."<br>";
    // echo "newpasswordconfirm: ".$newpasswordconfirm ."<br>";
    $response['image']['status']='success';
    $response['image']['message']=['image updated'];
    $image_update=mysqli_query($conn, "UPDATE `user` SET photo_of_user = 'images/$image' WHERE userid = '$user_id'") or die('query failed');
}
echo json_encode($response);

    exit();

?>