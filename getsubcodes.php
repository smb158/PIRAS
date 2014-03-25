<?php
	require ("dbinfo.php");
	// open connection
	$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);
	if ($mysqli->connect_errno) {
		die("<hr/>Failed to connect to MySQL: " . $mysqli->connect_error);
	} else {
	}

	$mode = $_GET["mode"];
	
	if($mode=="check"){
	print "Subcodes:";
	$query = "SELECT DISTINCT subcode FROM Subcodes";

	/* execute query */
	$result = $mysqli->query($query);

	while($row = $result->fetch_row()) {
		$subcode = $row[0];
		print "<input type=\"checkbox\" id=\"$subcode\" checked>$subcode</input>";
	}
	}
	else if($mode=="drop"){
	$query = "SELECT DISTINCT subcode FROM Subcodes";

	/* execute query */
	$result = $mysqli->query($query);
	
	$selected = $_GET["current"];
	if($selected == null){
		$selected = "";
	}

	echo"<select id=\"dropbox\">";
	while($row = $result->fetch_row()) {
		$subcode = $row[0];
		if($subcode == $selected){
			print "<option selected=\"selected\" id=\"$subcode\">$subcode</option>";
		}
		else{
			print "<option id=\"$subcode\">$subcode</option>";
		}
	}
	echo"</select>";
	}
			
	/* close connection */
	$mysqli->close();
	
?>