<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/users.css">
    <title>DrEam CaRs USERS</title>   
    <style> 
        body{
        background: url("images/carbg2.jpg");
        background-position: center;
        background-size: cover;
        height: 109vh;
        width: 100%;
        }
        .overview{
        text-align: center;
        padding: 60px;
        }
        .boxhead h1{
        padding: 130px 0 50px 0;
        align-items: center;
        color: #fff;
        text-shadow: 2px 2px 4px #000000;
        }
        .box .content{
        margin-left: 30%;
        font-size: 25px;
        align-items: center;
        width: 40%;
        box-sizing: border-box;
        border-radius: 4px;
        box-shadow: 0 5px 15px rgba(0,0,0,.5);
        background: linear-gradient(to top, rgba(255, 251, 251, 1)70%,rgba(250, 246, 246, 1)90%);
        border-left: 5px solid #028482;
        border-right: 5px solid #028482;
        padding: 50px;
        }
        .box .content .boxvalue{
        font-size: 20px;
        padding-left: 20px;
        font-family: sans-serif;
        }
        .box .button{
        width: 240px;
        height: 40px;
        background: #ff7200;
        border:none;
        margin-top: 30px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color:#fff;
        transition: 0.4s ease;
        }
        .utton{
        width: 200px;
        height: 40px;   
        background: #ff7200;
        border:none;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
        color:#fff;
        transition: 0.4s ease;
        margin-top: 10px;
        margin-left: 10px;
        }
        .utton a{
        text-decoration: none;
        color: white;
        font-weight: bold;
        }
    </style>
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
    ?>
</head>
<body >
    <div class="cd">
        <div class="main">
            <div class="navbar">
                <div class="icon">
                 <h2 class="logo">DrEam CaRs</h2>
                </div>
                <div class="menu">              
                    <ul>
                        <li><a href="cardetails.php">HOME</a></li>
                        <li><a href="aboutus2.php">ABOUT</a></li>                    
                        <li><a href="contactus2.php">CONTACT</a></li>
                        <li><a href="#" class="button" data-modal="Feedbackmodal">FEEDBACK</a></li>
                        <li><a class="active" id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                        <li><button class="navbtn"><a href="index.php">LOGOUT</a></button></li>
                        <p class="phello">HELLO ! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p>
                    </ul>
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
            <div class="boxhead">
                <h1 class="overview">YOUR BOOKING STATUS</h1>
                <?php
                    $email = $_SESSION['email'];
                    $sql="select * from booking where EMAIL='$email' order by BOOK_ID DESC LIMIT 1";
                    $name = mysqli_query($con,$sql);
                    $rows=mysqli_fetch_assoc($name);
                    if($rows==null){
                    echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
                    echo '<script> window.location.href = "cardetails.php";</script>';
                    }
                    else{
                    $sql2="select * from users where EMAIL='$email'";
                    $name2 = mysqli_query($con,$sql2);
                    $rows2=mysqli_fetch_assoc($name2);
                    $car_id=$rows['CAR_ID'];
                    $sql3="select * from cars where CAR_ID='$car_id'";
                    $name3 = mysqli_query($con,$sql3);
                    $rows3=mysqli_fetch_assoc($name3);
                ?>
                <div class="box">
                    <div class="content">
                    CAR NAME : <span class="boxvalue"> <?php echo $rows3['CAR_NAME']?></span><br><br>
                    NO OF DAYS : <span class="boxvalue"> <?php echo $rows['DURATION']?></span><br><br>
                    BOOKING STATUS : <span class="boxvalue"> <?php echo $rows['BOOK_STATUS']?></span>
                    </div>
                </div>
                <?php }
                ?>
            </div>
        </div>
    </div>   
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
</body>
</html>