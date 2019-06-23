<?php
  session_start();
  if(!isset($_SESSION['auth'])){
    heaer("location:index.php");
    exit();
  }

include "../config/conf.php";

$cat_name=$_POST['cat_name'];
$description=$_POST['description'];

$sql="INSERT INTO category (cat_name,description,created_date,modified_date)
      VALUES ('$cat_name','$description',now(),now())";


mysqli_query($conn,$sql);

header("location:cat-show.php");
