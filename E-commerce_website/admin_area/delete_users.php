<?php 
if(isset($_GET['delete_users'])){
    $delete_id = $_GET['delete_users'];

    $delete = "delete from user_table where user_id = $delete_id";
    $result = mysqli_query($conn,$delete);
    if($result){
        echo "<script type='text/javascript'>alert('User Deleted Successfully');</script>";
        echo "<script type='text/javascript'>window.open('index.php?list_users','_self');</script>";
    }else{
        echo "<script type='text/javascript'>alert('User Deletion failed');</script>";

    }
}
?>