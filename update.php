<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Educase India</a>
      <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="insertForm.html">Add Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="change.php">Update Record</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php

  include "db_conn.php";
  $id = $_GET['id'];

  $query = "select * from student where sid='$id'";
  $data = mysqli_query($conn, $query);
  while ($result = mysqli_fetch_array($data)) {
  ?>


    <center>
      <h1>
        UPDATE STUDENT DETAILS
      </h1>
    </center>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <form action="update_db.php?id=<?php echo $result['sid']; ?>" method="post" name="add" enctype="multipart/form-data">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form6Example1" class="form-control" name="name" value="<?php echo $result['name']; ?>" required />
            <label class="form-label" for="form6Example1">Student Name</label>
          </div>
        </div>



        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="form6Example5" class="form-control" value="<?php echo $result['email']; ?>" name="email" required />
          <label class="form-label" for="form6Example5">Email</label>
        </div>

        <!-- Number input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example6" class="form-control" name="phone" value="<?php echo $result['phone']; ?>" required />
          <label class="form-label" for="form6Example6">Phone</label>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
          <table class="table">
            <tbody>
              <tr>
                <th scope="col"> Uploaded Image:</th>
                <th scope="col"><img src="<?php echo $result['image']; ?>" height="150px" width="150px"> </th>
              </tr>
            </tbody>
          </table>
          <input type="file" name="image" />
          <label class="form-label" for="form6Example7">Choose Image</label>
        </div>


        <!-- Submit button -->
        <button type="submit" style=" width:250px" ; class="btn btn-primary btn-block mb-4" name="upload">UPDATE STUDENT</button>
    </form>
  <?php
  }
  ?>
</body>

</html>

<!-- CSS only -->