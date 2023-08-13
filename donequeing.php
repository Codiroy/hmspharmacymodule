<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms_pharmacy_module";
$t2=$_GET['str'];
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
session_start();   

unset($_SESSION['cart']);
unset($_SESSION['busket']);
unset($_SESSION['receipt']);
unset($_SESSION['edit']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Queue successfully</title>
	<style>
        .check {
			display: block;
            margin: auto;
            width: 200px;
            height: 200px;
            background-image: url('giphy.gif');
            background-size: contain;
            background-repeat: no-repeat;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
            animation-duration: 1s;
		}
		.message {
			text-align: center;
			font-size: 24px;
			margin-top: 20px;
		}

		.buttons {
			display: flex;
			justify-content: center;
			margin-top: 20px;
		}

		.buttons button {
			margin: 0px 10px;
			font-size: 16px;
			padding: 10px 20px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="check"></div>
	<div style="text-align: center;
                font-size: 24px;
                margin-top: 20px;
                align-items: center;
                font-size: large;">
                Queue successfully, Pay <?php echo $t2."/=";?>
    </div>
	<div class="buttons">
        <button onclick="home()" class="btn btn-primary">New Order</button>
        <button onclick="acounts()" class="btn btn-primary"><i class="fa fa-print"></i> Complete Payments</button>
	</div>
</body>
</html>