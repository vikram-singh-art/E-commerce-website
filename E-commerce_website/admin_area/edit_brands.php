<?php 
if(isset($_GET['edit_brand'])){
    $edit_brand_id = $_GET['edit_brand'];
    $select_brand = "SELECT * FROM brands WHERE brand_id=$edit_brand_id";
    $result_brand = mysqli_query($conn,$select_brand);
    $fetch_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $fetch_brand['brand_title'];

    //update category 
    if(isset($_POST['update_brand'])){
        $brand_title = $_POST['brand_title'];

        $update = "update brands set brand_title='$brand_title' where brand_id = $edit_brand_id";
        $result = mysqli_query($conn,$update);
        if($result){
            echo "<script type='text/javascript'>alert('Brand Updated Successfully');</script>";
            echo "<script type='text/javascript'>window.open('index.php?view_brands','_self');</script>";
        }else{
            echo "<script type='text/javascript'>alert('brand updation failed');</script>";

        }
    }
}
?>

<h2 class="text-center text-success mt-4">Edit Brand</h2>
<p class="text-center">brand title</p>
<form action="" method="post" class="w-50 m-auto">
    <div class="input-group mb-4 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" value="<?php echo $brand_title ?>">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control btn btn-primary" name="update_brand" value="Update Brand">
    </div>
</form>