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
      <nav class="sideNav">
        <a href="game-new.php" id="home">Home</a>
        <a href="cat-show.php" id="category">Category</a>
        <a href="game-list.php" id="item">Items</a>
        <a href="logout.php" id="logout" onclick="return confirm('Are you sure to logout now!')">Logout</a>
      </nav>
        <div class="info">
      <h2>Games List</h2>
      <?php  include "../config/conf.php";
            $sql="SELECT games.*,category.cat_name FROM games LEFT JOIN category ON games.genre_id=category.id
                  ORDER BY games.created_date DESC";

            $result=mysqli_query($conn,$sql);
       ?>
       <div id="list-table">
        <table class="table table-hover table-bordered table-sm">
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Platform</th>
              <th>Created Date</th>
              <th colspan="2">Setting</th>
            </tr>
          </thead>
          <tbody>
      <?php while($row=mysqli_fetch_assoc($result)): ?>
            <tr>

              <td> <a href="detail.php?id=<?= $row['id']; ?>"> <?=$row['title'];  ?> </a> </td>
              <td> <?php echo $row['cat_name']; ?> </td>
              <td><?php  echo $row['platform']; ?> </td>
              <td><?php echo $row['created_date']; ?> </td>
              <td> <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> </td>
              <td> <a href="del.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you
                  sure to delete this item? ');">Delete</a> </td>
            </tr>
      <?php endwhile; ?>
          </tbody>
          <caption>Lists of Games in our record</caption>
        </table>
      </div>
        <button type="button" class="btn btn-outline-primary"><a href="game-new.php">Go Back</a> </button>
     </div>
  </div>
  </body>
</html>
