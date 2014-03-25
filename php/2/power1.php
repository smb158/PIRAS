<!-- skel.php: Skeleton PHP script -->
<html>
<head> <title> Power1 </title> </head>
<body>

<table border=1>
<tr> <th> Square Root </th>
     <th> Number </th>
     <th> Square </th>
     <th> Cube </th>
</tr>

<?php 
 for ($num=1; $num <= 10; $num++) {
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
