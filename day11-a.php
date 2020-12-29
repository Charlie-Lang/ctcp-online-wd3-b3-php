<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
$testing = array("Nintendo"
	,"Sony"
	,"Microsoft");
var_dump($testing);
echo "<hr/>";
echo "<h1>".$testing[0]." ". $testing[1] . " ". $testing[2]."</h1>";
echo "<hr/>";
echo "The array have " . count($testing) . " items";
echo "<hr/>";
$testing[3] = "From Software";
var_dump($testing);
echo "<hr/>";
$testing[count($testing)] = "Capcom";
$testing[count($testing)] = "Steam";
var_dump($testing);
echo "<hr/>";
echo "<ul>";
for ($i=0; $i < count($testing); $i++) { 
	echo "<li>$testing[$i]</li>";
}
echo "</ul>";
?>
<hr/>
<?php
$testing[7] = "Hal Laboratories";
var_dump($testing);
?>
<hr/>
<table class="table table-striped border border-secondary">
	<tr>
		<td>ID</td>
		<td>CONTENT</td>
	</tr>
<?php
foreach ($testing as $key => $value) {
	echo "<tr>
		<td>$key</td>
		<td>$value</td>
	</tr>";
}
?>
</table>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>