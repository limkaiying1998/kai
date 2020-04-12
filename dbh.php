<?php 
$servername = "zpj83vpaccjer3ah.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$dBUsername = "pjs1ci1xo9m105uj";
$dBPassword = "q6snk4oppywnxyjy";
$dBName = "19159323";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}


?>
