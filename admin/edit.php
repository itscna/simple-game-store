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
    <title>Admin/Game Store</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container-fluid">
      <h2>Admin Panel / Editing </h2>
      <nav class="sideNav">
        <a href="game-new.php" id="home">Home</a>
        <a href="cat-show.php" id="category">Category</a>
        <a href="game-list.php" id="item">Items</a>
        <a href="logout.php" id="logout" onclick="return confirm('Are you sure to logout now!')">Logout</a>
      </nav>
      <?php
        include "../config/conf.php";
        $id=$_GET['id'];
        $sql="SELECT * FROM games WHERE id=$id";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
       ?>
       <form action="update.php" method="post" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?=$row['id']; ?>">

         <div class="form-group">
           <label for="title">Game Title</label>
           <input type="text" name="title" value="<?= $row['title']; ?>" id="title" class="form-control" required autofocus>
         </div>
         <div class="form-group">
           <label for="about">About</label>
           <textarea name="about" id="about" class="form-control" required>
             <?=$row['about']; ?>
           </textarea>
         </div>
         <div class="form-group">
           <label for="description">Description</label>
           <textarea name="description" id="description" class="form-control" required>
            <?=$row['description']; ?>
           </textarea>
         </div>
         <div class="form-group">
           <label for="platform">Game's Platform</label>
           <input type="text" name="platform" value="<?=$row['platform']; ?>" id="platform" class="form-control" required>
         </div>
         <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" value="<?=$row['price']; ?>" id="price" class="form-control">
         </div>
         <div class="form-group">
           <label for="genre_id">Genre</label>
           <select class="custom-select" name="genre_id">
            <option value="">Choose Category</option>
         <?php
            $cats=mysqli_query($conn,"SELECT id,cat_name FROM category");
            while($category=mysqli_fetch_assoc($cats)):
          ?>
          <option value="<?=$category['id']; ?> ">
             <?php
                  echo $category['cat_name'];
                  if($category['id']===$row['id'])
                  echo "&nbsp; SELECTED";
              ?>

           </option>
        <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="publisher">Game's Developer</label>
          <input type="text" name="publisher" value="<?=$row['publisher']; ?>" id="publisher" class="form-control">
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image" name="image">
          <label for="image" class="custom-file-label">Choose Cover Image</label>
        </div>
          <br><br>
        <input type="submit" class="btn btn-success btn-block" value="Edit Now"
          onclick="return confirm('Are you sure to edit this item?')">
       </form>

    </div>

  </body>
</html>
