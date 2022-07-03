<?php
include('../includes/connect.php');
if(isset($_POST['submit']))
{
  $category_title=$_POST['cat_title'];
  $check="SELECT * FROM categories WHERE category_title='$category_title' ";
  $check_result=mysqli_query($con,$check);
  $num=mysqli_num_rows($check_result);
  if($num>0)
  {
       echo "<script>alert('this is already present in database')</script>";
  }
  else
  {
    $inser_query="INSERT INTO  categories (category_title) VALUES ('$category_title')";
    $result=mysqli_query($con,$inser_query);
    if($result)
    {
      echo "<script>alert('new category has been added successfully')</script>";
    }
    else
    {
      die(mysqli_error($con));
    }
  }
}
?>
<h2 class="text-center">Insert categories</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1" ><i class="fa-solid.fa-receipt"></i></span>
    <input type="text" name="cat_title" class="form-control" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" name="submit" class="form-control bg-info" value="Insert categories">
  </div>
</form>