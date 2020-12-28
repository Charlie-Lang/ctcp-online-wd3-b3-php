<?php
$result="";
if (isset($_GET['submit'])) {
	$n1 = $_GET['num1'];
	$remainder = $n1 % 2;
		switch ($remainder) {
		case 1:
			$result = "$n1 is an odd number";
			break;
		case 0:
			$result = "$n1 is an even number";
			break;
		default:
			# code...
			break;
	}
}
$getOutput = "?result=".$result;
header("Location: day10-g.php$getOutput");
?>