<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include "db_conn.php";
    $id = $_GET['id'];

    $query = "delete from student where sid='$id'";
    $data = mysqli_query($conn, $query);
    if ($data) {
    ?>
        <script>
            alert("Your Record Deleted SuccesFully");
        </script>
    <?php
        header("Location:index.php");
        exit();
    } else {
    ?>
        <script>
            alert("There is some problem in deleting");
        </script>
    <?php
        header("Location:index.php");
        exit();
    }
    ?>
</body>

</html>