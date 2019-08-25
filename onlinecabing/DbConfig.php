<?php
/**
 * Created by PhpStorm.
 * User: SARA PERERA
 * Date: 3/14/2019
 * Time: 11:59 PM
 */

$connection = mysqli_connect('localhost','root','');
if (!$connection){
    die("Database connection failed" . mysqli_error($connection));

}

$selection = mysqli_select_db($connection,'car_db');

if (!$selection){
    die("Database selection failed" . mysqli_error($connection));
}


?>



