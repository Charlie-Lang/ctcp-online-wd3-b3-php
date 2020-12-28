<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<form action="day10-g-action.php" method="GET">
	Enter Number: 
	<input type="text" name="num1"><br/>
	<button type="submit" name="submit">Check</button>
</form>
<?php
if (isset($_GET['result'])) {
	echo $_GET['result'];
}
?>

<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>