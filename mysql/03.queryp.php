<?php

require ("dbinfo.php");

// open connection
$mysqli = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (mysqli_connect_errno($mysqli)) {
    die("<hr/>Failed to connect to MySQL: " . mysqli_connect_error());
} else {
  print "Connection succesfull -- yay!<br/>\n";
}

// some code -- QUERY
$query = <<<EOQ
SELECT * FROM earthquakes WHERE Region like '%Los Angeles%'
EOQ;

$result = mysqli_query($mysqli, $query);
// more info at http://php.net/manual/en/mysqli.query.php
// http://www.php.net/manual/en/mysqli.quickstart.dual-interface.php

if (!$result) {
   die("<hr/>The following query: <pre>$query</pre> is invalid: " .
   mysqli_error());
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
while ($row = mysqli_fetch_assoc($result)) {
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
?>

