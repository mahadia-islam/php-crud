<?php

$name = $_REQUEST['name'];
$price = $_REQUEST['price'];
$category = $_REQUEST['category'];

if(strlen($name) > 0 && strlen($category) > 0){
    $connect = mysqli_connect('localhost','root','','crud');
    $sql = "INSERT INTO `books`(`name`, `price`, `category`) VALUES ('$name','$price','$category')";
    $query = mysqli_query($connect,$sql);
    var_dump($query);
    if($query){
        header("Location:index.php?success=data addedd successfully");
    }else{
        header("Location:index.php?error=book added failed!!");
    }
}else{
    header("Location:index.php?error=name and category is required");
}

?>