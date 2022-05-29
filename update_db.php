<!DOCTYPE html>
<html lang="en">

<body>

    <?php


    include "db_conn.php";
    $id = $_GET['id'];

    if (isset($_POST['upload'])) {

        if (!is_uploaded_file($_FILES['image']['tmp_name'])) {


            $sname = $_POST['name'];
            $semail = $_POST['email'];
            $phone = $_POST['phone'];

            $q = "UPDATE student SET name='$sname', email='$semail', phone ='$phone' WHERE sid='$id'";

            $query = mysqli_query($conn, $q);
        } else {

            $sname = $_POST['name'];
            $semail = $_POST['email'];
            $phone = $_POST['phone'];

            $date = date("Y-m-d");

            $file = $_FILES['image'];
            $filename = $file['name'];
            $fileerror = $file['error'];
            $filetmp = $file['tmp_name'];


            $fileext = explode('.', $filename);
            $filecheck = strtolower(end($fileext));

            $fileextstore = array('png', 'jpg', 'jpeg');

            if (in_array($filecheck, $fileextstore)) {

                $destinationfile = 'uploads/' . $filename;

                move_uploaded_file($filetmp, $destinationfile);

                $q = "UPDATE student SET name='$sname', email='$semail', phone='$phone', image='$destinationfile' WHERE sid='$id'";

                $query = mysqli_query($conn, $q);
            }
        }
    }

    header("Location:index.php");

    ?>
</body>

</html>