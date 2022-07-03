<?php
include('../includes/connect.php');
$invoice=$_GET['invoice'];
$sql="UPDATE booking_table SET order_status='Approved' WHERE invoice_num=$invoice";
$result=mysqli_query($con,$sql);
if($result)
{
    echo "<script>alert('Order approved')</script>";
    echo "<script>window.open('./index.php?all_order','_self')</script>";
}
else
{
    echo "<script>alert('Failed to approve!!!')</script>";
    echo "<script>window.open('./index.php?all_order','_self')</script>";
}


?>