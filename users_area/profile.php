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
    <link rel="stylesheet" href="../style1.css">
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
    .profile_image{
        width: 100%;
        height: 100%;
        border-radius:50px;
        width: 200px;
        height: 200px;
    }
    .tt {
        font-size: 40px;
        margin-top: 50px;
        color: red;
        font-family: 'Roboto', sans-serif;
    }
    .logo1 {
        width: 100px;
        height: auto;
        padding: 10px;
    }

    .wrapper .center {
        position: absolute;
        top: 40%;
        left: 55%;
        font-family: sans-serif;
    }

    .center h1 {
        color: white;
        font-size: 70px;
    }

    .center .buttons {
        margin: 35px 10px;
        height: 50px;
        width: 80px;
        font-size: 20px;
        color: white;
        background: red;
        border: 0;
        cursor: pointer;
    }
    .navbar .dd_menu {
    width: 180px;
   }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">
            <img class="logo1" src="../logo.png">
        </div>
        <div class="nav_right">
            <ul>
                <li class="j"><a href="../index.php">Home</a></li>
                <li class="j"><a href="../product.php">Bike list </a></li>
                <li class="j"><a href="./cart.php">wishlist</a></li>
                <?php
                    session_start();
                    if(isset($_SESSION["username"]))
                    {
                      $username=$_SESSION['username'];
                      $user_imge="SELECT * FROM user_table WHERE username='$username'";
                      $res=mysqli_query($con,$user_imge);
                      $row=mysqli_fetch_array($res);
                      $img=$row['user_image'];
                      
                      echo "<li class='nr_li dd_main'>
                      <img src='./user_images/$img' alt='profile_img'>
                      <div class='dd_menu'>
                          <div class='dd_right'>
                              <ul>
                                  <li class='hey'><a href='../users_area/profile.php'>My Profile</a></li>
                                  <li class='hey'><a href='../users_area/edit_profile.php'>Edit Profile</a></li>
                                  <li class='hey'><a href='#'>Help</a></li>
                                  <li class='hey'><a href='../users_area/logout.php'>Logout</a></li>
                              </ul>
                          </div>
                      </div>
                   </li>";
                    }
                    else
                    {
                      echo "<li class='nr_li dd_main'>
                      <img src='./guest.png' alt='profile_img'>
                      <div class='dd_menu'>
                          <div class='dd_right'>
                              <ul>
                                  <li>Login</li>
                                  <li>Register</li>
                              </ul>
                          </div>
                      </div>
                  </li>";
                    }
                    ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                       <?php echo"<h4>$username</h4>"; ?>
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
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
    var dd_main = document.querySelector(".dd_main");

    dd_main.addEventListener("click", function() {
        this.classList.toggle("active");
    })
    </script>
</body>

</html>