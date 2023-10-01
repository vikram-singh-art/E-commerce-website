<?php 
include '../include/connect.php';

if(isset($_POST['admin_register'])){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = md5($_POST['admin_password']);
    $admin_cpassword = md5($_POST['admin_cpassword']);

    if($admin_name == '' or $admin_email == '' or $admin_password == '' or $admin_cpassword == ''){
        echo "<script type='text/javascript'>alert('Please fill all fields');</script>";
    }elseif ($admin_password !== $admin_cpassword){
        echo "<script type='text/javascript'>alert('Password Missmatch');</script>";

    }else{
        $insert = "insert into admin_table (admin_name, admin_email, admin_password) values ('$admin_name','$admin_email','$admin_password')";

        $result = mysqli_query($conn,$insert);

        if($result){
            echo "<script type='text/javascript'>alert('Admin Register Successfully');</script>";
            echo "<script type='text/javascript'>window.open('admin_login.php','_self');</script>";
        }else{
            echo "<script type='text/javascript'>alert('Admin Register Failed');</script>";
        }
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
        <h2 class="text-center my-4 text-success">Admin Registration</h2>
        <div class="row">
            <div class="col-md-6 mt-5">
                <img src="../image/admin_registtration.png" alt="">
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data" class="w-50 m-auto mt-4">
                    <!-- username input fields -->
                    <div class="form-outline mb-4">
                        <lable class="form-lable">Username </lable>
                        <input type="text" class="form-control" name="admin_name" placeholder="enter your name" required
                            autocomplete="off">
                    </div>

                    <!-- email input fields -->
                    <div class="form-outline mb-4">
                        <lable class="form-lable">Email </lable>
                        <input type="email" class="form-control" name="admin_email" placeholder="enter your email" required
                            autocomplete="off">
                    </div>

                    <!-- password input fields -->
                    <div class="form-outline mb-4">
                        <lable class="form-lable">Password </lable>
                        <input type="password" class="form-control" name="admin_password" placeholder="enter your password"
                            required autocomplete="off">
                    </div>


                    <!-- confirm password input fields -->
                    <div class="form-outline mb-4">
                        <lable class="form-lable">Confirm Password </lable>
                        <input type="password" class="form-control" name="admin_cpassword"
                            placeholder="enter your confirm password" required autocomplete="off">
                    </div>
                    
                    <div class="text-center mb-5 w-50 m-auto p-3">
                        <input class="btn btn-success" value="Register" type="submit" name="admin_register">
                        <p class="small fw-bold mt-2">already have an account? <a href='admin_login.php'
                                class="text-danger">login</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>