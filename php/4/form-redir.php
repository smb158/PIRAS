<html>
<body>

<?php

// FILE: form-redir.php
// DESC: read form data and redirect to destination using cURL

// combine both options into one array
$form_data = array_merge($_GET, $_POST);

// print all form data
print "<pre>\nFORM DATA:\n";
print_r($form_data);
print "</pre>\n<hr>\n";

$form_data['txtStreetName'] = "s bouquet";

// print all form data
print "<pre>\nFORM DATA:\n";
print_r($form_data);
print "</pre>\n<hr>\n";

$opa_url = "http://www2.county.allegheny.pa.us/RealEstate/Search.aspx";

$ch = curl_init($opa_url);

curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_REFERER, $opa_url);

curl_setopt ($ch, CURLOPT_POSTFIELDS, $form_data);

$answer = curl_exec ($ch);

print $answer;

?>

</body>
</html>
