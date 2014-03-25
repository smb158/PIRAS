<?php
require ("dbinfo.php");

// open connection
$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);

if ($mysqli->connect_errno) {
    die("<hr/>Failed to connect to MySQL: " . $mysqli->connect_error);
} else {
  print "Connection succesfull -- yay!<br/>\n";
}

$myday = "Wednesday";

/* create a prepared statement */
$query = <<<EOQ
SELECT Region, Magnitude FROM earthquakes WHERE dayofweek = ?
EOQ;


if ($stmt = $mysqli->prepare($query)) {

    /* bind parameters for markers */
    $stmt->bind_param("s", $myday);

/* Parameter Types:
i	corresponding variable has type integer
d	corresponding variable has type double
s	corresponding variable has type string
b	corresponding variable is a blob and will be sent in packets
*/

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($myregion, $mymagn);

    /* fetch value */
    // More info: http://php.net/manual/en/mysqli-stmt.fetch.php
    while ($stmt->fetch()) {
	printf("%.2f earthquake happened on $myregion on $myday<br/>\n",
	$mymagn);
    }

    /* close statement */
    $stmt->close();
}

/* close connection */
$mysqli->close();
?>

