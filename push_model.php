<?php

class PushModel 
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

    public function setMessage($message) {
      $post_json = [
        'to' => 'U3ddcc2097e839cb62592ef78f337f90c',
        'messages' => [
          [
            'type' => 'text',
            'text' => $message,
          ],
        ],
      ];
      $post = json_encode($post_json);
      
      return $post;
    }
    
}
