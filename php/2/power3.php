<!-- skel.php: Skeleton PHP script -->
<html>
<head> <title> POWER 3 </title> </head>
<body>

<?php
 
 import_request_variables("p", "arg_");

 if (! $arg_pageno) {
 //page one
?>
   <form action="power3.php" method="post">
   <input type="hidden" name="pageno" 
          value="1">
   Lower bound: 
   <input type="text" name="lower"> <br/>
 
   <input type="submit" name="submit"
          value="print table">
   </form>

<?php
 } else if ($arg_pageno === "1") {
 //page two
?>

<form action="power3.php" method="post">
   <input type="hidden" name="pageno"
          value="2">
   <input type="hidden" name="lower" value="<?php print ($arg_lower);?>"> <br/>
   Upper bound:
   <input type="text" name="upper"> <br/>
 
   <input type="submit" name="submit"
          value="print table">
   </form>
   
<?php

 } else {

?>

<table border=1>
<tr> <th> Square Root </th>
     <th> Number </th>
     <th> Square </th>
     <th> Cube </th>
</tr>

<?php 
 for ($num=$arg_lower; $num <= $arg_upper; $num++) {
   $root = sqrt($num);
   $square = pow($num, 2);
   $cube = pow($num, 3);

   print ("<tr> <td> $root </td>");
   print ("     <td> $num </td>");
   print ("     <td> $square </td>");
   print ("     <td> $cube </td>");
   print ("</tr>");
 }
?>

<?php
 //end else
 }
?>

</table>


<!-- PRINT TIMESTAMP -->
<hr> <p>
This page was generated on 

<font color="red">
<?php date_default_timezone_set('America/New_York');
	print date("D M j G:i:s T Y"); 
      //see http://www.php.net/manual/en/function.date.php for date() params
?>
</font>

for the CS1520 class.
</p>
</body>
</html>
