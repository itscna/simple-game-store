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
    <title>Admin/Game Store</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <div class="container-fluid">
        <h2>Gamers net / Admin Panel </h2>
        <nav class="sideNav">
          <a href="game-new.php" id="home">Home</a>
          <a href="cat-show.php" id="category">Category</a>
          <a href="game-list.php" id="item">Items</a>
          <a href="logout.php" id="logout" onclick="return confirm('Are you sure to logout now!')">Logout</a>
        </nav>
          <form action="game-add.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" autofocus required>
              </div>
              <div class="form-group">
                <label for="about">About Game</label>
                <textarea name="about" id="about" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label for="platform">Platform</label>
                <input type="text" name="platform" id="platform" class="form-control" required>
              </div>
              <div class="form-group">
                <?php include "../config/conf.php";
                      $sql="SELECT * FROM category";
                      $result=mysqli_query($conn,$sql);
                 ?>
                  <select class="custom-select" name="genre_id">
                      <option value="" selected>Choose Category</option>
                    <?php while($row=mysqli_fetch_assoc($result)): ?>
                      <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['cat_name']; ?>
                      </option>
                    <?php endwhile; ?>
                  </select>
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price">
              </div>
              <div class="form-group">
                <label for="publisher">Publisher Name</label>
                <input type="text" name="publisher" id="publisher" class="form-control">
              </div>
              <br>
            <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="imageLabel">
            <label for="imageLabel" class="custom-file-label">Choose Cover</label>
          </div> <br><br>
          <input type="submit"  class="btn btn-primary" value="Add New Game">
          </form>
      </div>
  </body>
</html>
