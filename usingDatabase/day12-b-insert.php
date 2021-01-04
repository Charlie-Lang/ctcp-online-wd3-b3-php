<!DOCTYPE html>
<?php include 'connection.php'; ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<form action="" method="GET">
	Name: <input type="text" name="sName"><br/>
	Age: <input type="text" name="sAge"><br/>
	Salary: <input type="text" name="sSalary"><br/>
	<button type="submit" name="submit">INSERT</button>
</form>
<?php
if (isset($_GET['submit'])) {
$sName=$mysqli->real_escape_string($_GET['sName']);
$sAge=$mysqli->real_escape_string($_GET['sAge']);
$sSalary=$mysqli->real_escape_string($_GET['sSalary']);

$runQuery=true;
$resultMessage="";
if (empty($sName) || (strlen(trim($sName)) == 0)) {
	$runQuery=false;
	$resultMessage.="Name not valid<br/>";
}
if (!is_numeric($sAge)) {
	$runQuery=false;
	$resultMessage.="Age input is not a number<br/>";
}
if (!is_numeric($sSalary)) {
	$runQuery=false;
	$resultMessage.="Salary input is not a number<br/>";
}


$sqlQuery = "INSERT INTO tbl_sample1
	(fld_full_name
	, fld_age
	, fld_salary)
VALUES
	('$sName'
	,'$sAge'
	,'$sSalary')";

echo "$sqlQuery";

if ($runQuery) {
	$result = $mysqli->query($sqlQuery);
	if ($result) {
		$resultMessage="Success";
	} else {
		$resultMessage="Failed";
	}
}

echo $resultMessage;

}
?>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>