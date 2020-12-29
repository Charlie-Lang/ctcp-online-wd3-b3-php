<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
$ages = array();
$ages['Peter'] = 32;
$ages['Quagmire'] = 30;
$ages['Joe'] = 34;
echo 'Peter is ' . $ages['Peter'] . ' years old.';

$regions = array(
	'Region 1' => 'Ilocos region'
	,'Region 2' => 'Cagayan Valley'
	,'CAR' => 'Cordillera Administrative Region');
?>
<table class="table table-striped border border-primary">
	<tr>
		<td>Region</td>
		<td>Name</td>
	</tr>
<?php
foreach ($regions as $key => $value) {
	echo "<tr>
		<td>$key</td>
		<td>$value</td>
	</tr>";
}
?>
</table>
<?php
$regionProvinces = array(
	'Region 1' => array (
		'Ilocos Norte' => 'Laoag City'
		,'Ilocos Sur' => 'Vigan City'
		,'La Union' => 'San Fernando City'
		,'Pangasinan' => 'Lingayen')
	,'Region 2' => array (
		'Batanes' => 'Basco'
		,'Cagayan' => 'Tuguegarao City'
		,'Isabela' => 'Ilagan City'
		,'Nueva Vizcaya' => 'Bayombong'
		,'Quirino' => 'Cabaruguis')
	,'CAR' => array (
		'Abra' => 'Bangued'
		,'Apayao' => 'Kabugao'
		,'Benguet' => 'La Trinidad'
		,'Ifugao' => 'Lagawe'
		,'Kalinga' => 'Tabuk City'
		,'Mountain Province' => 'Bontoc')
	);
var_dump($regionProvinces);
foreach ($regionProvinces as $key => $value) {
	echo "<hr/>
	<h3>$key</h3>";
	var_dump($value);
}
?>
<hr/>
<table class="table table-info table-striped table-bordered border-danger">
	<tr>
		<th>Province</th>
		<th>Capital</th>
	</tr>
<?php
foreach ($regionProvinces as $key => $value) {
	echo "<tr><th colspan='2'> $key</th></tr>";
	foreach ($value as $province => $capital) {
		echo "<tr>
			<td>$province</td>
			<td>$capital</td>
		</tr>";
	}

}
?>
</table>

<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>