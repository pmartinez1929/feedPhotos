<?php
// GET ACCESS TOKEN
$app_id = $_POST['app_id'];
$app_secret = $_POST['app_secret'];
$app_code = $_POST['code'];

$redirect_uri = 'https://www.lacomunidadpetrolera.com/feed_photos/';
$id_test = '3044857445528935';
$secret_test = '670af3723f8f8db90d72c385dbde1290';
$code_test = 'AQAgn1bb3IdRAHuZeLe2wG_krbyzvyP4FLc0W__cfTNOoIpjC0K98HUc93reYhWjnOWm4v7fJ4sq7rNlSbJOZbfSu5LrPpQa1jvqT4Lhjfw7QJ-1ZAtxk6oUf8aCpUlHWbTp_UDDoEmxhUDBSVYTP2qB16IMRmeM2RrKjQ1vm4QHfNpMPbPfo4hkn1Wh4cdW1kekxeKA4BmHxV1TjQB9SAUMZUhy-nf3NHN5pi5GeeQvPw';

$url = 'https://api.instagram.com/oauth/access_token';

$curlPost = 'app_id='. $id_test . '&redirect_uri=' . $redirect_uri . '&app_secret=' . $secret_test . '&code='. $app_code . '&grant_type=authorization_code';
$ch = curl_init();      
curl_setopt($ch, CURLOPT_URL, $url);        
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);      
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);            
$data = curl_exec($ch); 
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
curl_close($ch);

$info = json_decode($data,true);

$user_id = $info["user_id"];
$access_token = $info["access_token"];

$url_user = 'https://graph.instagram.com/'.$user_id.'?fields=id,media,username&access_token='.$access_token;

$ch_user = curl_init();      
curl_setopt($ch_user, CURLOPT_URL, $url_user);        
curl_setopt($ch_user, CURLOPT_RETURNTRANSFER, 1);           
$data_user = curl_exec($ch_user); 
$http_code = curl_getinfo($ch_user, CURLINFO_HTTP_CODE); 
curl_close($ch_user);


echo  json_encode(array($access_token, $data_user));

?>

