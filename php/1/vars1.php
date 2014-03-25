<html>
<title>
test with variables
</title>

<body>

<?php
// pointer variables
$apples = 15;
$grapes = $apples;
$oranges = &$apples;

$apples++;
$grapes--;
$oranges++;

echo "APPLES: $apples<br/>\n";
echo "GRAPES: $grapes<br/>\n";
echo "ORANGES: $oranges<br/>\n";
echo "<hr>";

$first = "ora";
$second = "nges";

echo ${$first.$second};
print "<p>";

// variable variables in php
$row1 = "first";
$row2 = "second";
$row3 = "third";
for ($i=1; $i<=3; $i++) {
   print "for $i we have: ";
   print ${"row".$i};
   print "<br>\n";
}


?>

</body>
</html>
