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
// day 19 code
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="viewBlog.php">back</a>
<form action="newArticleCode.php" method="post" enctype="multipart/form-data">
	Title: <input type="text" name="title"><br/>
	Content:<br/>
	<textarea name="content" cols="75" rows="8"></textarea><br/>
	Select image to upload:<br/>
	<input type="file" name="fileToUpload" id="fileToUpload"><br/>
	<input type="submit" value="Upload Image" name="submit">
</form>

<?php
if (isset($_GET['result'])) {
	echo $_GET['result'];
}
?>

</body>
</html>