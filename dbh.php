<?php 
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "19159323";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}


?>