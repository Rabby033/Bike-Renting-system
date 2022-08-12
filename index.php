<?php
include('./includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dropdown Menu using HTML CSS and Javascript</title>
    <link rel="stylesheet" href="./style1.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
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
        width: 150px;
        font-size: 20px;
        color: white;
        background: red;
        border: 0;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="navbar">
            <div class="logo">
                <img class="logo1" src="logo.png">
            </div>
            <div class="nav_right">
                <ul>
                    <li class="j"><a href="./index.php">Home</a></li>
                    <li class="j"><a href="./product.php">Bike list </a></li>
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
                      <img src='./users_area/user_images/$img' alt='profile_img'>
                      <div class='dd_menu'>
                          <div class='dd_right'>
                              <ul>
                                  <li class='hey'><a href='./users_area/profile.php'>My Profile</a></li>
                                  <li class='hey'><a href='./users_area/edit_profile.php'>Edit Profile</a></li>
                                  <li class='hey'><a href='#'>Help</a></li>
                                  <li class='hey'><a href='./users_area/logout.php'>Logout</a></li>
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
                                 <li><a href='./users_area/user_login.php'>Login</a></li>
                                 <li class='hey'><a href='./users_area/user_registration.php'>Register</a></li>
                              </ul>
                          </div>
                      </div>
                  </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <form method="post">
            <div class="center">
                <h1>Find the Right Bike for you</h1>
                <input type="submit" class="buttons" name="btn1" value="Explore now+">
            </div>
        </form>
        <?php
        if(isset($_POST['btn1']))
        {
            echo "<script>window.open('./product.php','_Self')</script>";
        }
        ?>
    </div>
    <script>
    var dd_main = document.querySelector(".dd_main");

    dd_main.addEventListener("click", function() {
        this.classList.toggle("active");
    })
    </script>

</body>

</html>