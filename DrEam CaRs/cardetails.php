<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/users.css">
    <title>DrEam CaRs USERS</title>   
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background: url("images/carbg2.jpg");
            min-block-size: calc(100vh + 85px);
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        .overview{
            padding-top: 100px;
        }
        .box{ 
            position:center;
            top: 50%;
            left: 50%;
            padding: 40px;
            box-sizing: border-box;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
            background: linear-gradient(to top, rgba(255, 251, 251, 0.8)50%,rgba(250, 246, 246, 0.8)50%);
            display: flex;
            align-content: center;
            margin-top: 50px;
            margin-left: 420px;
            margin-bottom: 30px;
        }
        .box .imgBx{
            width: 170px;
            flex:0 0 150px;
        }

        .box .imgBx img{
            max-width: 170%;
        }

        .box .content{
            padding-left: 180px;
            text-align: center;
        }
        .content h1{
            font-size: 26px;
            margin-bottom: 15px;
            color: orangered;
        }
        .content h3{
            text-align: left;
            font-size: 20px;
            font-family:Verdana;
            font-weight: 100;
        }
        .box .button{
            /* width: 240px;
            height: 40px;
            background: #ff7200;
            border:none;
            margin-top: 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color:#fff;
            transition: 0.4s ease; */
            padding: 6px 30px;
            font-size: 18px;
            cursor: pointer;
            background-color: #028482;
            border: 1px solid #000;
        }
        .button a{
            text-decoration: none;
            color: #fff;
        }
        .de{
            float: left;
            clear: left;
            display: block;
        }
        .de li a:hover{
            color:black;
        }
        .de .lis:hover{
            color: white;
        }
        .overview{
            text-align: center;
        }
        .circle{
            border-radius:48%;
            width:65px;
        }
        .phello{
            width: 200px;
            margin-left: -50px;
            padding: 0px;
        }
        #stat{
            margin-left: -8px;
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
        // $row=mysqli_fetch_assoc($cars);
    ?>
</head>
<body class="body">
    <div class="cd">
        <div class="main">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo">DrEam CaRs</h2>
                </div>
                <div class="menu">              
                    <ul>
                        <li><a class="active" href="cardetails.php">HOME</a></li>
                        <li><a href="aboutus2.php">ABOUT</a></li>                    
                        <li><a href="contactus2.php">CONTACT</a></li>
                        <li><a href="#" class="button" data-modal="Feedbackmodal">FEEDBACK</a></li>
                        <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                        <li><button class="navbtn"><a href="index.php">LOGOUT</a></button></li>
                        <p class="phello">HELLO ! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p>
                    </ul>
                </div>   
            </div>
            <div id="Feedbackmodal" class="modal">
                <div class="modal-content">
                    <div class="contact-form">
                        <a class="close">&times;</a>
                        <form id="reused_form" action="cardetails.php" method="POST">
                            <h2><i style="padding: 0 10px 0 0;" class="fa-solid fa-comments"></i>Feedback</h2>
                            <input class="h" type="text" placeholder="Enter Name"><br>
                            <textarea rows="10" placeholder="Enter your message"></textarea><br>
                            <input type="submit" class="btnn" value="LOGIN" name="adlog" >
                        </form>
                    </div>
                </div>
            </div>
            <div><h1 class="overview">OUR CARS OVERVIEW</h1>
                <ul class="de">
                    <?php
                        while($result= mysqli_fetch_array($cars))
                        {   
                    ?>    
                    <li>
                    <form method="POST">
                        <div class="box">
                            <div class="imgBx">
                                <img src="images/<?php echo $result['CAR_IMG']?>">
                            </div>
                            <div class="content">
                                <?php $res=$result['CAR_ID'];?>
                                <h1><?php echo $result['CAR_NAME']?></h1>
                                <h3>Fuel Type : <a><?php echo $result['FUEL_TYPE']?></a> </h3>
                                <h3>CAPACITY : <a><?php echo $result['CAPACITY']?></a> </h3>
                                <h3>Rent Per Day : <a>₹<?php echo $result['PRICE']?>/-</a></h3><br>
                                <button type="submit"  name="booknow" class="button" style="margin-top: 5px;"><a href="booking.php?id=<?php echo $res;?>">Book</a></button>
                            </div>
                        </div>
                    </form>
                    </li>
                    <?php
                        }
                    ?>
                    <?php 
                    require_once('connection.php');
                    $value = $_SESSION['email'];
                    $sql="select * from users where EMAIL='$value'";
                    $name = mysqli_query($con,$sql);
                    $rows=mysqli_fetch_assoc($name);
                    ?>        
                    <!-- <div id="name" style="display: none;">
                        <?php
                            $name=$rows['FNAME']." ".$rows['LNAME'];
                            echo htmlspecialchars($color);
                        ?>
                    </div> -->
                </ul>
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