<table class="table bordered-mt-5">
    <thead class="bg-info">
        <tr>
            <th>Categoty title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        include('../includes/connect.php');
        $sql="SELECT * FROM categories";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
          $ans=$row['category_title'];
          echo "<tr>
          <td>$ans</td>
          <td><a href='index.php?del_cat=$ans' class='text-light'>Delete</a></td>
           </tr>";
        }
        ?>
    </tbody>
</table>