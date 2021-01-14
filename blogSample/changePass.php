<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

include 'connection.php';

// day 21 code

if (isset($_POST['submit'])) {
	$oldPass = $mysqli->real_escape_string($_POST['oldPass']);
	$newPass1 = $mysqli->real_escape_string($_POST['newPass1']);
	$newPass2 = $mysqli->real_escape_string($_POST['newPass2']);
	$uid=$mysqli->real_escape_string($_SESSION['id']);


	$runQuery=true;
	$resultMessage="";


	if (empty($oldPass) 
		|| (strlen(trim($oldPass)) < 8)) {
		$runQuery=false;
		$resultMessage.="Password not valid<br/>";
	} else {
		$oldPass = sha1($oldPass);
	}

	if ($newPass1 != $newPass2) {
		$runQuery=false;
		$resultMessage.="Password is not identical<br/>";
	}

	if (empty($newPass1) 
		|| (strlen(trim($newPass1)) < 8)) {
		$runQuery=false;
		$resultMessage.="Password not valid<br/>";
	} else {
		$newPass1 = sha1($newPass1);
	}


	//magiging update query
	$sqlQuery="UPDATE tbl_login
	SET fld_password = '$newPass1'
	WHERE 
		fld_uid = '$uid'
	AND fld_password = '$oldPass'";


	if ($runQuery) {
		$result = $mysqli->query($sqlQuery);
		if ($result) {
			$resultMessage="Success";
		} else {
			$resultMessage.="Failed";
		}
	}
	// echo $resultMessage;

	header("Location:dashboard.php?result=$resultMessage");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Change Password
<form action="" method="POST">
	OLD Password: <input type="password" name="oldPass"><br/>
	New Password: <input type="password" name="newPass1"><br/>
	Confirm Password: <input type="password" name="newPass2"><br/>
	<button type="submit" name="submit">Change Password!!!</button>
</form>
<a href="dashboard.php">Back</a>
</body>
</html>