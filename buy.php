<?php
include("connect.php");
session_start();
$userloginid= $_SESSION['user_id'];
if (isset($_GET['userid'])){
    $user_id=$_GET['userid'];
    $product_id=$_GET['productid'];
}
else{
    $user_id="";
    $product_id="";
}

$select=mysqli_query($conn,"SELECT * FROM products where product_id=$product_id");
$array=array();
while($row=mysqli_fetch_assoc($select)){
    $array[]=array(
    'productid'=>$row['product_id'],
    'productphoto'=>$row['productphoto'],
    'title'=>$row['title'],
    'describeofproduct'=>$row['describeofproduct'],
    'priceofproduct'=>$row['priceofproduct'],
    'numberofitem'=>$row['number_of_item']
    );
}
echo json_encode(array('data'=>$array));
?>