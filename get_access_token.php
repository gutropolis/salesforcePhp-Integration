<?php 
const CONSUMER_KEY="3MVG9fe4g9fhX0E4tswKUcniHt780vthf67t6bc9ZOiizap7y9eJZkV_6IgJgJjNXaflPYgVMo39uqlg87jvN";
const CONSUMER_SECRET="81F4A6EC98CC7A66197F8931F509600EBD607D302CF2DB1B215531DF940B6465";
 
const USERNAME=" ";
const USERPASS=" ";
const SECURITY_TOKEN=" ";

$url = urlencode("https://login.salesforce.com/services/oauth2/token?grant_type=password&client_id=".CONSUMER_KEY."&client_secret=".CONSUMER_SECRET."&username=".USERNAME."&password=".USERPASS);


 
$ch = curl_init();

// set URL options

curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_HEADER, 0);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// grab HTML

$data = curl_exec($ch);print_r($data);exit;

$data = json_decode($data, true); 


$code = $data['access_token'];

curl_close($ch);
//https://intellipaat.com/community/2696/creating-leads-in-salesforce-using-rest-api-in-php
?>
