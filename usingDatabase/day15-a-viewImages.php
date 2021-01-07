<!DOCTYPE html>
<?php include 'connection.php'; ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<h1>View Image in a Row</h1>
<?php
$sqlQuery = "SELECT * FROM tbl_pic_upload";

$result = $mysqli->query($sqlQuery);

while ($row = $result->fetch_assoc()) {
	echo "
	<div class='row'>
		<div class='col-4'>
			<img class='img-fluid' src='uploads/".$row['fld_pic_name']."' alt='".$row['fld_pic_id']."'>
		</div>
		<div class='col-8'>
			".$row['fld_pic_notes']."
		</div>
	</div>";
}

?>
	

<a class="btn btn-warning" href="day14-d-uploadTest.php">Add new image</a>


<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>