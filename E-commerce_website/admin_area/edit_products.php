<?php 
include '../include/connect.php';
if(isset($_GET['edit_products'])){
    $product_id = $_GET['edit_products'];
    $edit_products = "SELECT * FROM products WHERE product_id=$product_id";
    $result_products = mysqli_query($conn,$edit_products);
    $fetch_products = mysqli_fetch_assoc($result_products);
    $product_title = $fetch_products['product_title'];
    $product_description = $fetch_products['product_description'];
    $product_keyword = $fetch_products['product_keyword'];
    $category_id = $fetch_products['category_id'];
    $brand_id = $fetch_products['brand_id'];
    $product_image1 = $fetch_products['product_image1'];
    $product_image2 = $fetch_products['product_image2'];
    $product_image3 = $fetch_products['product_image3'];
    $product_price = $fetch_products['product_price'];

    //fetching category name
    $fetch_category = "select * from categories where category_id =$category_id";
    $result_category = mysqli_query($conn,$fetch_category);
    $row = mysqli_fetch_array($result_category);
    $category_title = $row['category_title'];

    //fetching brand name
    $fetch_brand = "select * from brands where brand_id =$brand_id";
    $result_brand = mysqli_query($conn,$fetch_brand);
    $row = mysqli_fetch_array($result_brand);
    $brand_title = $row['brand_title'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <style>
        .update_image{
            width: 20%;
            height: 20%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h2 class="text-center text-success my-4">Edit Product</h2>
    <div class="container">
    <form action="" method='post' enctype="multipart/form-data" class="w-50 m-auto">
        <div class="form-group">
            <label>Product Title</label>
            <input type="text" class="form-control" name="product_title" value=<?php echo $product_title ?> required autocomplete="off"
                placeholder="Enter product title">
        </div>

        <div class="form-group">
            <label>Product Description</label>
            <input type="text" class="form-control" name="product_description" value=<?php echo $product_description ?> required autocomplete="off"
                placeholder="Enter product description">
        </div>

        <div class="form-group">
            <label>Product Keyword</label>
            <input type="text" class="form-control" name="product_keyword" value=<?php echo $product_keyword ?> required autocomplete="off"
                placeholder="Enter product keyword">
        </div>

        <div class="form-group">
            <select class="form-control" name="select_category">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php
                //dynamic category
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
            <select class="form-control" name="select_brand" value=<?php echo $brand_id ?>>
                <option value = "<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
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
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" name="product_image1"  required autocomplete="off">
                <img src="product_image/<?php echo $product_image1 ?>" alt="" class="update_image">
            </div>
        </div>

        <div class="form-group">
            <label>Product Image2</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" name="product_image2"  required autocomplete="off">
                <img src="product_image/<?php echo $product_image2 ?>" alt="" class="update_image">
            </div>
        </div>

        <div class="form-group">
            <label>Product Image3</label>
            <div class="d-flex">
                <input type="file" class="form-control w-90 m-auto" name="product_image3"  required autocomplete="off">
                <img src="product_image/<?php echo $product_image3 ?>" alt="" class="update_image">
            </div>
        </div>

        <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" name="product_price" value=<?php echo $product_price ?> required autocomplete="off"
                placeholder="Enter product price">
        </div>

        <div class="my-4 text-center">
            <input type="submit" class="btn btn-info" name="update_products" value="Update Product">
        </div>
    </form>

    <?php 
    // update products
    if(isset($_POST['update_products'])){
        $product_title = $_POST['product_title'];
        $product_description = $_POST['product_description'];
        $product_keyword = $_POST['product_keyword'];
        $select_category = $_POST['select_category'];
        $select_brand = $_POST['select_brand'];

        $product_image1 = $_FILES['product_image1'] ['name'];
        $product_image2 = $_FILES['product_image2'] ['name'];
        $product_image3 = $_FILES['product_image3'] ['name'];

        $tmp_product_image1 = $_FILES['product_image1'] ['tmp_name'];
        $tmp_product_image2 = $_FILES['product_image2'] ['tmp_name'];
        $tmp_product_image3 = $_FILES['product_image3'] ['tmp_name'];

        $product_price = $_POST['product_price'];

        move_uploaded_file($tmp_product_image1,"product_image/$product_image1");
        move_uploaded_file($tmp_product_image2,"product_image/$product_image2");
        move_uploaded_file($tmp_product_image3,"product_image/$product_image3");

        $update_products = "update products set product_title='$product_title', product_description='$product_description', product_keyword='$product_keyword', category_id=$select_category, brand_id=$select_brand, product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3' ,product_price=$product_price, date=NOW() where product_id=$product_id";

        $result_products = mysqli_query($conn,$update_products);
        if($result_products){
            echo "<script type='text/javascript'>alert('Product Updated Successfully');</script>";
            echo "<script type='text/javascript'>window.open('insert_product.php','_self');</script>";
        }else{
            echo "<script type='text/javascript'>alert('updation failed');</script>";

        }
    }
    ?>
</div>
</body>
</html>