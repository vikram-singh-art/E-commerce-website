<?php 
if(isset($_GET['delete_category'])){
    $delete_id = $_GET['delete_category'];

    $delete = "delete from categories where category_id=$delete_id";
    $result = mysqli_query($conn,$delete);
    if($result){
        echo "<script type='text/javascript'>alert('Category Deleted Successfully');</script>";
        echo "<script type='text/javascript'>window.open('index.php?view_categories','_self');</script>";
    }else{
        echo "<script type='text/javascript'>alert('category Deletion failed');</script>";

    }
}
?>