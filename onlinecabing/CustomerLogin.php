<?php

session_start();        // Start the session
?>

<?php
    include ("DbConfig.php");       //include database configuration page
    include ("session.php");         //include session page

    $error = "";


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (email_exists($email,$connection)) {

        $result = mysqli_query($connection , "SELECT password FROM customer WHERE email = '$email'");     //check the given password is matching with related email address.
        $getpassword = mysqli_fetch_assoc($result);

        $getpassword['password'];


        if ($password !== $getpassword['password']) {
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
    <script>
        function formValidation(){
        var a = document.forms["form"]["pwd"].value; //password validation
        if (a == "") {
            alert("Password is required!!!!!!!!!");
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
    <title>Member Sign In</title>
    <link rel="stylesheet" href="LoginStyleCustomer.css">
</head>

<body>
<div id = "error"> <?php  echo $error ; ?></div>
<div class="form-area">
    <div class="img-area">
        <img src="User_Avatar.png" alt="">
    </div>

    <form method="post" action="CustomerLogin.php"  enctype="multipart/form-data"  onsubmit=" return formValidation()" name="form">
        <h2>Customer Sign In</h2>
        <p>Email : </p>
        <input type="text" name="email" required>

        <p>Password : </p>
        <input type="password" name="pwd" required>

        <p>Don't have an account?<a href="CustomerRegister.php"/> Register</a></p>
        <p>Reset Password? <a href="ResetPassword.php"/>Reset</p>

        <a href="CustomerProfile.php" class="btn">
            <span class="btn-text" ><input name="submit" type="submit" id="submit" value="Sign in" > </span>
        </a>




        <p>Forget Password?<a href="Forget.php" />Forget</p>

</div>
</form>

</body>
</html>

