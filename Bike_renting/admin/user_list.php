<?php
include('../includes/connect.php');
?>
    <table class="table bordered-mt-0">
        <thead class='bg-info'>
            <tr>
                <th>User id </th>
                <th>Username</th>
                <th>Image</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $sql="SELECT * FROM user_table";
            $res=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($res))
            {
                $user_id=$row['user_id'];
                $name=$row['username'];
                $email=$row['user_email'];
                $image=$row['user_image'];


                echo "<tr >
                <td>$user_id</td>
                <td>$name</td>
                <td><img src='../users_area/user_images/$image' class='short_image'></td>
                <td>$email</td>
                <td><a href='index.php?delete_user=$user_id' class='text-light'>Remove</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>