<?php
$servername = "localhost";
$database = "hospitalinfo";
$username = "conn";
$password = "conn";

//create Connection

$conn = new mysqli($servername,$username,$password,$database);
//check connection

if($conn -> connect_error){
	die("connected failed: ".$conn -> connect_error);
}
else{
	echo "connected successfully to database hospitalInfo";
     }

?>
