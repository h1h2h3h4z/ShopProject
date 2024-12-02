<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
       

    </style>
</head>

<body>
<header><?php 

include("header.php");?>


</header>
<?php 
include("connect.php");


// Fetch all products from the database
$result = mysqli_query($conn, "SELECT * FROM user JOIN products ON user.userid = products.userid");
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div id="theclass2" class="nice-list">
        <ul>
            <li class="nice-list-item">
                <div class="nice-list-item-content">
                    <h3 class="nice-list-item-title">SPORTS</h3>
                    
                </div>
            </li>
            <li class="nice-list-item">
                <div class="nice-list-item-content">
                    <h3 class="nice-list-item-title">clothes</h3>
                    
                </div>
            </li>
            <li class="nice-list-item">
                <div class="nice-list-item-content">
                    <h3 class="nice-list-item-title">shoes</h3>
                    
                </div>
            </li>
            <li class="nice-list-item">
                <div class="nice-list-item-content">
                    <h3 class="nice-list-item-title">phones</h3>
                </div>
            </li>
            <li class="nice-list-item">
                <div class="nice-list-item-content">
                    <h3 class="nice-list-item-title">computers</h3>
                </div>
            </li>
            <li class="nice-list-item">
                <div class="nice-list-item-content">
                    <h3 class="nice-list-item-title">Medicine</h3>
                    
                </div>
            </li>
            <li class="nice-list-item">
                <div class="nice-list-item-content">
                    <h3 class="nice-list-item-title">Cars</h3>
                    
                </div>
            </li>
        </ul>
    </div>
<div id="container2" class="container2">
    <h1>Products</h1>
    <div class="products">
        
        <?php
        $user_id=null;
        if(isset($_SESSION['user_id'])){
            $user_id=$_SESSION['user_id'] ;
        }

        
        foreach ($products as $product): ?>
            <?php if($product['active']=='true'){ 
$select2=mysqli_query($conn,"SELECT * from mycart where user_id='$user_id' and post_id='{$product['product_id']}'");

                ?>
            <div  class="product">
                <div class="profile">
                <a href="users.html?action=<?php echo $product['userid']; ?>">
                    <img src="<?php echo $product['photo_of_user']; ?>" alt="Seller Photo">
                    <h2><?php echo $product['username']; ?></h2>
                    </a>
                </div>
                <hr>
                
                <img src="<?php echo $product['productphoto']; ?>" alt="<?php echo $product['title']; ?>">
                <div class="product-info">
                    <div class="tit"><h3><?php echo $product['title']; ?></h3></div>
                    <p class="dp"><?php echo $product['describeofproduct']; ?></p>
                    <p>Price: $<?php echo $product['priceofproduct']; ?></p>
                    <p>Quantity Available: <?php echo $product['number_of_item']; ?></p>
                    <div class="buttons">
                        <a href="#" class="button buy-button">Buy</a>                      
                           <button type="button" class="button cart-button" data-productid="<?php echo $product['product_id']; ?>">Add to Cart</button>
                           
                    </div>
                </div>
            
            </div>
            <?php }?>
        <?php endforeach; ?>
       
    </div>
<div id="n">


</div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
        let z =document.getElementById("cta");
        let contact =document.getElementById("ct");
        let h =document.getElementById("theclass2");
        let container2 =document.getElementById("container2");
        z.addEventListener('mouseenter', function() {
            h.style.display="block";
  });
  contact.addEventListener('mouseenter', function() {
    h.style.display="none";
    
  });
  container2.addEventListener('mouseenter', function() {
    h.style.display="none";
    
  });
  $(document).ready(function() {
    $('.search-button').click(function(){
        var searchText = $('.search-box').val();
        $('.product').not(":contains('"+ searchText + "')").css('visibility', 'hidden');
    });
});


  
$('.cart-button').on("click",function(e){
    e.preventDefault();
    var productId = $(this).data('productid'); 
    var $button = $(this); 
    $.ajax({
        method :"get",
        url : "indexaction.php",
        data: {},
        dataType:"json",
        success : function(data){
            // if(data.check=='noid'){
            //     window.location.href = "login.php";
                
            // }
           
            // if (data.check == 'id') {
            //     // Change the button text to "saved"
            //     $button.text("saved");
            //     // Optionally, you can also disable the button
            //     $button.prop('disabled', true);
            // }
            console.log(data);
            
            // document.getElementById("n").innerHTML= data.data[0].username;
        
            $.each(data.data, function(index, element) {
    document.getElementById("n").innerHTML += element.productid + " " + element.userid + "<br>";
});
        },
        error : function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
        }

    });
});





        </script>
</body>
</html>
