<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<h2>Switch Statement</h2>
<?php
$color = "dilaw"; //red, orange, yellow, green, blue
$lowercaseColor = strtolower($color);
echo "$lowercaseColor";
$fruits = "";
switch ($lowercaseColor) {
	case 'red':
		$fruits = "apple";
		break;
	case 'orange':
		$fruits = "orange";
		break;
	case 'yellow':
		$fruits = "lemon";
		break;
	case 'green':
		$fruits = "green apple";
		break;
	case 'blue':
		$fruits = "blueberries";
		break;	
	default:
		$fruits="not valid";
		break;
}
echo "<h1 style='background-color:$color'>$fruits</h1>";
?>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>