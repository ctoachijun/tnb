<?php
include "../lib/tnb.php";
$currento = preg_replace("/\/eng\//","",$SCRIPT_NAME);
$current = preg_replace("/\.php$/","",$currento);

$b1 = $b2 = $b3 = $b4 = $b5 = "";

if($current == "ceo"){
  $b2 = $i1 = "active";
}else if($current == "history"){
  $b2 = $i2 = "active";
}else if($current == "directions"){
  $b2 = $i3 = "active";
}else if($current == "patent"){
  $b3 = "active";
}else if($current == "product" || $current == "product_view"){
  $b4 = "active";
}else if($current == "process"){
  $b5 = "active";
}else{
  $b1 = "active";
}


?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>T&B Wood</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/tnb_en.css">
    <link href="/img/favicon.png" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Brush+Script&family=PT+Serif&display=swap" rel="stylesheet">

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/tnb.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



</head>
<body>
  
  <div id="wrap">
    <input type="hidden" name="curr" value="<?=$currento?>" />
    <div class="inner">
      <h1 class="logo"><a href="./"><img src="../img/logo.png" alt="logo"></a></h1>
      <div class="gnb">
        <ul class="dep1">
          <li><a href="./" class="<?=$b1?>">HOME</a></li>
          <li class="co"><a href="#" class="<?=$b2?>">Company</a>
            <ul class="dep2">
              <li><a href="ceo.php" class="<?=$i1?>">Greeting</a></li>
              <li><a href="history.php" class="<?=$i2?>">History</a></li>
              <li><a href="directions.php" class="<?=$i3?>">Contact</a></li>
            </ul><!-- dep2 -->
          </li>
          <li><a href="patent.php" class="<?=$b3?>">Certificate</a></li>
          <li><a href="product.php" class="<?=$b4?>">Products</a></li>
          <li><a href="process.php" class="<?=$b5?>">Process</a></li>
        </ul><!-- dep1 -->
      </div><!-- gnb -->
      <div class="lang">
        <ul>
          <li><a onclick="chgLang(1)">KOR</a></li>
          <li>|</li>
          <li><a class="active">ENG</a></li>
        </ul>
      </div><!-- lang -->
    </div><!-- inner -->
  </div><!-- wrap -->
