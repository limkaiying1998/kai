<?php 
$servername = "zpj83vpaccjer3ah.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$dBUsername = "jlqcpwvog8lrjlre";
$dBPassword = "f1mfmqrrmtrxhg1o";
$dBName = "MyDatabase";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}


?>
