<?php
require_once dirname(__FILE__) . '/push_model.php';

class PushController
{
  public function fetchHttpHeader() {
      $fetched_http_header = PushModel::setHttpHeader();

      return $fetched_http_header;
  }

  public function createPostData() {
      $message = PushModel::getArticle();
      $post = PushModel::setMessage($message);

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
}
