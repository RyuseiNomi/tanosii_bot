<?php

// HTTPヘッダを設定
$channelToken = '1RAnZkrV9St/06xFIcSuP1IFtEBw7wNyPe5asDD2emN1ZP/LHbFZV09nfVmRg2D+6CbEb1frOhSg1p2NBpWn9PXbb7sIAY9J2cc9GhIqDuSu3pWyNHg+gsbbQsgvUFvZ6u3yfpo4qj6XBqXjTBwtBAdB04t89/1O/w1cDnyilFU=';
$headers = [
  'Authorization: Bearer ' . $channelToken,
  'Content-Type: application/json; charset=utf-8',
];

// POSTデータを設定してJSONにエンコード
$post = [
  'to' => 'U3ddcc2097e839cb62592ef78f337f90c',
  'messages' => [
    [
      'type' => 'text',
      'text' => 'hello world',
    ],
  ],
];
$post = json_encode($post);

// HTTPリクエストを設定
$ch = curl_init('https://api.line.me/v2/bot/message/push');
$options = [
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => $headers,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_BINARYTRANSFER => true,
  CURLOPT_HEADER => true,
  CURLOPT_POSTFIELDS => $post,
];
curl_setopt_array($ch, $options);

// 実行
$result = curl_exec($ch);

// エラーチェック
$errno = curl_errno($ch);
if ($errno) {
  return;
}

// HTTPステータスを取得
$info = curl_getinfo($ch);
$httpStatus = $info['http_code'];

$responseHeaderSize = $info['header_size'];
$body = substr($result, $responseHeaderSize);

// 200 だったら OK
echo $httpStatus . ' ' . $body;
