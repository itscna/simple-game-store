<?php
    include "../config/conf.php";
    $id=$_GET['id'];

    $title=$_POST['title'];
    $about=$_POST['about'];
    $description=$_POST['description'];
    $platform=$_POST['platform'];
    $price=$_POST['price'];
    $genre_id=$_POST['genre_id'];
    $publisher=$_POST['publisher'];
    $image=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];

    if(isset($image))
    {
      move_uploaded_file($tmp,"covers/$image");
    }

    $sql="UPDATE games SET title='$title',about='$about',description='$description',
          platform='$platform',genre_id='$genre_id',price='$price',publisher='$publisher',
          image='$image',modified_date=now() WHERE id=$id ";

    mysqli_query($conn,$sql);

    header("location:game-list.php");
