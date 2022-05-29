<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
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
  <h3 class="text-center my-5">
    STUDENT DETAILS
  </h3>

  <table class="container table table-hover table-bordered align-middle">
    <thead class="bg-dark text-white text-center">
      <tr>
        <th scope="col">SID</th>
        <th scope="col">NAME</th>
        <th scope="col">Email ID</th>
        <th scope="col">Phone</th>
        <th scope="col">Created Date</th>
        <th scope="col">Image</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>



      </tr>
    </thead>
    <tbody>
      <?php
      include "db_conn.php";

      $displayquery = "select * from student";
      $execute = mysqli_query($conn, $displayquery);

      // $row = mysqli_num_rows($execute);

      while ($result = mysqli_fetch_array($execute)) {



      ?>


        <tr>
          <td> <?php echo $result['sid']; ?> </td>
          <td> <?php echo $result['name']; ?> </td>
          <td> <?php echo $result['email']; ?> </td>
          <td> <?php echo $result['phone']; ?> </td>
          <td> <?php echo $result['created_at']; ?> </td>
          <td> <img src="<?php echo $result['image']; ?>" height="150px" width="150px"> </td>
          <td> <button type="button" style="background-color:LightGrey ;" class="btn btn-outline-primary"> <a href='update.php?id=<?php echo $result['sid']; ?>' />Update</td></button>
          <td><button type="button" style="background-color:LightGrey ;" class="btn btn-outline-primary"> <a href='delete.php?id=<?php echo $result['sid']; ?>' />Delete</td></button>
        </tr>



      <?php
      }

      ?>
    </tbody>
  </table>
</body>

</html>