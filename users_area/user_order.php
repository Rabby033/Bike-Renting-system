<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my order</title>
</head>

<body>
    <div class="mt-2">
        <table class="table bordered-mt-5">
            <thead class="bg-info">
                <tr>
                    <th>Book id</th>
                    <th>Product Image</th>
                    <th>Booking date</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Order status</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                $username=$_SESSION['username'];


                $sql="SELECT * FROM  booking_table WHERE username='$username'";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                    $booking_id=$row['book_id'];
                    $invoice_number=$row['invoice_num'];
                    $product_image=$row['product_image'];
                    $booking_date=$row['booking_date'];
                    $date_from=$row['date_from'];
                    $date_to=$row['date_to'];
                    $order_status=$row['order_status'];
                    
                    echo "<tr>
                    <td>$booking_id</td>
                    <td><img src='../admin/product_images/$product_image' class='list_image'></td>
                    <td>$booking_date</td>
                    <td>$date_from</td>
                    <td>$date_to</td>
                    <td>$order_status</td>
                    </tr>";
                    
                }
                
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>