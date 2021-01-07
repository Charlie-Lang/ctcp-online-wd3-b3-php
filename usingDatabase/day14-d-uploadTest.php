<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<h1>picture upload</h1>
<form action="day14-e-dbUpload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
	<input type="file" name="fileToUpload" id="fileToUpload"><br/>
	<textarea name="picNotes" placeholder="Picture Note"></textarea><br/>
	<input type="submit" value="Upload Image" name="submit">
</form>
<a class="btn btn-info" href="day15-a-viewImages.php">View Image</a>
<a class="btn btn-warning" href="day15-b-dbCarousel.php">Image Carousel</a>
<?php
if (isset($_GET['result'])) {
	echo $_GET['result'];
}
?>

<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>