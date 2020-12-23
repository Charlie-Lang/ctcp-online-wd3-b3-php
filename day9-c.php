<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
$grade = 79;
$result = "";
if ($grade > 100) {
	$result = "Score not valid";
} elseif ($grade >= 95) {
	$result = "Excellent";
} elseif ($grade >= 87) {
	$result = "Great";
} elseif ($grade >= 80) {
	$result = "Good";
} elseif ($grade >= 75) {
	$result = "Passed";
} else {
	$result = "Failed";
}
echo "Grade result: $result";
?>
<hr/>
<input type="" name="">
<input type="" name="">
<select>
	<option>+</option>
	<option>-</option>
	<option>*</option>
	<option>/</option>
</select>
<br/>
<?php
$num1=70;
$num2=16;
$operator="+";
$result=0;

switch ($operator) {
	case '+':
		$result = $num1 + $num2;
		break;
	case '-':
		$result = $num1 - $num2;
		break;
	case '*':
		$result = $num1 * $num2;
		break;
	case '/':
		$result = $num1 / $num2;
		break;
	default:
		# code...
		break;
}
echo "$num1 $operator $num2 = <b>$result</b>";

?>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>