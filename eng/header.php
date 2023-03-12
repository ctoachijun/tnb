<?php
include "./lib/tnb.php";
$currento = preg_replace("/\//","",$SCRIPT_NAME);
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
    <title>티엔비우드</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/tnb.css">
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/tnb.js"></script>
</head>
<body>
  
  <div id="wrap">
    <input type="hidden" name="curr" value="<?=$currento?>" />
    <div class="inner">
      <h1 class="logo"><a href="#"><img src="../img/logo.png" alt="로고"></a></h1>
      <div class="gnb">
        <ul class="dep1">
          <li><a href="./" class="<?=$b1?>">HOME</a></li>
          <li class="co"><a href="#" class="<?=$b2?>">회사소개</a>
            <ul class="dep2">
              <li><a href="ceo.php" class="<?=$i1?>">대표인사말</a></li>
              <li><a href="history.php" class="<?=$i2?>">연혁</a></li>
              <li><a href="directions.php" class="<?=$i3?>">오시는길</a></li>
            </ul><!-- dep2 -->
          </li>
          <li><a href="patent.php" class="<?=$b3?>">특허·인증</a></li>
          <li><a href="product.php" class="<?=$b4?>">제품소개</a></li>
          <li><a href="process.php" class="<?=$b5?>">제조공정</a></li>
        </ul><!-- dep1 -->
      </div><!-- gnb -->
      <div class="lang">
        <ul>
          <li><a class="active">KOR</a></li>
          <li>|</li>
          <li><a onclick="chgLang(2)">ENG</a></li>
        </ul>
      </div><!-- lang -->
    </div><!-- inner -->
  </div><!-- wrap -->