<?php
include('../includes/connect.php');
?>
    <table class="table bordered-mt-0">
        <thead class='bg-info'>
            <tr>
                <th>Order id </th>
                <th>Buyer name</th>
                <th>Invoice number</th>
                <th>product name</th></th>
                <th>action</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $sql="SELECT * FROM order_pending";
            $res=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($res))
            {
                $order_id=$row['order_id'];
                $user_id=$row['user_id'];

                $sq="SELECT * FROM user_table WHERE user_id=$user_id";
                $result=mysqli_query($con,$sq);
                $ro=mysqli_fetch_assoc($result);
                $username=$ro['username'];

                $invoice_number=$row['invoice_number'];
                $product_id=$row['product_id'];

                $sq2="SELECT * FROM products WHERE product_id=$product_id";
                $result2=mysqli_query($con,$sq2);
                $ro2=mysqli_fetch_assoc($result2);
                $product_name=$ro2['product_title'];



                echo "<tr >
                <td>$order_id</td>
                <td>$username</td>
                <td>$invoice_number</td>
                <td>$product_name</td>

                <td>
                <a href='index.php?cancel=$invoice_number' class='text-light'>Cancel</a>
                <a href='index.php?approve=$invoice_number' class='text-light'>Approve</a>
                </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>