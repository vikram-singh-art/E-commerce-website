<?php
// include './include/connect.php';

//getting products
function getproducts()
{
    global $conn;
    //checking condition to check isset or not
    if (!isset($_GET['category_id'])) {
        if (!isset($_GET['brand_id'])) {
            $select_product = "select * from products order by rand() limit 0,9";
            $result_product = mysqli_query($conn, $select_product);
            while ($row = mysqli_fetch_assoc($result_product)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image1'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $product_id = $row['product_id'];
                echo "<div class='col-md-4 mb-4'>
                        <div class='card'>
                        <img class='card-img-top' style='width:100%; height:200px; object-fit:contain;' src='admin_area/product_image/$product_image' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Product Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
              </div>
            </div>";
            }
        }
    }
}

//getting products
function get_all_products()
{
    global $conn;
    //checking condition to check isset or not
    if (!isset($_GET['category_id'])) {
        if (!isset($_GET['brand_id'])) {
            $select_product = "select * from products order by rand()";
            $result_product = mysqli_query($conn, $select_product);
            while ($row = mysqli_fetch_assoc($result_product)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image1'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $product_id = $row['product_id'];
                echo "<div class='col-md-4'>
                        <div class='card'>
                        <img class='card-img-top' src='admin_area/product_image/$product_image' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Product Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
              </div>
            </div>";
            }
        }
    }
}

//search products function
function searchProducts()
{
    global $conn;
    //searching products'
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];

        $search_product = "select * from products where product_keyword like '%$search_data_value%'";
        $result_product = mysqli_query($conn, $search_product);
        $num_row = mysqli_num_rows($result_product);
        if ($num_row == 0) {
            echo '<h3 class="text-center m-auto text-danger mx-5"> No result match, No products found on this category</h3>';
        } else {
            while ($row = mysqli_fetch_assoc($result_product)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image1'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $product_id = $row['product_id'];
                echo "<div class='col-md-4'>
                        <div class='card'>
                        <img class='card-img-top' src='admin_area/product_image/$product_image' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Product Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
              </div>
        </div>";
            }
        }
    }
}


function get_unique_categories()
{
    global $conn;
    //checking condition to check isset or not
    if (isset($_GET['category_id'])) {
        $category_id_url = $_GET['category_id'];
        $select_product = "select * from products where category_id = '$category_id_url'";
        $result_product = mysqli_query($conn, $select_product);
        $num = mysqli_num_rows($result_product);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result_product)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image1'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $product_id = $row['product_id'];
                echo "<div class='col-md-4'>
                        <div class='card'>
                        <img class='card-img-top' src='admin_area/product_image/$product_image' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Product Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
              </div>
            </div>";
            }
        } else {
            echo '<h3 class="text-center m-auto text-danger mx-5"> No stock for this category</h3>';
        }
    }
}


function get_unique_brands()
{
    global $conn;
    //checking condition to check isset or not
    if (isset($_GET['brand_id'])) {
        $brand_id_url = $_GET['brand_id'];
        $select_product = "select * from products where category_id = '$brand_id_url'";
        $result_product = mysqli_query($conn, $select_product);
        $num = mysqli_num_rows($result_product);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result_product)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image1'];
                $product_description = $row['product_description'];
                $category_id = $row['category_id'];
                $product_id = $row['product_id'];
                echo "<div class='col-md-4'>
                        <div class='card'>
                        <img class='card-img-top' src='admin_area/product_image/$product_image' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Product Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
              </div>
            </div>";
            }
        } else {
            echo '<h3 class="text-center m-auto text-danger mx-5"> No stock for this brand</h3>';
        }
    }
}


//displaying brands
function getbrands()
{
    global $conn;
    $select_barnd = "SELECT * FROM brands";
    $select_result = mysqli_query($conn, $select_barnd);
    while ($fetch = mysqli_fetch_assoc($select_result)) {
        $brand_title = $fetch['brand_title'];
        $brand_id = $fetch['brand_id'];
        echo " <li class='nav-item mb-3'>
      <a href='index.php?brand_id=$brand_id' class='nav-item text-white text-decoration-none mt-4'>$brand_title</a>
    </li>";
    }
}

//displaying categories
function getcategories()
{
    global $conn;
    $select_category = "SELECT * FROM categories";
    $result_category = mysqli_query($conn, $select_category);
    while ($fetch_category = mysqli_fetch_assoc($result_category)) {
        $category_title = $fetch_category['category_title'];
        $category_id = $fetch_category['category_id'];
        echo " <li class='nav-item mb-3'>
      <a href='index.php?category_id=$category_id' class='nav-item text-white text-decoration-none'>$category_title</a>
      </li>";
    }
    ;
}

