<?php
include '../include/connect.php';
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['select_category'];
    $product_brand = $_POST['select_brand'];

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $tmp_product_image1 = $_FILES['product_image1']['tmp_name'];
    $tmp_product_image2 = $_FILES['product_image2']['tmp_name'];
    $tmp_product_image3 = $_FILES['product_image3']['tmp_name'];

    $product_price = $_POST['product_price'];
    $product_status = 'true';

    if ($product_title == '' or $product_description == '' or $product_keyword == '' or $product_category == '' or $product_brand == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '' or $product_price == '') {
        echo '<div class="alert alert-danger" role="alert">Please fill all fields</div>';
    } else {
        move_uploaded_file($tmp_product_image1, "product_image/$product_image1");
        move_uploaded_file($tmp_product_image2, "product_image/$product_image2");
        move_uploaded_file($tmp_product_image3, "product_image/$product_image3");

        $insert_product = "INSERT INTO products (product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('$product_title','$product_description','$product_keyword',$product_category,$product_brand,'$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $insert_result = mysqli_query($conn, $insert_product);

        if ($insert_result) {
            echo '<script> alert("Product inserted successfully")</script>';
            echo '<script> window.open("index.php","_self") </script>';
        } else {
            echo '<script> alert("Product are not inserted successfully please insert again")</script>';
            echo '<script> window.open("insert_product.php","_self") </script>';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert products</title>
     <!-- Bootstrap css link -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
<h2 class="text-center my-4">Insert Product</h2>
<div class="container">
    <form action="" method='post' enctype="multipart/form-data" class="w-50 m-auto">
        <div class="form-group">
            <label>Product Title</label>
            <input type="text" class="form-control" name="product_title" required autocomplete="off"
                placeholder="Enter product title">
        </div>

        <div class="form-group">
            <label>Product Description</label>
            <input type="text" class="form-control" name="product_description" required autocomplete="off"
                placeholder="Enter product description">
        </div>

        <div class="form-group">
            <label>Product Keyword</label>
            <input type="text" class="form-control" name="product_keyword" required autocomplete="off"
                placeholder="Enter product keyword">
        </div>

        <div class="form-group">
            <select class="form-control" name="select_category">
                <option>Select your category</option>
                <?php
                //dynamic category
                include '../include/connect.php';
                $select_category = "select * from categories";
                $category_result = mysqli_query($conn, $select_category);
                while ($row = mysqli_fetch_assoc($category_result)) {
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];

                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <select class="form-control" name="select_brand">
                <option>Select your brand</option>
                <?php
                // dynamic brand
                $select_brand = "select * from brands";
                $brand_result = mysqli_query($conn, $select_brand);
                while ($row = mysqli_fetch_assoc($brand_result)) {
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];

                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <label>Product Image1</label>
            <input type="file" class="form-control" name="product_image1" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Product Image2</label>
            <input type="file" class="form-control" name="product_image2" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Product Image3</label>
            <input type="file" class="form-control" name="product_image3" required autocomplete="off">
        </div>

        <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" name="product_price" required autocomplete="off"
                placeholder="Enter product price">
        </div>

        <div class="my-4 text-center">
            <input type="submit" class="btn btn-info" name="insert_product" value="Insert Product">
        </div>
    </form>
</div>
</body>
</html>