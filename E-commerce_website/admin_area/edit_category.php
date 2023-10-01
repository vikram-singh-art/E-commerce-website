<?php 
if(isset($_GET['edit_category'])){
    $edit_cat_id = $_GET['edit_category'];
    $select_category = "SELECT * FROM categories WHERE category_id=$edit_cat_id";
    $result_category = mysqli_query($conn,$select_category);
    $fetch_cat = mysqli_fetch_assoc($result_category);
    $category_title = $fetch_cat['category_title'];

    //update category 
    if(isset($_POST['update_cat'])){
        $category_title = $_POST['cat_title'];

        $update = "update categories set category_title='$category_title' where category_id = $edit_cat_id";
        $result = mysqli_query($conn,$update);
        if($result){
            echo "<script type='text/javascript'>alert('Category Updated Successfully');</script>";
            echo "<script type='text/javascript'>window.open('index.php?view_categories','_self');</script>";
        }else{
            echo "<script type='text/javascript'>alert('category updation failed');</script>";

        }
    }
}
?>

<h2 class="text-center text-success mt-4">Edit Category</h2>
<p class="text-center">category title</p>
<form action="" method="post" class="w-50 m-auto">
    <div class="input-group mb-4 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" value="<?php echo $category_title ?>">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control btn btn-primary" name="update_cat" value="Update Category">
    </div>
</form>