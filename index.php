<?php
//Composerでインストールしたライブラリの一括読み込み
require_once __DIR__ . '/vendor/autoload.php';

//アクセストークンを使用したCurlHTTPClienをインスタンス化
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('CHANNEL_ACCESS_TOKEN'));

//CurlHTTPClienとシークレットキーでLineBotをインスタンス化
$bot = new \LINE\LineBot($httpClient,['channelSecret' => getenv('CHANNEL_SECRET')]);

//LINE APIがリクエストに付与した署名を取得
$signature = $_SERVER['HTTP_' . \LINE\LineBot\Constant\HTTPHeader::LINE_SIGNATURE];

//署名が正当かチェックし問題なければリクエストをパースして配列格納
$events = $bot->parseEventRequest(file_get_contents('php://input'),$signature);

//配列に格納された各イベントをループで取得
foreach($events as $event) {
    $bot->replyText($event->getReplyToken(),'テスト返信');
}


?>