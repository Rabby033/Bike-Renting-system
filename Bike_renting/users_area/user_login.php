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
    <style>
        .wrap{
       background: url('../img/login_bg.jpg') no-repeat;
       background-size: cover;
       height: 100vh;
       overflow-x: hidden;
       overflow-y: auto;
      }
    </style>    
</head>
<body>
    <div class='wrap'>
    <div class="container-fluid m-3">
        <h2 class="text-center">User login</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-2">
                       <lebel for ="user_username" class="form-lebel">Username</lebel>
                       <input type="text" id="user_name" class="form-control" placeholder="enter your username" required="required" name="user_username" autocomplete="off">
                    </div>
                    <div class="form-outline mb-2">
                       <lebel for ="user_password" class="form-lebel">Password</lebel>
                       <input type="password" id="user_password" class="form-control" placeholder="enter your password" required="required" name="user_password" autocomplete="off">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 border-0 px-3" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account?<a href="user_registration.php"> Register </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['user_username']))
{
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $sql="SELECT * FROM user_table WHERE username='$user_username'";
    $res=mysqli_query($con,$sql);


    $count=mysqli_num_rows($res);
    $row_data=mysqli_fetch_assoc($res);
    if($count==0)
    {
        echo "<script>alert('invalid username')</script>";
    }
    else
    {
       if(password_verify($user_password,$row_data['user_password']))
       {
           session_start();
           $_SESSION["username"] =$user_username;
           echo "<script>window.open('../index.php','_self')</script>";
           echo $_SESSION;
       }
       else
       {
          echo "<script>alert('incorrect password')</script>";
       }
    }

}
?>
