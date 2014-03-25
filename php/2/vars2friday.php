<html>
<title>
test with form variables
</title>

<body>

<h1> a simple form </h1>

<form action="vars2friday.php" method="post">
  <input type="hidden" 
         name="firsttime"
         value="not">
  Name: <input type="text" 
               name="username"> <br/>
  Email: <input type="text"
                name="email"> <br/>
  <input type="submit" name="submit"
         value="Click Here Now!">
</form>


<?php

echo "<hr>";

import_request_variables("p", "arg_");

if ($arg_firsttime) { 
  echo "Username: $arg_username <br>";
  echo "Email:    $arg_email <br>";

  if ($arg_username == "friday") {
	print "TGIF!!!!";
  }
 
} else {
  echo "This is the first time we 
called the php script";
}

?>

</body>
</html>
