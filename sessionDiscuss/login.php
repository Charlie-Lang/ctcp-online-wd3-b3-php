<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include 'connection.php'; 

$headerLoc = "login.php?login=failed";

if (isset($_POST['submit'])) {
	$uname=$mysqli->real_escape_string($_POST['uname']);
	$pword=$mysqli->real_escape_string($_POST['pword']);

	$sqlQuery = "SELECT COUNT(*), fld_uid FROM tbl_login WHERE fld_username='$uname' AND fld_password='$pword' LIMIT 0,1";

	$result = $mysqli->query($sqlQuery);
	$row = $result->fetch_array();

	if ($row[0] == 1) {
		$_SESSION['id'] = $row[1];
		$_SESSION['uname'] = $uname;
		$headerLoc = "day16-select2.php";
	}

	header("Location: $headerLoc");
}

// CREATE TABLE tbl_login 
// 	( fld_uid INT NOT NULL AUTO_INCREMENT 
// 	, fld_username VARCHAR(64) NOT NULL 
// 	, fld_password VARCHAR(64) NOT NULL 
// 	, PRIMARY KEY (fld_uid)
// ) ENGINE = InnoDB;
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<form action="" method="POST">
Username: <input type="text" name="uname"><br/>
Password: <input type="password" name="pword"><br/>
<button type="submit" name="submit">LOGIN</button>
</form>
<a class="btn btn-success" href="index.php"> to Main page</a>
<?php
if (isset($_GET['login'])) {
	echo "Login Failed.<br/> Invalid Username or Password";
}
?>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>