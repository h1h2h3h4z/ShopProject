<?php
include("connect.php");
session_start();


// Fetch all products from the products table


$userIds = array();
if (isset($_POST['value'])) {
    $value = $_POST['value'];
    // Use $value in your query or logic
    // Example: $select2 = mysqli_query($conn, "SELECT * FROM products join user on products.userid=user.userid where title = '$value'");
} else {
    $value=null;
    // Handle case where 'value' is not set
    // Example: $select = mysqli_query($conn, "SELECT * FROM products join user on products.userid=user.userid");
}
if($value==null){
// Store products in an array
if (isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    
    $select = mysqli_query($conn, "SELECT * FROM products join user on products.userid=user.userid where products.userid!=$id");
while ($row = mysqli_fetch_assoc($select)) {
    // Check if the product exists in mycart for the current user
    $productId = $row['product_id'];
    $query = "SELECT * FROM mycart WHERE user_id = $id AND post_id = $productId";
    $result = mysqli_query($conn, $query);

    // If the product exists in mycart, customize the display
    if (mysqli_num_rows($result) > 0) {
        // Fetch data from mycart and products tables
        $cartData = mysqli_fetch_assoc($result);
        $userIds[] = array(
            'productid' => $row['product_id'],
            'user' => $row['userid'],
            'userid' => $cartData['user_id'], // Assuming you want to include user_id from mycart
            'title' => $row['title'],
            'userlogin'=>$id,
            'productphoto' => $row['productphoto'],
            'descripe' => $row['describeofproduct'],
            'price' => $row['priceofproduct'],
            'numberofitem' => $row['number_of_item'],
            'createddate' => $row['createdate'],
            'photoofuser' => $row['photo_of_user'],
            'username' => $row['username'],
            'isInCart' => true, // Flag to indicate the product is in the cart
            'islogin'=>true
        );
    } else {

        // Product not in cart, standard display
        $userIds[] = array(
            'productid' => $row['product_id'],
            'user' => $row['userid'],
            'userlogin'=>$id,
            'userid' => null, // No user_id associated if not in cart
            'title' => $row['title'],
            'productphoto' => $row['productphoto'],
            'descripe' => $row['describeofproduct'],
            'price' => $row['priceofproduct'],
            'numberofitem' => $row['number_of_item'],
            'createddate' => $row['createdate'],
            'photoofuser' => $row['photo_of_user'],
            'username' => $row['username'],
            'isInCart' => false ,// Flag to indicate the product is not in the cart
            'islogin'=>true
        );
    }
}
}else{
    $select = mysqli_query($conn, "SELECT * FROM products join user on products.userid=user.userid");

    while($row=mysqli_fetch_assoc($select)){
        $userIds[] = array(
            'productid' => $row['product_id'],
            'user' => $row['userid'],
            'userid' => null, // No user_id associated if not in cart
            'title' => $row['title'],
            'productphoto' => $row['productphoto'],
            'descripe' => $row['describeofproduct'],
            'price' => $row['priceofproduct'],
            'numberofitem' => $row['number_of_item'],
            'createddate' => $row['createdate'],
            'photoofuser' => $row['photo_of_user'],
            'username' => $row['username'],
            'isInCart' => false, // Flag to indicate the product is not in the cart
            'islogin'=>false
        );
    }
}
}
elseif ( $value == "sports" || $value == "computers" ||  $value == "shoes" ||  $value == "medicine" ||  $value == "phones" ||  $value == "cars" ||  $value == "clothes"){
    if (isset($_SESSION['user_id'])){

        $id = $_SESSION['user_id'];
       
        
    $select2 = mysqli_query($conn, "SELECT * FROM products join user on products.userid=user.userid where products.title = '$value'");
    while ($row = mysqli_fetch_assoc($select2)) {
        // Check if the product exists in mycart for the current user
        $productId = $row['product_id'];
        $query = "SELECT * FROM mycart WHERE user_id = $id AND post_id = $productId";
        $result = mysqli_query($conn, $query);
    
        // If the product exists in mycart, customize the display
        if (mysqli_num_rows($result) > 0) {
            // Fetch data from mycart and products tables
            $cartData = mysqli_fetch_assoc($result);
            $userIds[] = array(
                'productid' => $row['product_id'],
                'user' => $row['userid'],
                'userlogin'=>$id,
                'userid' => $cartData['user_id'], // Assuming you want to include user_id from mycart
                'title' => $row['title'],
                'productphoto' => $row['productphoto'],
                'descripe' => $row['describeofproduct'],
                'price' => $row['priceofproduct'],
                'numberofitem' => $row['number_of_item'],
                'createddate' => $row['createdate'],
                'photoofuser' => $row['photo_of_user'],
            'username' => $row['username'],
                'isInCart' => true, // Flag to indicate the product is in the cart
                'islogin'=>true
            );
        } else {
            // Product not in cart, standard display
            $userIds[] = array(
                'productid' => $row['product_id'],
                'user' => $row['userid'],
                'userlogin'=>$id,
                'userid' => null, // No user_id associated if not in cart
                'title' => $row['title'],
                'productphoto' => $row['productphoto'],
                'descripe' => $row['describeofproduct'],
                'price' => $row['priceofproduct'],
                'numberofitem' => $row['number_of_item'],
                'createddate' => $row['createdate'],
                'photoofuser' => $row['photo_of_user'],
            'username' => $row['username'],
                'isInCart' => false ,// Flag to indicate the product is not in the cart
                'islogin'=>true
            );
        }
    }
    }
    else {
        
        $select2 = mysqli_query($conn, "SELECT * FROM products join user on products.userid=user.userid where products.title = '$value'");
        while ($row = mysqli_fetch_assoc($select2)) {
            $userIds[] = array(
                'productid' => $row['product_id'],
                'user' => $row['userid'],
                
                'userid' => null, // No user_id associated if not in cart
                'title' => $row['title'],
                'productphoto' => $row['productphoto'],
                'descripe' => $row['describeofproduct'],
                'price' => $row['priceofproduct'],
                'numberofitem' => $row['number_of_item'],
                'createddate' => $row['createdate'],
                'photoofuser' => $row['photo_of_user'],
                'username' => $row['username'],
                'isInCart' => false ,// Flag to indicate the product is not in the cart
                'islogin'=>false
            );

        }
    }
}
// Encode product data into a JSON array
echo json_encode(array('mydataproduct' => $userIds));

// Stop further execution
exit();
?>
