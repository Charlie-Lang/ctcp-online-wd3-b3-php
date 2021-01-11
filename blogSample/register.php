<?php
include 'connection.php'; 
if (isset($_POST['submit'])) {
$uname=$mysqli->real_escape_string($_POST['uname']);
$pword=$mysqli->real_escape_string($_POST['pword']);
$email=$mysqli->real_escape_string($_POST['email']);

echo $_POST['pword']."<br/>";
$runQuery=false;
$resultMessage="";

if (empty($uname) 
	|| (strlen(trim($uname)) < 8)) {
	$runQuery=false;
	$resultMessage.="Name not valid<br/>";
} else {
	$uname = strtolower($uname);
}

if (empty($pword) 
	|| (strlen(trim($pword)) < 8)) {
	$runQuery=false;
	$resultMessage.="Password not valid<br/>";
} else {
	$pword = sha1($pword);
}

if (empty($email) 
	|| (strlen(trim($email)) < 8)) {
	$runQuery=false;
	$resultMessage.="Email not valid<br/>";
}

$sqlQuery="INSERT INTO tbl_login
	(fld_username
	, fld_password
	, fld_useremail) 
VALUES 
	('$uname'
	,'$pword'
	,'$email')";
	echo $sqlQuery."<br/>";

if ($runQuery) {
	$result = $mysqli->query($sqlQuery);
	if ($result) {
		$resultMessage="Success";
	} else {
		$resultMessage.="Failed";
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST">
Username: <input type="text" name="uname"><br/>
Password: <input type="password" name="pword"><br/>
Email: <input type="text" name="email"><br/>
<button type="submit" name="submit">Create Account</button>
</form>
<?php
if (isset($_POST['submit'])) {
	echo "<h1>$resultMessage</h1>";
}
?>
<a href="index.php">back</a>
</body>
</html>