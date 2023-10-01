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
          <?php 
          if(isset($_SESSION['username'])){
            echo "<li class='nav-item active'>
            <a class='nav-link text-white' href='user_area/profile.php'>My Account</a>
          </li>";
          }else{
            echo "<li class='nav-item active'>
            <a class='nav-link text-white' href='user_area/user_registration.php'>Register</a>
          </li>";
          }
          ?>
          
          <li class="nav-item active">
            <a class="nav-link text-white" href="#">Contact</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link text-white" href="cart.php"><i class="fa-solid fa-cart-shopping"> <sup class="text-danger"><?php cart_item()?></sup> </i></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link text-white" href="#">Total Price: <?php total_price(); ?></a>
          </li>


        </ul>
        <form class="form-inline my-2 my-lg-0" action="search_products.php" method="get">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
          <input class="form-control btn btn-success" type="submit" name="search_data_product" value="Search" placeholder="search">
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

    
    <!-- calling cart function -->
    <?php 
    cart();
    ?>


    <!-- thired child -->
    <div class="bg-light">
      <h3 class="text-center">Hidden Store</h3>
      <p class="text-center">Communication is at the heart of e-commerece and community </p>
      <!-- card -->
      <div class="row">
        <!-- card column -->
        <div class="col-md-10">
          <div class="row">
            <!-- first card -->
            <?php
            //  displaying dynamic card php code here
            getproducts();
            get_unique_categories();
            get_unique_brands();


            ?>

          </div>
        </div>
        <!-- category column -->
        <div class="col-md-2 bg-secondary p-0 text-center">
          <ul class="navbar-nav mb-3 me-auto">
            <li class="nav-item bg-info">
              <a href="#" class="nav-item text-white text-decoration-none">
                <h4 class="mt-2"> Delivery Brands </h4>
              </a>
            </li>


            <!-- display Brand data dynamically php code here -->
            <?php
            // calling function
           getbrands();
            ?>


          </ul>
          <ul class="navbar-nav me-auto">
            <li class="nav-item mb-3 bg-info">
              <a href="#" class="nav-item text-white text-decoration-none">
                <h4 class="mt-2"> Categories </h4>
              </a>
            </li>
            <!-- display Category data dynamically php code here -->

            <?php
           getcategories();

            ?>
          </ul>
        </div>

      </div>
    </div>
  </div>
  </div>







  <!-- Bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>