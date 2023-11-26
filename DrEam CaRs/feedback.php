<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/users.css">
        <title>DrEam CaRs USERS</title>   
        <link rel="stylesheet" href="css/form.css" >
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
                            <li><a href="aboutus2.html">ABOUT</a></li>                    
                            <li><a href="contactus2.php">CONTACT</a></li>
                            <li><a href="feedback.php">FEEDBACK</a></li>
                            <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                            <li><button class="navbtn"><a href="index.php">LOGOUT</a></button></li>
                            <p class="phello">HELLO ! &nbsp;<a id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p>
                        </ul>
                    </div>   
                </div>
        
        <!-- <div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Feedback</h2> 
                    <p> Please provide your valuable feedback below: </p>
                    <form id="reused_form" action="cardetails.html">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="bad" >
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average" >
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="good" >
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Comments:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <input type="submit"  class="btn btn-lg btn-warning btn-block" value="SUBMIT"></input>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
        </div>
         -->
    </div>
</div>    
    </body>
</html>