<?php
include "../include/connect.php";

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // select item
    $select = "SELECT * FROM brands WHERE brand_title ='$brand_title'";
    $select_result = mysqli_query($conn, $select);
    $num = mysqli_num_rows($select_result);
    if ($num > 0) {
        echo '<div class="alert alert-danger" role="alert">Brand already present </div>';
    } else if ($brand_title == '') {
        echo '<div class="alert alert-danger" role="alert">Brand title cannot be empty </div>';
    } else {
        $sql = "insert into brands (brand_title) values ('$brand_title')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success" role="alert">Brand Added Successfully</div>';
        }
    }
}
?>

<h2 class="text-center mt-3">Insert Brands </h2>
<form action="" method="post" class="mb-2 my-5">
    <div class="input-group mb-4 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert Brands" name="brand_title">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control btn btn-primary" name="insert_brand" value="Insert Brands">
    </div>
</form>