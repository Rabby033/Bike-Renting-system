<?php
include('./includes/connect.php');
include('./function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike list</title>
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .wrapper2 {
        background: url(./img/bg.jpg) no-repeat;
        background-size: cover;
        height: 100vh;
        overflow-x: hidden;
    }
    </style>
</head>

<body>
    <div class="wrapper2">
        <nav class="navbar">
            <img class="logo" src="logo.png">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./product.php">Bike list </a></li>
                <li><a href="./cart.php">wishlist</a></li>
                <?php
            session_start();
            if(isset($_SESSION["username"]))
            {
               echo "<li><a href='./users_area/profile.php'>Profile</a></li>";
            }
            else
            {
                echo "<li><a href='./users_area/user_login.php'>Login</a></li>";
            }
            ?>
            </ul>
        </nav>
        <div class="row">
            <div class="col-md-10">
                <!-- product -->
                <div class="row">
                    <?php
                    // getting_product();
                    include('./showing_product.php');
                    if(isset($_GET['add_wishlist']))
                    {
                       if(!isset($_SESSION["username"]))
                       {
                         echo "<script>window.open('./users_area/user_login.php','_self')</script>";
                       }
                       else{
                         $product_id=$_GET['add_wishlist'];
                         $username=$_SESSION['username'];
                         $sqlll="SELECT * FROM wishlist WHERE username='$username'";
                         $re=mysqli_query($con,$sqlll);
                         $cnt=mysqli_num_rows($re);
                         if($cnt>0)
                         {
                            echo "<script>alert('Already added this before')</script>";
                            echo "<script>window.open('./product.php','_self')</script>";
                         }
                         else
                         {
                            $sql="INSERT INTO wishlist(username,product_id) VALUES('$username',$product_id)";
                            $result=mysqli_query($con,$sql);
                            if($result)
                            {
                               echo "<script>alert('successfully added to wishlist')</script>";
                               echo "<script>window.open('./product.php','_self')</script>";
                            }
                            else
                            {
                               echo "<script>alert('failed added to wishlist!')</script>";
                               echo "<script>window.open('./product.php','_self')</script>";
                            }
                         }
                       }
                    }
                    ?>
                </div>
            </div>
            <!--      catagories         -->
            <div class="col-md-2 bg-secondary p-0 text-center">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>categories</h4>
                        </a>
                    </li>
                    <!-- calling function to show category -->
                    <?php
                    getting_category();
                    ?>
                </ul>
                <!-- catagories -->
            </div>
        </div>
    </div>
</body>

</html>