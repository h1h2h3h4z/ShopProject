<?php
include("connect.php");
$id=$_GET['usid'];
$select=mysqli_query($conn,"SELECT * from user where userid=$id");
$product=mysqli_query($conn,"SELECT * from products where userid=$id");

$userinfo=array();
$userinfopruduct=array();
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
        'date'=>$row['dateofbirth']



);
while($row=mysqli_fetch_assoc($product)){
    $userinfopruduct[]=array(
        'productphoto'=>$row['productphoto'],
        'describeofproduct'=>$row['describeofproduct'],
        'priceofproduct'=>$row['priceofproduct'],
        'number_of_item'=>$row['number_of_item'],
        'createdate'=>$row['createdate'],
        'title'=>$row['title']


);
$response=array('user'=>$userinfo,'products'=>$userinfopruduct);
}
echo json_encode($response);



?>