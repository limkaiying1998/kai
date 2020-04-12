<?php
include_once "dbh.php";
$id = $_GET['id'];
 
 
$query = "DELETE FROM posts WHERE idPost = '$id'";
 


 ?>