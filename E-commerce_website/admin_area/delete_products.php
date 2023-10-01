<?php 
if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];

    $delete_products = "delete from products where product_id = $delete_id";
    $result_products = mysqli_query($conn,$delete_products);
    if($result_products){
        echo "<script type='text/javascript'>alert('Product Deleted Successfully');</script>";
        echo "<script type='text/javascript'>window.open('index.php','_self');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Deletion failed');</script>";

    }
}
?>