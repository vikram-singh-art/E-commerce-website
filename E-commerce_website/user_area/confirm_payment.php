<?php 
include('../include/connect.php');
session_start();
if(isset($_GET['orders_id'])){
    $order_id = $_GET['orders_id'];
    $select_data = "select * from user_orders where order_id = $order_id";
    $result_data = mysqli_query($conn,$select_data);
    $fetch_data = mysqli_fetch_assoc($result_data);
    $amount = $fetch_data['amount_due'];
    $invoice_number = $fetch_data['invoice_number'];
}

if(isset($_POST['confirm'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode) values($order_id,$invoice_number,$amount,'$payment_mode')";

    $result = mysqli_query($conn, $insert_query);

    if($result){
        echo "<script type='text/javascript'>alert('Successfully complete the payment');</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";  
    }

    //updating user order payment complete
    $update_orders = "update user_orders set order_status='Complete' where order_id = $order_id ";
    $result_order = mysqli_query($conn,$update_orders);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
    <!-- Bootstrap css link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h2 class="text-center text-light">Confirm Payment </h2>
        <form action="" method="post" class="w-50 m-auto">
            <div class="form-outline my-4 text-center">
                <input class="form-control m-auto w-50" type="text" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <lable class="text-light">Amount </lable>
                <input class="form-control m-auto w-50" type="text" name="amount" value="<?php echo $amount ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <select name="payment_mode" class="form-control w-50 m-auto">
                    <option>Select payment mode</option>
                    <option>UPI</option>
                    <option>Net Banking</option>
                    <option>Paypal</option>
                    <option>Cash on Delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center">
                <input class="m-auto w-50 bg-info py-2" type="submit" name="confirm" value="Confirm">
            </div>
        </form>
    </div>
</body>
</html>