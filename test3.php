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
</head>
 


<style>
    .slide_div{
        width:100%;
        position:relative;
    }
    .slide_box {
        width: 100%;
        text-align: center;
        margin-top:50px;
        display:flex;
    }
    .slide_box .btn{
        width:20%;
    }
    .slide_box .center{
        width:70%;
        float:right;
        border:1px solid;
    }
    .slide_div button{
        display:none !important;
    }
</style>


<script>
$(function() {
    $('.center').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
            {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
            },
            {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
            }
        ]
    });
    $('.autoplay').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
});    

function clickPrev(){
    $(".slick-prev").click();
}
function clickNext(){
    $(".slick-next").click();
}

</script>

<body>
    <div class="slide_div">
        <div class="slide_box">
            <div class="btn">
                <input type="button" value="이전" onclick="clickPrev()" />
                <input type="button" value="다음" onclick="clickNext()" />
            </div>
            <div class="center">
                <img src="/img/products/Deck/069/T069-023-.png" />
                <img src="/img/products/Deck/069/T069-096-.png" />
                <img src="/img/products/Deck/069/T069-112-.png" />
                <img src="/img/products/Deck/069/T069-164-.png" />
            </div>
        </div>
    </div>



</body>
</html>
