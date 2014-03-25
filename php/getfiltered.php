<html>
<head>
<script src=http://code.jquery.com/jquery-1.4.2.min.js></script>
</head>
<body>
<?php
	require ("dbinfo.php");
	// open connection
	$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);
	if ($mysqli->connect_errno) {
		die("<hr/>Failed to connect to MySQL: " . $mysqli->connect_error);
	} else {
	}
			
	print "<table border=1>";
	
	$query =  "Select * FROM Transactions ".$_GET["q"];
	$result = $mysqli->query($query);
	//USE JQUERY to simplify managing the results
	while($row = $result->fetch_row()) {
			$txid = $row[0];
			$txdate = $row[1];
			$account = $row[2];
			$subcode = $row[3];
			$amount = $row[4];
			$description = $row[5];
			echo "<tr><td> $txid </td><td> $txdate </td><td> $account </td><td> $subcode </td><td> $amount</td><td> $description </td></tr>";
	}
	echo "</table>";
	/* close connection */
	$mysqli->close();
	
?>
</body>
</html>