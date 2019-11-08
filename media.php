<?php
// GET MEDIA DATA
$access_token = $_POST['access_token'];
$media_id = $_POST['media_id'];


$url = 'https://graph.instagram.com/'.$media_id.'?fields=media_type,media_url,permalink,thumbnail_url,timestamp,username&access_token='.$access_token;

$ch = curl_init();      
curl_setopt($ch, CURLOPT_URL, $url);        
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);           
$data = curl_exec($ch); 
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
curl_close($ch);

echo $data;
?>

