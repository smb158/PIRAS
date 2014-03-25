<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 

$one = "two";
$two = "three";
$three12 = "kalsjhdfgakjhsdfg";

echo "new value1: ".$one."\n<br/>";
echo "new value2: ".${$one}."\n<br/>";
echo "new value3: ".${${$one}.'12'}."\n<br/>";

echo '<p>Hello World from 1520 
class</p>'; ?>
</body>
</html>
