<html>
<title>test of arrays</title>
<body>

<?php

$myarray = array(34, 56, 78);

echo $myarray[0];
echo "<p>\n";
echo $myarray[1];
echo "<hr>\n";

$secondarray = array(
"foo" => "bar", 
"alex" => "labr", 
"yourname" => "something");

echo $secondarray["alex"];
echo "<p>\n";

if (defined($secondarray["mary"])) {
 echo "found: ".$secondarray["mary"];
} else {
 echo "not found";
} 
echo "<hr>";

$third = array(
5 => "alex",
"mary",
"joe",
"anna");

echo $third[7];
echo "<hr>";

$fourth = array(
"pitt" => "panthers",
"steelers",
"new york" => "giants",
4 =>"patriots",
1 => "lakers",
"pirates");

echo $fourth["pitt"];
echo "<p>";
foreach ($fourth as $key => $value) {
   echo "$key has $value<br/>\n";
}
print "<hr>";
foreach ($fourth as $value) {
   echo "VALUE: $value<br/>\n";
}

var_dump($fourth);

?>

</body>
</html>
