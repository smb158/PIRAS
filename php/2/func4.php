<!-- skel.php: Skeleton PHP script -->
<html>
<head> <title> FUNCTIONS-4 </title> </head>
<body>

<?php 

function add_one($reg1, $reg2, &$ref3) {
  $reg1++;
  $reg2++;
  $ref3++;
}

$a = 3; $b = 3; $c = 3;
$d = &$b;

//add_one($a, &$b, $c);  //-- DEPRECATED
// add_one($a, $b, $c);
 add_one($a, $d, $c);

print ("new value for \$a is $a\n<br>");
print ("new value for \$b is $b\n<br>");
print ("new value for \$c is $c\n<br>");
 
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
