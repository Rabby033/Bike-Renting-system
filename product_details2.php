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
    <link rel="stylesheet" href="./style1.css">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .images {
        display: inline;
        text-align: center;
    }

    .img {
        height: 100%;
        width: 100%;
        height: 350px;
        margin-left: 30px;
        width: 350px;
    }

    .headline {
        margin-left: 15px;
        font-size: 50px;
        font-family: Sans-serif;
    }

    .title {
        margin-left: 25px;
        font-family: Sans-serif;
    }

    .price-info {
        color: red;
        font-size: 50px;
        margin-left: 600px;
    }

    .bar {
        height: 50px;
        width: 200px;
        margin-top: 20px;
        margin-left: 25px;
        background: green;
    }

    .book_now {
        margin-bottom: 10px;
        background-color: white;
        margin-left: 2px;
        font-size: 16px;
        width: 250px;
        height: 40px;
        margin-top: 20px;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;
    }

    .book_now:hover {
        background-color: red;
        color: white;
        transition: .5s;
        cursor: pointer;
    }

    .btn {
        margin-bottom: 10px;
        background-color: white;
        margin-left: 18px;
        width: 700px;
        font-size: 20px;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;
    }

    .block {
        width: 100%;
        font-family: Sans-serif;
        margin-top: 10px;
        font-size: 18px;
        height: 40px;
    }

    .d-flex {
        display: flex;
        flex-direction: row;
    }

    .btn2 {
        margin-bottom: 10px;
        margin-left: 18px;
        background: red;
        width: 150px;
        color: white;
        height: auto;
        font-size: 20px;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;
    }

    .btn3 {
        margin-bottom: 10px;
        width: 250px;
        font-size: 25px;
        border: 1px solid #e6e6e6;
        margin: 0 auto 40px;
        padding: 20px 16px 30px;
        position: relative;
    }

    .day {
        font-size: 15px;
        margin-left: 650px;
        font-family: Sans-serif;
    }

    .frm {
        margin-left: 120px;
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
    <!-- collect view details data from database -->
    <?php
    $product_id=$_GET['details'];
    $sql="SELECT * FROM products WHERE product_id=$product_id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $img1=$row['product_img1'];
    $img2=$row['product_img2'];
    $img3=$row['product_img3'];
    $title=$row['product_title'];
    $price=$row['product_price'];
    $des=$row['product_description'];

    echo "<div class='images'>
    <img src='./admin/product_images/$img1' class='img'>
    <img src='./admin/product_images/$img2' class='img'>
    <img src='./admin/product_images/$img3' class='img'>
</div>
<div class='d-flex'>
    <h1 class='headline'>$title</h1>
    <h1><b class='price-info'>$price</b>
        <p class='day'>per day</p>
    </h1>
</div>
<h1 class='btn2'>Description:</h1>
<div class='d-flex'>
    <div class='btn'>
        <p>$des</p>
    </div>";
    ?>
    <form action="" method="post" enctype="multipart/form-data" class="frm">
        <div class='btn3'>
            <h3><i class='fa-solid fa-envelope'></i>Book now</h3>
            <input type='text' placeholder='From Date(dd/mm/yyyy)'' required=' required' name='start_date'
                autocomplete='off' class='block'>
            <input type='text' placeholder='To Date(dd/mm/yyyy)' required='required' name='end_date' autocomplete='off'
                class='block'>
            <input type='text' placeholder='Message' required='required' name='msg' autocomplete='off' class='block'>
            <input type='submit' value='Book now' name='submit' autocomplete='off' class='book_now'>
        </div>
    </form>
    </div>
    <script>
    var dd_main = document.querySelector(".dd_main");

    dd_main.addEventListener("click", function() {
        this.classList.toggle("active");
    })
    </script>
</body>

</html>
<?php
    if(isset($_POST['submit']))
    {
        if(!isset($_SESSION['username']))
        {
            echo "<script>window.open('./users_area/user_login.php','_self')</script>";
        }
        else
        {
             $username=$_SESSION['username'];
             $start_date=$_POST['start_date'];
             $end_date=$_POST['end_date'];
             $message=$_POST['msg'];
             $invoice_num=mt_rand();

            //  collect product image
            $sql="SELECT * FROM products WHERE product_id=$product_id";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $product_image=$row['product_img1'];


            // upload data in booking table
            $sql2="INSERT INTO  booking_table(username,invoice_num,product_image,booking_date
                 ,date_from,date_to,msg,order_status) VALUES('$username',$invoice_num,
                 '$product_image',NOW(),'$start_date','$end_date','$message','pending')";
            $res=mysqli_query($con,$sql2);
            if($res)   
            {
                echo "<script>alert('Bike booked successfully!')</script>";
                echo "<script>window.open('./product.php','_self')</script>";
            }  
        } 
    }
    
?>