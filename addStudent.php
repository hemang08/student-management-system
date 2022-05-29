<?php 
    include "db_conn.php";
    
    if(isset($_POST['upload'])){
        $sname = $_POST['name'];
        $semail = $_POST['email'];
        $phone = $_POST['phone'];
        
        $date = date("Y-m-d");
        

        $file = $_FILES['image'];
        $filename = $file['name'];
        $fileerror = $file['error'];
        $filetmp = $file['tmp_name'];

        $fileext = explode('.',$filename);
        $filecheck = strtolower(end($fileext));

        $fileextstore = array('png','jpg', 'jpeg');

        if(in_array($filecheck,$fileextstore)){

            $destinationfile = 'uploads/'.$filename;
            
            move_uploaded_file($filetmp,$destinationfile);

            $q = "INSERT INTO `student` VALUES (NULL ,'$sname','$semail','$phone','$destinationfile','$date')";

            $query = mysqli_query($conn,$q);
        }

    }
    header("Location:index.php");
