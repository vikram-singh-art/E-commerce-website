
<h2 class="text-center my-4">All Product</h2>
<table class="table table-bordered text-center">
    <thead class="bg-info text-white">
        <tr>
            <th>
                Product ID
            </th>
            <th>
                Product Title
            </th>
            <th>
                Product Image
            </th>
            <th>
                Product Price
            </th>
            <th>
                Total Sold
            </th>
            <th>
                Status
            </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-white">
        <?php 
        $get_products = "SELECT * FROM products";
        $result_products = mysqli_query($conn,$get_products);
        $num_products = mysqli_num_rows($result_products);
        $number = 1;
        if($num_products == 0) {
            echo "";
        }else{
            while($row = mysqli_fetch_assoc($result_products)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                //counting number of product sold
                $get_count = "select * from orders_pending where product_id =$product_id";
                $result = mysqli_query($conn,$get_count);
                $num_rows = mysqli_num_rows($result);
                echo"<tr>
                <td>$number</td>
                <td>$product_title</td>
                <td><img src='product_image/$product_image' alt='product image' class='product_image'></td>
                <td>$product_price</td>
                <td>$num_rows</td>
                <td>$status</td>
                <td><a href='index.php?edit_products=$product_id' class='text-light'><i class='fa-solid fa-pen-to-square'></a></i></td>
                <td><a href='index.php?delete_products=$product_id' class='text-light'><i class='fa-sharp fa-solid fa-trash'></a></i></td>
            </tr>";
            $number++;
            }
        }
        ?>
        
    </tbody>
</table>
