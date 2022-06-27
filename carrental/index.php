<?php
// include('includes/connect.php');
include('function/common_function.php');
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
      .card-img-top
      {
        width:100%;
        height:100%;
        height: 200px;
      }
      *{
        overflow-x: hidden;
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
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
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
                            <a class="nav-link" href="./users_area/profile.php">profile</a>
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
                    echo "<li class='nav-item'>
                   <a class='nav-link' href='#'>welcome guest</a>
                    </li>";
                }
                if(!isset($_SESSION['username']))
                {
                   echo "<li class='nav-item'>
                   <a class='nav-link' href='./users_area/user_login.php'>login</a>
                   </li>";
                }
                else
                {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>logout</a>
                    </li>";
                }
                ?>
            </ul>
        </nav>

        <div class="bg-light">
            <h3 class="text-center">Available product</h3>
        </div>


        <div class="row">
            <div class="col-md-10">
                <!-- product -->
                <div class="row">
                    <?php
                    // caaling function to print product
                    getting_product();
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
                    cart();
                    ?>
                </ul>
                <!-- catagories -->
            </div>
        </div>

        <!-- last  -->
        <?php
        include('./includes/footer.php');
        ?>
    </div>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>