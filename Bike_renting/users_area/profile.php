<?php
include('../includes/connect.php');
// include('./cm2.php');
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
    <link rel="stylesheet" href="../style.css">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .list_image {
        width: 100%;
        height: 100%;
        width: 90px;
        height: 90px;
    }
    .tt{
        font-size:40px;
        margin-top:50px;
        color:red;
        font-family: 'Roboto',sans-serif;
    }
    </style>
</head>

<body>

    <nav class="navbar mb-2">
        <img class="logo" src="../logo.png">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../product.php">Bike list </a></li>
            <li><a href="../cart.php">wishlist</a></li>
            <?php
             session_start();
            if($_SESSION['username'])
            {
               echo "<li><a href='../users_area/profile.php'>Profile</a></li>";
            }
            else
            {
                echo "<li><a href='../users_area/user_login.php'>Login</a></li>";
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
        <div class="col-md-9 text-center">
            <?php
                if(isset($_GET['edit_profile']))
                {
                    include('edit_profile.php');
                }
                elseif(isset($_GET['log_out']))
                {
                    echo "<script>window.open('./logout.php','_self')</script>";
                }
                elseif(isset($_GET['my_order']))
                {
                    include('user_order.php');
                }
                else
                {
                    $username=$_SESSION['username'];
                    $sql="SELECT * FROM booking_table WHERE username='$username'";
                    $result=mysqli_query($con,$sql);
                    $count=0;
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $status=$row['order_status'];
                        if($status=='pending')
                        {
                            $count++;
                        }
                    }
                    if($count>0)
                    {
                        echo "<h3 class='tt'>You have $count pending order</h3>";
                    }
                    else
                    {
                        echo "<h3 class='tt'>You have no pending order</h3>";
                    }
                }
               ?>
        </div>
    </div>

    <!-- last  -->
    <?php
        include('../includes/footer.php');
        ?>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>