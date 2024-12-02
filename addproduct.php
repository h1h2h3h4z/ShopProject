<?php
include("connect.php");
session_start();
if(isset($_POST['submit'])){
    $user_id=$_SESSION['user_id'];
    $title=$_POST['title'];
    $product_photo='images/'.$_FILES['photo']['name'];
    $photo_description=$_POST['photo_description'];
    $price_of_product=$_POST['price'];
    $quantity=$_POST['quantity'];
    $insert=mysqli_query($conn,"INSERT INTO `products`( `userid`, `title`, `productphoto`, `describeofproduct`, `priceofproduct`, `number_of_item`) VALUES ('$user_id','$title','$product_photo','$photo_description','$price_of_product','$quantity')");
    //mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/addproduct.css">
</head>
<body>
<div id="theclass2" class="addproduct"><?php
        include("connect.php");
        
        if(!isset($_SESSION['user_id'])){
           echo "
            <div class='donthaveuser'>
                <h2>To add product please log in or sign up</h2>
               <a href='login.php'> <button><p>login<p></button></a>
                <p>dont have an account? <a href='signup.php'>register now</a></p>
            </div>
            ";
        }else{
            echo "
               <div class='bigcontiner'> 
            <div class='container1'>
            <h2>Add New Product</h2>
            <form action='' method='POST' enctype='multipart/form-data'>
                <label for='title'>Title:</label>
                <select id='title' class='title' name='title' required>
                <option value='Sports'>Sports</option>
                <option value='Clothes'>Clothes</option>
                <option value='Shoes'>Shoes</option>
                <option value='Phones'>Phones</option>
                <option value='Computers'>Computers</option>
                <option value='Medicine'>Medicine</option>
                <option value='Cars'>Cars</option>
                <option value='Something else'>Something Else</option>
            </select>
                
                <label for='photo'>Product Photo:</label>
                <input type='file' id='photo' name='photo' accept='image/' required>
                
                <label for='photo_description'>Description of Photo:</label>
                <textarea id='photo_description' name='photo_description'  required></textarea>
                
                <label for='price'>Price:</label>
                <input type='number' id='price' name='price' min='0' step='0.01' required>
                
                <label for='quantity'>Number of Items:</label>
                <input type='number' id='quantity' name='quantity' min='0' required>
                
                <input type='submit' name='submit' value='Add Product'>
            </form>
        </div>
        
        
        <div id='container2' class='container2'>
        <div class='products'>
                <div class='product'>
                    <div class='profile'>
                        <img src=''>
                        <h2 class='thetitle'></h2>
                        
                    </div>
                    <hr>
                    <img class='theimgsrc' src=''>
                    <div class='product-info'>
                        <div class='tit'><h3 class='txtofpr'></h3></div>
                        <p class='dp'></p>
                        Price:
                        <p class='thep'> </p>
                        Quantity Available:
                        <p class='qty'> </p>
                        <div class='buttons'>
                            <a href='#' class='button buy-button' disabled>Buy</a>
                            <a href='#' class='button cart-button' disabled>Add to Cart</a>
                        </div>
                    </div>
                </div>
        </div>
                </div>
        </div>";
        }
    
    ?>
   
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(".thetitle").text("Sports");
$('.title').on("change", function(){
    $(".thetitle").text($(this).val());
});

$('#photo').on("change", function(){
    $('.theimgsrc').attr({'src': $(this).val(),'alt':'no photo'});
});


$('#photo').on("change", function(){
    // Get the file name without path
    var fileName = "images/"+$(this).val().split('\\').pop();
    
    // Output the file name
    $('.theimgsrc').attr({'src': fileName,'alt':'no photo'});
});

        $("#photo_description").on("keyup",function(){
            $(".txtofpr").text($(this).val());
        });
        $("#price").on("keyup",function(){
            $(".thep").text($(this).val()+"$");
        });
        $("#quantity").on("keyup",function(){
            $(".qty").text($(this).val());
        });
        
    </script>
</body>
</html>