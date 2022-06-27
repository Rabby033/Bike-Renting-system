<?php
include('../includes/connect.php');
$delete_id=$_GET['delete_product'];
$sql="DELETE FROM products WHERE product_id=$delete_id";
$result=mysqli_query($con,$sql);
if($result)
{
    echo "<script>window.open('index.php?view_product','_self')</script>";
}
?>