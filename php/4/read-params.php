<html>
<body>

<?php

// FILE: read-params.php
// DESC: reads GET/POST parameters passed to the script and prints them

// combine both options into one array
$form_data = array_merge($_GET, $_POST);

// print all form data
print "<pre>\nFORM DATA:\n";
print_r($form_data);
print "</pre>\n";

?>

</body>
</html>
