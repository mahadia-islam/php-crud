<?php

$success = NULL;
$error = NULL;

if (isset($_REQUEST['success'])) {
    $success = $_REQUEST['success'];
}
if (isset($_REQUEST['error'])) {
    $error = $_REQUEST['error'];
}

$id = null;

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
}

$connect = mysqli_connect('localhost', 'root', '', 'crud');

$query = mysqli_query($connect, "SELECT * FROM books WHERE id='$id'");

$name = NULL;
$price = NULL;
$category = NULL;

while ($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
    $price = $row['price'];
    $category = $row['category'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="add_book">
        <form action="update.php" method="POST">
            <h4>Edit book</h4>
            <input value="<?php echo $name ?>" name="name" type="text" placeholder="Name">
            <input value="<?php echo $price ?>" name="price" type="number" placeholder="Price">
            <input value="<?php echo $category ?>" name="category" type="text" placeholder="Category">
            <input type="number" name="id" value="<?php echo $id ?>" hidden>
            <button>submit</button>
            <?php

            if ($error) {

            ?>
                <div class="alert error"><?php echo $error ?></div>
            <?php

            }

            ?>
            <?php

            if ($success) {

            ?>
                <div class="alert success"><?php echo $success ?></div>
            <?php

            }

            ?>
        </form>
    </div>
</body>

</html>