<?php
 include('../includes/connect.php');
 if(isset($_POST['insert_product']))
 {
    $title=$_POST['product_title'];
    $description=$_POST['product_description'];
    $category=$_POST['product_cat'];
    $price=$_POST['product_price'];


    $img1=$_FILES['product_image1']['name'];
    $img2=$_FILES['product_image2']['name'];
    $img3=$_FILES['product_image3']['name'];

    $temp1=$_FILES['product_image1']['tmp_name'];
    $temp2=$_FILES['product_image2']['tmp_name'];
    $temp3=$_FILES['product_image3']['tmp_name'];

    if($title=='' or $description=='' or $category=='' or $price=='' or $img1=='' or $img2=='' or $img3=='')
    {
        echo "<script>alert('please fill up all field!')</script>";
        exit();
    }
    else
    {
        move_uploaded_file($temp1,"./product_images/$img1");
        move_uploaded_file($temp2,"./product_images/$img2");
        move_uploaded_file($temp3,"./product_images/$img3");

        $sql="INSERT INTO products(product_title,product_description,category_id,product_img1,product_img2,product_img3,product_price,date,status) VALUES('$title'
            ,'$description','$category','$img1','$img2','$img3','$price',NOW(),'true')";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('product insert successfully')</script>";
        }
    }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline md-4 w-50 m-auto p-2">
                <lebel for="product-title" class="form-lebel">Product Title</lebel>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter product title" required="required">
            </div>
            <div class="form-outline md-4 w-50 m-auto p-2">
                <lebel for="product-description" class="form-lebel">Product Description</lebel>
                <input type="text" name="product_description" id="product_description" class="form-control"
                    placeholder="Enter product Description" required="required">
            </div>
            <div class="form-outline md-4 w-50 m-auto p-2">
                <lebel for="Select category" class="form-lebel">Select category</lebel>
                <select name="product_cat" class="form-control">
                    <?php
                  $sql="SELECT * FROM categories";
                  $result=mysqli_query($con,$sql);
                  while($row=mysqli_fetch_assoc($result))
                  {
                    $title=$row['category_title'];
                    $id=$row['category_id'];
                    echo  "<option value='$id'>$title</option>";
                  }
                ?>
                </select>
            </div>
            <div class="form-outline md-4 w-50 m-auto p-2">
                <lebel for="product-image1" class="form-lebel">Product Image1</lebel>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <div class="form-outline md-4 w-50 m-auto p-2">
                <lebel for="product-image2" class="form-lebel">Product Image2</lebel>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <div class="form-outline md-4 w-50 m-auto p-2">
                <lebel for="product-image3" class="form-lebel">Product Image3</lebel>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <div class="form-outline md-4 w-50 m-auto p-2">
                <lebel for="product-Price" class="form-lebel">Product Price per days</lebel>
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Enter product price per day" required="required">
            </div>
            <div class="form-outline md-4 w-50 m-auto p-2">
                <input type="submit" name="insert_product" id="product_price" class="form-control bg-info">
            </div>
        </form>
    </div>

</body>

</html>