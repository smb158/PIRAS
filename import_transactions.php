<html>
<head>
<title>import_transactions.php</title>
</head>
<body>
<h1>Steven Bauer - SMB158</h1><br/><br/>
<?php
	require ("dbinfo.php");
	// open connection
	$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);
	if ($mysqli->connect_errno) {
		die("<hr/>Failed to connect to MySQL: " . $mysqli->connect_error);
	} else {
	}
	
	//get the content from the CSV file
	$theURL = $_GET["TRANSurl"];
	if($theURL == ""){
		echo "Invalid URL!";
	}
	else{
	$content = file_get_contents($theURL);
	$transactionsrecords = explode("\n", $content);
	
	for($j = 0; $j < count($transactionsrecords)-1; $j++)
	{
		$transactionsplit = explode(",", $transactionsrecords[$j]);
		
		//get the unique parts
		$id = $transactionsplit[0];
		$date = $transactionsplit[1];
		$account = $transactionsplit[2];
		$subcode = $transactionsplit[3];
		$amount = $transactionsplit[4];
		$description = $transactionsplit[5];

		
		// THERE SHOULD BE ?'s in here for the variables
		
		if ($stmt = $mysqli->prepare("INSERT INTO Transactions VALUES (?,?,?,?,?,?)")) {

			/* bind parameters for markers */
			$stmt->bind_param("issiis", $id, $date, $account, $subcode, $amount, $description);

			/* Parameter Types:
			i	corresponding variable has type integer
			d	corresponding variable has type double
			s	corresponding variable has type string
			b	corresponding variable is a blob and will be sent in packets
			*/

			/* execute query */
			$stmt->execute();

			/* bind result variables */
			//$stmt->bind_result($result);

			/* fetch value */
			// More info: http://php.net/manual/en/mysqli-stmt.fetch.php
			//while ($stmt->fetch()) {
			//	printf("Result: $result<br/>\n");
			//}

			/* close statement */
			$stmt->close();
		}
	}

	/* close connection */
	$mysqli->close();
	
	echo "<br /><br />$j have been added to the database";
	}
	echo "<br /><br /><a href=\"./piras.php\">Return to Piras Home</a>";
?>
</body>
</html>