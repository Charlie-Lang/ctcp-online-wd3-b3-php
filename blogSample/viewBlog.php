<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
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
<?php
if (isset($_SESSION['account'])) {
	echo "<a href='logout.php'>logout</a><br/>";
	if ($_SESSION['account'] == "editor") {
		echo "<a href='newArticle.php'>Make new Article</a><br/>";
	}
} else {
	echo "<a href='login.php'>Login to the site</a><br/>";
	echo "<a href='register.php'>Register to site</a><br/>";
}

$subStrCharLimit = 250;
$sqlSelect = "SELECT 
	fld_bid
	, fld_btitle
	, SUBSTR(fld_bcontent, 1, $subStrCharLimit) AS 'content'
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
	if (isset($_SESSION['account']) && $_SESSION['account'] == 'editor' && $_SESSION['id'] == $row['fld_uid']) {
		echo "<a href='updateArticle.php?id=".$row['fld_bid']."'>Update</a><br/>";
		echo "<a href='deleteArticle.php?id=".$row['fld_bid']."'>Delete</a><br/>";
	}
	echo "<a href='viewArticle.php?id=".$row['fld_bid']."'>View Article</a><br/>";
	echo "</div>";
}
?>

<?php
if (isset($_GET['result'])) {
	echo $_GET['result'];
}
?>
</body>
</html>