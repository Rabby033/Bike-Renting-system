<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <?php
    $user=$_SESSION['username'];
    $get_user_id="SELECT * FROM user_table WHERE username='$user'";
    $result=mysqli_query($con,$get_user_id);
    $row=mysqli_fetch_assoc($result);

    $user_id=$row['user_id'];
    ?>


    <h3 class="text-success">All of my order</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Invoice number</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $sql="SELECT * FROM user_order user_order WHERE user_id='$user_id'";
            $re=mysqli_query($con,$sql);
            while($orders=mysqli_fetch_assoc($re))
            {
                $oid=$orders['order_id'];
                $invoice_no=$orders['invoice_number'];
                $date=$orders['order_date'];
                $order_status=$orders['order_status'];

                echo "<tr>
                <td>$oid</td>
                <td>$invoice_no</td>
                <td>$date</td>
                <td>$order_status</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>