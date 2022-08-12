
<?php
//fetch_data.php

include('./includes/connect.php');

if(isset($_POST["action"]))
{
	$query = "SELECT * FROM products WHERE status='true' ";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= " AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= " AND brand IN('".$brand_filter."')
		";
	}
	if(isset($_POST["location"]))
	{
		$location_filter = implode("','", $_POST["location"]);
		$query .= " AND product_location IN('".$location_filter."')
		";
	}
    $result=mysqli_query($con,$query);
    $count=mysqli_num_rows($result);
	$output = '';
	if($count > 0)
	{
        while($row=mysqli_fetch_assoc($result))
        {
            $image=$row['product_img1'];
            $title=$row['product_title'];
            $product_id=$row['product_id'];
            $price=$row['product_price'];
            $brand=$row['brand'];
            $location=$row['product_location'];
            include('./showing_product.php');
        }
	}
	else
	{
		echo "<h3 class='dr'>No data available</h3>";
	}
	echo $output;
}

?>