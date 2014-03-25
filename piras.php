<html>
<head>
<title>Pittsburgh Interactive Research Accounting System</title>
</head>
<body>

<h1>Steven Bauer - SMB158</h1><hr>

<?php
	require ("dbinfo.php");
	
	// open connection to Transactions Table
	$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);
	if ($mysqli->connect_errno) {
		die("<hr/>Failed to connect to MySQL: " . $mysqli->connect_error);
	} else {
	}
	
	$temp1 = $mysqli->query("SELECT * FROM Transactions");
	$transcount = $temp1->num_rows;
	$temp2 = $mysqli->query("SELECT * FROM Subcodes");
	$subcodecount = $temp2->num_rows;

	/* close connection */
	$mysqli->close();
	
	echo "<h5>Number of subcodes: $subcodecount	Number of transactions: $transcount</h5><br/>";
?>

<a href="./resetdb.php">Reset DB</a><br /> <br />

<form action="./import_subcodes.php" method="get">
  URL to subcode CSV file: <input type="text" name="CSVurl"><br>
  <input type="submit" value="Import Subcodes">
</form>

<form action="./import_transactions.php" method="get">
  URL to transactions CSV file: <input type="text" name="TRANSurl"><br>
  <input type="submit" value="Import Transactions">
</form>

<a href="./maintenance.php">Maintenance</a><br /> <br />


<a href="./filter.php">Querying</a>

</body>
</html>