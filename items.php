<?php
include('connect.php'); 
$show = "SELECT user.firstname, user.lastname, products.title, products.productphoto,products.priceofproduct, products.describeofproduct 
         FROM user 
         JOIN products ON user.userid = products.userid";

$result = mysqli_query($conn, $show);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}


while ($row = mysqli_fetch_assoc($result)) {
    
    echo $row['firstname']. " ". $row['lastname'] ."<br>";

    echo "about: " . $row['title'] . "<br>";
    echo "price : " . $row['priceofproduct'] . "<br>";
}

// Free the result set
mysqli_free_result($result);

// Close the connection
mysqli_close($conn);
?>
