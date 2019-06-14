<?php
include "../config/conf.php";

$id=$_GET['id'];

mysqli_query($conn,"DELETE  FROM category WHERE id=$id");

header("location:cat-show.php");
