<!-- skel.php: Skeleton PHP script -->
<html>
<head> <title> FUNCTIONS-1 </title> </head>
<body>

<?php 
// function to concatenate two strings
function myconcat($left, $right) {
   $combined_string = $left." and ".$right;
   return $combined_string;
}

$first = "this is string number one";
$second = "this is string number two";

print "<b>First</b>: $first\n<br>";
print "<b>Second</b>: $second\n<br>";
print "<b>Combined</b>: ".myconcat($first, $second)."\n<br>";

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
