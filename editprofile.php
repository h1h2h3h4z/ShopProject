<?php
include 'connect.php';

session_start();
$user_id = $_SESSION['user_id'];

$select = mysqli_query($conn, "SELECT * FROM `user` WHERE userid = '$user_id'") or die('query failed');
$row = mysqli_fetch_assoc($select);

if(isset($_POST['submit'])){
    
   $update_name = mysqli_real_escape_string($conn, $_POST['newusername']);
   
  
   $name_up=mysqli_query($conn, "UPDATE `user` SET username = '$update_name' WHERE userid = '$user_id'") or die('query failed');
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $email_up=mysqli_query($conn, "UPDATE `user` SET email = '$update_email' WHERE userid = '$user_id'") or die('query failed');
   if($name_up and $update_name!=$row['username']){
    $message[]='your name updated successfully !';
   }
   if($email_up and $update_email!=$row['email']){
    
    
    $message[]='your email updated successfully !';
   }
   $old_pass=$_POST['old_pass'];
   $update_pass=mysqli_real_escape_string($conn, $_POST['update_pass']);
   $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);
    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass) ){
        if ($old_pass!=$update_pass){
            $message[]='old password not matched!';
        }elseif($new_pass!=$confirm_pass){
            $message[]='confirm password not matched!';
        }
        else{
            mysqli_query($conn, "UPDATE `user` SET password = '$new_pass' WHERE userid = '$user_id'") or die('query failed');
            $message[] = 'password updated successfully!';
        }
    }
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'images/'.$update_image;
    if(!empty($update_image)){
        if($update_image_size>2000000){
            $message[]='image is too large !';
        }
        else{
            $image_update_query = mysqli_query($conn, "UPDATE `user` SET photo_of_user = '$update_image_folder' WHERE userid = '$user_id'") or die('query failed');
            if($image_update_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
             }
             $message[] = 'image updated succssfully!';
        }
    }
}

// Assuming $conn is your database connection object and $user_id is defined somewhere.

if(isset($_POST['drop'])){
    // Perform the SQL update
    $active = mysqli_query($conn, "UPDATE `user` SET active = 'false' WHERE userid = '$user_id'");
    
    // Check if the update was successful
    if($active){
        // Redirect to index.php
        header("location:index.php");
        exit(); // Make sure to exit after redirection
    }
    else{
        // If the update failed, print an error message
        echo "Update failed";
    }
}

?>


   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/edit.css">
    <style>
       
  .img img {
    border-radius: 100%;
    max-width: 190px; /* Set max-width to prevent image from exceeding 170px */
    max-height: 100%; /* Set max-height to make image height proportional */
    width: 190px;
    height :100%;
    border : 2px solid black;
}
    </style>
</head>
<body>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            
        <div class="above">
            <?php
            echo "<div class='img'>";
             if($row['photo_of_user'] == 'images/'){
                echo "<img src='images/default-avatar.png'>";
             }else{
                echo "<img id='changeph' src='" . $row['photo_of_user'] . "'>";
             }
             echo "</div>";
            
            ?>
            <div class='themess'>
                <div id = "trys" class="message"></div>
                
                
             
             </div>
        </div>
        <div class="center">
        <div class="left">
            <h3>Your username :</h3>
            <input type="text" name="newusername" id="username" value="<?php echo $row['username'];?>">
            <div class="userresp" id="userresp"></div>
            <h3>Your email :</h3>
            <input type="email" name="update_email" id="email" value="<?php echo $row['email'];?>">
            <div class="email" id="email1"></div>
            <h3>Update profile picture :</h3>
            <input name="update_image" accept="image/jpg, image/jpeg, image/png" id="img" type="file">
            <div class="theimg" id="theimg"></div>
        </div>
        <div class="right">
        <h3>old password :</h3>
        <input type="hidden" id='oldpass' name="old_pass" value="<?php echo $row['password']; ?>">
            <input type="password" name="update_pass" id="oldpassc" placeholder="your previous password">
            <div class="theerror" id="theerror"></div>
            <h3>new password :</h3>
            <input name="new_pass" type="password" id="newpass" placeholder="enter new password">
            <div class="newpassresp" id="newpassresp"></div>
            <h3>confirm password :</h3>
            <input name="confirm_pass" type="password" id="newpasscnf" placeholder="confirm new password">
            <div class="newpasscresp" id="newpasscresp"></div>
            <div class="newpasscresp" id="statuspass"></div>
        </div>
