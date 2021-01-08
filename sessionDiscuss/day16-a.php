<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
if (isset($_SESSION['hidden1'])) {
	echo "<h1>".$_SESSION['hidden1']."</h1>";
	$_SESSION['hidden1'] = "Legend";
}
?>
<a href="day16-b.php">to b</a><br/>
<a href="day16-c.php">to c</a><br/>
<a href="logout.php">logout</a><br/>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>