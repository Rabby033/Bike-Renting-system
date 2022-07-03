<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <!-- font link -->
</head>

<body>
    <div class="wrapper">
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
</body>

</html>