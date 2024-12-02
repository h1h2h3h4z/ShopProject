<?php

include("connect.php");
session_start();

$response = array('status' => '', 'message' => ''); // Initialize response array

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $em = $_POST['email'];
    $pass = $_POST['pass'];
    $select = mysqli_query($conn, "SELECT * FROM user WHERE email='$em' AND password='$pass'");
    $row = mysqli_fetch_assoc($select);
    
    if (mysqli_num_rows($select) > 0) {
        if($row['role']=='user'){
        $_SESSION['user_id'] = $row['userid'];
        $response['status'] = 'success';
        $response['message'] = 'Login successful';
        }else{
            $_SESSION['user_id'] = $row['userid'];
            $response['status'] = 'admin success';
            $response['message'] = 'Login admin successful';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Email or password do not match';
    }
    
    echo json_encode($response);
    exit();
}
?>