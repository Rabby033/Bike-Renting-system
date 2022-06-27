<?php
include('../includes/connect.php');

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">new user registration</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-2">
                        <lebel for="user_username" class="form-lebel">Username</lebel>
                        <input type="text" id="user_name" class="form-control" placeholder="enter your username"
                            required="required" name="user_username" autocomplete="off">
                    </div>
                    <div class="form-outline mb-2">
                        <lebel for="user_email" class="form-lebel">Email</lebel>
                        <input type="email" id="user_email" class="form-control" placeholder="enter your email"
                            required="required" name="user_email" autocomplete="off">
                    </div>
                    <div class="form-outline mb-2">
                        <lebel for="user_image" class="form-lebel">Image</lebel>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>
                    <div class="form-outline mb-2">
                        <lebel for="user_password" class="form-lebel">Password</lebel>
                        <input type="password" id="user_password" class="form-control" placeholder="enter your password"
                            required="required" name="user_password" autocomplete="off">
                    </div>
                    <div class="form-outline mb-2">
                        <lebel for="user_password" class="form-lebel">Confirm Password</lebel>
                        <input type="password" id="conf_user_password" class="form-control"
                            placeholder="confirm password" required="required" name="conf_user_password"
                            autocomplete="off">
                    </div>
                    <div class="form-outline mb-2">
                        <lebel for="user_address" class="form-lebel">Address</lebel>
                        <input type="text" id="user_address" class="form-control" placeholder="enter your address"
                            required="required" name="user_address" autocomplete="off">
                    </div>
                    <div class="form-outline mb-2">
                        <lebel for="user_contact" class="form-lebel">Contact</lebel>
                        <input type="text" id="user_contact" class="form-control" placeholder="enter your contact"
                            required="required" name="user_contact" autocomplete="off">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 border-0 px-3" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Already have account?<a href="user_login.php"> Login </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if(isset($_POST['user_register']))
{

    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];

    $user_password=$_POST['user_password'];
    $user_conf_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];

    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
     
    $check="SELECT * FROM user_table WHERE username='$user_username'";
    $re=mysqli_query($con,$check);
    $cnt=mysqli_num_rows($re);
    if($cnt>0)
    {
        echo "<script>alert('username already exist!!!')</script>";
    }
    else
    {
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $sql="INSERT INTO user_table (username,user_email,user_password,user_image,user_address
              ,user_mobile) VALUES('$user_username','$user_email','$hash_password','$user_image','$user_address','$user_contact')";
        if($user_password!=$user_conf_password)
        {
           echo "
           <p class='text-danger text-center'>pasword doesn't match with confirm password</p>";
        }
        else
        {
            $result=mysqli_query($con,$sql);
            if($result)
            {
                echo "<script>alert('Data added successfully')</script>";
            }
            else
            {
                echo "<script>alert('fail marso')</script>";
            }
        }
    }
}

?>