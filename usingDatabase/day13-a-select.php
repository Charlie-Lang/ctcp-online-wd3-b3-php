<!DOCTYPE html>
<?php include 'connection.php'; ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<form>
	Search: <input type="text" name="sName"><br/>
	Search By: <select name="sField">
		<option>Product Name</option>
		<option>Category</option>
	</select><br/>
	<button type="submit" name="submit">Search</button>
</form>
<?php
$sqlWhere="1";
$sqlOrder="ORDER BY fld_pid";

//code for WHERE
if (isset($_GET['submit'])) {
	$sValue = $mysqli->real_escape_string($_GET['sName']);
	$sField = "";
	switch ($mysqli->real_escape_string($_GET['sField'])) {
		case 'Product Name':
			$sField = "fld_product_name";
			break;
		case 'Category':
			$sField = "fld_category";
			break;
		default:
			$sField = "fld_product_name";
			break;
	}
	$sqlWhere = "$sField LIKE '%$sValue%'";
}

// Code for ORDER BY
if (isset($_GET['sort'])) {
	$sort = $mysqli->real_escape_string($_GET['sort']);
	switch ($sort) {
		case 'pName':
			$sqlOrder="ORDER BY fld_product_name";
			break;
		case 'pCat':
			$sqlOrder="ORDER BY fld_category";
			break;
		case 'pPrice':
			$sqlOrder="ORDER BY fld_price";
			break;
		case 'pQty':
			$sqlOrder="ORDER BY fld_quantity";
			break;
		default:
			$sqlOrder="ORDER BY fld_pid";
			break;
	}
}

// execution of SELECT Query
$sqlQuery="SELECT * FROM tbl_pricelist WHERE $sqlWhere $sqlOrder";

$result=$mysqli->query($sqlQuery);
echo "$sqlQuery";
var_dump($result);
echo "<hr/>";
?>
<table class="table table-warning table-striped">
	<tr>
		<th>id</th>
		<th><a href="?sort=pName">product name</a></th>
		<th><a href="?sort=pCat">category</th>
		<th><a href="?sort=pPrice">price</th>
		<th><a href="?sort=pQty">quantity</th>
	</tr>
<?php
while ($row=$result->fetch_assoc()) {
	echo "<tr>
	<td>".$row['fld_pid']."</td>
	<td>".$row['fld_product_name']."</td>
	<td>".$row['fld_category']."</td>
	<td>".$row['fld_price']."</td>
	<td>".$row['fld_quantity']."</td>
	</tr>";
}
?>
</table>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>