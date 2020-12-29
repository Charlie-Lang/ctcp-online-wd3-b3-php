<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
$kpop = array (
	'TWICE' => array(
		'Nayeon'
		, 'Jeongyeon'
		, 'Momo'
		, 'Sana'
		, 'Jihyo'
		, 'Mina'
		, 'Dahyun'
		, 'Chaeyoung'
		, 'Tzuyu')
	,'BLΛƆKPIИK' => array(
		'Jisoo'
		, 'Jennie'
		, 'Rosé'
		, 'Lisa')
	);
?>
<div class="row">
<?php
foreach ($kpop as $key => $value) {
	echo "<div class='col'>
	<h3>$key</h3>
	<ul>";
	foreach ($value as $members) {
		echo "<li>$members</li>";
	}
	echo "</ul>
	</div>";
}
?>
</div>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>