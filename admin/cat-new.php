<?php
  session_start();
  if(!isset($_SESSION['auth'])){
    header("location:index.php");
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin / Game Store </title>
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
        <form  action="cat-add.php" method="post">
            <div class="form-group">
            <label for="cat_name">Category Name</label>
            <input type="text" name="cat_name" id="cat_name" class="form-control" required>
          </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" name="description" id="description" class="form-control">
            </div>
            <input type="submit"  value="Add Category" class="btn btn-block btn-primary">
        </form>
      </div>
  </body>
</html>
