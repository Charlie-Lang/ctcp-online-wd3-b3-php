<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
function hello() {
	echo "hello World";
}
function greet($name) {
	$result = "<p>Hello " . $name . "</p>";
	return $result;
}

hello();
echo greet("Peter");
?>
<h1><?php hello(); ?></h1>
<?php
echo greet("John");
?>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>