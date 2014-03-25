<?php

require ("dbinfo.php");

// open connection
$db_obj = new mysqli("localhost", $db_user, $db_pass, $db_name);

if ($db_obj->connect_errno) {
    die("<hr/>Failed to connect to MySQL: " . $db_obj->connect_error);
} else {
  print "Connection succesfull -- yay!<br/>\n";
}


// some code -- QUERY
$query = <<<EOQ
SELECT * FROM earthquakes WHERE Region like '%Los Angeles%'
EOQ;

$result = $db_obj->query($query);
// more info: http://www.php.net/manual/en/mysqli.query.php
// http://www.php.net/manual/en/mysqli.quickstart.dual-interface.php

if (!$result) {
   die("<hr/>The following query: <pre>$query</pre> is invalid: " . $db_obj->error );
} else {
   $num_results = $result->num_rows;
}

print <<<EOHeader
<hr/>
<p>
The following query:
<pre>
$query
</pre>
returned $num_results tuples.
<p>
<hr/>
<table border=1> 
EOHeader;

$idx = 1;
while ($row = $result->fetch_assoc()) {
	$when = $row['Datetime'];
	$magn = $row['Magnitude'];
	$depth = $row['Depth'];
	$region = $row['Region'];

print <<<EOText
<tr> <td> $idx </td> 
     <td> $when </td> 
     <td> $magn </td> 
     <td> $depth </td> 
     <td> $region </td> 
</tr>
EOText;

	$idx++;
}
print <<<EOFooter
</table> 
EOFooter;
// close connection
$result->free();
$db_obj->close();
?>

