<!DOCTYPE html>
<html lang="en">
<head>  
<title>DrEam CaRs</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link  rel="stylesheet" href="css/style.css">
</head>
<body>
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
        $row=mysqli_fetch_assoc($res);
        if($row){
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
    <div class="hai">
        <div class="navbar">
        <div class="icon">
        <h2 class="logo">DrEam CaRs</h2>
        </div>
            <div class="menu">
                <ul>
                    <li><i class="fa-solid fa-house fa-sm active "></i><a class="active" href="index.php">HOME</a></li>
                    <li><i class="fa-solid fa-circle-info fa-sm"></i><a href="aboutus.html">ABOUT</a></li>
                    <li><i class="fa fa-cog fa-sm" aria-hidden="true"></i><a href="service.html">SERVICES</a></li>     
                    <li><i class="fa fa-phone fa-sm" aria-hidden="true"></i><a href="contactus.php">CONTACT</a></li>
                    <li><i class="fa fa-sign-in" aria-hidden="true"></i><a class="button" data-modal="modalTwo" href="#">ADMIN LOGIN</a></li>
                </ul>
            </div>
        </div>
        <div class="content">        
            <div class="formcontent">
                <h1>TRAVEL WITH US !!!</h1>
                <h2>Rent Your Dream Car</h2><br>
                <div class="headpar"><p class="par">Live the life of Luxury.<br>
                    Just rent a car of your wish from our vast collection.<br>Enjoy every moment with your family<br>Join us to make this family vast<br></p>
                    <p><a href="#" class="button" data-modal="modalOne">JOIN US</a></p>
                </div>
            </div>
            <div id="modalOne" class="modal">
                <div class="modal-content">
                    <div class="contact-form">
                        <a class="close">&times;</a>
                        <form method="POST">
                        <h2>Login Here</h2>
                        <i class="fa fa-envelope fa-xl" aria-hidden="true"></i><input type="email" name="email" placeholder="Enter Your Email"><br>
                        <i class="fa-solid fa-key fa-xl"></i><input type="password" name="pass" placeholder="Enter Your Password"><br>
                        <input class="btnn" type="submit" value="Login" name="login"></input>
                        <p class="link">Don't have an account?<br><a href="#" class="button" data-modal="modalThree">Register</a> Now</a></p>
                        </form>
                    </div>
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
            
            <div id="modalThree" class="modal">
                <div class="modal-content-regform">
                    <div class="contact-form">
                    <a class="close">&times;</a>
                    <form id="register" method="POST">
                    <h2>Register here</h2>
                    <i class="fa-solid fa-user fa-xl"></i><input type ="text" name="fname"
                    id="name" placeholder="Enter Your First Name" required><br>
                    <i class="fa-solid fa-user fa-xl"></i><input type ="text" name="lname"
                    id="name" placeholder="Enter Your Last Name" required><br>
                    <i class="fa fa-envelope fa-xl"></i><input type="email" name="email"
                    id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex: example@ex.com"
                    placeholder="Enter Valid Email" required><br>
                    <i class="fa-solid fa-id-card fa-xl"></i><input type="text" name="lic"
                    id="name" placeholder="Enter Your License number" required><br>
                    <i class="fa-solid fa-phone fa-xl"></i><input type="tel" name="ph" maxlength="10" pattern="[789][0-9]{9}"
                    title="Must contain ten digits starting with 789" id="name" placeholder="Enter Your Phone Number" required><br>
                    <i class="fa-solid fa-key fa-xl"></i><input type="password" name="pass" maxlength="12"
                    id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                    <i class="fa-solid fa-key fa-xl"></i><input type="password" name="cpass" 
                    id="cpsw" placeholder="Renter the password" required><br>
                    <input type="submit" class="btnn"  value="REGISTER" name="regs">
                    </form>
                    </div>
                </div>
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
                    <li><a href=""><i class = "fa-brands fa-pinterest"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCs1f7Zd-QG0tsX-JHJYtF-g"><i class="fa-brands fa-youtube"></i></a></li>                   
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
