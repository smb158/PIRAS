<html>
<head>
<title>import_subcodes.php</title>
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
	$theURL = $_GET["CSVurl"];
	if($theURL == ""){
		echo "Invalid URL";
	}
	else{
	$content = file_get_contents($theURL);
	$subcoderecords = explode("\n", $content);
	
	$j = 0;
	for($j; $j < count($subcoderecords)-1; $j++)
	{
		$subcodesplit = explode(",", $subcoderecords[$j]);
		//get the subcode and the description
		$theSubcode = $subcodesplit[0];
		$theDescription = $subcodesplit[1];

		if ($stmt = $mysqli->prepare("INSERT INTO Subcodes (subcode, description) VALUES (?,?)")) {

			/* bind parameters for markers */
			$stmt->bind_param("ss", $theSubcode, $theDescription);

			/* Parameter Types:
			i	corresponding variable has type integer
			d	corresponding variable has type double
			s	corresponding variable has type string
			b	corresponding variable is a blob and will be sent in packets
			*/

			/* execute query */
			$stmt->execute();
			
			/* bind result variables */
			//$stmt->bind_result($result1,$result2);

			/* fetch value */
			// More info: http://php.net/manual/en/mysqli-stmt.fetch.php
			//while ($stmt->fetch()) {
				//printf("Result: $result<br/>\n");
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