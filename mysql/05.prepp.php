<?php
require ("dbinfo.php");

// open connection
$link = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (mysqli_connect_errno($link)) {
    die("<hr/>Failed to connect to MySQL: " . mysqli_connect_error());
} else {
  print "Connection succesfull -- yay!<br/>\n";
}

$myday = "Wednesday";

/* create a prepared statement */
$query = <<<EOQ
SELECT Region, Magnitude FROM earthquakes WHERE dayofweek = ?
EOQ;


if ($stmt = mysqli_prepare($link, $query)) {

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "s", $myday);

/* Parameter Types:
i	corresponding variable has type integer
d	corresponding variable has type double
s	corresponding variable has type string
b	corresponding variable is a blob and will be sent in packets
*/

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $myregion, $mymagn);

    /* fetch value */
    // More info: http://php.net/manual/en/mysqli-stmt.fetch.php
    while (mysqli_stmt_fetch($stmt)) {
	printf("%.2f earthquake happened on $myregion on $myday<br/>\n",
	$mymagn);
    }

    /* close statement */
    mysqli_stmt_close($stmt);
}

/* close connection */
mysqli_close($link);
?>

