<?php 
$conn = mysqli_connect('localhost','root','','mystore');
if($conn){
    echo "Connected successfully";
}else{
    echo "Connection failed";
}
?>