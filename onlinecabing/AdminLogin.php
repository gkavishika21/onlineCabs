<?php
include ("DbConfig.php");       //include database configuration page
include ("session.php");         //include session page

$error = "";


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (email_exists($email,$connection)) {

        $result = mysqli_query($connection , "SELECT pass FROM admin WHERE email = '$email'");     //check the given password is matching with related email address.
        $getpass = mysqli_fetch_assoc($result);

        $getpass['pass'];


        if ($pass !== $getpass['pass']) {
            $error = "Password is incorrect.";          //if the password is wrong, display massage"Password is incorrect."
        }
        else {

            $_SESSION['email'] = $email;
            //print_r($_SESSION);
            header("location: CustomerProfile.php");      //if the email and password are matching, go to the member profile.

        }

    }
    else {
        $error = "Invalid Email";       //if the email wrong,display massage "Invalid Email"
    }

}

?>


<html>

<head>
    <title>Admin Sign In</title>
    <link rel="stylesheet" href="LoginStyleAdmin.css">
</head>

<body>
<div id = "error"> <?php  echo $error ; ?></div>
<div class="form-area">
    <div class="img-area">
        <img src="User_Avatar.png" alt="">
    </div>

    <form method="post" action="HomePage.php">
        <h2>Admin Sign In</h2>
        <p>Email : </p>
        <input type="text" name="email" required>

        <p>Password : </p>
        <input type="password" name="pass" required>


        <a href="HomePage.php" class="btn">
            <span class="btn-text"><input name="submit" type="submit" id="submit" value="Sign in" ></span>
        </a>


</div>
</form>
</body>
</html>

