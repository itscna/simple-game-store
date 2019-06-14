<?php include "../config/conf.php"; ?>
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
         <section>
           <h2>Category List</h2>
           <?php
               $result=mysqli_query($conn,"SELECT * FROM category");
               while($row=mysqli_fetch_assoc($result)):
            ?>
           <ul>
             <li>
               <?= $row['cat_name']; ?>
              (  <a href="cat-del.php?id=<?= $row['id']; ?>" class="text-danger"> Delete </a> )
              (  <a href="cat-edit.php?id=<?= $row['id']; ?>" class="text-primary"> Edit </a> )
             </li>
           </ul>
         <?php endwhile; ?>
          <button type="button" class="btn btn-secondary"> <a href="cat-new.php">Go Back</a> </button>
         </section>
      </div>
  </body>
</html>
