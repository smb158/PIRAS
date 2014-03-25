<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
 $today = 'Wednesday';

 if ($today == 'Wednesday') {
 // this *is* a valid comment
    echo '<p>Hello World from 1520 class on Wednesday</p>'; 
 } else {
    echo '<p>it is not Wednesday!</p>';
 }

 $f1 = 123.456;
 $i1 = 121;

 print ($f1 / 2);
 print "<br/>";

 print ($i1 / 2);
 print "<br/>";

 print (int)($i1 / 2);
 print "<br/>";
 
 print (float)( ($i1+1) / 2);
 print "<hr>";

 print 'one: $i1';
 print "\n"; 
 print "two: $i1\n";

  ?>
</body>
</html>
