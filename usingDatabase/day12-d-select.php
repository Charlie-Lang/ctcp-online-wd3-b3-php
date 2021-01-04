<!DOCTYPE html>
<?php include 'connection.php'; ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
$sqlQuery="SELECT * FROM tbl_pricelist";

$result=$mysqli->query($sqlQuery);

var_dump($result);
echo "<hr/>";
?>
<table class="table table-warning table-striped">
	<tr>
		<th>id</th>
		<th>product name</th>
		<th>category</th>
		<th>price</th>
		<th>quantity</th>
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