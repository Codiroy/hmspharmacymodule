<?php
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms_pharmacy_module";

 
 $conn = new mysqli($servername, $username, $password, $dbname);
 
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
session_start();    


unset($_SESSION['cart']);
unset($_SESSION['busket']);
unset($_SESSION['receipt']);
unset($_SESSION['edit']);
if(isset($_GET['r'])){
	header("Location:otcbill.php");
}else{
	header("Location:newotc.php");
}
	
	
exit;
?>