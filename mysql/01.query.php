<?php

require ("dbinfo.php");

// open connection
$db_con = mysql_connect("localhost",$db_user,$db_pass);
if (!$db_con) {
  die("<hr/>Could not connect to server: " . mysql_error());
} else {
  print "Connection succesfull<br/>\n";
}

if (!mysql_select_db($db_name, $db_con)) {
  die("<hr/>Could not select database $db_name: ". mysql_error());
} else {
  print "Database $db_name selected<br/>\n";
}

// some code -- QUERY
$query = <<<EOQ
INSERT INTO Faculty VALUES ("Labrinidis", "Alex", "Computer Science");

EOQ;

$result = mysql_query($query);

if (!$result) {
  die("<hr/>The following query: <pre>$query</pre> is invalid: " .
mysql_error());
} else {
 print ("Insert was successful<br/>");
}

// close connection
mysql_close($db_con);
?>

