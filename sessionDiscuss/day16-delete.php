<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$redirect = "index.php";
if (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

include 'connection.php';

if (isset($_GET['submit'])) {
$pid=$mysqli->real_escape_string($_GET['pid']);

$runQuery=true;
$resultMessage="";

$sqlQuery="DELETE FROM tbl_pricelist
WHERE fld_pid = '$pid'";

if ($runQuery) {
	$result = $mysqli->query($sqlQuery);
	if ($result) {
		$resultMessage="ROW DELETED";
	} else {
		$resultMessage="Delete Failed";
	}
}
// echo $resultMessage;
header("Location: day16-select2.php?result=$resultMessage");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php 
if (isset($_GET['id'])) {
	$id=$mysqli->real_escape_string($_GET['id']);
	$sqlQueryGet="SELECT * FROM tbl_pricelist WHERE fld_pid = '$id' LIMIT 0,1";
	echo "$sqlQueryGet";
	$getResult = $mysqli->query($sqlQueryGet);
	$getRow = $getResult->fetch_assoc();

}
?>
<h1 class="bg-danger text-center">DELETE FORM</h1>
<form action="" method="GET">
<table class="table table-danger table-striped">
	<tr>
		<td>Product Name:</td>
		<td><?php
			if (isset($_GET['id'])) {
				echo $getRow['fld_product_name'];
			}	
		?>
		</td>
	</tr>
	<tr>
		<td>Product Category:</td>
		<td><?php
			if (isset($_GET['id'])) {
				echo $getRow['fld_category'];
			}	
		?>
		</td>
	</tr>
	<tr>
		<td>Product Price:</td>
		<td><?php
			if (isset($_GET['id'])) {
				echo $getRow['fld_price'];
			}	
		?>
		</td>
	</tr>
	<tr>
		<td>Product Quantity:</td>
		<td><?php
			if (isset($_GET['id'])) {
				echo $getRow['fld_quantity'];
			}	
		?>
		</td>
	</tr>
</table>
<input type="hidden" name="pid" value="<?php
if (isset($_GET['id'])) {
	echo $getRow['fld_pid'];
}	
?>"> 
<button class="bg-danger" type="submit" name="submit">DELETE</button><a href="day16-select2.php">cancel</a>
</form>
<?php

?>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>