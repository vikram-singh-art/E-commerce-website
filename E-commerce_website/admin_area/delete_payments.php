<?php 
if(isset($_GET['delete_payments'])){
    $delete_id = $_GET['delete_payments'];

    $delete = "delete from user_payments where payment_id = $delete_id";
    $result = mysqli_query($conn,$delete);
    if($result){
        echo "<script type='text/javascript'>alert('Payment Deleted Successfully');</script>";
        echo "<script type='text/javascript'>window.open('index.php?list_payments','_self');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Payment Deletion failed');</script>";

    }
}
?>