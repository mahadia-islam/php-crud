<?php

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$price = $_REQUEST['price'];
$category = $_REQUEST['category'];

$connect = mysqli_connect('localhost','root','','crud');

$query = mysqli_query($connect, "UPDATE `books` SET `name`='$name',`price`='$price',`category`='$category' WHERE id='$id'");

if($query){
    header("Location:edit.php?success=update successfull");
}else{
    header("Location:edit.php?error=update failed");
}

?>