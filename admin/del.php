<?php
include "../config/conf.php";

$id=$_GET['id'];

$sql="DELETE FROM games WHERE id=$id";

mysqli_query($conn,$sql);

header("location:game-list.php");