</div>
    <div class="down">
        <input name="submit"  id="sub" type="submit">
        <a href="index.php"><input type="button" value="Go back"></a>
        <input id="drop" class="drop" type="button" value="Dropaccount">
        </div>
        </form>
    </div>
<div id="aresure" class="aresure">
    <div class="h1">
            <h3>Are you sure want to remove your account ?</h3>
 </div>
 <div class="yesno">
    <form action="" method="post">
        <button name="drop" type="submit">yes</button>
       
    </form>
             <button class='nocommand'>
                no
             </button>
 </div>
</div>
<div id="trys">

</div>
<script src="jquery.js"></script>
<script>
    
    var aresure = document.getElementById("aresure");
    var drop = document.getElementById("drop");
    drop.addEventListener('click', function() {
        aresure.style.display="block";
  });
  $("#sub").on("click", function(e){
    e.preventDefault(); // Prevent default form submission
    var username = $("#username").val();
    var email = $("#email").val();
   
    var image = $("#img").val().split('\\').pop();
    var oldpassword = $("#oldpass").val();
    var oldpasswordconfirm = $("#oldpassc").val();
    var newpassword = $("#newpass").val();
    var newpasswordconfirm=$("#newpasscnf").val();
    $.ajax({
        method:"get",
        url:"editprofileaction.php",
        data : { username : username, email:email,image :image , oldpassword : oldpassword,oldpasswordconfirm : oldpasswordconfirm, newpassword: newpassword,newpasswordconfirm : newpasswordconfirm },
        dataType: "json",
        success : function(data){
            console.log(data);
            if(data.name.status=='success'){
            //     $(".message").append('<div class="messagetxt">'+data.name.message+'</div>');
            //    $('.themess').show();
            $("#username").css({border:"1px solid green"});
            document.getElementById("userresp").innerHTML="<h6>"+data.name.message+"</h6>";

                
            }
            if(data.email.status=='success'){
                $("#email").css({border:"1px solid green"});
            document.getElementById("email1").innerHTML="<h6>"+data.email.message+"</h6>";

            }
            if(data.oldpassword.status=='failed'){
                
                $("#oldpassc").css({border:"1px solid red"});
                document.getElementById("theerror").innerHTML="<h6>"+data.oldpassword.message+"</h6>";
                if(data.newpassword.status=='itsempty'){
                    $("#newpass").css({border:"1px solid red"});
                    document.getElementById("newpassresp").innerHTML="<h6>"+data.newpassword.message+"</h6>";
                }
                if(data.newpasswordconfirm.status=='itsempty'){
                    $("#newpasscnf").css({border:"1px solid red"});
                    document.getElementById("newpasscresp").innerHTML="<h6>"+data.newpasswordconfirm.message+"</h6>";
                }
                //data.oldpassword.message;
               
            }
            if(data.oldpassword.status=='success'){
                document.getElementById("theerror").innerHTML="";
                $("#oldpassc").css({border:"1px solid transparent"});

                if(data.newpassword.status=='itsempty'){
                    $("#newpass").css({border:"1px solid red"});
                    document.getElementById("newpassresp").innerHTML="<h6>"+data.newpassword.message+"</h6";
                }
                if(data.newpasswordconfirm.status=='itsempty'){
                    $("#newpasscnf").css({border:"1px solid red"});
                    document.getElementById("newpasscresp").innerHTML="<h6>"+data.newpasswordconfirm.message+"</h6>";
                }else if(data.newpassword.status=='success'){
                    $("#newpass").css({border:"1px solid transparent"});
                    document.getElementById("newpassresp").innerHTML="";
                }
                if(data.newpasswordconfirm.status=='notmatch'){
                    $("#newpasscnf").css({border:"1px solid red"});
                    document.getElementById("newpasscresp").innerHTML="<h6>"+data.newpasswordconfirm.message+"</h6>";
                    $("#newpasscresp").css({color:"red"});
                }
                if(data.changepasssuc.status=='success'){
                    $("#newpasscnf").css({border:"1px solid transparent"});
                    document.getElementById("newpasscresp").innerHTML="<h6>"+data.changepasssuc.message+"</h6>";
                    $("#newpasscresp").css({color:"green"});
                }
            }
            if(data.image.status=='success'){
                $("#changeph").attr({src:"images/"+image});
                $("#img").css({border:"1px solid green"});
                document.getElementById("theimg").innerHTML="<h6>"+data.image.message+"</h6>";
            }
            

        },
        error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
        }

    });
  });
    $(".nocommand").on("click",function(){
        $('.aresure').hide();
    });
</script>
</body>
</html>