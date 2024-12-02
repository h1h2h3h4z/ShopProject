<?php
include("connect.php");
session_start();
$id=$_SESSION['user_id'];
$userinfo=array();
$select=mysqli_query($conn,"SELECT 
*
FROM 
    mycart
JOIN 
    user ON mycart.user_id = user.userid
JOIN 
    products ON mycart.post_id = products.product_id where mycart.user_id=$id;
");

while($row=mysqli_fetch_assoc($select)){
$userinfo[]=array(
    'productid'=>$row['product_id'],
    'productphoto'=>$row['productphoto'],
    'title'=>$row['title'],
    'describeofproduct'=>$row['describeofproduct'],
    'priceofproduct'=>$row['priceofproduct'],
    'numberofitem'=>$row['number_of_item']
    



);
}
echo json_encode(array('data' => $userinfo));

?>