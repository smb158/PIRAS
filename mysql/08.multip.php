<?php

require ("dbinfo.php");

// open connection
$link = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (mysqli_connect_errno($link)) {
    die("<hr/>Failed to connect to MySQL: " . mysqli_connect_error());
} else {
  print "Connection succesfull -- yay!<br/>\n";
}

// some code -- QUERY
$query = <<<EOQ
SELECT * FROM earthquakes WHERE Region like '%Los Angeles%';
SELECT * FROM earthquakes WHERE Region like '%Baja%';
EOQ;

print <<<EOHeader
<hr/>
<p>
The following query:
<pre>
$query
</pre>
is submitted
<p>
<hr/>
EOHeader;


if (mysqli_multi_query($link, $query)) {
    // more info at 
    // http://www.php.net/manual/en/mysqli.quickstart.dual-interface.php
    // http://php.net/manual/en/mysqli.quickstart.multiple-statement.php
    // http://www.php.net/manual/en/mysqli.multi-query.php
   
    do {
        /* store first result set */
        if ($result = mysqli_store_result($link)) {
		print "<table border=0>\n"; $idx=0; 
	    while ($row = mysqli_fetch_assoc($result)) {
		$idx++;
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
            }
            mysqli_free_result($result);
	    print "</table>\n";
        }
        /* print divider */
        if (mysqli_more_results($link)) {
            printf("<hr>\n");
        }
    } while (mysqli_next_result($link));


} else {
   die("<hr/>The following query: <pre>$query</pre> is invalid: " .
   mysqli_error($link));
}


print <<<EOFooter
</table> 
EOFooter;
// close connection
?>

