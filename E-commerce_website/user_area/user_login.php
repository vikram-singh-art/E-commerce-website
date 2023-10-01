<?php
@session_start();
include '../include/connect.php';
include '../functions/common_function.php';
if(isset($_POST['user_login'])){
    $name = $_POST['user_name'];
    $password = md5($_POST['user_password']);
    $select_query = "SELECT * FROM user_table WHERE user_name = '$name' and user_password = '$password'";
    $result = mysqli_query($conn,$select_query);
    $ip = getIPAddress(); 

    //cart items 
    $select_cart_item = "SELECT * FROM cart_details where ip_address = '$ip'";
    $result_cart_item = mysqli_query($conn,$select_cart_item);
    $count_cart_item = mysqli_num_rows($result_cart_item);


    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0){
        $_SESSION['username'] = $name;
        if($num_rows == 1 && $count_cart_item == 0){
            $_SESSION['username'] = $name;
        echo "<script type='text/javascript'>alert('Login Successfully');</script>";
        echo "<script type='text/javascript'>window.open('profile.php','_self');</script>";
        }else{
            $_SESSION['username'] = $name;
            echo "<script type='text/javascript'>alert('Login Successfully');</script>";
            echo "<script type='text/javascript'>window.open('payment.php','_self');</script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('Login Failed');</script>";
    }
} 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <h2 class='text-center my-4'> User Login </h2>
    <div class='row'>
        <div class="col">
            <form action="" method="post" class="w-50 m-auto mt-2">
                <!-- username input fields -->
                <div class="form-outline mb-4"> 
                    <lable class="form-lable">Username </lable> 
                    <input type="text" class="form-control" name="user_name" placeholder="enter your name" required autocomplete="off">
                </div>

                
                <!-- password input fields -->
                <div class="form-outline mb-4"> 
                    <lable class="form-lable">Password </lable> 
                    <input type="password" class="form-control" name="user_password" placeholder="enter your password" required autocomplete="off">
                </div>

               
                <div class="text-center mb-5 w-50 m-auto p-3">
                    <input class="btn btn-success" value="Login" type="submit" name="user_login">
                    <p class="small fw-bold mt-2">Don't have an account? <a href='user_registration.php' class="text-danger">register</a> </p>
                </div>
            </form>
        </div>
    </div>


    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>