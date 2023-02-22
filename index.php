<?php

$url = 'https://....';// Incoming Webhook のURL
$data = array(
  'text' => 'Hellow Teams'
);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$http_str = curl_exec($ch);
curl_close($ch);
 
echo '送信しました';