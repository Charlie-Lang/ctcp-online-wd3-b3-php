<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
function fruitColor($color) {
$fruit = "";
switch ($color) {
	case 'red':
		$fruit = "apple";
		break;
	case 'orange':
		$fruit = "orange";
		break;
	case 'yellow':
		$fruit = "lemon";
		break;
	case 'green':
		$fruit = "green apple";
		break;
	case 'blue':
		$fruit = "blueberries";
		break;	
	default:
		$fruit="not valid";
		break;
}
return $fruit . " is " . $color;
}
?>
<form action="" method="GET">
	<select name="drop1">
		<option>red</option>
		<option>orange</option>
		<option>yellow</option>
		<option>green</option>
		<option>blue</option>
	</select>
	<select name="drop2">
		<option>red</option>
		<option>orange</option>
		<option>yellow</option>
		<option>green</option>
		<option>blue</option>
	</select>
	<select name="drop3">
		<option>red</option>
		<option>orange</option>
		<option>yellow</option>
		<option>green</option>
		<option>blue</option>
	</select>
	<button type="submit" name="submit">Check</button>
</form>
<?php
if (isset($_GET['submit'])) {
	$drop1 = $_GET['drop1'];
	$drop2 = $_GET['drop2'];
	$drop3 = $_GET['drop3'];
	echo "<h1 style='background-color:$drop1'>".fruitColor($drop1)."</h1><hr/>";
	echo "<h2 style='background-color:$drop2'>".fruitColor($drop2)."</h2><hr/>";
	echo "<h3 style='background-color:$drop3'>".fruitColor($drop3)."</h3><hr/>";
}
?>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>