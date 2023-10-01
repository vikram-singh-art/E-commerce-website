<h2 class="text-center text-success my-4">All Orders</h2>

<table class="table table-bordered text-white text-center">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary">
        <?php 
        $number = 1;
        $get_orders = "SELECT * FROM user_orders";
        $result_orders = mysqli_query($conn,$get_orders);
        $num_rows = mysqli_num_rows($result_orders);
        if($num_rows == 0){
            echo "";
        }else{
            while ($row = mysqli_fetch_assoc($result_orders)){
                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $amount_due = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $total_products = $row['total_products'];
                $order_date = $row['order_date'];
                $order_status = $row['order_status'];

                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='index.php?delete_order=$order_id' class='text-white'><i class='fa-sharp fa-solid fa-trash'></a></i></td>
            </tr>";
            $number++;
            }
        }
        
        ?>
        
    </tbody>
</table>