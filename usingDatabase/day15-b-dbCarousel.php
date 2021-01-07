<!DOCTYPE html>
<?php include 'connection.php'; ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<h1>Images from DB in a Carousel(last 3 image)</h1>
<div id="carousel1" class="carousel slide" data-bs-ride="carousel">
<?php
$picLimit = 3;
echo "<ol class='carousel-indicators'>";
$active=" class='active'";
for ($i=0; $i < $picLimit; $i++) { 
	echo "
	<li data-bs-target='#carousel1' data-bs-slide-to='$i' $active></li>";
	$active="";
}
echo "</ol>";
?>

<div class="carousel-inner">
<?php
$sqlQuery = "SELECT * FROM tbl_pic_upload ORDER BY fld_pic_id DESC LIMIT 0,$picLimit";

$result = $mysqli->query($sqlQuery);
$active=" active";
while ($row = $result->fetch_assoc()) {
	echo "
	<div class='carousel-item $active'>
		<img src='uploads/".$row['fld_pic_name']."' class='d-block w-100' alt='".$row['fld_pic_id']."'>
		<div class='carousel-caption d-none d-md-block'>
			<p>".$row['fld_pic_notes']." - ".$row['fld_pic_id']."</p>
		</div>
	</div>";
	$active="";
}
?>
</div>
<a class="carousel-control-prev" href="#carousel1" role="button" data-bs-slide="prev">
	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	<span class="visually-hidden">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel1" role="button" data-bs-slide="next">
	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	<span class="visually-hidden">Next</span>
</a>
</div>	



<a class="btn btn-warning" href="day14-d-uploadTest.php">Add new image</a>

<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>