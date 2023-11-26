<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>DrEam CaRs ADMIN</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .content-table{
            border-collapse: collapse;  
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow:0 0  20px rgba(0,0,0,0.15);
            margin-left : 350px ;
            margin-top: 25px;
            width: 800px;
            height: 500px;
        }
        .content-table thead tr{
            background-color: #028482;
            color: white;
            text-align: left;
        }

        .content-table th,
        .content-table td{
            padding: 12px 15px;
        }

        .content-table tbody tr{
            border-bottom: 1px solid #dddddd;
        }
        .content-table tbody tr:nth-of-type(even){
            background-color: #f3f3f3;

        }

        .content-table tbody tr:nth-of-type(odd){
            background-color: #aaaaaae1;
        }
        .content-table tbody tr:last-of-type{
            border-bottom: 2px solid #028482;
        }

        .content-table thead .active-row{
            font-weight:  bold;
            color: #028482;
        }
        .feed{
            padding-top: 100px;
        }
        .header{
            text-align: center;
            color: #000000;
            text-shadow: 2px 2px 4px #fff;
        }
        .active-row .but{
          padding: 5px;
        }
        .but a{
            text-decoration: none;
            color: black;
        }   
    </style>
</head>
<body>
    <?php
    require_once('connection.php');
    $query="select *from users";
    $queryy=mysqli_query($con,$query);
    $num=mysqli_num_rows($queryy);
    ?>
    <div class="adminheader">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">DrEam CaRs</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="adminvehicle.php">VEHICLE MANAGEMENT</a></li>
                    <li><a class="active" href="adminusers.php">USERS</a></li>
                    <li><a href="admindash.php">FEEDBACKS</a></li>
                    <li><a href="adminbook.php">BOOKING REQUEST</a></li>
                    <li> <button class="navbtn"><a href="index.php">LOGOUT</a></button></li>
                </ul>
            </div>        
        </div>
        <div class="feed">
            <h1 class="header">USERS</h1>
            <div>
                <div>
                    <table class="content-table">
                        <thead>
                            <tr>
                            <th>NAME</th> 
                            <th>EMAIL</th>
                            <th>LICENSE NUMBER</th>
                            <th>PHONE NUMBER</th> 
                            <th>DELETE USERS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            while($res=mysqli_fetch_array($queryy)){


                            ?>
                            <tr  class="active-row">
                            <td><?php echo $res['FNAME']."  ".$res['LNAME'];?></php></td>
                            <td><?php echo $res['EMAIL'];?></php></td>
                            <td><?php echo $res['LIC_NUM'];?></php></td>
                            <td><?php echo $res['PHONE_NUMBER'];?></php></td>
                            <td><button type="submit" class="but" name="approve"><a href="deleteuser.php?id=<?php echo $res['EMAIL']?>">DELETE USER</a></button></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>