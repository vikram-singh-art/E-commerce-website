<?php 
include '../include/connect.php';
include '../functions/common_function.php';
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

//getting total items and total price of all items
$user_ip = getIPAddress();
$total_price = 0;
$cart_query_price = "select * from cart_details where ip_address = '$user_ip'";
$result_query_price = mysqli_query($conn,$cart_query_price);
$invoice_number = mt_rand();
$status = "pending";
$count_product = mysqli_num_rows($result_query_price);
while($row = mysqli_fetch_array($result_query_price)){
    $product_id = $row['product_id'];
    $select_product = "SELECT * FROM products WHERE product_id = $product_id";
    $result_product = mysqli_query($conn,$select_product);
    while($row_product_price = mysqli_fetch_array($result_product)){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price+=$product_values;
    }
}

//getting quantity from cart 
$get_cart = "select * from cart_details";
$run_cart = mysqli_query($conn,$get_cart);
$get_item_quantity = mysqli_fetch_assoc($run_cart);
$quantity = $get_item_quantity['quantity'];
if($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
}else{
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

$insert_orders = "INSERT INTO user_orders(user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES($user_id,$subtotal,$invoice_number,$count_product,NOW(),'$status')";
$result_orders = mysqli_query($conn,$insert_orders);
if($result_orders){
    echo "<script type='text/javascript'>alert('Orders are submitted successfuly');</script>";
    echo "<script type='text/javascript'>window.open('profile.php','_self');</script>";

}

//orders pending 
$insert_pending_orders = "INSERT INTO orders_pending(user_id,invoice_number,product_id,quantity,order_status) VALUES($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_orders = mysqli_query($conn,$insert_pending_orders);

//delete items from cart

$delete_cart = "delete from cart_details where ip_address = '$user_ip'";
$result_delete_cart = mysqli_query($conn,$delete_cart);

?>