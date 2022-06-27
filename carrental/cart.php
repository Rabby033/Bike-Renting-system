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

    .sh {
        width: 80px;
        height: 80px;
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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Wishlist</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">welcome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">log out</a>
                </li>
            </ul>
        </nav>

        <div class="bg-light">
            <h3 class="text-center">Available product</h3>
        </div>

        <!-- showing cart -->
        <div class="container">

            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <!-- php code to fetch data -->
                        <?php
                        global $con;
                        $get_ip=get_ip_address();
                        $total_price=0;
                        $sql="SELECT * FROM cart_details WHERE ip_address='$get_ip' ";
                        $result=mysqli_query($con,$sql);

                        $result_count=mysqli_num_rows($result);
                        if($result_count>0)
                        {
                            echo "<thead>
                            <tr>
                                <th>Product title</th>
                                <th>product image</th>
                                <th>duration</th>
                                <th>total price</th>
                                <th>remove</th>
                            </tr>
                        </thead>
                        <tbody>";
                        while($row=mysqli_fetch_assoc($result))
                        {
                           $product_id=$row['p_id'];
                           $sql_2="SELECT * FROM products WHERE product_id=$product_id";
                           $re=mysqli_query($con,$sql_2);
                           while($row_product_price=mysqli_fetch_assoc($re))
                           {
                                 $price=array($row_product_price['product_price']);
                                 $price_table=$row_product_price['product_price'];
                                 $product_title=$row_product_price['product_title'];
                                 $product_image=$row_product_price['product_img2'];
                                 $value=array_sum($price);
                                 $total_price+=$value;
                        ?>
                        <tr>
                            <td><?php echo $product_title  ?></td>
                            <td><img src='./admin/product_images/<?php echo $product_image ?>' class='sh'></td>
                            <td><input type='text' class='form-input w-50' name='qty'></td>

                            <?php
                                global $con;
                                $get_ip=get_ip_address();
                                if(isset($_POST['update_cart']))
                                {
                                    $quantity=$_POST['qty'];
                                    $update_cart="UPDATE cart_details set duration=$quantity WHERE ip_address='$get_ip' and p_id=$product_id";
                                    $r=mysqli_query($con,$update_cart);
                                    $total_price=$total_price*$quantity;
                                }                        
                                ?>


                            <td><?php echo $price_table  ?></td>
                            <td><input type='checkbox' name="remove_item[]" value="<?php echo $product_id ?>"></td>
                            <!-- <td>
                                <input type='submit' value='Remove cart' class='bg-info border-0 p-1'
                                    name='remove_cart'>
                                <input type='submit' value='confirm_payment' class='bg-info border-0 p-1'
                                    name='confirm_payment'>
                            </td> -->
                        </tr>
                        </tbody>
                        <?php
                           }
                         }
                       
                        }
                        else
                        {
                            echo "<h2 class='text-center text-danger'>Your cart is empty</h2>";
                        }
                      
                      ?>


                    </table>

                    <input type='submit' value='Remove item' class='bg-info border-0 p-1 text-center' name='remove_cart'>
                    <input type='submit' value='confirm_payment' class='bg-info border-0 p-1' name='confirm_payment'>
                    <?php
                    if(isset($_POST['confirm_payment']))
                    {
                        echo "<script>window.open('./users_area/payment.php','_self')</script>";
                    }
                    ?>

                    <div class="d-flex mb-3">

                    <!-- <?php
                    // global $con;
                    // $get_ip=get_ip_address();
                    // $total_price=0;
                    // $sql="SELECT * FROM cart_details WHERE ip_address='$get_ip' ";
                    // $result=mysqli_query($con,$sql);

                    // $result_count=mysqli_num_rows($result);
                    // if($result_count>0)
                    // {
                        // echo "<h4 class='px-3'>Subtotal:<strong class='text-info'><?php echo $total_price
                        // ?></strong></h4>
                        <a href='index.php'><button class='bg-info p-1 border-0 mx-2'>Continue shopping</button></a>
                         <button class='bg-secondary p-1 border-0 mx-2'><a href='./users_area/checkout.php' -->
                                <!-- class='text-light text-decoration-none'>checkout</button>"; -->
                        <!-- } -->

                        <!-- ?> --> 
                    </div>
                </form>

                <!-- function to remove item -->
                <?php
               function remove_cart_item()
               {
                 global $con;
                 if(isset($_POST['remove_cart']) )
                 {
                    foreach($_POST['remove_item'] as $remove_id)
                    {
                        echo $remove_id;
                       $delete="DELETE  FROM cart_details WHERE p_id=$remove_id";
                       $result_delete=mysqli_query($con,$delete);
                       if($result_delete)
                       {
                         echo  "<script>window.open('cart.php','_self')</script>";
                       }
                    }
                 }
               }
               echo $remove_item=remove_cart_item();
               ?>
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