//getting dynamic data for view more page
function view_details()
{
    global $conn;
    //checking condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category_id'])) {
            if (!isset($_GET['brand_id'])) {
                $product_id = $_GET['product_id'];
                $select_product = "select * from products where product_id =$product_id";
                $result_product = mysqli_query($conn, $select_product);
                while ($row = mysqli_fetch_assoc($result_product)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_price = $row['product_price'];
                    $product_image = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];

                    $product_description = $row['product_description'];
                    $category_id = $row['category_id'];
                    $product_id = $row['product_id'];
                    echo "<div class='col-md-4'>
                        <div class='card'>
                        <img class='card-img-top' src='admin_area/product_image/$product_image' alt='$product_title'>
                        <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Product Price: $product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                    </div>
              </div>
            </div>
            <div class='col-md-8'>
                            <!-- related image -->
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h2 class='text-center mb-4'>Related Images </h2>
                                </div>
                                <div class='col-md-6'>
                                    <img class='img-fluid' style='width:100%; height:200px; object-fit:contain;' src='admin_area/product_image/$product_image2' alt=''>
                                </div>
                                <div class='col-md-6'>
                                    <img class='img-fluid' style='width:100%; height:200px; object-fit:contain;' src='admin_area/product_image/$product_image3' alt=''>
                                </div>
                            </div>
                        </div>";
                }
            }
        }
    }
}

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


//cart function for add to cart 
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_product = "select * from cart_details where ip_address ='$ip' and product_id =$get_product_id";
        $result_product = mysqli_query($conn, $select_product);
        $num = mysqli_num_rows($result_product);
        if ($num > 0) {
            echo "<script> alert('This item already present inside cart')</script>";
            echo "<script> window.open('index.php','_self') </script>";
        } else {
            $insert = "insert into cart_details (product_id, ip_address, quantity) values($get_product_id,'$ip',0)";
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result) {
                echo "<script> alert('Item added into cart') </script>";
                echo "<script> window.open('index.php','_self') </script>";
            }
        }
    }
}

//getting number of item in cart
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getIPAddress();
        $select_product = "select * from cart_details where ip_address ='$ip'";
        $result_product = mysqli_query($conn, $select_product);
        $count_cart_item = mysqli_num_rows($result_product);

    } else {
        global $conn;
        $ip = getIPAddress();
        $select_product = "select * from cart_details where ip_address ='$ip'";
        $result_product = mysqli_query($conn, $select_product);
        $count_cart_item = mysqli_num_rows($result_product);
    }
    echo $count_cart_item;
}

//getting total price 
function total_price()
{
    global $conn;
    $ip = getIPAddress();
    $total = 0;
    $select = "select * from cart_details where ip_address ='$ip'";
    $result = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_product = "select * from products where product_id =$product_id";
        $result_product = mysqli_query($conn, $select_product);
        while ($row_product_price = mysqli_fetch_array($result_product)) {
            $product_price = array($row_product_price['product_price']);
            $product_value = array_sum($product_price);
            $total += $product_value;
        }
    }
    echo $total;
}

// get user order details 
function get_user_order_details()
{
    global $conn;
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM user_table WHERE user_name='$username'";
    $result_details = mysqli_query($conn, $get_details);
    while ($row_query = mysqli_fetch_array($result_details)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "select * from user_orders where user_id = $user_id and order_status='pending'";
                    $result_orders = mysqli_query($conn, $get_orders);
                    $num_orders = mysqli_num_rows($result_orders);
                    if ($num_orders > 0) {
                        echo "<h3 class='text-center mt-4 text-success'> You have <span class='text-danger'>" . $num_orders . " </span> pending orders </h3>;
                        <div class='text-center'>
                          <a href='profile.php?my_orders' class='text-dark text-decoration-underline'> order details </a>
                        </div>";
                    } else {
                        echo "<h3 class='text-center mt-4 text-success'> You have 0 pending orders </h3>;
                        <div class='text-center'>
                          <a href='index.php' class='text-dark text-decoration-underline'> explore products </a>
                        </div>";
                    }
                    $fetch_orders = mysqli_fetch_array($result_orders);
                }
            }
        }

    }
}

?>