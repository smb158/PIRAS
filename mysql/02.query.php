<?php

require ("dbinfo.php");

// open connection
$db_con = mysql_connect("localhost",$db_user,$db_pass);
if (!$db_con) {
  die("<hr/>Could not connect to server: " . mysql_error());
} else {
  print "Connection succesfull -- yay!<br/>\n";
}

if (!mysql_select_db($db_name, $db_con)) {
  die("<hr/>Could not select database $db_name: ". mysql_error());
} else {
  print "Database $db_name selected<br/>\n";
}

// some code -- QUERY
$query = <<<EOQ
SELECT * FROM earthquakes WHERE Region like '%California%'
ORDER BY Magnitude DESC
EOQ;

$result = mysql_query($query);

if (!$result) {
  die("<hr/>The following query: <pre>$query</pre> is invalid: " . mysql_error());
}

$num_results = mysql_num_rows($result);

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
while ($row = mysql_fetch_array($result)) {
	$when = $row['Datetime'];
	$magn = $row['Magnitude'];
	$depth = $row['Depth'];
	$region = $row['Region'];

print <<<EOText
<tr> <td> $idx </td> 
     <td> $when </td> 
     <td> <font color="red">$magn</font> </td> 
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
mysql_close($db_con);
?>

