<?php
function create_account(  $instance_url, $access_token)  { 

$url = "$instance_url/services/data/v20.0/sobjects/Lead/"; 

$content = json_encode(array("First Name" => "Sandeep","Last Name" => "Saini","Company" =>"Gutropolis Solutions"));

$curl = curl_init($url); 

curl_setopt($curl, CURLOPT_HEADER, false); 

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: OAuth $access_token", "Content-type: application/json")); 

curl_setopt($curl, CURLOPT_POST, true); 

curl_setopt($curl, CURLOPT_POSTFIELDS, $content); 

$json_response = curl_exec($curl); 

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE); 

if ( $status != 201 )  { 

    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl)); 

} 

echo "HTTP status $status creating account<br/><br/>"; 

curl_close($curl); 

$response = json_decode($json_response, true); 

$id = $response["id"]; 

echo "New record id $id<br/><br/>";

return $id; 

}