<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User orders</title>
</head>

<body>
    <?php
    $session_username = $_SESSION['username'];
    $get_user = "SELECT * FROM user_table WHERE user_name = '$session_username'";
    $result_user = mysqli_query($conn, $get_user);
    $fetch_data = mysqli_fetch_assoc($result_user);
    $user_id = $fetch_data['user_id'];
    ?>

    <h3 class='text-center text-success my-4'> All my orders </h3>
    <table class="table table-bordered text-center">
        <thead class="bg-info">
            <tr>
                <th>Sl no </th>
                <th>Order no </th>
                <th>Amount Due </th>
                <th>Total Products </th>
                <th>Invoice Number </th>
                <th>Date </th>
                <th>Complete/Incomplete </th>
                <th>Status </th>
            </tr>
        </thead>
        <?php
        $get_orders = "SELECT * FROM user_orders WHERE user_id = '$user_id'";
        $result_orders = mysqli_query($conn, $get_orders);
        $number = 1;
        while ($fetch_orders = mysqli_fetch_assoc($result_orders)) {
            $order_id = $fetch_orders['order_id'];
            $amount_due = $fetch_orders['amount_due'];
            $invoice_number = $fetch_orders['invoice_number'];
            $total_products = $fetch_orders['total_products'];
            $order_date = $fetch_orders['order_date'];
            $order_status = $fetch_orders['order_status'];
            if ($order_status == 'pending') {
                $order_status = 'Incomplete';
            } else {
                $order_status = 'Complete';
            }

            echo "<tbody>
                <tr>
                    <td>$number</td>
                    <td> $order_id </td>
                    <td> $amount_due </td>
                    <td>$total_products </td>
                    <td>$invoice_number </td>
                    <td>$order_date </td>
                    <td>$order_status </td>";
            ?>
            <?php
            if ($order_status == 'Complete') {
                echo "<td class='text-success'> Paid </td>";
            } else {
                echo "<td><a href='confirm_payment.php?orders_id=$order_id' class='text-dark'>confirm</a> </td>
                        </tr>
                        </tbody>";
            }
            $number++;
        }
        ?>
    </table>
</body>

</html>