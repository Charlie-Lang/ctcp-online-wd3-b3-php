<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<a href="day16-select2.php">View all items</a>
<form action="" method="GET">
Product Name: <input type="text" name="pName"><br/>
Product Category: <select name="pCategory">
	<option>Canned Goods</option>
	<option>Detergents</option>
	<option>Drinks</option>
	<option>Hygiene</option>
	<option>Snacks</option>
	<option>Spread</option>
</select><br/>
Product Price: <input type="text" name="pPrice"><br/>
Product Quantity<input type="text" name="pQty"><br/>
<button type="submit" name="submit">Create!!!</button>
</form>
<?php
if (isset($_GET['submit'])) {
$pName=$mysqli->real_escape_string($_GET['pName']);
$pCategory=$mysqli->real_escape_string($_GET['pCategory']);
$pPrice=$mysqli->real_escape_string($_GET['pPrice']);
$pQty=$mysqli->real_escape_string($_GET['pQty']);

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

$sqlQuery="INSERT INTO tbl_pricelist
	(fld_product_name
	, fld_category
	, fld_price
	, fld_quantity) 
VALUES 
	('$pName'
	,'$pCategory'
	,'$pPrice'
	,'$pQty')";

if ($runQuery) {
	$result = $mysqli->query($sqlQuery);
	if ($result) {
		$resultMessage="Success";
	} else {
		$resultMessage="Failed";
	}
}
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
<div class="modal fade" id="exampleModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Insert Query Result</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php
				if (isset($_GET['submit'])) {
					echo $resultMessage;
				}
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#exampleModal').on('shown.bs.modal', function() {
  
})
});

</script>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>