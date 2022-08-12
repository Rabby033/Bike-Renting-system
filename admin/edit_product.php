<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h3 class="text-center text-success mb-4">Edit Post</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="product_title" placeholder="enter product title">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="product_brand" placeholder="enter product brand">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="product_location" placeholder="enter location">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="product_des"
                placeholder="write product description in briefly">
        </div>
        <div class="form-outline mb-4">
            <input type="file" class="form-control w-50 m-auto" name="img1" placeholder="upload image">
        </div>
        <div class="form-outline mb-4">
            <input type="file" class="form-control w-50 m-auto" name="img2" placeholder="upload image">
        </div>
        <div class="form-outline mb-4">
            <input type="file" class="form-control w-50 m-auto" name="img3" placeholder="upload image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="price" placeholder="enter product price">
        </div>
        <input type="submit" class="bg-info border-0" value="update" name="update_product">
    </form>
    <?php
    if(isset($_POST['update_product']))
    {
        $product_id=$_GET['edit_product'];
        $title=$_POST['product_title'];
        $brand=$_POST['product_brand'];
        $location=$_POST['product_location'];
        $des=$_POST['product_des'];
        
        $img1=$_FILES['img1']['name'];
        $img2=$_FILES['img2']['name'];
        $img3=$_FILES['img3']['name'];
        $price=$_POST['price'];
        
        $tmp1=$_FILES['img1']['tmp_name'];
        $tmp2=$_FILES['img2']['tmp_name'];
        $tmp3=$_FILES['img3']['tmp_name'];
        
        move_uploaded_file($tmp1,"./product_images/$img1");
        move_uploaded_file($tmp2,"./product_images/$img2");
        move_uploaded_file($tmp3,"./product_images/$img3");

        $sql="UPDATE products SET product_title='$title',brand='$brand',product_location='$location',product_description='$des'
            ,product_img1='$img1',product_img2='$img2',product_img3='$img3',product_price='$price',date=NOW() WHERE product_id=$product_id";
        $res=mysqli_query($con,$sql);
        if($res)
        {
           echo  "<script>alert('updated successfully')</script>";
        }
        else
        {
            echo  "<script>alert('failed successfully')</script>";
        }
    }
    ?>
</body>

</html>