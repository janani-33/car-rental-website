<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link  rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cont.css">
    <title>DrEam CaRs</title>
</head>
<body>
    <?php
    require_once('connection.php');
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
    header("location: adminusers.php");    
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
    ?>
    <div class="contactus-head">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">DrEam CaRs</h2>
            </div>
            <div class="menu">
                <ul>
                <li><i class="fa-solid fa-house fa-sm"></i><a href="index.php">HOME</a></li>
                <li><i class="fa-solid fa-circle-info fa-sm"></i><a href="aboutus.html">ABOUT</a></li>
                <li><i class="fa fa-cog fa-sm" aria-hidden="true"></i><a href="service.html">SERVICES</a></li>     
                <li><i class="fa fa-phone fa-sm active" aria-hidden="true"></i><a class="active" href="contactus.php">CONTACT</a></li>
                <li><i class="fa fa-sign-in" aria-hidden="true"></i><a class="button" data-modal="modalTwo" href="#">ADMIN LOGIN</a></li>
                </ul>
            </div>
        </div>
        <div id="modalTwo" class="modal">
            <div class="modal-content">
                <div class="contact-form">
                    <a class="close">&times;</a>
                    <form method="POST">
                        <h2>Admin Login</h2>
                        <i class="fa fa-envelope fa-xl" aria-hidden="true"></i><input class="h" type="text" name="adid" placeholder="Enter admin userid"><br>
                        <i class="fa-solid fa-key fa-xl"></i><input class="h" type="password" name="adpass" placeholder="Enter admin password"><br>
                        <input type="submit" class="btnn" value="LOGIN" name="adlog" >
                    </form>
                </div>
            </div>
        </div>
        <section class="contact">
            <div class="contact-header"><i class="fa-solid fa-handshake-simple fa-lg"></i>CONTACT US</div>
            <div class="container">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon"><i class="fas fa-map-marker" aria-hidden="true"></i></div>
                        <div style="margin-top: -15px;" class="text">
                            <h3>Address</h3>
                            <p>No.70AMD COMPLEX,GANDHIPURAM Coimbatore,Tamil Nadu.</p>
                        </div> 
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-phone-alt" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>507-475-6094</p>
                    </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>contactuscars@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                    <form action="feed.php"><!-- <form >action="feed.php"> -->
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <input type="tel" name="" required="required">
                            <span>Phone</span>
                        </div>
                        <div class="inputBox">
                            <textarea required="required" name="msg"></textarea>
                            <span>Type your Message...</span>
                        </div>
                        <div style="margin-top: 30px;" class="inputBox">
                            <input type="submit" name="sendfeed" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script>
            let modalBtns = [...document.querySelectorAll(".button")];
            modalBtns.forEach(function (btn) {
            btn.onclick = function () {
            let modal = btn.getAttribute("data-modal");
            document.getElementById(modal).style.display = "block";
            };
            });
            let closeBtns = [...document.querySelectorAll(".close")];
            closeBtns.forEach(function (btn) {
            btn.onclick = function () {
            let modal = btn.closest(".modal");
            modal.style.display = "none";
            };
            });
            window.onclick = function (event) {
            if (event.target.className === "modal") {
            event.target.style.display = "none";
            }
            };
        </script>
        <footer>
            <div class="subaddr"><b>DrEam CaRs - Car Renting Agency</b><br><br>
                <p>No. 70AMD COMPLEX. 100FEET. GANDHIPURAM Coimbatore,<br> 12, Coimbatore, Tamil Nadu - 641012.</p>
            </div>
            <div class="sub">
                <div class="divider"></div>
                <div class="footer-icon">
                    <ul>
                        <li><a href="https://www.facebook.com/ksrct1994"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/ksrct1994/"><i class="fa-brands fa-instagram"></i></a> </li>
                        <li><a href="https://twitter.com/ksrct1994"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCs1f7Zd-QG0tsX-JHJYtF-g"><i class="fa-brands fa-youtube"></i></a></li>                   
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>