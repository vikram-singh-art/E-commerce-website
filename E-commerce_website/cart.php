<?php
session_start();
include 'include/connect.php';
include './functions/common_function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="style.css">

    <style>
        .logo {
            width: 7%;
            height: 7%;
            object-fit: contain;
        }
    </style>

</head>

<body>

    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <img class="img-fluid logo" src="image/logo1.png" alt="logo image here">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="index.php">Home</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link text-white" href="display_all.php">Products</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Register</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Contact</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link text-white" href="cart.php"><i class="fa-solid fa-cart-shopping"> <sup
                                    class="text-danger">
                                    <?php cart_item() ?>
                                </sup> </i></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Total Price:
                            <?php total_price(); ?>
                        </a>
                    </li>


                </ul>
                <form class="form-inline my-2 my-lg-0" action="search_products.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search_data"
                        aria-label="Search">
                    <input class="form-control btn btn-success" type="submit" name="search_data_product" value="Search"
                        placeholder="search">
                </form>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                
    <?php 
    //checking user is login or not if login then show user name
        if(!isset($_SESSION['username'])){
            echo " <li class='nav-item active'>
            <a class='nav-link text-white' href='#'>Welcome Guest</a>
        </li>";
        }else{
            echo "<li class='nav-item active'>
            <a class='nav-link text-white' href='#'>Welcome :- ".$_SESSION['username']."</a>
        </li>";
        }

        if(!isset($_SESSION['username'])){
          echo " <li class='nav-item active'>
          <a class='nav-link text-white' href='user_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item active fs-4'>
          <a class='nav-link text-danger font-weight-bold' href='user_area/logout.php'>Logout</a>
        </li>";
        }
        ?>
            </ul>
        </nav>


        <!-- thired child -->
        <div class="container">
            <form method="post" action="">
                <table class="table table-bordered text-center">
                   
                    <tbody>

                        <?php
                        global $conn;
                        $ip = getIPAddress();
                        $total_price = 0;
                        $select = "select * from cart_details where ip_address ='$ip'";
                        $result = mysqli_query($conn, $select);
                        $result_num = mysqli_num_rows($result);
                        if ($result_num > 0) {
                            echo ' <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan="2">Operation</th>
                            </tr>
                        </thead>';
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_product = "select * from products where product_id =$product_id";
                                $result_product = mysqli_query($conn, $select_product);
                                while ($row_product_price = mysqli_fetch_array($result_product)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_value = array_sum($product_price);
                                    $total_price += $product_value;
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $product_title ?>
                                        </td>
                                        <td>
                                            <img src="image/<?php echo $product_image1 ?>" alt="product image"
                                                style="width:20%;height:20%;object-fit:contain;">
                                        </td>
                                        <td><input class="form-control w-50 m-auto" type="text" name="qty"></td>
                                        <?php
                                        $ip = getIPAddress();
                                        if (isset($_POST['update'])) {
                                            $quantity = $_POST['qty'];
                                            $update_cart = "update cart_details set quantity = $quantity where ip_address ='$ip'";
                                            $update_result = mysqli_query($conn, $update_cart);
                                            $total_price = $total_price * $quantity;
                                        }
                                        ?>
                                        <td>
                                            <?php echo $price_table ?> /-
                                        </td>
                                        <td>
                                            <input class="form-control" type="checkbox" name="removeitems[]"
                                                value="<?php echo $product_id ?>">
                                        </td>
                                        <td class="d-flex">
                                            <input class="form-control btn btn-info mx-3" type="submit" name="update"
                                                value="Update Cart">
                                            <input class="form-control btn btn-info" type="submit" name="remove" value="Remove Cart"
                                                class="bg-info">
                                        </td>

                                    </tr>
                                    <?php
                                }
                            }
                        }else{
                            echo "<h2 class='text-center text-danger my-4'> Cart is empty </h2>";
                        }

                        ?>
                    </tbody>
                </table>
                <div class="d-flex">
                    <?php 
                     $ip = getIPAddress();
                     $total_price = 0;
                     $select = "select * from cart_details where ip_address ='$ip'";
                     $result = mysqli_query($conn, $select);
                     $result_num = mysqli_num_rows($result);
                     if ($result_num > 0) {
                        echo "<h4>Subtotal: <strong>
                        $total_price
                    </strong>
                </h4>
                <input class='bg-info px-3 py-2 border-0 mx-3' type='submit' name='continue_shoping'value='Continue Shoping'>

                <button class='btn btn-secondary'><a href='user_area/checkout.php' class='text-light text-decoration-none'> checkout</button> </a>";
                     }else{
                        echo "<input class='bg-info px-3 py-2 border-0 mx-3' type='submit' name='continue_shoping'
                        value='Continue Shoping'>";
                     }
                     if(isset($_POST['continue_shoping'])){
                        echo "<script> window.open('index.php','_self') </script>";
                     }
                    ?>
                    
                </div>
            </form>

            <!-- Remove items from cart  -->
            <?php
            function remove_cart_item()
            {
                global $conn;
                if (isset($_POST['remove'])) {
                    foreach ($_POST['removeitems'] as $remove_id) {
                        echo $remove_id;
                        $delete_query = "delete from cart_details where product_id=$remove_id";
                        $run = mysqli_query($conn, $delete_query);
                        if ($run) {
                            echo "<script> window.open('cart.php','_self') </script>";
                        }
                    }
                }
            }
            remove_cart_item();
            ?>
        </div>
    </div>








    <!-- Bootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>