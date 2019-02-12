<?php

class PushController
{
  
  public function setHttpHeader() {
      // HTTPヘッダを設定
      $channelToken = '1RAnZkrV9St/06xFIcSuP1IFtEBw7wNyPe5asDD2emN1ZP/LHbFZV09nfVmRg2D+6CbEb1frOhSg1p2NBpWn9PXbb7sIAY9J2cc9GhIqDuSu3pWyNHg+gsbbQsgvUFvZ6u3yfpo4qj6XBqXjTBwtBAdB04t89/1O/w1cDnyilFU=';
      $headers = [
        'Authorization: Bearer ' . $channelToken,
        'Content-Type: application/json; charset=utf-8',
      ];

      return $headers;
  }

  public function createPostData() {
      // POSTデータを設定してJSONにエンコード
      $post = [
        'to' => 'U3ddcc2097e839cb62592ef78f337f90c',
        'messages' => [
          [
            'type' => 'text',
            'text' => '元気ですか',
          ],
        ],
      ];
      $post = json_encode($post);
      return $post;
  }

  public function setCurlOption($headers, $post) {
    $options = [
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_HTTPHEADER => $headers,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_BINARYTRANSFER => true,
      CURLOPT_HEADER => true,
      CURLOPT_POSTFIELDS => $post,
    ];

    return $options;
  }

  public function execCurl() {
    
  }

  public function getHttpStatus() {
    
  }
}
