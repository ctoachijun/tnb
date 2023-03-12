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

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>


<script>
$(document).ready(function(){
  let cnt = 2;

  $('.mimg_div').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  });

  $(".innbtn").each(function(idx){
    $(this).click(function(){
      let tidx = $(this).index();

      if(tidx == 0){
        bannerChange(1);
      }else if(tidx == 2){
        bannerChange(2);
      }else if(tidx == 4){
        bannerChange(3);
      }else if(tidx == 6){
        bannerChange(4);
      }



    //   if(tidx == 0){
    //     $("#slick-slide-control00").click();
    //     $(".inbar1").show();
    //     $(".gage1").addClass('pro-ani');

    //   }else if(tidx == 2){
    //     $("#slick-slide-control01").click();
    //     $(".inbar2").css("display","flex");
    //     $(".inbar2").show();
    //     $(".gage2").addClass('pro-ani');

    //   }else if(tidx == 4){
    //     $("#slick-slide-control02").click();
    //     $(".inbar3").css("display","flex");
    //     $(".inbar3").show();
    //     $(".gage3").addClass('pro-ani');

    //   }else if(tidx == 6){
    //     $("#slick-slide-control03").click();
    //     $(".inbar4").css("display","flex");
    //     $(".inbar4").show();
    //     $(".gage4").addClass('pro-ani');

    //    }

    })
  })
  bannerInit();

  function bannerInit(){
    setInterval(function(){
        if(cnt == 5) cnt = 1;
        bannerChange(cnt);
        cnt++;
  },4500);
}



})


function bannerChange(tidx){

    $(".proBar").hide();
    $(".ggbar").removeClass('pro-ani');

    if(tidx == 1){
    $("#slick-slide-control00").click();
    $(".inbar1").show();
    $(".gage1").addClass('pro-ani');

    $(".title").html("<h1>환경</h1><h3>을 생각하는 원재료</h3>");
    $(".contxt").html("티앤비우드는 더 우수한 기술개발로 폐자원을 조금이라도 더 많이 재활용 할 수 있도록 노력하는 회사로 발전 해 나가고 있습니다.");

    }else if(tidx == 2){
    $("#slick-slide-control01").click();
    $(".inbar2").css("display","flex");
    $(".inbar2").show();
    $(".gage2").addClass('pro-ani');

    $(".title").html("<h1>맞춤제작</h1><h3>으로 고객니즈 충족</h3>");
    $(".contxt").html("다양한 색상의 자재와 디자인을 보유, 고객의 니즈에 맞추어 드릴 수 있는 기술을 보유하고 있습니다. ");

    }else if(tidx == 3){
    $("#slick-slide-control02").click();
    $(".inbar3").css("display","flex");
    $(".inbar3").show();
    $(".gage3").addClass('pro-ani');

    $(".title").html("<h1>일관성</h1><h3> 있는 완제품</h3>");
    $(".contxt").html("압출, 전사, 절단 등 고객이 제공하는 디자인을 구현하는데 필요한 대부분의 공정을 1005 자동화하여 일관성있는 품질을 제공합니다. ");

    }else if(tidx == 4){
    $("#slick-slide-control03").click();
    $(".inbar4").css("display","flex");
    $(".inbar4").show();
    $(".gage4").addClass('pro-ani');

    $(".title").html("<h1>품질 검수</h1><h3> 및 테스트</h3>");
    $(".contxt").html("고객사의 일부 조립공정을 그대로 재현하여 고객사의 생산라인에서 발생 할 수 있는 불량을 최소화 할 수 있도록 노력하고 있습니다.");

    }
}


</script>

<body>


<style>
  #cont{width:100%;height:auto;}
  .top_box{width:100%;height:600px;display:flex;justify-content:flex-end;background-color:#B89667}
  .top_box .left{width:25%;}
  .top_box .left .left_inner{height:100%;display:flex; flex-direction:column;justify-content:center;padding-left:8rem;}
  .top_box .left .left_inner .inner_btn{width:100%;display:flex;align-items:center;height:14%;}
  .top_box .left .left_inner .inner_btn .innbtn{cursor:pointer;font-weight:700;margin:0 8px;font-size:1.1rem;}
  .top_box .left .left_inner .inner_txt{width:300px;}
  .top_box .left .left_inner .inner_txt .title{display:flex;font-weight:700;align-items:baseline;height:50px;}
  .top_box .left .left_inner .inner_txt .title h1{font-size:1.7rem;}
  .top_box .left .left_inner .inner_txt .title h3{font-size:1.2rem;margin-left:2px;}
  .top_box .left .left_inner .inner_txt .contxt{width:80%;color:#fff;font-weight:400;font-size:0.95rem;}
  .top_box .right{width:65%;}
  .top_box .right .mimg_div{width:100%;height:100%;}
  .top_box .right .mimg_div .slick-arrow{display:none !important;}
  .top_box .right .mimg_div .slick-track{height:600px;}

.proBar{
    width:100px;
    height:10px;
    margin:0 5px;
    display:flex;
    align-items:center;
}
.gage1,.gage2,.gage3,.gage4{
  border:1px solid #fff;
}
.inbar2,.inbar3,.inbar4{
  display:none;
}
.slick-dots{
    display:none !important;
}
.pro-ani{
    animation: proBar 5s 1;
    width:100%;
    background-color:#FFF;
  }

  @keyframes proBar{
    0%{width:0;}
    100%{width:100px;}
  }
 .slider-box:hover .pro-bar{
     animation-play-state: paused;
  }
  /* opacity: 0;
  transition: opacity 500ms linear 0s; */

</style>

<div id="cont">
    <div class="top_box">
        <div class="left">
          <div class="left_inner">
            <div class="inner_btn">
              <div class="inn_1 innbtn">1</div>
              <div class="inbar1 proBar"><div class="gage1 ggbar pro-ani"></div></div>
              <div class="inn_2 innbtn">2</div>
              <div class="inbar2 proBar"><div class="gage2 ggbar"></div></div>
              <div class="inn_3 innbtn">3</div>
              <div class="inbar3 proBar"><div class="gage3 ggbar"></div></div>
              <div class="inn_4 innbtn">4</div>
              <div class="inbar4 proBar"><div class="gage4 ggbar"></div></div>
              <div class="inn_pause"><img src="/img/pause.png" /></div>

            </div>
            <div class="inner_txt">
                <div class="title"><h1>환경</h1><h3>을 생각하는 원재료</h3></div>
                <div class="contxt">티앤비우드는 더 우수한 기술개발로 폐자원을 조금이라도 더 많이 재활용 할 수 있도록 노력하는 회사로 발전 해 나가고 있습니다.</div>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="mimg_div">
            <img src="/img/main01.jpg" />
            <img src="/img/main02.jpg" />
            <img src="/img/main03.jpg" />
            <img src="/img/main04.jpg" />
          </div>
        </div>
    </div>
</div>



</body>
</html>
