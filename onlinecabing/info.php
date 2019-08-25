<?php
session_start();
require 'DbConfig.php';

$aql = "SELECT * FROM customer WHERE email = '".$_SESSION['info']."'";
$aqlq = mysqli_query($connection,$aql);
$aqlqq = mysqli_fetch_assoc($aqlq);

$user = $aqlqq['cusName'];
$pass = $aqlqq['password'];

$text = "Hi!!!! " . $user . " your Password is : " . $pass;;

?>

<!DOCTYPE html>
<html>
<head>
   <style>
       body{
           background-image: url("car8.jpg");
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

       .button1 {
           background-color: white;
           color: black;
           border: 2px solid tomato;
       }

       .button1:hover {
           background-color: tomato;
           color: white;
       }

   </style>
    <meta charset="UTF-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body >

    <slider>

        <div class="press"><b><a href="CustomerLogin.php" class="button button1">Login!!!!!</a></b> </div>

        <p><?php echo "<script type='text/javascript'>alert('$text');</script>"; ?></p>
    </slider>
</body>

</html>
