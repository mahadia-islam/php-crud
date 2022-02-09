<?php

$success = NULL;
$error = NULL;

if (isset($_REQUEST['success'])) {
    $success = $_REQUEST['success'];
}
if (isset($_REQUEST['error'])) {
    $error = $_REQUEST['error'];
}

$connect = mysqli_connect('localhost', 'root', '', 'crud');

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
        <form action="create.php" method="POST">
            <h4>Create a new book</h4>
            <input name="name" type="text" placeholder="Name">
            <input name="price" type="number" placeholder="Price">
            <input name="category" type="text" placeholder="Category">
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
    <div class="data_table">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = mysqli_query($connect, 'SELECT * FROM books');

                while ($row = mysqli_fetch_assoc($query)) {



                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td>
                            <div class="actions">
                                <a href="delete.php?id=<?php echo $row['id'] ?>"><i class='bx bx-trash'></i></a>
                                <a href="edit.php?id=<?php echo $row['id'] ?>"><i class='bx bxs-message-alt-edit'></i></a>
                            </div>
                        </td>
                    </tr>
                <?php

                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>