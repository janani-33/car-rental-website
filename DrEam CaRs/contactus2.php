<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="css/usersc.css">
    <title>DrEam CaRs USERS</title>  
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
<body class="body">
</script>
    <div class="contactus-head">
        <div class="main">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo">DrEam CaRs</h2>
                </div>
                <div class="menu">              
                    <ul>
                        <li><a href="cardetails.php">HOME</a></li>
                        <li><a href="aboutus2.php">ABOUT</a></li>                    
                        <li><a class="active" href="contactus2.php">CONTACT</a></li>
                        <li><a href="#" class="button" data-modal="Feedbackmodal">FEEDBACK</a></li>
                        <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                        <li><button class="navbtn"><a href="index.php">LOGOUT</a></button></li>
                        <p class="phello">HELLO ! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p>
                    </ul>
                </div>   
            </div>
        </div>
        <div id="Feedbackmodal" class="modal">
            <div class="modal-content">
                <div class="contact-form">
                    <a class="close">&times;</a>
                    <form id="reused_form" action="cardetails.html" method="POST">
                        <h2>Feedback</h2>
                        <input class="h" type="text" placeholder="Enter Name"><br>
                        <textarea rows="10" placeholder="Enter your message"></textarea><br>
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
                    <form>
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <input type="tel" name="" required="required">
                            <span>Phone</span>
                        </div>
                        <div class="inputBox">
                            <textarea required="required"></textarea>
                            <span>Type your Message...</span>
                        </div>
                        <div style="margin-top: 30px;" class="inputBox">
                            <input type="submit" name="" value="Send">
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
    </div>     
</body>
</html>