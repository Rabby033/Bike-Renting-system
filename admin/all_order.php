<?php
include('../includes/connect.php');
?>
    <table class="table bordered-mt-0">
        <thead class='bg-info'>
            <tr>
                <th>Book id</th>
                <th>Username</th>
                <th>Invoice number</th>
                <th>Product image</th></th>
                <th>start date</th>
                <th>end date</th>
                <th>message</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $sql="SELECT * FROM booking_table WHERE order_status='pending'";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                $book_id=$row['book_id'];
                $username=$row['username'];
                $invoice=$row['invoice_num'];
                $product_image=$row['product_image'];
                $booking_date=$row['booking_date'];
                $start_date=$row['date_from'];
                $end_date=$row['date_to'];
                $msg=$row['msg'];

                echo "<tr>
                <td>$book_id</td>
                <td>$username</td>
                <td>$invoice</td>
                <td><img src='./product_images/$product_image' class='list_image'></td>
                <td>$start_date</td>
                <td>$end_date</td>
                <td>$msg</td>
                <td>
                    <a href='./cancel_order.php?cancel=$invoice' class='text-light'>cancel</a>
                    <a href='./approve_order.php?invoice=$invoice'class='text-light'>approve</a>
              </td>
            </tr>";
            }
            ?>
        </tbody>
    </table>