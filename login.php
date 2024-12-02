
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        <?php if (isset($showAnimation) && $showAnimation): ?>
            .container {
                height: 550px;
                margin-top: -100px;
                transition: height 0.5s ease, margin-top 0.5s ease;
            }
        <?php endif; ?>
    </style>
</head>
<body>
    <div class="container">
        <div class="h1">
            <h1>Login</h1>
            <div class="message"></div> <!-- Message display -->
        </div>
        <form class="f" id="loginForm" action="" method="post" enctype="multipart/form-data">
            <div class="in1">
                <input class="inputs" type="email" name="email" id="email" placeholder="Enter your Email" required>
                
            </div>
            <div class="in2">
                <input class="inputs" type="password" name="pass" id="pass" placeholder="Enter your password" required>
                <div id="err"></div>
            </div>
            <div class="in3">
                <button type="submit" name="submit" class="submit">Login now</button>
            </div>
            <div class="in4">
                <p>Don't have an account? <a href="signup.php">Register now</a></p>
            </div>
        </form>
    </div>
    <script src="jquery.js"></script>
    <script>
             function check_id(){
                $.ajax({
                    method: "POST",
                    url: "checkid.php", // Form action (loginf.php)
                    data: {},
                    dataType: 'json', // Expect a JSON response
                    success: function(data) {
                        if (data.data[0].user){
                            window.location='try.html';
                    }
                }
             });
        }
        check_id();
        
    setInterval(check_id, 5000);
        $(document).ready(function() {
      
            $(".container").animate({width: '600px', opacity: "1", marginTop: '5%'}, 1000);
            $(".h1").animate({marginTop: '0px'}, 3000, function() {
                $(".in1").show(function() {
                    $(".in2").show(function() {
                        $(".in3").fadeIn(function() {
                            $(".in4").fadeIn();
                        });
                    });
                });
            });

            $("#loginForm").on("submit", function(e) {
                e.preventDefault(); // Prevent default form submission
                
                var email = $("#email").val();
                var password = $("#pass").val();
                console.log(email, password);
                
                $.ajax({
                    method: "POST",
                    url: "loginf.php", // Form action (loginf.php)
                    data: { email: email, pass: password },
                    dataType: 'json', // Expect a JSON response
                    success: function(data) {
                        // Handle successful AJAX response
                        console.log(data);
                        if (data.status == 'success') {
                            window.location.href = "try.html"; // Redirect on success
                            
                        }if(data.status == 'admin success'){
                            window.location.href = "admin.html";
                        }
                         else {
                           
                            $(".inputs").css({border:"1px solid red"});
                            document.getElementById("err").innerHTML="<h5>"+data.message+"</h5>";
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error occurred");
                    }
                });
            });
        });
    </script>
</body>
</html>
