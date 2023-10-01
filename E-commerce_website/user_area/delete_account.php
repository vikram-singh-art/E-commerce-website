<h3 class="text-danger text-center my-">Delete Account </h3>
<form action="" method="post" class="w-50 m-auto">
    <input class="form-control my-5" type="submit" name="delete" value="Delete account">
    <input class="form-control" type="submit" name="dont_delete" value="Don't delete account">

</form>

<?php 
    $username_session = $_SESSION['username'];

if(isset($_POST['delete'])){
    $delete_query = "DELETE FROM user_table WHERE user_name = '$username_session'";
    $result_delete = mysqli_query($conn,$delete_query);
    if($result_delete){
        session_destroy();
        echo "<script type='text/javascript'>alert('Account Deleted Successfully');</script>";
        echo "<script type='text/javascript'>window.open('../index.php','_self');</script>";
    }
}

if(isset($_POST['dont_delete'])){
    echo "<script type='text/javascript'>window.open('profile.php','_self');</script>";
}
?>