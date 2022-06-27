<?php
include('../includes/connect.php');
include('./cm2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike rentanl</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .card-img-top {
        width: 100%;
        height: 100%;
        height: 200px;
    }

    *{
        overflow-x: hidden;
    }

    .profile_image {
        width: 100%;
        height: 100%;
        width: 200px;
        height: 200px;
        margin: auto;
        display: block;
    }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid" bg-dark>
                <a class="navbar-brand" href="#"><i class="fa-solid fa-person-biking"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.youtube.com"><?php
                            cart_item();
                            ?></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../users_area/profile.php">profile</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php
                session_start();
                if(isset($_SESSION['username']))
                {
                   echo "<li class='nav-item'>
                   <a class='nav-link' href='#'>welcome ".$_SESSION['username']." </a>
                    </li>";
                }
                else
                {
                    echo "<script>window.open('./user_login.php','_self')</script>";
                }
                ?>
            </ul>
        </nav>
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item bg-info">
                        <a href="profile.php" class="nav-link">
                            <h4>your profile</h4>
                        </a>
                    </li>
                   <?php
                   $username=$_SESSION['username'];
                   $user_imge="SELECT * FROM user_table WHERE username='$username'";
                   $res=mysqli_query($con,$user_imge);
                   $row=mysqli_fetch_array($res);
                   $img=$row['user_image'];
                   echo "<li class='nav-item bg-info'>
                   <img src='../users_area/user_images/$img' class='profile_image'>
                    </li>";
                   ?>
                    <li class="nav-item bg-secondary">
                        <a href="profile.php" class="nav-link text-light">Pending order</a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a href="profile.php?edit_profile" class="nav-link text-light">Edit profile</a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a href="profile.php?my_order" class="nav-link text-light">My order</a>
                    </li>
                    <li class="nav-item bg-secondary">
                        <a href="profile.php?log_out" class="nav-link text-light">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
               <?php
                get_user_order_details();
                if(isset($_GET['edit_profile']))
                {
                    include('edit_profile.php');
                }
                if(isset($_GET['log_out']))
                {
                    echo "<script>window.open('./logout.php','_self')</script>";
                }
                if(isset($_GET['my_order']))
                {
                    include('user_order.php');
                }

               ?>
            </div>
        </div>

        <!-- last  -->
        <?php
        include('../includes/footer.php');
        ?>
    </div>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>