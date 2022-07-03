<?php
include('../includes/connect.php');
$invoice=$_GET['cancel'];
$sql="UPDATE booking_table SET order_status='Not approved' WHERE invoice_num=$invoice";
$result=mysqli_query($con,$sql);
if($result)
{
    echo "<script>alert('Order not approved')</script>";
    echo "<script>window.open('./index.php?all_order','_self')</script>";
}
else
{
    echo "<script>alert('Erro occured')</script>";
    echo "<script>window.open('./index.php?all_order','_self')</script>";
}

?>