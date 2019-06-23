<?php
include "../config/conf.php";

$title=$_POST['title'];
$about=$_POST['about'];
$description=$_POST['description'];
$platform=$_POST['platform'];
$genre_id=$_POST['genre_id'];
$price=$_POST['price'];

$publisher=$_POST['publisher'];
$image=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

if(isset($image)){
  move_uploaded_file($tmp,"covers/$image");
}

$sql="INSERT INTO games(title,about,description,platform,genre_id,price,
      publisher,image,created_date,modified_date) VALUES ('$title','$about',
        '$description','$platform','$genre_id','$price','$publisher','$image',now(),now())";

mysqli_query($conn,$sql);

header("location:game-list.php");

?>
