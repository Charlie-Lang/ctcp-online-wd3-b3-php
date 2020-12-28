<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<form action="" method="GET"> <!-- method: POST / GET -->
	<input type="text" name="test">
	<button type="submit" name="submit">Submit</button>
</form>
<?php
if (isset($_GET["submit"])) {
	$txt1 = $_GET["test"];
	echo "The value from the text box is: $txt1";
}
?>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>