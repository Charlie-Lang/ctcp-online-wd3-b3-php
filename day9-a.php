<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">
<?php
$name = "Juan Juan Juan";
echo "sample";
echo "<h1>Welcome <u>$name</u></h1>";
?>
<h2 class="<?php echo "border border-5 border-danger"?>">Wood stork</h2>
<p>The wood stork (Mycteria americana) is a large American wading bird in the stork family Ciconiidae. It was formerly called the "wood ibis", though it is not an ibis. It is found in subtropical and tropical habitats in the Americas, including the Caribbean. In South America, it is resident, but in North America, it may disperse as far as Florida. Originally described by Carl Linnaeus in 1758, this stork likely evolved in tropical regions. The head and neck are bare of feathers, and dark grey in colour. The plumage is mostly white, with the exception of the tail and some of the wing feathers, which are black with a greenish-purplish sheen. The juvenile differs from the adult, with the former having a feathered head and a yellow bill, compared to the black adult bill. There is little sexual dimorphism.</p>
<table>
	<tr>
		<td>Name</td>
		<td><?php echo $name; ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td></td>
	</tr>
	<tr>
		<td>Contact Number</td>
		<td></td>
	</tr>
</table>
<hr/>
<?php
$num1 = 19;
$num2 = 17;
$txt1 = "salita";
$txt2 = "word";

$result = $num1 + $num2;
echo "result 1: $result <br/>";

$result2 = $txt1 . $txt2;
echo "result 2: $result2 <br/>";

$result3 = $num1 . $num2;
echo "result 3: $result3 <br/>";

$result = $num1 - $num2;
echo "result -: $result <br/>";

$result = $num1 * $num2;
echo "result *: $result <br/>";

$result = $num1 / $num2;
echo "result /: $result <br/>";

$num3 = 27;
$num4 = 6;
$result = $num3 % $num4;
echo "$num3 % $num4 = $result <br/>";

$num3 = 40;
$num4 = 6;
$result = $num3 % $num4;
echo "$num3 % $num4 = $result <br/>";


?>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title></title>
</head>
<body class="container">

<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html> -->