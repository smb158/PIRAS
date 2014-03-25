<html>
<head>
<title>import_subcodes.php</title>
</head>
<body>
<h1>Steven Bauer - SMB158</h1><hr><br/><br/>
<?php
	require ("dbinfo.php");
	// open connection
	$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);
	if ($mysqli->connect_errno) {
		die("<hr/>Failed to connect to MySQL: " . $mysqli->connect_error);
	} else {
	}
	
	$stmt = $mysqli->prepare("DELETE FROM Transactions") ;
	$stmt->execute();
	//$result1 = $stmt->get_result();
	//print ("$results1 removed from Subcodes");
	$stmt->close();
		
	$stmt = $mysqli->prepare("DELETE FROM Subcodes") ;
	$stmt->execute();
	//$result2 = $stmt->get_result();
	//print ("$results2 removed from Subcodes");
	$stmt->close();

	/* close connection */
	$mysqli->close();
	
	echo "Databases reset<br />";
	echo "<br /><br /><a href=\"./piras.php\">Return to Piras Home</a>";

/*
	$query = "DELETE FROM Transactions"
	
	$result = mysql_query($query);
	
	if (!$result) {
		die("<hr/>The following query: <pre>$query</pre> is invalid: " .mysql_error());
	} else {
		$num_results = $result->num_rows;
		print ("$num_results removed from Transactions");
	}
	
		//query
	$query = "DELETE FROM Subcodes"
	
	$result = mysql_query($query);
	
	if (!result) {
		die("<hr/>The following query: <pre>$query</pre> is invalid: " .mysql_error());
	} else {
		$num_results = $result->num_rows;
		print ("$num_results removed from Subcodes");
	}


*/


?>

</body>
</html>