<?php
include ("DbConfig.php");
include('session.php');
            $displayQuery = "SELECT * FROM customer WHERE cusId = ".$_GET['cusId']."";
            $rest = mysqli_query($connection, $displayQuery);
            $r = mysqli_fetch_assoc($rest);

            if (isset($_POST) & !empty($_POST)) {

             $updateSql = "UPDATE customer SET cusName='$_POST[cusName]', email='$_POST[email]',contactNo='$_POST[phn]',  address='$_POST[addr]' where cusId='$_POST[cusId]'";
             $res = mysqli_query($connection, $updateSql);
             if ($res) {
                 echo "successfully updated!!!!!!!!";
             } else {
                 echo "failed to insert!!!!!!!!";
             }
         }
?>
<html>
<head>
    <style>
        body{
            background-image: url("1001.jpg");
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

    <h1>Update Customer Profile</h1>
    <div class="profile">
        <form class="info" method="post" id="profile" action="">
            <label>Your ID: </label>
            <input type="text" placeholder="ID" name="cusId" id="cusId" value="<?php echo $r['cusId'];?>"><br><br>
            <label>Your Name: </label>
            <input type="text" placeholder="Name" name="name" id="name" value="<?php echo $r['cusName'];?>"><br><br>
            <label>Your Email: </label>
            <input type="text" placeholder="Email" name="name" id="name" value="<?php echo $r['email'];?>"><br><br>
            <label>Your Contact No: </label>
            <input type="text" placeholder="Contact No" name="name" id="name" value="<?php echo $r['contactNo'];?>"><br><br>
            <label>Your Address: </label>
            <input type="text" placeholder="Address" name="addr" id="addr" value="<?php echo $r['address'];?>"><br><br>
        </form>
        <div class="press"><a href="CustomerProfile.php" class="buttonEdit button2">Edit</a> </div>
        <div class="press"><a href="Logout.php" class="button button1">Logout</a> </div>


    </div>

</body>
</html>

