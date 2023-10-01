<?php
//session_start();
include '../include/connect.php';
include '../functions/common_function.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
    .logo1 {
      width: 7%;
      height: 7%;
      object-fit: contain;
    }
    .product_image{
      width: 20%;
      height: 20%;
      object-fit: contain;
    }

  </style>

</head>

<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class="img-fluid logo1" src="../image/logo1.png" alt="logo image here">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-item text-white text-decoration-none">welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div>
            <h3 class="text-center my-2">Manag Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div>
                    <!-- Admin image -->
                    <a href=""> <img class="img-fluid" src="" alt="admin image"> </a>
                    <p class="text-center text-light">Admin Image </p>
                </div>

                <!-- All buttons -->
                <div class="button text-center px-3">
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?insert_product"> Insert Product </a> </button>
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?view_products"> View Product </a> </button>
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?insert_categories"> Insert Category </a> </button>
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?view_categories"> View Category </a> </button>
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?insert_brand"> Insert Brand </a> </button>
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?view_brands"> View Brand </a> </button>
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?list_orders"> All Orders </a> </button>
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?list_payments"> All Payment </a> </button>
                    <button><a class="nav-link text-light bg-info my-1" href="index.php?list_users"> List Users </a> </button>
                    <button class="my-3"><a class="nav-link text-light bg-info my-1" href="../user_area/logout.php"> Logout </a> </button>
                </div>
            </div>
        </div>

        <!-- fourth chiled -->
        <div class="container">
            <?php
            if (isset($_GET['insert_categories'])){
                include "insert_categories.php";
            }

            if (isset($_GET['insert_brand'])){
                include "insert_brands.php";
            }

            if (isset($_GET['insert_product'])){
                include "insert_product.php";
            }
            if (isset($_GET['view_products'])){
                include "view_products.php";
            }
            if (isset($_GET['edit_products'])){
                include "edit_products.php";
            }
            if (isset($_GET['delete_products'])){
                include "delete_products.php";
            }
            if (isset($_GET['view_categories'])){
                include "view_categories.php";
            }
            if (isset($_GET['view_brands'])){
                include "view_brands.php";
            }
            if (isset($_GET['edit_category'])){
                include "edit_category.php";
            }
            if (isset($_GET['edit_brand'])){
                include "edit_brands.php";
            }
            if (isset($_GET['delete_brand'])){
                include "delete_brand.php";
            }
            if (isset($_GET['delete_category'])){
                include "delete_category.php";
            }
            if (isset($_GET['list_orders'])){
                include "list_orders.php";
            }
            if (isset($_GET['delete_order'])){
                include "delete_order.php";
            }
            if (isset($_GET['list_payments'])){
                include "list_payments.php";
            }
            if (isset($_GET['delete_payments'])){
                include "delete_payments.php";
            }
            if (isset($_GET['list_users'])){
                include "list_users.php";
            }
            if (isset($_GET['delete_users'])){
                include "delete_users.php";
            }
            
            
            
            
            
            
            
            
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