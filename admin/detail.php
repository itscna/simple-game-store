<?php
  session_start();
  if(!isset($_SESSION['auth']))
  {
    header("location:index.php");
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin / Details </title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container-fluid">
      <nav class="sideNav">
        <a href="game-new.php" id="home">Home</a>
        <a href="cat-show.php" id="category">Category</a>
        <a href="game-list.php" id="item">Items</a>
        <a href="logout.php" id="logout" onclick="return confirm('Are you sure to logout now!')">Logout</a>
      </nav>
      <?php

        include "../config/conf.php";

        $id=$_GET['id'];

        $sql="SELECT games.*,category.cat_name FROM games LEFT JOIN category
              ON games.genre_id=category.id WHERE games.id=$id";
        $result=mysqli_query($conn,$sql);

       $row=mysqli_fetch_assoc($result);
       ?>

      <!--Displaying The Game Detail info here -->

        <div class="info">

            <h2> <?= $row['title'] ?> </h2>

            <figure>
              <img src="covers/<?=$row['image']; ?>" alt="game image" class="img-responsive img">
            </figure>
            <h4> About the Games </h4>
            <p>
              <?=$row['about']; ?>
            </p>
            <h4>Description By The Gamers </h4>
            <p>
              <?= $row['description']; ?>
            </p>
            <h4 style="display:inline;"> <i>Gaming Platform</i> </h4>----  <?=$row['platform']; ?>
              <br><br>


              <table class="table" id="adminDetailTable">
                <thead>
                  <tr>
                    <th>Price</th>
                    <th>Developer</th>
                    <th>Category</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?=$row['price']; ?> </td>
                    <td><?=$row['publisher']; ?> </td>
                    <td><?=$row['cat_name']; ?> </td>
                  </tr>
                </tbody>
              </table>
              <a href="edit.php?id=<?=$row['id']; ?>" class="text-success">Edit</a> /
              <a href="del.php?id=<?=$row['id']; ?>"  class="text-danger"
              onclick="return confirm('Are you sure to delete this?');">Delete</a><br><br>

              <button type="button" class="btn btn-outline-info">
                  <a href="game-list.php">Back To List</a>
              </button>
        </div>
    </div>
  </body>
</html>
