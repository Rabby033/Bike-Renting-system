<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .short_image {
        width: 100%;
        height: 100%;
        width: 60px;
        height: 60px;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
    }

    .col {
        column-gap: 40px;
    }
    </style>

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/logo.png" class="logo">
                <div class="guest name">
                    welcome guest
                </div>
            </div>
        </nav>
    </div>

    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <div class="row">
        <div class="col-md-12 bg-secondary p-2">
            <div class="button text-center">
                <button><a href="insert_product.php" class="nav-link text-light bg-info"> Insert product</a></button>
                <button><a href="index.php?view_product" class="nav-link text-light bg-info">view product</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info">insert
                        categories</a></button>
                <button><a href="index.php?view_category" class="nav-link text-light bg-info">view
                        categories</a></button>
                <button><a href="index.php?all_order" class="nav-link text-light bg-info">pending orders</a></button>
                <button><a href="index.php?user_list" class="nav-link text-light bg-info">user list</a></button>
                <button><a href="" class="nav-link text-light bg-info">Log out</a></button>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <?php
          if(isset($_GET['insert_category']))
          {
            include('insert_categories.php');
          }
          if(isset($_GET['view_product']))
          {
            include('view_product.php');
          }
          if(isset($_GET['delete_product']))
          {
             include('delete_product.php');
          }
          if(isset($_GET['view_category']))
          {
             include('view_cat.php');
          }
          if(isset($_GET['user_list']))
          {
             include('user_list.php');
          }
          if(isset($_GET['all_order']))
          {
             include('all_order.php');
          }
          if(isset($_GET['approve']))
          {
            include('approve_order.php');
          }
          if(isset($_GET['del_cat']))
          {
            include('../includes/connect.php');
            $name=$_GET['del_cat'];
            $sql="DELETE FROM categories WHERE category_title='$name' ";
            $result=mysqli_query($con,$sql);
            if($result)
            {
                echo "<script>window.open('index.php?view_category','_self')</script>";
            }
          }
          if(isset($_GET['delete_user']))
          {
            include('../includes/connect.php');
            $user_id=$_GET['delete_user'];
            $sql="DELETE FROM user_table WHERE user_id=$user_id ";
            $result=mysqli_query($con,$sql);
            if($result)
            {
                echo "<script>window.open('index.php?user_list','_self')</script>";
            }
          }
        ?>
        <div>
            <!-- bootstrap js link -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous">
            </script>
</body>

</html>