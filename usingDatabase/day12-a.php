<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
$serverName="127.0.0.1";
$userName="root";
$password="";
$dbName="cane_wd3_b3";

$mysqli = new mysqli($serverName, $userName, $password, $dbName);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "<hr/>";

$sName="Ecco";
$sAge="sam.php";
$sSalary="salamander";

$runQuery=true;

$sqlQuery = "INSERT INTO tbl_sample1
	(fld_full_name
	, fld_age
	, fld_salary)
VALUES
	('$sName'
	,'$sAge'
	,'$sSalary',)";

echo "$sqlQuery";

if ($runQuery) {
	$result = $mysqli->query($sqlQuery);
	if ($result) {
		echo "Success";
	} else {
		echo "Failed";
	}
}

?>


<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>