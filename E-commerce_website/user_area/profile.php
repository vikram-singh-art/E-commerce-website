<?php
session_start();
include '../include/connect.php';
include '../functions/common_function.php';


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
        .profile_image{
            width: 90%;
            margin: auto;
            display: block;
            height: 100%;
        }
    </style>

</head>

<body>

    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <img class="img-fluid logo" src="../image/logo1.png" alt="logo image here">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="../index.php">Home</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link text-white" href="../display_all.php">Products</a>
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
                <form class="form-inline my-2 my-lg-0" action="../search_products.php" method="get">
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
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item active'>
          <a class='nav-link text-white' href='#'>Welcome Guest</a>
        </li>";
                } else {
                    echo "<li class='nav-item active'>
          <a class='nav-link text-white' href='#'>Welcome :- " . $_SESSION['username'] . "</a>
        </li>";
                }


                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item active'>
          <a class='nav-link text-white' href='user_login.php'>Login</a>
        </li>";
                } else {
                    echo "<li class='nav-item active fs-4'>
          <a class='nav-link text-danger font-weight-bold' href='logout.php'>Logout</a>
        </li>";
                }
                ?>
            </ul>
        </nav>


        <!-- thired child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of e-commerece and community </p>
        </div>

        <!-- fourts child -->
        <div class="row"> 
            <div class="col col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light"><h4>Your Profile</h4></a>
                    </li>
                    <?php
                    //accessing image from database
                    $user_name = $_SESSION['username'];
                    $select_image = "select * from user_table where user_name = '$user_name'";
                    $result_image = mysqli_query($conn,$select_image);
                    $fetch = mysqli_fetch_assoc($result_image);
                    $user_image = $fetch['user_image'];
                    
                    ?>
                    <li class="nav-item">
                        <img class="img-fluid profile_image" src="user_image/<?php echo $user_image ?>" alt="">
                    </li>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link text-light">Pending Orders </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?my_orders" class="nav-link text-light">My Orders </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?delete_account" class="nav-link text-light">Delete Account </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-light">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col col-md-10">
                <?php get_user_order_details();
                if(isset($_GET['edit_account'])){
                    include 'edit_account.php';
                }
                if(isset($_GET['my_orders'])){
                    include 'user_orders.php';
                }
                if(isset($_GET['delete_account'])){
                    include 'delete_account.php';
                }
                ?>
                
            </div>

        </div>

    </div>







    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>