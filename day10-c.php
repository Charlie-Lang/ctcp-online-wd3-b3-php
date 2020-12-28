<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<h3>count up</h3>
<?php
$k = 1;
while ($k <= 10) {
	echo "$k - Hellow World<br/>";
	$k++;
}
?>
<h3>count down</h3>
<?php
$k = 20;
while ($k > 10) {
	echo "$k - Hellow World<br/>";
	$k--;
}
?>
<hr/>
<h1>This time using <u>do while</u> loop</h1>
<h3>count up</h3>
<?php
$k = 1;
do {
	echo "$k - Hellow World<br/>";
	$k++;
} while ($k <= 10)
?>
<h3>count down</h3>
<?php
$k = 20;
do {
	echo "$k - Hellow World<br/>";
	$k--;
} while ($k > 10)
?>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>