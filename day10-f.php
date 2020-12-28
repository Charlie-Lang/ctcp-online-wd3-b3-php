<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<form action="" method="POST"> <!-- method: POST / GET -->
	Enter Grade: <input type="text" name="grade"><br>
	<button type="submit" name="submit">Compute Grade</button>
</form>
<?php
if (isset($_POST["submit"])) {
	$grade = $_POST['grade'];
	$result = "";
	// if (is_numeric($grade) == false) {
	if (!is_numeric($grade)) {
		$result = "Input is not a number";
	} elseif ($grade > 100) {
		$result = "Score not valid";
	} elseif ($grade >= 95) {
		$result = "Excellent";
	} elseif ($grade >= 87) {
		$result = "Great";
	} elseif ($grade >= 80) {
		$result = "Good";
	} elseif ($grade >= 75) {
		$result = "Passed";
	} else {
		$result = "Failed";
	}
	echo "Grade result: $result";
}
?>

<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>