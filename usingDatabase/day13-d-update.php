<!DOCTYPE html>
<?php include 'connection.php'; ?>
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
<h1 class="bg-warning text-center">UPDATE FORM</h1>
<form action="" method="GET">
Product Name: <input type="text" name="pName" value="<?php
if (isset($_GET['id'])) {
	echo $getRow['fld_product_name'];
}	
?>"><br/>
Product Category: <select name="pCategory">
<?php
$category = array('Canned Goods'
	,'Detergent'
	,'Drinks'
	,'Hygiene'
	,'Snacks'
	,'Spreads');

foreach ($category as $value) {
	$active="";
	if ($value == $getRow['fld_category']) {
		$active=" selected";
	}
	echo "<option $active>$value</option>";
}
?>
	
</select><br/>
Product Price: <input type="text" name="pPrice" value="<?php
if (isset($_GET['id'])) {
	echo $getRow['fld_price'];
}	
?>"><br/>
Product Quantity<input type="text" name="pQty" value="<?php
if (isset($_GET['id'])) {
	echo $getRow['fld_quantity'];
}	
?>"><br/>
<input type="hidden" name="pid" value="<?php
if (isset($_GET['id'])) {
	echo $getRow['fld_pid'];
}	
?>"> 
<button type="submit" name="submit">UPDATE</button>
<a href="day13-c-select.php">cancel</a>
</form>
<?php
if (isset($_GET['submit'])) {
$pName=$mysqli->real_escape_string($_GET['pName']);
$pCategory=$mysqli->real_escape_string($_GET['pCategory']);
$pPrice=$mysqli->real_escape_string($_GET['pPrice']);
$pQty=$mysqli->real_escape_string($_GET['pQty']);
$pid=$mysqli->real_escape_string($_GET['pid']);

$runQuery=true;
$resultMessage="";
if (empty($pName) || (strlen(trim($pName)) == 0)) {
	$runQuery=false;
	$resultMessage.="Name not valid<br/>";
}
if (!is_numeric($pPrice)) {
	$runQuery=false;
	$resultMessage.="Price input is not a number<br/>";
}
if (!is_numeric($pQty)) {
	$runQuery=false;
	$resultMessage.="Quantity input is not a number<br/>";
}

$sqlQuery="UPDATE tbl_pricelist
SET 
	fld_product_name = '$pName'
	, fld_category = '$pCategory'
	, fld_price = '$pPrice'
	, fld_quantity = '$pQty'
WHERE 
	fld_pid = '$pid'";

if ($runQuery) {
	$result = $mysqli->query($sqlQuery);
	if ($result) {
		$resultMessage="Success";
	} else {
		$resultMessage="Failed";
	}
}
echo $resultMessage;
header("Location: day13-c-select.php?result=$resultMessage");
}
?>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>