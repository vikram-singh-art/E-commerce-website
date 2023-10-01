<?php 
include '../include/connect.php';

if(isset($_POST['admin_login'])){
    $admin_name = $_POST['admin_name'];
    $admin_password = md5($_POST['admin_password']);

    $select = "select * from admin_table where admin_name = '$admin_name' and admin_password = '$admin_password'";
    $result = mysqli_query($conn,$select);
    if($result){
        echo "<script type='text/javascript'>alert('Admin Login Successfully');</script>";
        echo "<script type='text/javascript'>window.open('index.php','_self');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Admin login Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <div class="container">
        <h2 class="text-center my-4 text-success">Admin Login</h2>
        <div class="row">
            <div class="col-md-6 mt-5">
                <img src="../image/admin_registtration.png" alt="">
            </div>
            <div class="col-md-6">
                <form action="" method="post"  class="w-50 m-auto mt-4">
                    <!-- username input fields -->
                    <div class="form-outline mb-4">
                        <lable class="form-lable">Username </lable>
                        <input type="text" class="form-control" name="admin_name" placeholder="enter your name" required
                            autocomplete="off">
                    </div>

                    <!-- password input fields -->
                    <div class="form-outline mb-4">
                        <lable class="form-lable">Password </lable>
                        <input type="password" class="form-control" name="admin_password" placeholder="enter your password"
                            required autocomplete="off">
                    </div>
                    
                    <div class="text-center mb-5 w-50 m-auto p-3">
                        <input class="btn btn-success" value="Login" type="submit" name="admin_login">
                        <p class="small fw-bold mt-2">already have an account? <a href='admin_registration.php'
                                class="text-danger">register</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>