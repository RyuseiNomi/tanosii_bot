<?php
require_once dirname(__FILE__) . "/../phpQuery-onefile.php";

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

    public function getArticle(){
        $date = date("Y-m-d");
        $latest_articles = array();
        $doc = phpQuery::newDocumentFile("http://blog.livedoor.jp/itsoku/");

        foreach($doc->find("article") as $article){
            $latest_article["title"] = pq($article)->find("h1")->text();
            $latest_article["link"] = pq($article)->find("h1")->find("a")->attr("href");

            $article_date = pq($article)->find("header")->find("p")->find("time")->attr("datetime");

            if(strpos($article_date, $date) !== false) {
                $latest_articles = array_merge($latest_articles, array($latest_article));
            }
        }

        return $latest_articles;
    }

    public function setMessage($message) {
        $stringized_message = '';

        //取得した記事のタイトルとリンクを文字列化
        foreach($message as $key => $value){
            $article = $value["title"] . "\n" . $value["link"];
            $stringized_message = $stringized_message . $article . "\n" . "\n";
        }

        $post_json = [
            'to' => 'U3ddcc2097e839cb62592ef78f337f90c',
            'messages' => [
                [
                    'type' => 'text',
                    'text' => '【本日うpされた記事です】' . "\n\n" . $stringized_message,
                ],
            ],
        ];
        $post = json_encode($post_json);
        
        return $post;
    }
    
}
