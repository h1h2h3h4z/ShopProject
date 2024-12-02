<?php
include ("connect.php");

// Assuming buyid is passed via GET method
$buyid = $_GET['buyid'];

// Query to fetch data from buy and products tables
$select = mysqli_query($conn, "SELECT * FROM buy JOIN products ON buy.productid = products.product_id WHERE buy.buyid = $buyid");
$row = mysqli_fetch_assoc($select);

// Constructing the HTML output
$data = "
    <div class='order-details'>
        <div class='product-photo'>
            <img src='{$row['productphoto']}' alt='Product Photo'>
        </div>
        <div class='buyer-info'>
            <p><strong>Buyer Name:</strong> {$row['buyername']}</p>
            <p><strong>Location:</strong> {$row['location']}</p>
            <p><strong>Street:</strong> {$row['street']}</p>
            <p><strong>Number of Items Ordered:</strong> {$row['numberofitem']}</p>
            <p><strong>Price:</strong> {$row['price']}</p>
            <p><strong>Date of Order:</strong> {$row['date']}</p>
        </div>
    </div>";

echo $data;
?>
