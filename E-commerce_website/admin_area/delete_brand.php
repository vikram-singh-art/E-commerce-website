<?php 
if(isset($_GET['delete_brand'])){
    $delete_id = $_GET['delete_brand'];

    $delete = "delete from brands where brand_id=$delete_id";
    $result = mysqli_query($conn,$delete);
    if($result){
        echo "<script type='text/javascript'>alert('Brand Deleted Successfully');</script>";
        echo "<script type='text/javascript'>window.open('index.php?view_brands','_self');</script>";
    }else{
        echo "<script type='text/javascript'>alert('brand Deletion failed');</script>";

    }
}
?>