<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (!isset($_SESSION['id'])) {
	header("Location: logout.php");
}

include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.post {
	border: 12px groove goldenrod;
	margin: 12px;
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
<a href="logout.php">logout</a>
<?php
$sqlWhere = 1;
if (isset($_GET['id'])) {
	$bid = $mysqli->real_escape_string($_GET['id']);

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
if ($_SESSION['account'] == 'editor') {
	echo "<a href='updateArticle.php?id=".$row['fld_uid']."'>Update</a><br/>";
	echo "<a href='deleteArticle.php?id=".$row['fld_uid']."'>Delete</a><br/>";
}
echo "</div>";
?>
<h2>Comments</h2>
<?php
if (isset($_GET['id'])) {
	$sqlComments = "SELECT * FROM tbl_feedback WHERE fld_bid='$bid'";
	$result2 = $mysqli->query($sqlComments);

	while ($row2 = $result2->fetch_assoc()) {
		echo "<h4>".$row2['fld_username'].":</h4>";
		echo "<p>".$row2['fld_feedback']."</p>";
		if ($_SESSION['id'] == $row2['fld_uid']) {
			echo "<a href='upComment.php?id=".$row['fld_uid']."'>Update</a><br/>";
			echo "<a href='delComment.php?id=".$row['fld_uid']."'>Delete</a><br/>";
		}
	}
}
echo "<a href='newComment.php?id=".$row['fld_uid']."'>Make a New Comment</a><br/>";
?>
</body>
</html>