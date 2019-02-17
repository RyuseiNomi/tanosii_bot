<?php
require_once './push_model.php';

class PushController
{

  public function fetchHttpHeader() {
      $fetched_http_header = PushModel::setHttpHeader();

      return $fetched_http_header;
  }

  public function createPostData() {

      date_default_timezone_set('Asia/Tokyo');
      $current_date = date("d");

      switch($current_date) {
        case "17":
            $message = "北海道旅行まであと2日です。";
            break;
        case "18":
            $message = "北海道旅行まであと1日です。";
            break;
        case "19":
            $message = "北海道旅行1日目から１年が経ちました。以下のドライブを参照して思い出を振り返りましょう。 https://www.amazon.co.jp/clouddrive/share/yWfXfqjY6X3mNGS3mD7QzFL78uuywDNI758ILYVvvpy/folder/sDFaXPM2Q6S7LBk7vp8c5Q?_encoding=UTF8&*Version*=1&*entries*=0&mgh=1";
            break;
        case "20":
            $message = '北海道旅行2日目から１年が経ちました。以下のドライブを参照して思い出を振り返りましょう。 https://www.amazon.co.jp/clouddrive/share/yWfXfqjY6X3mNGS3mD7QzFL78uuywDNI758ILYVvvpy/folder/nWHMLSlqRHiZnFobj5YaiA?_encoding=UTF8&*Version*=1&*entries*=0&mgh=1';
            break;
        case "21": 
            $message = '北海道旅行3日目から１年が経ちました。以下のドライブを参照して思い出を振り返りましょう。 https://www.amazon.co.jp/clouddrive/share/yWfXfqjY6X3mNGS3mD7QzFL78uuywDNI758ILYVvvpy/folder/kaOsCatOSamvHm8FBdSLdQ?_encoding=UTF8&*Version*=1&*entries*=0&mgh=1';
            break;
        case "22":
            $message = '北海道旅行4日目から１年が経ちました。以下のドライブを参照して思い出を振り返りましょう。 https://www.amazon.co.jp/clouddrive/share/yWfXfqjY6X3mNGS3mD7QzFL78uuywDNI758ILYVvvpy/folder/gCiC4z_bQO6B8ocSvSJing?_encoding=UTF8&*Version*=1&*entries*=0&mgh=1';
            break;
        case "23":
            $message = '北海道旅行5日目から１年が経ちました。以下のドライブを参照して思い出を振り返りましょう。 https://www.amazon.co.jp/clouddrive/share/yWfXfqjY6X3mNGS3mD7QzFL78uuywDNI758ILYVvvpy/folder/zwXUaRaXTnqNmQ3CWLS2xw?_encoding=UTF8&*Version*=1&*entries*=0&mgh=1';
            break;
      }
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

  public function execCurl() {

  }

  public function getHttpStatus() {

  }
}
