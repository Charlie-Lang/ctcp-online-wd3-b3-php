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
<a href="logout.php">logout</a>
<?php
$sqlSelect = "SELECT 
	fld_bid
	, fld_btitle
	, SUBSTR(fld_bcontent, 1, 250) AS 'content'
	, fld_bpict
	, fld_bdate
	, fld_username
	, tbl_blog.fld_uid
FROM tbl_blog
JOIN tbl_login
ON tbl_blog.fld_uid = tbl_login.fld_uid;";

$result = $mysqli->query($sqlSelect);

while ($row = $result->fetch_assoc()) {
	echo "<div class='post'>
	<img src='blogPics/".$row['fld_bpict']."' align='right'/>
	<h2>".$row['fld_btitle']."</h2>
	<h3>Posted by: ".$row['fld_username']."</h3>
	<p>".$row['content']." <b>...</b></p>";
	if ($_SESSION['account'] == 'editor') {
		echo "<a href='updateArticle.php?id=".$row['fld_uid']."'>Update</a><br/>";
		echo "<a href='deleteArticle.php?id=".$row['fld_uid']."'>Delete</a><br/>";
	}
	echo "<a href='viewArticle.php?id=".$row['fld_bid']."'>Comment</a><br/>";
	echo "</div>";
}

?>
</body>
</html>