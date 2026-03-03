<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.car.info/en-se/license-plate/S/AAA005");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);


echo $server_output;


?>
