<?php
include('../includes/connect.php');
include('./cm2.php');
if(isset($_GET['user_id']))
{
    $user_id=$_GET['user_id'];
    
}

global $con;
$get_ip=get_ip_address();
$total_price=0;
$sql="SELECT * FROM cart_details WHERE ip_address='$get_ip' ";
$result=mysqli_query($con,$sql);
$result_count=mysqli_num_rows($result);
$invoice_num=mt_rand();
$status='pending';
while($row=mysqli_fetch_assoc($result))
    {
        $product_id=$row['p_id'];
        $sql_2="SELECT * FROM products WHERE product_id=$product_id";
        $re=mysqli_query($con,$sql_2);
        while($row_product_price=mysqli_fetch_assoc($re))
            {
                $price=array($row_product_price['product_price']);
                $price_table=$row_product_price['product_price'];
                $product_title=$row_product_price['product_title'];
                $product_image=$row_product_price['product_img2'];
                $value=array_sum($price);
                $total_price+=$value;
            }
    }
$insert_sql="INSERT INTO user_order(user_id,invoice_number,order_date,order_status) 
             VALUES($user_id,$invoice_num,NOW(),'$status')";  
$ans=mysqli_query($con,$insert_sql);
$intsert_pending="INSERT INTO order_pending(user_id,invoice_number,product_id,order_status)
                  VALUES($user_id,$invoice_num,$product_id,'$status')";
$sub=mysqli_query($con,$intsert_pending);

$delet_from_cart="DELETE FROM cart_details WHERE ip_address='$get_ip'";
$shesh=mysqli_query($con,$delet_from_cart);
if($insert_sql)
{
    echo "<script>alert('ordered successfully')</script>";
    echo "<script> location.href='profile.php'; </script>";
}
// if($sub)
// {
//     echo "<script>alert('insert into pending')</script>";
// }