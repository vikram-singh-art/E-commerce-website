<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

        <!-- php code to access user id -->
    <?php 
    include '../include/connect.php';
    include '../functions/common_function.php';
    $ip = getIPAddress();
    $select_query = "select * from user_table where user_ip='$ip'";
    $select_result = mysqli_query($conn,$select_query);
    $row = mysqli_fetch_assoc($select_result);
    $user_id = $row['user_id'];
        ?>


    <div class="container"> 
    <h2 class="text-center text-info my-5"> Payment Option </h2>
        <div class="row d-flex justify-content-center align-items-center"> 
            <div class="col-md-6"> 
                <a href="https://www.paypal.com" target="_blank"> <img class="img-fluid" src="../image/online_payment.avif" alt="online payment image" style="width:100%; height:350px;"></a>
            </div>
            <div class="col-md-6 text-center"> 
                <a href="order.php?user_id=<?php echo $user_id; ?>"> <h2 class="text-info">Pay Offline</h2></a>
            </div>
        </div>
    </div>

</body>
</html>