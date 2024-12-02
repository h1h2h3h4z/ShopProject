
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <div onclick="display1()" class="plus"><div class="img"><img src="images/plus.png"></div></div>
    <div id="theclass2" class="addproduct"><?php
        if(!isset($_SESSION['user_id'])){
            echo"
            <head>
            <style>
            .donthaveuser{
                
                width: 435px;
                
                margin-left: 19px;
            }
            .donthaveuser button{
                border-radius: 13px;
                cursor: pointer;
                padding: 1px;
                width: 90%;
                border: 2px solid black;
                background-color: blue;
                color: white;
            }
            .donthaveuser p,h2{
                font-size: 20px;
                font-family: monospace;
                font-weight: 300;
            }
            
            
            .donthaveuser button:hover{
                background-color: rgb(49, 49, 121);
            }
            .donthaveuser a{
                font-family: 'Poppins', sans-serif;
                transition: 1s;
                text-decoration: none;
                color: red;
                font-size: 20px;
              }
            .donthaveuser a:hover{
                transition: 1s;
                font-size: 30px;
                text-decoration: underline;
              }
              .addproduct{
                display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
              }
            </style>
            </head>
            <div class='donthaveuser'>
                <h2>To add product please sign in or sign up</h2>
               <a href='login.php'> <button><p>login<p></button></a>
                <p>dont have an account? <a href='signup.php'>register now</a></p>
            </div>
            ";
        }else{
            echo "<head>
                <style>
                .container1 {
                    position: absolute;
                    width: 435px;
                    margin: 50px auto;
                    margin-top: -40px ;
                    
                    background-color: #d40000;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    
                }
                .h2 {
                    text-align: center;
                }
                .container1 label {
                    display: block;
                    margin-bottom: 5px;
                }
                .container1 input[type='text'], input[type='number'], textarea {
                    width: calc(100% - 12px);
                    padding: 8px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
                .container1 textarea {
                    resize: vertical;
                }
                .container1 input[type='submit'] {
                    background-color: #4CAF50;
                    color: #fff;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 16px;
                }
                .container1 input[type='submit']:hover {
                    background-color: #45a049;
                }
                </style>
            </head>
            <div class='container1'>
            <h2>Add New Product</h2>
            <form action='' method='POST' enctype='multipart/form-data'>
                <label for='title'>Title:</label>
                <select id='title' name='title' required>
                <option value='sports'>Sports</option>
                <option value='clothes'>Clothes</option>
                <option value='shoe'>Shoes</option>
                <option value='phones'>Phones</option>
                <option value='computers'>Computers</option>
                <option value='medicine'>Medicine</option>
                <option value='cars'>Cars</option>
                <option value='something else'>Something Else</option>
            </select>
                
                <label for='photo'>Product Photo:</label>
                <input type='file' id='photo' name='photo' accept='image/' required>
                
                <label for='photo_description'>Description of Photo:</label>
                <textarea id='photo_description' name='photo_description' rows='4' required></textarea>
                
                <label for='price'>Price:</label>
                <input type='number' id='price' name='price' min='0' step='0.01' required>
                
                <label for='quantity'>Number of Items:</label>
                <input type='number' id='quantity' name='quantity' min='0' required>
                
                <input type='submit' name='submit' value='Add Product'>
            </form>
        </div>";
        }
    
    
    ?></div>

</body>
</html>