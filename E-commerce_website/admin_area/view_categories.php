
<h2 class="text-center my-4 text-success">All Categories</h2>

<table class="table table-bordered text-center text-white">
    <thead class="bg-info">
        
        <tr>
            <th>Sl no</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary">
    <?php 
        $number = 1;
        $select_category = "select * from categories";
        $result_category = mysqli_query($conn,$select_category);
        while($fetch_category = mysqli_fetch_assoc($result_category)){
            $category_id = $fetch_category['category_id'];
            $category_title = $fetch_category['category_title'];
            echo "<tr>
            <td>$number</td>
            <td>$category_title</td>
            <td><a href='index.php?edit_category=$category_id' class='text-white'><i class='fa-solid fa-pen-to-square'></a></i></td>
            <td><a href='index.php?delete_category=$category_id' class='text-white'><i class='fa-sharp fa-solid fa-trash'></a></i></td>
        </tr>";
        $number++;
        }
        ?>
        </tbody>
        
</table>