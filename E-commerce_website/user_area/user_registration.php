<?php
include '../include/connect.php';
include '../functions/common_function.php';
if (isset($_POST['user_register'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = md5($_POST['user_password']);
    $confirm_password = md5($_POST['user_cpassword']);
    $mobile = $_POST['user_mobile'];
    $address = $_POST['user_address'];
    $image = $_FILES['user_image']['name'];
    $tmp_image = $_FILES['user_image']['tmp_name'];
    $ip = getIPAddress();

    //check user exist or not 
    $select_user = "SELECT * FROM user_table WHERE user_email = '$email'";
    $result_user = mysqli_query($conn, $select_user);
    $num_user = mysqli_num_rows($result_user);
    if ($num_user > 0) {
        echo "<script type='text/javascript'>alert('This user already present');</script>";
    } else if ($name == '' or $email == '' or $password == '' or $confirm_password == '' or $mobile == '' or $address == '' or $image == '') {
        echo "<script type='text/javascript'>alert('Please fill all the fields')</script>";
    } else if ($password !== $confirm_password) {
        echo "<script type='text/javascript'>alert('Passwords do not match')</script>";
    } else {
        move_uploaded_file("$tmp_image", "user_image/$image");

        $insert_query = "INSERT INTO user_table(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$name','$email','$password','$image','$ip','$address','$mobile')";
        $result = mysqli_query($conn, $insert_query);
        // if ($result) {
        //     echo "<script type='text/javascript'>alert('User Registered Successfully');</script>";
        //     echo "<script type='text/javascript'>window.open('user_login.php','_self')</script>";
        // }
    }

    //selecting cart item 
    $select_cart_item = "select * from cart_details where ip_address='$ip'";
    $result_cart_item = mysqli_query($conn, $select_cart_item);
    $num_cart_item = mysqli_num_rows($result_cart_item);
    if($num_cart_item > 0){
        $_SESSION['username'] = $name;
        echo "<script type='text/javascript'>alert('You have some item inside cart');</script>";
        echo "<script type='text/javascript'>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script type='text/javascript'>window.open('../index.php','_self')</script>";
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
    <h2 class='text-center my-4'> New User Register </h2>
    <div class='row'>
        <div class="col">
            <form action="" method="post" enctype="multipart/form-data" class="w-50 m-auto mt-4">
                <!-- username input fields -->
                <div class="form-outline mb-4">
                    <lable class="form-lable">Username </lable>
                    <input type="text" class="form-control" name="user_name" placeholder="enter your name" required
                        autocomplete="off">
                </div>

                <!-- email input fields -->
                <div class="form-outline mb-4">
                    <lable class="form-lable">Email </lable>
                    <input type="email" class="form-control" name="user_email" placeholder="enter your email" required
                        autocomplete="off">
                </div>

                <!-- user image input fields -->
                <div class="form-outline mb-4">
                    <lable class="form-lable">Image </lable>
                    <input type="file" class="form-control" name="user_image" autocomplete="off">
                </div>

                <!-- password input fields -->
                <div class="form-outline mb-4">
                    <lable class="form-lable">Password </lable>
                    <input type="password" class="form-control" name="user_password" placeholder="enter your password"
                        required autocomplete="off">
                </div>


                <!-- confirm password input fields -->
                <div class="form-outline mb-4">
                    <lable class="form-lable">Confirm Password </lable>
                    <input type="password" class="form-control" name="user_cpassword"
                        placeholder="enter your confirm password" required autocomplete="off">
                </div>

                <!-- address password input fields -->
                <div class="form-outline mb-4">
                    <lable class="form-lable">Address </lable>
                    <input type="text" class="form-control" name="user_address" placeholder="enter your address"
                        required autocomplete="off">
                </div>


                <!-- mobile input fields -->
                <div class="form-outline mb-4">
                    <lable class="form-lable">Mobile </lable>
                    <input type="number" class="form-control" name="user_mobile" placeholder="enter your mobile"
                        required autocomplete="off">
                </div>

                <div class="text-center mb-5 w-50 m-auto p-3">
                    <input class="btn btn-success" value="Register" type="submit" name="user_register">
                    <p class="small fw-bold mt-2">already have an account? <a href='user_login.php'
                            class="text-danger">login</a> </p>
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