<?php 
$servername = "zpj83vpaccjer3ah.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$dBUsername = "pjs1ci1xo9m105uj";
$dBPassword = "q6snk4oppywnxyjy";
$dBName = "qq7aq02jso2hyqvj";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}


?>
