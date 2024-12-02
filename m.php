<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <link rel="stylesheet" href="css/search.css">
</head>
<body>
    <header>
        <?php require("header.php"); ?>
    </header>

    <?php
    // Include database connection
    require("connect.php");

    // Check if the database connection is successful
    if ($conn) {
        // Check if form is submitted and 'search' parameter is present
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            // Sanitize search query to prevent SQL injection
            $search_query = mysqli_real_escape_string($conn, $_POST['search']);

            // Construct SQL query to search products based on title or description
            $query = "SELECT * FROM products 
                      JOIN user ON products.userid = user.userid 
                      WHERE title LIKE '%$search_query%' OR describeofproduct LIKE '%$search_query%'";

            // Execute the query
            $result = mysqli_query($conn, $query);

            // Check if query executed successfully
            if ($result) {
                // Check if there are products found
                echo "<div class='container2'>";
                if (mysqli_num_rows($result) > 0) {
                    // Display products
                    
                    while ($producte = mysqli_fetch_assoc($result)) {
                        if ($producte['active'] == 'true') {
                            
                            echo "<div class='product'>
                                    <div class='profile'>
                                        <img src='" . $producte['photo_of_user'] . "' alt='Seller Photo'>
                                        <h2>" . $producte['username'] . "</h2>
                                    </div>
                                    <hr>
                                    <img src='" . $producte['productphoto'] . "' alt='" . $producte['title'] . "'>
                                    <div class='product-info'>
                                        <h3>" . $producte['title'] . "</h3>
                                        <p>" . $producte['describeofproduct'] . "</p>
                                        <p>Price: $" . $producte['priceofproduct'] . "</p>
                                        <p>Quantity Available: " . $producte['number_of_item'] . "</p>
                                        <div class='buttons'>
                                            <a href='#' class='button buy-button'>Buy</a>
                                            <a href='#' class='button cart-button'>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                    echo "</div>"; // Close container2
                } else {
                    // No products found
                    echo "<p>No products found matching your search query.</p>";
                }
            } else {
                // Error executing query
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // No search query provided
            echo "Please provide a search query.";
        }
    } else {
        // Database connection failed
        echo "Failed to connect to the database.";
    }
    echo "</div>";
    // Close the database connection
    mysqli_close($conn);
    ?>
    

</body>
</html>
