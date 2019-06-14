

<?php include "../config/conf.php";

              $id=$_POST['id'];
              $cat_name=$_POST['cat_name'];
              $description=$_POST['description'];

              $sql="UPDATE category SET cat_name='$cat_name',description='$description', modified_date=now()
                    WHERE id=$id";

              mysqli_query($conn,$sql);

              header("location:cat-show.php");
