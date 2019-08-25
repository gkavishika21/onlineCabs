<?php
session_start();
?>

<?php
include ("session.php");
include ("DbConfig.php");
$email = "";
$email = $_SESSION['email'];

$displayQuery = "SELECT * FROM customer WHERE email = '$email'";
$res = mysqli_query($connection,$displayQuery);


?>

<html>
<head>
    <style>
        body{
            background-image: url("road.png");
            -webkit-background-size: cover;
           background-size: cover;
            background-position: center center;

        }


        .info {
            width: 40%;
            text-align: left;
            font-style: italic;
            padding: 20px;
            background-color: rgb(0,0,,0.4);
            margin: auto;
        }

        label{
            color: white;
            font-size: 25px;
            font-style: italic;
            width: 500px;
        }

        .l1{
            border-radius: 10px;
            border: white solid 1px;
            font-size: 30px;
            background-color: white;
            color: black;
            float: right;
            width: 300px;
        }

       .press{
           margin-top: 10px;
           margin-left: 20px;
       }

        .button{
            margin-left: 75%;
            background-color: tomato;
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            font-style: italic;
            font-family: "Britannic Bold";
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;

        }

        .buttonEdit{
            margin-left: 65%;
            background-color: tomato;
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            font-style: italic;
            font-family: "Britannic Bold";
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;

        }

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid tomato;
        }

        .button1:hover {
            background-color: tomato;
            color: white;
        }

        .button2 {
            background-color: white;
            color: black;
            border: 2px solid blueviolet;
        }

        .button2:hover {
            background-color: blueviolet;
            color: white;
        }
    </style>
    <title class="info">Customer Profile</title>
    <link rel = "stylesheet" href="">
</head>
    <body>
    <?php

    while ($row = mysqli_fetch_array($res)) {
        ?>
        <h1>Member Profile</h1>
        <div class="profile">
            <form class="info" method="post" id="profile" action="">
                <label>Customer ID</label>
                <label class="l1"><?php echo $row['cusId'] ?></label><br><br>
                <label>Your Name: </label><br>
                <label class="l1"><?php echo $row['cusName'] ?></label><br><br>
                <label>Your Email: </label><br>
                <label class="l1"><?php echo $row['email'] ?></label><br><br>
                <label>Your Contact No: </label><br>
                <label class="l1"><?php echo $row['contactNo'] ?></label><br><br>
                <label>Your Address: </label><br>
                <label class="l1"><?php echo $row['address'] ?></label><br><br>
            </form>
            <div class="press"><a href="UpdateCustomer.php?cusId=<?php echo $row['cusId']?>" class="buttonEdit button2">Edit</a> </div>
            <div class="press"><a href="Logout.php" class="button button1">Logout</a> </div>

        </div>
        <?php

    }
    ?>
    </body>
</html>
