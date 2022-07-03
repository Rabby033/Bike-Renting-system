<?php
include('./includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        font-family: arial;
    }

    .main {

        margin: 2%;
    }

    .card {
        width: 28%;
        height: 30%;
        display: inline-block;
        text-align: center;
        box-shadow: 2px 2px 20px black;
        border-radius: 5px;
        margin: 2%;
    }

    .image img {
        width: 100%;
        height: 100%;
        height: 200px;
        width: 200px;


    }

    .title {
        text-align: center;
        font-size: 30px;

    }

    h1 {
        font-size: 20px;
    }

    .des {
        padding: 3px;
        text-align: center;
        padding-top: 10px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .btn {
        margin-bottom: 10px;
        background-color: white;
        margin-left: 18px;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;
    }

    .btn:hover {
        background-color: black;
        color: white;
        transition: .5s;
        cursor: pointer;
    }

    .d-flex {
        display: inline;
        text-align: center;
    }

    .news {
        text-align: center;
        margin-top: 180px;
        font-size: 70px;
        color: Tomato;
        font-family: 'Cursive';
    }
    </style>
</head>

<body>
    <?php
     if(isset($_GET['category']))
     {
        $category_id=$_GET['category'];
        $sql="SELECT * FROM products WHERE category_id=$category_id";
        $result=mysqli_query($con,$sql);
        $cnt=mysqli_num_rows($result);
        if($cnt>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
               $product_img1=$row['product_img1'];
               $product_title=$row['product_title'];
               $price=$row['product_price'];
               $product_id=$row['product_id'];
               echo "<div class='card'>
               <div class='image'>
               <img src='./admin/product_images/$product_img1'>
               </div>
               <div class='title'>
               <h1><b>$product_title</b></h1>
               </div>
               <div class='des'>
               <p>Price:<b>$price</b></p> 
               <div class='d-flex'>
               <a href='./product.php?add_wishlist=$product_id' class='btn'>Add to wishlist</a>
               <a href='./product_details2.php?details=$product_id' class='btn'>View details..</a>
               </div>
               </div>
               </div>";
            }
        }
        else
        {
            echo "<h1 class='news'>No product available for this <br>category!!</h1>";
        }
     }
     else
     {
        $sql="SELECT * FROM products";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
        $product_img1=$row['product_img1'];
        $product_title=$row['product_title'];
        $price=$row['product_price'];
        $product_id=$row['product_id'];

        echo "<div class='card'>

        <div class='image'>
           <img src='./admin/product_images/$product_img1'>
        </div>
        <div class='title'>
        <h1><b>$product_title</b></h1>
        </div>
        <div class='des'>
            <p>Price:<b>$price</b></p> 
            <div class='d-flex'>
            <a href='./product.php?add_wishlist=$product_id' class='btn'>Add to wishlist</a>
            <a href='./product_details2.php?details=$product_id' class='btn'>View details..</a>
            </div>
        </div>
        </div>";
       }
     }
    ?>
</body>

</html>