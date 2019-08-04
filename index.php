<?php
//Composerでインストールしたライブラリの一括読み込み
require_once __DIR__ . '/vendor/autoload.php';

//アクセストークンを使用したCurlHTTPClienをインスタンス化
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('CHANNEL_ACCESS_TOKEN'));

//CurlHTTPClienとシークレットキーでLineBotをインスタンス化
$bot = new \LINE\LINEBot($httpClient,['channelSecret' => getenv('CHANNEL_SECRET')]);

//LINE APIがリクエストに付与した署名を取得
$signature = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];

//署名が正当かチェックし問題なければリクエストをパースして配列格納
$events = $bot->parseEventRequest(file_get_contents('php://input'),$signature);

//配列に格納された各イベントをループで取得
foreach($events as $event) {
    //画像メッセージであれば画像をサーバーに保存
    if($event instanceof \LINE\LINEBot\Event\MessageEvent\ImageMEssage){
        //イベントのコンテンツを取得
        $content = $bot->getMessageContent($event->getMessageID());
        //コンテンツヘッダーを取得
        $headers = $content->getHeaders();
        error_log(var_export($headers,true));
        //画像保存先フォルダーパス
        $directory_path = 'tmp';
        //ファイル名
        $filename = uniqid();
        //コンテンツの種類を取得
        $extension = explode('/', $headers['Content-Type'])[1];
        //保存先フォルダーがなければ作成する
        if(!file_exists($directory_path)){
            //ディレクトリ作成
            if(mkdir($directory_path,0777,true)){
                chmod($directory_path,0777);
            }
        }
        //保存先ディレクトリに画像を保存
        file_put_contents($directory_path . '/' . $filename . '.' . $extension, $content->getRawBody());

        //保存したファイルのURLを返信
        replyTextMessage($bot, $event->getReplyToken(), 'http://' . $_SERVER['HTTP_HOST'] . '/' . $directory_path. '/' . $filename . '.' . $extension);

    }
    else{
        $bot->replyText($event->getReplyToken(),'画像の送信をお願いします');
    }
    
}
//テキスト返信用メソッド
function replyTextMessage($bot, $replyToken, $text){
    //返信とレスポンスを取得
    $response = $bot->replyMessage($replyToken, new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text));
    //レスポンスが異常な場合
    if(!$response->isSucceeded()){
        error_log('Failed!' . $response->getHTTPStatus . ' ' . $response->getRawBody());
    }

}

?>