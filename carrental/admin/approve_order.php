<?php
include('../includes/connect.php');
$invoice_n=$_GET['approve'];

// find product id 
$sqll="SELECT * FROM order_pending WHERE invoice_number=$invoice_n";
$qu=mysqli_query($con,$sqll);
$row=mysqli_fetch_assoc($qu);
$product_id=$row['product_id'];

// find product
$del_pro="SELECT * FROM products WHERE product_id=$product_id";
$resu=mysqli_query($con,$del_pro);
$count=mysqli_num_rows($resu);
if($count>0)
{
    //delete product
    $sq="DELETE FROM products WHERE product_id=$product_id";
    $ans=mysqli_query($con,$sq);

    // make pending to complete
    $sql="UPDATE user_order set order_status='Complete' WHERE invoice_number=$invoice_n";
    $result=mysqli_query($con,$sql);

    // delete from pending table
    $sql2="DELETE FROM order_pending WHERE invoice_number=$invoice_n";
    $re=mysqli_query($con,$sql2);
    
    echo "<script>alert('This order is successfully completed')</script>";
    echo "<script>window.open('index.php?all_order','_self')</script>";
}
else
{
    echo "This product is not available in store";
    echo "<script>window.open('index.php?all_order','_self')</script>";
}


?>