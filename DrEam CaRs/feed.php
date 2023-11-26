<?php
require_once('connection.php');
    $email=$_GET['email'];
    $msg=$_GET['msg'];
    if( empty($email)|| empty($msg)){
        echo '<script>alert("please fill all the fields")</script>';
    }
    else{
        $sql="insert into feedback (EMAIL,COMMENT) values('$email','$msg')";
        $result = mysqli_query($con,$sql); 
        // echo '<script>alert("USER DELETED SUCCESFULLY")</script>';
        echo '<script> window.location.href = "contactus.php";</script>';
    }
?>