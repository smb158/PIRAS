<?php

$ch = curl_init();
$fp = fopen("example_homepage.txt", "w");

curl_setopt($ch, CURLOPT_URL, "http://www.cs.pitt.edu/");
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);
?>

