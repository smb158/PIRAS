<html>
<title>
Find my car
</title>

<body>
<h1>City of Chicago - Towed Vehicles Database </h1>
<hr>
<?php
 $arg_visit = 0;
 import_request_variables("p", "arg_");
 
 if($arg_visit == 0){
?>


<form action="findmycar.php" method="post">
  <input type="hidden" 
         name="visit"
         value="1">
  Data URL: <input type="text" 
               name="dataurl"> <br/>
  <input type="submit" name="submit"
         value="Download and Parse">
</form>
<br><br>
For example:<br>
http://cs1520.cs.pitt.edu/q/Towed_Vehicles20.csv<br>
http://cs1520.cs.pitt.edu/q/Towed_Vehicles100.csv<br>
http://cs1520.cs.pitt.edu/q/Towed_Vehicles1000.csv<br>
http://cs1520.cs.pitt.edu/q/Towed_Vehicles.csv<br>
<br>

<?php
}
 else if($arg_visit == 1){
 
 $content = file_get_contents($arg_dataurl);
 
 $carrecords = explode("\n", $content);
 
 
$numvehicles = count($carrecords)-1;
echo "<b>$numvehicles vehicles found</b><br><br>";
 
echo "<form action=\"findmycar.php\" method=\"post\">";
echo"  <input type=\"hidden\" ";
echo"         name=\"visit\" ";
echo"         value=\"2\"> ";
echo"  <input type=\"hidden\" ";
echo"         name=\"dataurl\" ";
echo"         value=\"$arg_dataurl\"> ";
echo" Select your vehicle's color:";
echo" <select name=\"dropdown\"> ";

$colorsarray = array();


for($x = 0; $x < count($carrecords); $x++){ 
		$currentrecord = explode(",", $carrecords[$x]);
		$found = 0;
		for($z = 0; $z < count($colorsarray); $z++){
			if($colorsarray[$z] == $currentrecord[4]){
				$found = 1;
			}
		}
		if($found == 0){
			array_push($colorsarray, $currentrecord[4]);
		}
}

for($x = 0; $x < count($colorsarray); $x++){ 
		echo" <option value=\"$colorsarray[$x]\">$colorsarray[$x]</option> ";
}
echo" </select>";
echo"  <input type=\"submit\" name=\"submit\" ";
echo"         value=\"Find My Car\"> ";
echo" </form> ";

} 
else if($arg_visit == 2){

echo "<h1>Searching for color = $arg_dropdown</h1>";
echo "<hr>";

$count = 0;

$content = file_get_contents($arg_dataurl);
 
$carrecords = explode("\n", $content);

for($y = 0; $y < count($carrecords); $y++)
{
	$currentrecord = explode(",",$carrecords[$y]);
	if(count($currentrecord) > 6){
		if($currentrecord[4] == $arg_dropdown)
		{
			echo "</br>$currentrecord[0] $currentrecord[1] $currentrecord[2] $currentrecord[3] $currentrecord[4] $currentrecord[5] $currentrecord[6] $currentrecord[7] $currentrecord[8] $currentrecord[9]</br><hr>";
			$count++;
		}
	}
}

echo "<b>$count results found</b>";

}
?>
