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

</head>

<body style="padding-top:5rem">

<!-- ここにページ内容を記述 -->
<div class="container">        <!-- 全体を囲むコンテナ -->

<nav class="navbar navbar-expand navbar-dark" style="background-color:#FFB6C1;>
  <a href="#" class="navbar-brand">Photo Share for Hassy&Mai</a>
</nav>
  <div class="carousel slide carousel-fade" id="c1" data-ride="carousel">    
    <!-- カルーセル内の画像 -->
    <div class="carousel-inner">
    <?php
        $i = 0; 
        foreach (glob('tmp/*') as $file) :
    ?>
      <div class="carousel-item <?php if($i==0){echo 'active';}?>" style="height: 680px;" data-interval="1000">
        <img src="<?php echo $file; ?>" class="mx-auto d-block  mh-100 img-fluid">
      </div>
    <?php
        $i++;
        endforeach; 
    ?>
    </div>
    <a href="#c1" class="carousel-control-prev" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="sr-only">前の画像へ</span>
    </a>
    <a href="#c1" class="carousel-control-next" data-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="sr-only">次の画像へ</span>
    </a>
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
