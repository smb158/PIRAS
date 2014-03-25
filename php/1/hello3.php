<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
// test arrays

$arr = array("dayofweek" => "tuesday", 12 => true);

echo $arr["dayofweek"]; // bar
echo "<p>";
echo (boolean)$arr[12]; // true

echo "<hr>";

$foo = 'Bob';              // Assign the value 'Bob' to $foo
$bar = &$foo;              // Reference $foo via $bar.
$bar2 = &$bar;              // Reference $foo via $bar.
$bar = "My name is $bar";  // Alter $bar...
echo "the value of bar is ".$bar."<br/>";
echo "the value of foo is ".$foo."<br/>";   
echo "the value of bar2 is ".$bar2."<br/>";   
// $foo is altered too.

var_dump($bar);
?>

</body>
</html>
