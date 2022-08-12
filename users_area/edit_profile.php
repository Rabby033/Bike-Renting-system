<?php
if(isset($_GET['edit_profile']))
{
    $user_session_name=$_SESSION['username'];
    $sql="SELECT * FROM user_table  WHERE username='$user_session_name'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $user_id=$row['user_id'];
    $username=$row['username'];
    $user_email=$row['user_email'];
    $user_address=$row['user_address'];
    $user_mobile=$row['user_mobile'];

    if(isset($_POST['update_profile']))
    {
        
        $update_id=$user_id;
        $new_email=$_POST['user_useremail'];
        $new_user_img=$_FILES['user_userimg']['name'];
        $temp_new_img=$_FILES['user_userimg']['tmp_name'];
        $new_address=$_POST['user_address'];
        $new_mobile=$_POST['user_mobile'];
        move_uploaded_file($temp_new_img,"./user_images/$new_user_img");

        $update_sql1="UPDATE user_table set user_email='$new_email' WHERE user_id=$update_id ";
        $final_query1=mysqli_query($con,$update_sql1);

        $update_sql2="UPDATE user_table set user_image='$new_user_img' WHERE user_id=$update_id ";
        $final_query2=mysqli_query($con,$update_sql2);

        $update_sql3="UPDATE user_table set user_address='$new_address' WHERE user_id=$update_id ";
        $final_query3=mysqli_query($con,$update_sql3);

        $update_sql4="UPDATE user_table set user_address='$new_mobile' WHERE user_id=$update_id ";
        $final_query4=mysqli_query($con,$update_sql4);
        
        if($final_query1 and $final_query2 and $final_query3 and $final_query4 )
        {
            echo "<script>alert('updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('failed successfully')</script>";
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
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="style1.css">
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
    <div class="wrap">
    <h3 class="text-center text-success mb-4">Edit Profile</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_useremail"  placeholder="enter new email">
        </div>
        <div class="form-outline mb-4">
            <input type="file" class="form-control w-50 m-auto" name="user_userimg"  placeholder="upload new image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" placeholder="enter address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" placeholder="enter contact">
        </div>
        <input type="submit" class="bg-info border-0" value="update" name="update_profile">
    </form>
    </div>
</body>
</html>