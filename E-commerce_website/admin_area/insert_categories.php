<?php
include "../include/connect.php";

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    $select = "SELECT * FROM categories where category_title = '$category_title'";
    $select_result = mysqli_query($conn, $select);
    $num = mysqli_num_rows($select_result);
    if ($num > 0) {
        echo '<div class="alert alert-danger" role="alert">Category already present</div>';
    } else if($category_title ==''){
        echo '<div class="alert alert-danger" role="alert">Please enter valied category name</div>';

    }else {
        $sql = "insert into categories (category_title) values ('$category_title')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<div class="alert alert-success" role="alert">Category Added Successfully</div>';
        }
    }
}
?>

<h2 class="text-center mt-3">Insert Categories </h2>

<form action="" method="post" class="my-5">
    <div class="input-group mb-4 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert Categories" name="cat_title" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control btn btn-primary" name="insert_cat" value="Insert Categories">
    </div>
</form>