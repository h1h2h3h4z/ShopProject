<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container with Logo, Search, Login, and Signup</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        

    </style>
</head>

<body>

<div class="container0">
    <div class="uldiv">
        <nav>
            <ul>
                <li class="cata" id="cta">Catogories</li>
                <li id="ct">Contact</li>
                
            </ul>
        </nav>
    </div>
    <div class="search">
    
        <input class="search-box" id="search" name="search" type="text" placeholder="Search...">
       <button type="submit" name="submit"  class="search-button">Search</button>
    
    
    </div>
    <div class="theright">
    <?php 
    include 'connect.php';
    session_start();// open session to know if there exist id or not
    
    if(!isset($_SESSION['user_id'])){// if session is empty

        echo "<div class='actions'>
            <div class='login_img'>
            
            <a class='login' href='login.php'><img src=''>
            Login</a> 
            </div>
            <div class='signupdiv'>
            <a class='signup' href='signup.php'>Sign Up</a>
                </div>
        </div>";
    }else{
        
        $select = mysqli_query($conn, "SELECT * FROM user where userid={$_SESSION['user_id']}");
        
        $myname=mysqli_fetch_assoc($select);
        if($myname['active']=='false'){
            session_destroy();
            session_unset();
            header("location:index.php");
            exit;
        }
        else{
        echo"<div class='hero'>
        <img onclick='display()' class='logoimg' src='";if($myname['photo_of_user']=='images/'){echo 'images/default-avatar.png';} else{echo $myname['photo_of_user'];}
        echo "'>";
        echo"
    </div>
        
</div>
";
    echo "
<div id='theclass' class='sup-menu-wrap'>
    <div class='sup-menu'>
        <div class='user-info'>
            <img src='";if($myname['photo_of_user']=='images/'){echo 'images/default-avatar.png';} else{echo $myname['photo_of_user'];}
            echo "'>";
            echo"
            <h3>";echo $myname['username'];echo "</h3>
        </div>
        <hr>
        <a href='editprofile.php' class='sub-menu-link'>
            <img src='images/profile.png'>
            <p>profile</p>
            <span>></span>
        </a>
        <form method='post' action='index.php'>
        <button class='logout' type='submit' name='logout'>
        <a class='sub-menu-link' href=''>
        <img name='logout' src='images/logout.png'>
            <p>logout</p>
            <span>></span>
        </a>
        </button>
        </form>
        <a href='addproduct.php' class='sub-menu-link' >
        <img name='logout' src='images/plus.png'>
            <p>add product</p>
            <span>></span>
        </a>
        <a href='myproduct.php' class='sub-menu-link' >
        <img name='myproduct' src='images/plus.png'>
            <p>My Product</p>
            <span>></span>
        </a>
        
        <a href='mywallet.php' class='sub-menu-link' >
        <img name='myproduct' src='images/wallet.png'>
            <p>My Cart</p>
            <span>></span>
        </a>
    </div>
</div>";
        if(isset($_POST['logout'])){
            session_destroy();
            session_unset();
            header("location:index.php");
            exit;
        }
    }
}
    ?>

    

    </div>
    <script>
        let l =document.getElementById("theclass");
        function display(){
        l.classList.toggle("open-menu");
        }
         
    </script>
</body>
</html>
