<?php
include("connect.php");
if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $gender =  $_POST['gender'];
  $image = "images/".$_FILES['image']['name'];//to get image name with extension
  $image_size = $_FILES['image']['size'];
  // $image_tmp_name = $_FILES['image']['tmp_name'];
  //$image_folder='images/'.$image;
  $select=mysqli_query($conn,"SELECT * FROM user where email='$email'") or die ("query failed");// lnet2akad eza majoud email
  if (mysqli_num_rows($select) > 0) {// eza mawjoud email ya3te error 
    $message[] = 'User already exists';
} else {
    if ($password != $cpassword) {
        $message[] = 'Confirm password not matched';
    } elseif ($image_size > 2000000) {
        $message[] = 'Image size is too large';
    } else {
        $insert = mysqli_query($conn, "INSERT INTO `user`(`photo_of_user`, `phone_number`, `username`, `dateofbirth`, `gender`, `email`, `password`) VALUES ('$image', '$phone','$name', '$date', '$gender', '$email', '$password')") or die("Query failed: " . mysqli_error($conn));
        if ($insert) {
            // move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered successfully';
            header('Location: login.php');
            exit;
        } else {
            $message[] = 'Registration failed';
        }
    }
}

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
    
</head>
<body>

    
<div class="container">
  <h1>register now</h1>
  <?php if (isset($message)){
    foreach($message as $message){
      echo '<div class="message">'.$message.'</div>';
    }
  }
  ?>
  <form action="" method="post" enctype="multipart/form-data">
  <input class="inputs" type="text" name="name" placeholder="Username" required>
  <input class="inputs" type="email" name="email" id="" placeholder="Enter your Email" required>
  <input class="inputs" type="Password" name="password" id="" placeholder="Enter your password" required>
  <input class="inputs" type="password" name="cpassword" id="" placeholder="confirm password" required>
  <input class="inputs" type="text" name="phone" id="" placeholder="your phone number" required>
  
  <input class="inputs" type="date" name="date" id="">

  
  <input class="inputs" type="file" name="image" id="">
  <ul class="gender-list">
    <li><input type="radio" required name="gender" value="Male" id="male"><label for="male">Male</label></li>
    <li><input type="radio" required name="gender" value="Female" id="female"><label for="female">Female</label></li>
  </ul>
  <button type="submit" name="submit" value="" class="submit">Register now</button>
  <p>already have an account? <a href="login.php">login now</a></p>
</form>
</div>
</body>
</html>
