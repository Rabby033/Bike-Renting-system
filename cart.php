<?php
include('includes/connect.php');
include('./function/common_function.php');
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
    <link rel="stylesheet" href="style1.css">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .logo1 {
        width: 100px;
        height: auto;
        padding: 10px;
    }

    .table {
        width: 900px;
        margin-left: auto;
        margin-right: auto;
    }
    .headi{
        text-align:center;
        font-family: sans-serif;
        color: rgba(21, 145, 237, 0.8)
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

    .list_image {
        width: 100%;
        height: 100%;
        width: 90px;
        height: 90px;
    }

    .navbar .dd_menu {
        position: absolute;
        right: -25px;
        width: 180px;
    }
    </style>
</head>

<body>

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


    <div class="mt-2">
        <h3 class='headi'>My wishlist</h3>
        <table class="table">
            <thead class="bg-info">
                <tr>
                    <th>Product name</th>
                    <th>Product Image</th>
                    <th>Product price/day</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                if(!isset($_SESSION['username']))
                {
                    echo "<script>window.open('./users_area/user_login.php','_self')</script>";
                }
                $username=$_SESSION['username'];
                $sql="SELECT * FROM wishlist WHERE username='$username'";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                    $pid=$row['product_id'];
                    $sql2="SELECT * FROM  products WHERE product_id=$pid";
                    $res=mysqli_query($con,$sql2);
                    $rh=mysqli_fetch_array($res);
                    
                     $cnt=mysqli_num_rows($res);
                      $product_title=$rh['product_title'];
                      $product_price=$rh['product_price'];
                      $product_image=$rh['product_img1'];


                      echo "<tr>
                       <td>$product_title</td>
                       <td><img src='./admin/product_images/$product_image' class='list_image'></td>
                      <td>$product_price</td> </tr>";
                }
                ?>
            </tbody>
        </table>
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