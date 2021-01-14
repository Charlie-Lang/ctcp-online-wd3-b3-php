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
	$uName = $_SESSION['uname'];
	$uid = $_SESSION['id'];
	$bid = $mysqli->real_escape_string($_POST['bid']);
	$comment = $mysqli->real_escape_string($_POST['comment']);

	$runQuery = true;
	$resultMessage = "";

	if (empty($_POST['comment']) || (strlen(trim($_POST['comment'])) == 0)) {
		$runQuery = false;
		$resultMessage .= "Empty Feedback<br/>";
	}

	$sqlQuery = "INSERT INTO tbl_feedback(fld_username, fld_feedback, fld_bid, fld_uid) 
		VALUES ('$uName', '$comment', '$bid', '$uid')";

	if ($runQuery) {
		if ($insertResult = $mysqli->query($sqlQuery)) {
			$resultMessage = "New Comment made";
		} else {
			$resultMessage .= "Comment not recorded";
		}
	}
	header("Location: newComment.php?id=$bid&result=$resultMessage");
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
	}
}
?>
<form action="" method="POST">
<h2>NEW COMMENT</h2>
<textarea name="comment" placeholder="New Comment" rows="8" cols="75"></textarea>
<br/>
<input type="hidden" name="bid" value="<?php echo $bid; ?>">
<button type="submit" name="submit">New Comment</button>
</form>
<?php
if (isset($_GET['result'])) {
	echo "<h3>".$_GET['result']."</h3>";
}
?>
</body>
</html>