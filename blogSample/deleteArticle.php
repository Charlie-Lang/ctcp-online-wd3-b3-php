<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['id']) && $_SESSION['account'] != "editor") {
	header("Location: viewBlog.php");
} elseif (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

include 'connection.php';


if (isset($_GET['submit'])) {
	$bid = $mysqli->real_escape_string($_GET['bid']);
	$prevPic = $mysqli->real_escape_string($_GET['prevPic']);
	$uid = $mysqli->real_escape_string($_SESSION['id']);

	$sqlQuery = "DELETE FROM tbl_blog 
		WHERE fld_bid = '$bid' && fld_uid = '$uid'";
		
	$result = $mysqli->query($sqlQuery);
	if ($result) {
		$resultMessage="ROW DELETED";
		unlink($target_dir.$prevPic);
	} else {
		$resultMessage="Delete Failed";
	}
	// header("Location: viewBlog.php?result=$resultMessage");
}
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.post {
	border: 12px groove red;
	margin: 12px;
	padding: 15px;
}
.post img {
	height: 200px;
	width: 200px;
}
</style>
	<title></title>
</head>
<body>
<a href="viewBlog.php">back</a>
<?php
$target_dir = "blogPics/";
if (isset($_GET['id'])) {
	$bid = $mysqli->real_escape_string($_GET['id']);
	$uid = $mysqli->real_escape_string($_SESSION['id']);

	$sqlCount = "SELECT COUNT(*) FROM tbl_blog WHERE fld_bid = '$bid' && fld_uid = '$uid'";

	$resultC = $mysqli->query($sqlCount);

	$rowC = $resultC->fetch_row();

	if ($rowC[0] == 1) {
		$sqlQuery = "SELECT * FROM tbl_blog WHERE fld_bid = '$bid' && fld_uid = '$uid' LIMIT 0,1";
		
		$result = $mysqli->query($sqlQuery);

		$row = $result->fetch_array();
	}
}
?>
<div class='post'>
<h1><center>DELETE POST</center></h1>
<img src="<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $target_dir.$row['fld_bpict'];
}
?>" align="right">
Title:<b>
<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_btitle'];
}
?>
</b><br/>
Content:<br/>
<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bcontent'];
}
?>
<br/>
<br/>
<form action="" method="DELETE">
<input type="hidden" name="bid" value="<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bid'];
}
?>">
<input type="hidden" name="prevPic" value="<?php
if (isset($_GET['id']) && $rowC[0] == 1) {
	echo $row['fld_bpict'];
}
?>">
<input type="submit" value="DELETE" name="submit">
</form>
</div>
<?php
?>
im a sad boy
</body>
</html>