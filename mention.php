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
          "type": "TextBlock",
          "size": "Medium",
          "weight": "Bolder",
          "text": "メンションを送信できるかのテストです"
        },
        {
          "type": "TextBlock",
          "text": "こんにちは <at>カバノキ</at>, <at>カバノキ2</at>"
        }
     ],
     "\$schema": "http://adaptivecards.io/schemas/adaptive-card.json",
     "version": "1.2",
     "msteams": {
       "entities": [
         {
           "type": "mention",
           "text": "<at>カバノキ</at>",
           "mentioned": {
             "id": "kabanoki@kabanoki.onmicrosoft.com",
             "name": "カバノキ"
           }
         },
         {
           "type": "mention",
           "text": "<at>カバノキ2</at>",
           "mentioned": {
             "id": "kabanoki2@kabanoki.onmicrosoft.com",
             "name": "カバノキ2"
           }
         }
       ]
     }
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