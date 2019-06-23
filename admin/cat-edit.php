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
        <h2>Editing</h2>
        <nav class="sideNav">
          <a href="game-new.php" id="home">Home</a>
          <a href="cat-show.php" id="category">Category</a>
          <a href="game-list.php" id="item">Items</a>
          <a href="logout.php" id="logout" onclick="return confirm('Are you sure to logout now!')">Logout</a>
        </nav>
        <?php include "../config/conf.php";
              $id=$_GET['id'];
              $sql="SELECT * FROM category WHERE id=$id";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_assoc($result);
        ?>
        <form action="cat-update.php" method="post">

          <input type="hidden" name="id" value="<?php echo $row['id'];  ?> ">

          <div class="form-group">
          <label for="cat_name">Category Name</label>
          <input type="text" name="cat_name"  id="cat_name" class="form-control" value="<?php  echo $row['cat_name']; ?>">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="<?php echo $row['description']; ?>">
          </div>
            <input type="submit" value="Update Category" class="btn btn-success">
            <button type="button" class="btn btn-success"><a href="cat-show.php"> Go Back</a> </button>
        </form>

      </div>
  </body>
</html>
