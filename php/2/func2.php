<!-- skel.php: Skeleton PHP script -->
<html>
<head> <title> FUNCTIONS-2 </title> </head>
<body>

<?php 

$a = 3;
$b = 10;

function foo1 () {
 global $b;
 $a+=2;
 $b+=2;
}

function foo2 () {
 global $a;
 $a+=15;
 $b+=15;
}

foo1();
echo "A is " . $a . "\n<br/>";
echo "B is " . $b . "\n<p>";
foo2();
echo "A is " . $a . "\n<br/>";
echo "B is " . $b . "\n";


?>

<!-- PRINT TIMESTAMP -->
<hr> <p>
This page was generated on 

<font color="red">
<?php date_default_timezone_set('America/New_York');
	print date("D M j G:i:s T Y"); 
      //see http://www.php.net/manual/en/function.date.php for date() params
?>
</font>

for the CS1520 class.
</p>
</body>
</html>
