<?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];       
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }
        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if($pass  == $db_password)
                {
                    header("location: cardetails.php");
                    session_start();
                    $_SESSION['email'] = $email;                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }
            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }
    if(isset($_POST['adlog'])){
        $id=$_POST['adid'];
        $pass=$_POST['adpass'];       
        if(empty($id)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }
        else{
            $query="select *from admin where ADMIN_ID='$id'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['ADMIN_PASSWORD'];
                if($pass  == $db_password)
                {
                    echo '<script>alert("Welcome ADMINISTRATOR!");</script>';
                    header("location: admindash.php");    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }
            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }
    if(isset($_POST['regs'])){
        $fname=mysqli_real_escape_string($con,$_POST['fname']);
        $lname=mysqli_real_escape_string($con,$_POST['lname']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $lic=mysqli_real_escape_string($con,$_POST['lic']);
        $ph=mysqli_real_escape_string($con,$_POST['ph']);
        $pass=mysqli_real_escape_string($con,$_POST['pass']);
        $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
        $Pass=md5($pass);
        if(empty($fname)|| empty($lname)|| empty($email)|| empty($lic)|| empty($ph)|| empty($pass))
        {
            echo '<script>alert("please fill all the fields")</script>';
        }
        else{
            if($pass==$cpass){
            $sql2="SELECT *from users where EMAIL='$email'";
            $res=mysqli_query($con,$sql2);
            if(mysqli_num_rows($res)>0){
                echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
                echo '<script> window.location.href = "index.php";</script>';

            }
            else{
            $sql="insert into users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD) values('$fname','$lname','$email','$lic',$ph,'$pass')";
            $result = mysqli_query($con,$sql);
            if($result){
                echo '<script>alert("Registration Successful Press ok to login")</script>';
                echo '<script> window.location.href = "index.php";</script>';       
            }
            else{
                echo '<script>alert("please check the connection")</script>';
            }
        
            }

            }
            else{
                echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
                echo '<script> window.location.href = "register.php";</script>';
            }
        }
    }
?>