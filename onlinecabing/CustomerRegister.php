<?php

session_start();        // Start the session
?>

<?php
    include ("DbConfig.php");       //include database configuration page
    include ("session.php");        //include session page

    $error = "";

if (isset($_POST['submit'])){       //after submitting the details, assign details to the variables.

    $cusName = $_POST['name'];
    $email = $_POST['email'];
    $phn = $_POST['phn'];
    $addr = $_POST['addr'];
    $password = $_POST['pwd1'];
    $password = $_POST['pwd2'];

    if (email_exists($email, $connection)){         //check the existing email addresses.

        $error = "Email exists";

    }else{

        $insertQuery = "INSERT INTO customer(cusName,email,contactNo,address,password) VALUES ('$cusName','$email','$phn','$addr','$password')";      //insert data into database
        $res =  mysqli_query($connection , $insertQuery);

    if (!$res){     //check the result

        die("failed!!!");       //if result fail, display failed.

    }else{

        header("location: customerLogin.php");      //if result true , go to member profile page.
    }

    }

}

?>

<html>

<head>
    <script>
        function formValidation(){


            var c = document.forms["form"]["phn"].value;
            if (c == ""){
                alert("Fill the contact number!!");
                return false;
            }
            if (c.length<10){
                alert("Enter 10 numbers!!");
                return false;
            }

        var d = document.forms["form"]["email"].value;          //email address validation
        var atsign = d.indexOf("@");
        var dotsign = d.lastIndexOf(".");
        if (atsign<1 || dotsign < atsign+2 || dotsign+2 >= d.length) {
            alert("Enter the valid Email address!!");
            return false;
        }
        }

    </script>
    <style>
        body{
            background-image: url("1200.jpg");
            -webkit-background-size: cover;
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: center center;
        }


        .form-area{
            width: 500px;
            height: 1000px;
            position: relative;
            background: rgba(0,0,0,0.6);
            text-align: center;
            margin: 60px auto 0;
            padding: 35px;
            border: 3px solid #fff;
            -webkit-border-radius: 70px 0 70px 0 ;
            -moz-border-radius: 70px 0 70px 0;
            border-radius: 70px 0 70px 0;
        }

        .form-area h2{
            margin-bottom: 45px;
            color: #fff;
        }

        .img-area{
            width: 70px;
            height: 70px;
            border-radius: 70%;
            background: cadetblue;
            position: absolute;
            top: -2.6%;
            left: 43.7%;

        }

        .img-area img{
            width:60%;
            padding: 12px;
        }

        input{
            width: 100%;
            height: 50px;
            border-radius: 15px 0 15px 0;
            border: 2px solid #fff;
            margin-bottom: 15px;
            background-color: transparent;
            color: white;
        }

        .form-area p{
            text-align: left;
            color: white;
            text-transform: uppercase;
            font-weight: bold;

        }

        .btn{
            display: inline-block;
            height: 50px;
            width: 150px;
            line-height: 70px;
            overflow: hidden;
            position: relative;
            text-align: center;
            background: tomato;
            border-radius: 25px;
            color: tomato; /*tomato*/
            text-transform: uppercase;
            margin-top: 20px;
            cursor: pointer;
            text-decoration: none;

        }

        .btn-text{
            display: block;
            height: 100%;
            position: relative;
            top: 0;
            -webkit-transition: top 0.6s ;
            -moz-transition: top 0.6s ;
            -ms-trasition: top 0.6s;
            -o-transition: top 0.6s;
            transition: top 0.6s;
            width: 100%;

        }

        .for-pass{
            text-decoration: none;
            display: block;
            margin-top: 30px;
            font-weight: bold;
            font-size: 20px;
            color: white;
        }


    </style>
    <title>Register</title>
    <link rel="stylesheet">
</head>

<body>
<div id="error"><?php  echo $error ; ?></div>
<div class="form-area">
    <div class="img-area">
        <img src="User_Avatar.png">
    </div>

    <form method="POST" action="CustomerRegister.php" enctype="multipart/form-data" onsubmit=" return formValidation()" name="form">

        <h2>Register</h2>
        <p>Customer Name : </p>
        <input type="text" name="name" id="name" required>
        <p>E mail : </p>
        <input type="text" name="email" required>
        <p>Contact No: </p>
        <input type="text" name="phn" id="phn" required>
        <p>Address: </p>
        <input type="text" name="addr" required>
        <p>Password : </p>
        <input type="password" name="pwd1" required>
        <p>Confirm Password : </p>
        <input type="password" name="pwd2" required>

        <a href="#" class="btn">
            <span class="btn-text"><input name="submit" type="submit" id="submit" >Register</span>
        </a>
        <p>Already a Customer? <a href="CustomerLogin.php"> Sign In </a> </p>

    </form>
</div>

</body>
</html>

