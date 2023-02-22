<?php
$url = 'https://....';// Incoming Webhook のURL

$data = <<<TEAMSMESSAGE
{
  "type": "message",
  "attachments": [{
    "contentType": "application/vnd.microsoft.card.adaptive",
    "content": {
      "\$schema": "https://adaptivecards.io/schemas/adaptive-card.json",
      "type": "AdaptiveCard",
      "version": "1.0",
      "body": [
        {
          "type": "TextBlock",
          "text": "これは **太文字** です"
        },
        {
          "type": "TextBlock",
          "text": "これは _イタリック_ です"
        },
        {
          "type": "TextBlock",
          "text": "- すいか \\r- メロン \\r",
          "wrap": true
        },
        {
          "type": "TextBlock",
          "text": "1. Macbook\\r2. Mac Mini\\r",
          "wrap": true
        },
        {
          "type": "TextBlock",
          "text": "リンクの設定 → [Adaptive Cards](https://adaptivecards.io)"
        }
      ]
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