<?php
include('../includes/connect.php');
?>
<h3 class="text-success text-center">All products</h3>
    <table class="table bordered-mt-5">
        <thead class='bg-info'>
            <tr>
                <th>Product id </th>
                <th>Product Title     </th>
                <th>Product image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $sql="SELECT * FROM products";
            $res=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($res))
            {
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_img=$row['product_img1'];

                echo "<tr >
                <td>$product_id</td>
                <td>$product_title</td>
                <td><img src='./product_images/$product_img' class='short_image'></td>
                <td>
                <a href='./edit_product.php?edit_product=$product_id' class='text-light'>Edit</a>
                <a href='index.php?delete_product=$product_id' class='text-light'>Delete</a>
                </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>