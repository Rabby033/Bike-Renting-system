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

    <script src="./js/jquery-1.10.2.min.js"></script>
    <script src="./js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.min.js"> </script>
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="./css/jquery-ui1.css" rel="stylesheet">


    <link rel="stylesheet" href="./style1.css">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

    .navbar .dd_menu {
        width: 200px;
    }

    .head {
        margin-left: 30px;
    }

    html,
    body {
        overflow-x: hidden;
        overflow-y: auto;
    }
    </style>
</head>

<body>
    <div class="wrapper2">
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
        <div class="row">
            <br />
            <div class="col-md-2">
                <div class="list-group">
                    <h3 class="head">Price</h3>
                    <input type="hidden" id="hidden_minimum_price" value="100" />
                    <input type="hidden" id="hidden_maximum_price" value="5000" />
                    <p id="price_show" class="col"> 100 - 5000</p>
                    <div id="price_range"></div>
                </div>
                <br />
                <div class="list-group">
                    <h3 class="head">Brand</h3>
                    <?php
                    $sql="SELECT DISTINCT(brand) FROM products";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                      ?>
                    <div class='list-group-item checkbox'>
                        <label><input type='checkbox' class='common_selector brand'
                                value="<?php echo $row['brand'];?> "> <?php echo $row['brand'];?></label>
                    </div>
                    <?php
                    } 
                    ?>
                </div>
                <div class="list-group">
                    <h3 class="head">Location</h3>
                    <?php
                    $sql="SELECT DISTINCT(product_location) FROM products";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                      ?>
                    <div class='list-group-item checkbox'>
                        <label><input type='checkbox' class='common_selector location'
                                value="<?php echo $row['product_location'];?>">
                            <?php echo $row['product_location'];?></label>
                    </div>
                    <?php
                    } 
                    ?>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row filter_data">

                </div>
            </div>
        </div>
        <?php
         if(isset($_GET['add_wishlist']))
         {
            if(!isset($_SESSION["username"]))
            {
              echo "<script>window.open('./users_area/user_login.php','_self')</script>";
            }
            else{
              $product_id=$_GET['add_wishlist'];
              $username=$_SESSION['username'];
              $sqlll="SELECT * FROM wishlist WHERE product_id=$product_id AND username='$username'
              ";
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
        <style>
        #loading {
            text-align: center;
            background: url('loader.gif') no-repeat center;
            height: 150px;
        }
        </style>
        <script>
        $(document).ready(function() {

            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var brand = get_filter('brand');
                var location = get_filter('location');
                $.ajax({
                    url: "fetch_data.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        brand: brand,
                        location: location
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }
            $('.common_selector').click(function() {
                filter_data();
            });
            $('#price_range').slider({
                range: true,
                min: 100,
                max: 5000,
                values: [100, 5000],
                step: 50,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });
        });
        </script>
        <script>
        var dd_main = document.querySelector(".dd_main");

        dd_main.addEventListener("click", function() {
            this.classList.toggle("active");
        })
        </script>
</body>

</html>