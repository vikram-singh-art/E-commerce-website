<?php
if (isset($_GET['edit_account'])) {
    // access code
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table where user_name = '$user_session_name'";
    $result_query = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['user_name'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
}

    // update code
    if (isset($_POST['update'])) {
        $user_id_update = $user_id;
        $user_name = $_POST['user_name1'];
        $user_email = $_POST['user_email'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_number'];

        move_uploaded_file($user_image_tmp,"user_image/$user_image");

        $update_query = "UPDATE user_table set user_name = '$user_name',user_email = '$user_email',user_image = '$user_image',user_address = '$user_address',user_mobile = $user_mobile where user_id = $user_id_update";
        $result_update = mysqli_query($conn,$update_query);
        if($result_update){
            echo "<script type='text/javascript'>alert('Update Successfully');</script>";
            echo "<script type='text/javascript'>window.open('logout.php','_self');</script>";
        }else{
            echo "<script type='text/javascript'>alert('Update failed');</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .update_image {
            width: 200px;
            height: 200px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <h3 class="text-center text-success my-4">Edit Account </h3>
    <div>
        <form class="w-50 m-auto" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" name="user_name1" value="<?php echo $user_name ?>">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="user_image">
                <img src="user_image/<?php echo $user_image ?>" alt="" class="update_image">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="user_address" value="<?php echo $user_address ?>">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="user_number" value="<?php echo $user_mobile ?>">
            </div>
            <div class="text-center">
                <input class="btn btn-success" type="submit" value="Update" name="update">
            </div>
        </form>
    </div>
</body>

</html>