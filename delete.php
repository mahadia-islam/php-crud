<?php

$id = $_REQUEST['id'];

$connect = mysqli_connect('localhost','root','','crud');
$query = mysqli_query($connect,"DELETE FROM books WHERE id='$id'");

if($query){
    header("Location:index.php?message=book deleted successfully");
}else{
    header("Location:index.php?message=book deleted failed");
}

?>