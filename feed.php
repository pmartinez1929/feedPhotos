<?php
// GET DATA USER
$access_token = $_POST['access_token'];
$client_id = $_POST['client_id'];

$test_access = 'IGQVJVV2FBNVdnbHR0OGVrVVlDekhqM3VXV0NQOWlLUnZANMkFLajd3SmhPc0UzZA0F1Y1lzU0R1TGFBa0pEVUZAVRFBXRG5lYkpKUTM1S1VLMG9jQllIMUEtZA3MwenR4Rkd0NnJWUG12ckhfVFpWeXNYQW10MkxrdXFtbS1z';
$test_client = '17841411833530225';

$url = 'https://graph.instagram.com/'.$test_client.'?fields=id,media,username&access_token='.$test_access;

$ch = curl_init();      
curl_setopt($ch, CURLOPT_URL, $url);        
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);           
$data = curl_exec($ch); 
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
curl_close($ch);

echo $data;
?>

