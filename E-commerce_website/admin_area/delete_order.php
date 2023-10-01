<?php 
if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];

    $delete = "delete from user_orders where order_id = $delete_id";
    $result = mysqli_query($conn,$delete);
    if($result){
        echo "<script type='text/javascript'>alert('Order Deleted Successfully');</script>";
        echo "<script type='text/javascript'>window.open('index.php?list_orders','_self');</script>";
    }else{
        echo "<script type='text/javascript'>alert('order Deletion failed');</script>";

    }
}
?>