<?php 
include("connect.php");
session_start(); 
$user_id = $_SESSION['user_id']; 
$result = mysqli_query($conn, "SELECT * FROM products JOIN user ON user.userid=products.userid WHERE user.userid=$user_id");

$table = "<table class='product-table'>
            <thead>
                <tr>
                    <th>ID of Product</th>
                    <th>Photo of Product</th>
                    <th>Description</th>
                    <th>Time of Add</th>
                    <th>Price</th>
                    <th>Number of Items</th>
                </tr>
            </thead>
            <tbody>";

while($row = mysqli_fetch_assoc($result)) {
    $table .= "<tr>
                <td>{$row['product_id']}</td>
                <td><img src='{$row['productphoto']}' class='product-photo'></td>
                <td>{$row['describeofproduct']}</td>
                <td>{$row['createdate']}</td>
                <td>{$row['priceofproduct']}</td>
                <td>{$row['number_of_item']}</td>
              </tr>";
}

$table .= "</tbody>
           </table>";
echo $table;
?>
