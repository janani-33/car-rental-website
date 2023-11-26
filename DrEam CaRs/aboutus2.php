<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link  rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="css/about.css">
    <title>DrEam CaRs</title>
    <?php 
        require_once('connection.php');
        session_start();
        $value = $_SESSION['email'];
        $_SESSION['email'] = $value;
        $sql="select * from users where EMAIL='$value'";
        $name = mysqli_query($con,$sql);
        $rows=mysqli_fetch_assoc($name);
        $sql2="select *from cars where AVAILABLE='Y'";
        $cars= mysqli_query($con,$sql2);
        // $row=mysqli_fetch_assoc($cars);
    ?>
</head>
<body>
    <div class="aboutus-head">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">DrEam CaRs</h2>
            </div>
            <div class="menu">              
                <ul>
                    <li><a href="cardetails.php">HOME</a></li>
                    <li><a class="active" href="aboutus2.php">ABOUT</a></li>                    
                    <li><a href="contactus2.php">CONTACT</a></li>
                    <li><a href="#" class="button" data-modal="Feedbackmodal">FEEDBACK</a></li>
                    <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                    <li><button class="navbtn"><a href="index.php">LOGOUT</a></button></li>
                    <p class="phello">HELLO ! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p>
                </ul>
            </div>   
        </div>
        <div id="modalTwo" class="modal">
            <div class="modal-content">
                <div class="contact-form">
                    <a class="close">&times;</a>
                    <form action="admin.php" method="POST">
                        <h2>Admin Login</h2>
                        <i class="fa fa-envelope fa-xl" aria-hidden="true"></i><input class="h" type="text" name="adid" placeholder="Enter admin userid"><br>
                        <i class="fa-solid fa-key fa-xl"></i><input class="h" type="password" name="adpass" placeholder="Enter admin password"><br>
                        <input type="submit" class="btnn" value="LOGIN" name="adlog" >
                    </form>
                </div>
            </div>
        </div>
        <div class="about-0"><h1>ABOUT US</h1></div>
        <div class="about-1">
            <div>
                <img src="images/icon10.jpg">
            </div>
            <div>
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon"><i class="fas fa-map-marker" aria-hidden="true"></i></div>
                        <div style="margin-top: 0px;" class="text">
                            <h3>Address</h3>
                            <p>No.70AMD COMPLEX,GANDHIPURAM Coimbatore,Tamil Nadu.</p>
                        </div> 
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-phone-alt" aria-hidden="true"></i></div>
                        <div class="text" style="margin-left: 130px;">
                            <h3>Phone</h3>
                            <p>507-475-6094</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
                        <div class="text" style="margin-left: 75px; margin-top: 15px;">
                            <h3>Email</h3>
                            <p>contactuscars@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>