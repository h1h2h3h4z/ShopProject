<?php
include ("connect.php");
session_start();
if(isset($_POST['logout'])){
    session_destroy();
            session_unset();
            header("location:try.html");
            exit;
}

?>