
<h2 class="text-center my-4 text-success">All Brands</h2>

<table class="table table-bordered text-center text-white">
    <thead class="bg-info">
        
        <tr>
            <th>Sl no</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary">
    <?php 
        $number = 1;
        $select_brand = "select * from brands";
        $result_brand = mysqli_query($conn,$select_brand);
        while($fetch_brand = mysqli_fetch_assoc($result_brand)){
            $brand_id = $fetch_brand['brand_id'];
            $brand_title = $fetch_brand['brand_title'];
            echo "<tr>
            <td>$number</td>
            <td>$brand_title</td>
            <td><a href='index.php?edit_brand=$brand_id' class='text-white'><i class='fa-solid fa-pen-to-square'></a></i></td>
            <td><a href='index.php?delete_brand=$brand_id' class='text-white'><i class='fa-sharp fa-solid fa-trash'></a></i></td>
        </tr>";
        $number++;
        }
        ?>
        </tbody>
        
</table>