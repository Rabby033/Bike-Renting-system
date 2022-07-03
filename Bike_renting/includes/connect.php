<?php
$con=mysqli_connect('localhost','root','','bike_renting');
if(!$con)
{
    die(mysqli_error($con));
}
?>