<html>
<title>test of multidimensional arrays</title>
<body>

<?php

$myarray[0] = "first";
$myarray[1] = array("key1" => "value1", "second" => "value2", "3" => "value3");
$myarray[3] = "third";

var_dump($myarray);

print "<p>\n";

print $myarray[0];

print "<p>\n";

print $myarray[1]['key1'];

print "<hr><p>\n";

print <<<STOPHERE

this is a multi-line text
blablabla
a;sdlfh

asdf
$myarray[3]
ethe end
STOPHERE;




?>

</body>
</html>
