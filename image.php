<?php
$url = 'https://....';// Incoming Webhook のURL

$data = <<<TEAMSMESSAGE
{
  "type": "message",
  "attachments": [{
    "contentType": "application/vnd.microsoft.card.adaptive",
    "content": {
      "type": "AdaptiveCard",
      "body": [
        {
          "type": "Image",
          "url": "https://picsum.photos/200/200?image=110",
          "msTeams": {
            "allowExpand": true
          }
        }
      ],
      "\$schema": "http://adaptivecards.io/schemas/adaptive-card.json",
      "version": "1.2"
    }
  }]
}
TEAMSMESSAGE;
 
$data = json_decode($data);// 念のためフォーマットを揃えるためにデコードする

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$http_str = curl_exec($ch);
curl_close($ch);
 
echo '送信しました';