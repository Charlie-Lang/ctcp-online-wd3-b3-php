<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
$n1=12;
$n2=19;
$operator="/";
$result=0;

switch ($operator) {
	case '+':
		$result = $n1 + $n2;
		break;
	case '-':
		$result = $n1 - $n2;
		break;
	case '*':
		$result = $n1 * $n2;
		break;
	case '/':
		$result = $n1 / $n2;
		break;
	default:
		$result = "not a valid operator";
		break;
}
echo "result: $result";

?>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>