<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
  <title>はっしーまい結婚式</title>
  <style type="text/css">  
    body {
    /* 画像指定、imagesというフォルダ(ＣＳＳと同じ位置に作ったフォルダ)に入っている*/
    background-image: url(image/bgimage.jpg);  
    /* 画像を常に上下左右の中央に配置させる */
    background-position: center center; 
    /* 画像を繰り返し表示しない */
    background-repeat: no-repeat;  
    /* ページなどのコンテンツの高さが画像の高さより大きい時動に固定する */
    background-attachment: fixed; 
    /* 画面、ブラウザのサイズに基づいて、背景画像を調整 */
    background-size: cover;   
    }
  </style>  
</head>

<body class="bg-light" style="padding-top:5rem">
<nav class="navbar navbar-expand navbar-dark fixed-top" style="background-color:#FFB6C1;">
  <a href= "#" class="navbar-brand">Photo Share for Hassy&Mai</a>
</nav>
<div class="full-img"></div>

<!-- ここにページ内容を記述 -->
<div class="container">        <!-- 全体を囲むコンテナ -->

  <div class="carousel slide carousel-fade" id="c1" data-ride="carousel">    
    <!-- カルーセル内の画像 -->
    <div class="carousel-inner">
    <?php
        $i = 0; 
        foreach (glob('tmp/*') as $file) :
    ?>
      <div class="carousel-item <?php if($i==0){echo 'active';}?>" style="height: 730px;" data-interval="1000">
        <img src="<?php echo $file; ?>" class="m-auto d-block  mh-100 img-fluid">
      </div>
    <?php
        $i++;
        endforeach; 
    ?>
    </div>
  </div>
</div>        <!-- 全体を囲むコンテナ -->



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
<script>
function doReloadNoCache() {
 // キャッシュを無視してサーバーからリロード
 window.location.reload(true);
}

window.addEventListener('load', function () {
 setTimeout(doReloadNoCache, 40000);
});
</script>

</body>

</html>
