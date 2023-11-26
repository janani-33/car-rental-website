<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>DrEam CaRs ADMIN</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .content-table{
            border-collapse: collapse;   
            font-size: 1em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow:0 0  20px rgba(0,0,0,0.15);
            margin-left : 100px ;
            margin-top: 25px;
            width: 1300px;
            height: 300px;
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
        td button{
            padding: 5px;
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
        .active-row{
            text-transform: capitalize;
        }
        .header{
            margin-top: -680px;
            text-align: center;
            color: #000000;
            text-shadow: 2px 2px 4px #fff;
        }
        .add a{
            text-decoration: none;
            color: black;
            font-weight: bolder;   
        }
        .but a{
            text-decoration: none;
            color: black;
        }
        .modal{
        display: none;
        position: fixed;
        z-index: 8;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.6);
        }
        .modal-content{
        margin: 150px auto;
        width: 35%;
        }
        .modal-content-regform{
            margin: 100px auto;
            width: 38%;
        }
        .contact-form  .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .contact-form  .close:hover,
        .contact-form .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .formcontent{
            position: absolute;
            width: 50%;
            text-align: center;
            left: 62%;
            top: 90px;
        }
        .formcontent h1{
            font-size: 46px;
            color: #ccffcc;
            text-shadow: 2px 2px 4px #000000;
            padding: 40px 0 0 0;
        }
        .formcontent h2{
            font-size: 38px;
            color: #fff;
            text-shadow: 2px 2px 4px #000000;
        }
        .formcontent h3{
            font-size: 30px;
        }
        .formcontent .headpar a{
            text-decoration: none;
            background-color: #217C7E;
            color: #fff;
            border:#000000;
            border-radius: 1px;
            margin: 10px 0 20px 0;
            padding: 10px 20px;
        }
        .formcontent .headpar a:hover{
            background-color: #258b8d;
            color: #272626;    
        }
        .contact-form form{
            text-align: center;
            padding: 25px;
            margin: 25px;
            box-shadow: 0 2px 5px #f5f5f5;
            background: #eee;
        }
        .contact-form form i{
            padding: 10px 20px 10px 10px;
        }
        .contact-form form h2{
            font-family: sans-serif;
            text-align: center;
            margin-bottom: 10px;
        }
        .contact-form form input[type=number],
        .contact-form form input[type=password],
        .contact-form form input[type=file],
        .contact-form form input[type=text]{
            width: 300px;
            height: 35px;
            background: transparent;
            color:rgb(0, 0, 0)010;
            font-size: 15px;
            letter-spacing: 1px;
            margin: 20px 0 0 0px;
            font-family: sans-serif;
            padding: 0 10px;
            outline: none;
            border: 1px solid #aaa;
        }
        .contact-form form input:focus{
            outline: none;
        }

        ::placeholder{
            color:#000000;
            font-family: Arial;
            font-size: 14px;
        }
        .btnn{
            font-size: 18px;   
            cursor: pointer;
            color:#fff;
            text-decoration: none;
            background-color: #217C7E;
            padding: 10px 20px;
            margin: 30px 20px 10px 20px;
            border: #fff;
            transition: 0.4s ease;
            font-family: 'Times New Roman', Times, serif;
        }
        .btnn:hover{
            background-color: #258b8d;
            color: #272626;    
        }
        .btnn a{
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .form .link{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            padding-top: 20px;
            text-align: center;
            color: #fff;
        }
        .form .link a{
            text-decoration: none;
            color:#ff7200
        }
    </style>    
</head>
<body>
<?php
require_once('connection.php');
$query="SELECT *from cars";    
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
                <li><a class="active" href="adminvehicle.php">VEHICLE MANAGEMENT</a></li>
                <li><a href="adminusers.php">USERS</a></li>
                <li><a href="admindash.php">FEEDBACKS</a></li>   
                <li><a href="adminbook.php">BOOKING REQUEST</a></li>
                <li> <button class="navbtn"><a href="index.php">LOGOUT</a></button></li>
            </ul>
        </div>
    </div>
</div>
<div>
    <h1 class="header">CARS</h1>
    <button class="add"><a href="#" class="button" data-modal="modalAdd">+ ADD CARS</a></button>
    <div>
        <div>
            <table class="content-table">
        <thead>
            <tr>
                <th>CAR ID</th>
                <th>CAR NAME</th>
                <th>FUEL TYPE</th>
                <th>CAPACITY</th>
                <th>PRICE</th>
                <th>AVAILABLE</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($res=mysqli_fetch_array($queryy)){
        ?>
        <tr  class="active-row">
            <td><?php echo $res['CAR_ID'];?></php></td>
            <td><?php echo $res['CAR_NAME'];?></php></td>
            <td><?php echo $res['FUEL_TYPE'];?></php></td>
            <td><?php echo $res['CAPACITY'];?></php></td>
            <td><?php echo $res['PRICE'];?></php></td>
            <td><?php  
            if($res['AVAILABLE']=='Y')
            {
                echo 'YES';
            }
            else{
                echo 'NO';
            }
            ?></php></td>
            <td><button type="submit" class="but" name="approve"><a href="deletecar.php?id=<?php echo $res['CAR_ID']?>">DELETE CAR</a></button></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
        </div>
    </div>
    <div class="content">
    <div id="modalAdd" class="modal">
        <div class="modal-content">
            <div class="contact-form">
                <a class="close">&times;</a>
                <form id="register"  action="upload.php" method="POST" enctype="multipart/form-data">
                    <h2>Enter Details Of New Car</h2>
                    <i class="fa fa-car fa-xl" aria-hidden="true"></i><input class="h" id="name" type="text" name="carname" placeholder="Enter Car Name"><br>
                    <i class="fa-solid fa-gas-pump fa-xl"></i><input type="text" name="ftype" placeholder="Enter Fuel Type"><br>
                    <i class="fa-solid fa-users fa-xl"></i><input type="number" name="capacity" min="1" placeholder="Enter Capacity Of Car"><br>
                    <i class="fa-solid fa-indian-rupee-sign fa-xl"></i><input type="number" name="price" min="1" placeholder="Enter Price Of Car for One Day(in rs)"><br>
                    <i class="fa-regular fa-images fa-xl"></i></i><input  type="file" name="image"  placeholder="Car Image"><br>
                    <input type="submit" class="btnn" value="ADD CAR" name="addcar" >
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
</body>
</html>