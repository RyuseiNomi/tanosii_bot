<?php
require_once './push_controller.php';


$http_header = PushController::setHttpHeader();

$post = PushController::createPostData();

// HTTPリクエストを設定
$ch = curl_init('https://api.line.me/v2/bot/message/push');

$options = PushController::setCurlOption($http_header, $post);

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
