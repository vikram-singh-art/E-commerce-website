<h2 class="text-center text-success my-4">All Users</h2>
<table class="table table-bordered text-white text-center">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>User Name </th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary"> 
        <?php 
        $number = 1;
        $user_table = "select * from user_table";
        $result = mysqli_query($conn,$user_table);
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_address = $row['user_address'];
            $user_mobile = $row['user_mobile'];

            echo " <tr>
            <td>$number</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td><img src='../user_area/user_image/$user_image' alt='User Image' class='product_image'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?delete_users=$user_id' class='text-white'><i class='fa-sharp fa-solid fa-trash'></a></i></td>
            
        </tr> ";
        $number++;
        }
        ?>
        
           
    </tbody>
</table>