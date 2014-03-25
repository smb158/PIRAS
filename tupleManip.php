<html>
<head>
<title>tupleManip.php</title>
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
	
	$mode = $_GET["mode"];
	
	if($mode == "update"){
	$theTxid = $_GET["txid"];
	$theDate = $_GET["date"];
	$theAccount = $_GET["account"];
	$theSubcode = $_GET["subcode"];
	$theAmount = $_GET["amount"];
	$theDescription = $_GET["description"];
	
	$query = "UPDATE `Transactions` SET `txdate`='".$theDate."',`account`='".$theAccount."',`subcode`='".$theSubcode."',`amount`='".$theAmount."',`description`='".$theDescription."' WHERE txid=".$theTxid;
	//echo "$query";
	/* execute query */
	$result = $mysqli->query($query);
	}
	else if($mode == "add"){
	//get the content from the CSV file
	$theDate = $_GET["date"];
	$theAccount = $_GET["account"];
	$theSubcode = $_GET["subcode"];
	$theAmount = $_GET["amount"];
	$theDescription = $_GET["description"];
	
	$query = "INSERT INTO `Transactions`(`txdate`, `account`, `subcode`, `amount`, `description`) VALUES (\"".$theDate."\",\"".$theAccount."\",\"".$theSubcode."\",\"".$theAmount."\",\"".$theDescription."\")";
	//echo "$query";
	/* execute query */
	$result = $mysqli->query($query);
	}
	
	else if($mode == "delete"){
	//get the content from the CSV file
	$theTxid = $_GET["txid"];
	
	$query = "DELETE FROM Transactions WHERE txid=".$theTxid;
	//echo "$query";
	/* execute query */
	$result = $mysqli->query($query);
	}
	
	
	/* close connection */
	$mysqli->close();
?>
</body>
</html>