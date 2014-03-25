<!-- skel.php: Skeleton PHP script -->
<html>
<head> <title> FUNCTIONS-3 </title> </head>
<body>

<?php 

function doubling () {
  static $num = 1;
  $num = $num * 2;
  return $num;
}

for ($i=1; $i<=10; $i++) {
  print "doubling($i) returns ".doubling(). "\n<br/>";
}

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
