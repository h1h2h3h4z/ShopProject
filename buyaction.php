<?php
include ("connect.php");
session_start();
$usersender=$_SESSION['user_id'];
$name=null;
$location=null;
$street=null;
$numberofitem=null;
$price=null;
$userreciever=null;
$productid=null;
if (isset($_POST['name'])){
    $name=$_POST['name'];
    $location=$_POST['location'];
    $productid=$_POST['productid'];
    $street=$_POST['street'];
    $numberofitem=$_POST['numberofitem'];
    $price=$_POST['price'];
    $userreciever=$_POST['userreciever'];
}
$insert=mysqli_query($conn,"INSERT INTO `buy`(`userbuyerid`, `userrecieverid`, `productid`, `buyername`, `location`, `street`, `numberofitem`, `price`) 
VALUES ('$usersender','$userreciever','$productid','$name','$location','$street','$numberofitem','$price')");
$select=mysqli_query($conn,"SELECT * FROM products where product_id=$productid");
$row=mysqli_fetch_assoc($select);
$newnumber=$row['number_of_item']-$numberofitem;
$update=mysqli_query($conn,"UPDATE `products` SET `number_of_item`=$newnumber where product_id=$productid");
?>