<h2 class="text-center text-success my-4">All Payments</h2>
<table class="table table-bordered text-white text-center">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Amount </th>
            <th>Invoice Number</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary"> 
        <?php 
        $number = 1;
        $payment = "select * from user_payments";
        $result = mysqli_query($conn,$payment);
        while($row = mysqli_fetch_assoc($result)){
            $payment_id = $row['payment_id'];
            $order_id = $row['order_id'];
            $invoice_number = $row['invoice_number'];
            $amount = $row['amount'];
            $payment_mode = $row['payment_mode'];
            $date = $row['date'];

            echo " <tr>
            <td>$number</td>
            <td>$amount</td>
            <td>$invoice_number</td>
            <td>$payment_mode</td>
            <td>$date</td>
            <td><a href='index.php?delete_payments=$payment_id' class='text-white'><i class='fa-sharp fa-solid fa-trash'></a></i></td>
        </tr> ";
        $number++;
        }
        ?>
           
    </tbody>
</table>