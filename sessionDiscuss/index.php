<!DOCTYPE html>
<?php include 'connection.php'; ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<div class="btn-group" role="group" aria-label="Basic example">
	<a class="btn btn-primary" href="login.php">login</a>
</div>
<h1>SELECT with WHERE and ORDER BY</h1>
<form>
	Search: <input type="text" name="sName"><br/>
	Search By: <select name="sField">
		<option>Product Name</option>
		<option>Category</option>
	</select><br/>
	<button type="submit" name="submit">Search</button>
</form>
<?php
$pageRows=6;
$sqlWhere="1";
$sqlOrder="ORDER BY fld_pid";
$sqlLimit="LIMIT 0,$pageRows";
$searchParameters="";
$sortParameters="";
$pageParameters="";

//code for WHERE
if (isset($_GET['sName'])) {
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
	$searchParameters="&sName=".$_GET['sName']."&sField=".$_GET['sField'];
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
	$sortParameters="&sort=".$_GET['sort'];
}

// code for Pages
if (isset($_GET['pageNo'])) {
	$pageNo = ($mysqli->real_escape_string($_GET['pageNo'])-1) * $pageRows;
	$sqlLimit = "LIMIT $pageNo, $pageRows";
	$pageParameters="&pageNo=".$_GET['pageNo'];
}

// execution of SELECT Query
$sqlQuery="SELECT * FROM tbl_pricelist WHERE $sqlWhere $sqlOrder $sqlLimit";

$result=$mysqli->query($sqlQuery);
// echo "$sqlQuery";
echo "<hr/>";
?>
<table class="table table-warning table-striped">
	<tr>
		<th>id</th>
		<th><a href="?sort=pName<?php echo $searchParameters.$pageParameters; ?>">product name</a></th>
		<th><a href="?sort=pCat<?php echo $searchParameters.$pageParameters; ?>">category</th>
		<th><a href="?sort=pPrice<?php echo $searchParameters.$pageParameters; ?>">price</th>
		<th><a href="?sort=pQty<?php echo $searchParameters.$pageParameters; ?>">quantity</th>
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
<?php
$sqlCount="SELECT COUNT(*) FROM tbl_pricelist WHERE $sqlWhere $sqlOrder";
$result2=$mysqli->query($sqlCount);
$row2=$result2->fetch_assoc();
$totalRow = $row2["COUNT(*)"];
$totalPage = intdiv($totalRow, $pageRows);
if (($totalRow / $pageRows) > $totalPage) {
	$totalPage++;
}
$prevPage=1;
$nextPage=2;
$currentPage=1;

if (isset($_GET['pageNo'])) { 
	$currentPage = $mysqli->real_escape_string($_GET['pageNo']);
	$prevPage = $currentPage-1;
	$nextPage =	$currentPage+1;
	if ($currentPage == 1) {
		$prevPage=1;
	} elseif ($currentPage == $totalPage) {
		$nextPage=$totalPage;
	}
}
?>
<nav aria-label="table pages">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?<?php echo $sortParameters.$searchParameters."&pageNo=".$prevPage; ?>">Previous</a></li>
<?php
for ($i=1; $i <= $totalPage; $i++) {
	$active="";
	if ($i == $currentPage) {
		$active="active";
	}
	echo "<li class='page-item $active'>
	<a class='page-link' href='?$sortParameters$searchParameters&pageNo=$i'>
		$i
	</a>
	</li>";
}
?>
    <li class="page-item"><a class="page-link" href="?<?php echo $sortParameters.$searchParameters."&pageNo=".$nextPage; ?>">Next</a></li>
  </ul>
</nav>
<h1>last edit: day 17</h1>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>