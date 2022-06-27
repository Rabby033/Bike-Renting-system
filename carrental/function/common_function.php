<?php
include('includes/connect.php');
function getting_product()
{
    global $con;
    if(!isset($_GET['category']))
    {
        global $con;
        $sql="SELECT * FROM products order by rand()";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
           $product_id=$row['product_id'];
           $product_title=$row['product_title'];
           $product_description=$row['product_description'];
           $category_id=$row['category_id'];
           $product_img1=$row['product_img1'];
           $product_price=$row['product_price'];
           echo "<div class='col-md-4 mb-2'>
           <div class='card'>
           <img src='./admin/product_images/$product_img1' class='card-img-top'>
           <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <br>
              <p class='card-text'>Price:<b>$product_price</b></p>
              <a href='index.php?add_cart=$product_id' class='btn btn-primary bg-info'>Add to card</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>view more</a>
          </div>
      </div>
  </div>";
      }
   }
else
 {
    $cat_id=$_GET['category'];
    $sql="SELECT * FROM products WHERE category_id=$cat_id order by rand()";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num==0)
    {
        echo "<h2 class='text-center text-danger'>Sorry!! No product available for this category</h2>";

    }
    while($row=mysqli_fetch_assoc($result))
    {
       $product_id=$row['product_id'];
       $product_title=$row['product_title'];
       $product_description=$row['product_description'];
       $category_id=$row['category_id'];
       $product_img1=$row['product_img1'];
       $product_price=$row['product_price'];
       echo "<div class='col-md-4 mb-2'>
       <div class='card'>
       <img src='./admin/product_images/$product_img1' class='card-img-top'>
       <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price:<b>$product_price</b></p>
          <a href='index.php?add_cart=$product_id' class='btn btn-primary bg-info'>Add to card</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>view more</a>
      </div>
  </div>
</div>";
  }
   }
}
function getting_category()
{
        global $con;
        $take_categories="SELECT * FROM categories";
        $result_categories=mysqli_query($con,$take_categories);
        while($row_data=mysqli_fetch_assoc($result_categories))
        {
          $data=$row_data['category_title'];
          $id=$row_data['category_id'];
          echo "<li class='nav-item'>
          <a href='index.php?category=$id' class='nav-link text-light'>$data</a>
          </li>";
        } 
}
function view_details()
{
    global $con;
    if(isset($_GET['product_id']))
    {
        $p_id=$_GET['product_id'];
        global $con;
        $sql="SELECT * FROM products WHERE product_id=$p_id";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
           $product_id=$row['product_id'];
           $product_title=$row['product_title'];
           $product_description=$row['product_description'];
           $category_id=$row['category_id'];
           $product_img1=$row['product_img1'];
           $product_img2=$row['product_img2'];
           $product_img3=$row['product_img3'];
           $product_price=$row['product_price'];
           echo "<div class='col-md-4 mb-2'>
           <div class='card'>
           <img src='./admin/product_images/$product_img1' class='card-img-top'>
           <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price:<b>$product_price</b></p>
          </div>
      </div>
  </div>
  <div class='col-md-8'>
  <div class='row'>
      <div class='col-md-12'>
          <h4 class='text-center bg-info'>more images</h4>
      </div>
  </div>
  <div class='row'>
      <div class='col-md-6'>
         <img src='./admin/product_images/$product_img2' class='card-img-top'>
      </div>
      <div class='col-md-6'>
      <img src='./admin/product_images/$product_img3' class='card-img-top'>
      </div>
  </div>
</div>
    ";
      }
   }
}
function get_ip_address() {  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }   
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }   
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
function cart_item()
{
  if(isset($_GET['add_cart']))
  {
    global $con;
    $ip=get_ip_address();
    $sql="SELECT * FROM cart_details WHERE ip_address='$ip' ";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
  }
  else
  {
    global $con;
    $ip=get_ip_address();
    $sql="SELECT * FROM cart_details WHERE ip_address='$ip' ";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
  }
  echo $num;
}
function cart()
{
   if(isset($_GET['add_cart']))
   {
     global $con;
     $ip=get_ip_address();
     $get_pid=$_GET['add_cart'];
     $sql="SELECT * FROM cart_details WHERE ip_address='$ip' and p_id=$get_pid; 
    --  and p_id=$get_pid";
     $result=mysqli_query($con,$sql);
     $num=mysqli_num_rows($result);
     if($num>0)
     {
        echo "<script>alert('already ase ')</script>";
     }
     else
     {
        $insert_sql="INSERT INTO cart_details(p_id,ip_address,duration) VALUES  ($get_pid,'$ip',3) ";
        $result=mysqli_query($con,$insert_sql);
        echo "<script>alert('data added successfully')</script>";
    }
   }
}
?>