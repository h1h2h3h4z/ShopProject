<?php
// if(isset($_GET['name'])){
//     echo 'Hello '. $_GET['name']. " last login : ". $_GET['lastlogin'];
// }
if(isset($_POST['name']) && $_POST['lastlogin'] ){
        echo 'Hello '. $_POST['name']. " last login : ". $_POST['lastlogin'];
    }
?>