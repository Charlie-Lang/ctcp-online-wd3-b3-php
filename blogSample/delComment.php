<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

include 'connection.php';
// day 20 code
if (isset($_POST['submit'])) {
	$uid = $_SESSION['id'];
	$bid = $mysqli->real_escape_string($_POST['bid']);
	$fid = $mysqli->real_escape_string($_POST['fid']);

	$runQuery = true;
	$resultMessage = "";
	
	$sqlQuery = "DELETE FROM tbl_feedback
	WHERE fld_bid = '$bid'
		AND fld_uid ='$uid'
		AND fld_fid = '$fid'";

	// echo $sqlQuery;
	if ($runQuery) {
		if ($insertResult = $mysqli->query($sqlQuery)) {
			$resultMessage = "Comment DELETED";
		} else {
			$resultMessage .= "Comment not removed";
		}
	}
	header("Location: viewArticle.php?id=$bid&result=$resultMessage");
}
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.post {
	border: 12px groove goldenrod;
	margin: 12px;
	padding: 15px;
}
.post img {
	height: 200px;
	width: 200px;
}
.warning {
	border: 12px solid red;
}
</style>
	<title></title>
</head>
<body>
<a href="viewBlog.php">back</a>
<?php
if (isset($_SESSION['account'])) {
	echo "<a href='logout.php'>logout</a><br/>";
} else {
	echo "<a href='register.php'>Register to site</a><br/>";
}
$bid="0";
$fid="0";
$sqlWhere = 1;
if (isset($_GET['id'])) {
	$bid = $mysqli->real_escape_string($_GET['id']);
	$fid = $mysqli->real_escape_string($_GET['fid']);

	$sqlWhere = "fld_bid = ".$bid;
}

$sqlSelect = "SELECT 
	fld_bid
	, fld_btitle
	, fld_bcontent AS 'content'
	, fld_bpict
	, fld_bdate
	, fld_username
	, tbl_blog.fld_uid
FROM tbl_blog
JOIN tbl_login
ON tbl_blog.fld_uid = tbl_login.fld_uid
WHERE $sqlWhere LIMIT 0,1";

$result = $mysqli->query($sqlSelect);

$row = $result->fetch_assoc();

echo "<div class='post'>
<img src='blogPics/".$row['fld_bpict']."' align='right'/>
<h2>".$row['fld_btitle']."</h2>
<h3>Posted by: ".$row['fld_username']."</h3>
<p>".$row['content']."</p>";
echo "</div>";
?>
<h2>Comments</h2>
<?php
if (isset($_GET['id'])) {
	$sqlComments = "SELECT * FROM tbl_feedback WHERE fld_bid='$bid'";
	$result2 = $mysqli->query($sqlComments);

	while ($row2 = $result2->fetch_assoc()) {
		if ($fid != $row2['fld_fid']) {
			echo "<h4>".$row2['fld_username'].":</h4>";
			echo "<p>".$row2['fld_feedback']."</p>";
		} else {
			echo "
<form action='' method='POST' class='warning'>
<h2><u>DELETE</u> COMMENT</h2>
<p>".$row2['fld_feedback']."</p>
<input type='hidden' name='bid' value='$bid'>
<input type='hidden' name='fid' value='$fid'>
<button type='submit' name='submit'>DELETE</button>
</form>
			";
		}
	}
}
?>
<?php
if (isset($_GET['result'])) {
	echo "<h3>".$_GET['result']."</h3>";
}
?>
</body>
</html>