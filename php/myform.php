<html>
<title>
Quiz 2
</title>

<body>

<h1>Quiz 2</h1>

<?php
 $arg_firsttime = 0;
 import_request_variables("p", "arg_");
 
 if(! $arg_firsttime){
?>
<form action="myform.php" method="post">
  <input type="hidden" 
         name="firsttime"
         value="1">
  airport: <input type="text" 
               name="airport"> <br/>
  year: <input type="text"
                name="year"> <br/>
  month: <input type="text"
                name="month"> <br/>
  day: <input type="text"
                name="day"> <br/>
  <input type="submit" name="submit"
         value="Submit!">
</form>

<?php
} else {
  echo "Airport: $arg_airport <br>";
  echo "Year:    $arg_year <br>";
  echo "Month: $arg_month <br>";
  echo "Day:    $arg_day <br>";

}

?>
</body>
</html>
