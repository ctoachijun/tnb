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
 


<style>

    /* 노말라이즈 */
    body, ul, li, h1 {
        margin:0;
        padding:0;
        list-style:none;
    }

    a {
        color:inherit;
        text-decoration:none;
    }

    /* 라이브러리 */
    .con {
        margin:0 auto;
    }

    .img-box > img {
        width:100%;
        display:block;
    }

    .row::after {
        content:"";
        display:block;
        clear:both;
    }

    .cell {
        float:left;
        box-sizing:border-box;
    }

    .cell-right {
        float:right;
        box-sizing:border-box;
    }

    .margin-0-auto {
        margin:0 auto;
    }

    .block {
        display:block;
    }

    .inline-block {
        display:inline-block;
    }

    .text-align-center {
        text-align:center;
    }

    .line-height-0-ch-only {
        line-height:0;
    }

    .line-height-0-ch-only > * {
        line-height:normal;
    }

    .relative {
        position:relative;
    }

    .absolute-left {
        position:absolute;
        left:0;
    }

    .absolute-right {
        position:absolute;
        right:0;
    }

    .absolute-middle {
        position:absolute;
        top:50%;
        transform:translateY(-50%);
    }

    .absolute-bottom {
        position:absolute;
        bottom:0;
    }

    .width-100p {
        width:100%;
    }

    .table {
        display:table;
    }

    .table-cell {
        display:table-cell;
    }

    .vertical-align-top {
        vertical-align:top;
    }

    .vertical-align-middle {
        vertical-align:middle;
    }

    .vertical-align-bottom {
        vertical-align:bottom;
    }

    .con {
        max-width:1150px;
    }

    .slider-1 {
        height:100vh;
        position:relative;
    }

    .slider-1 > .slides > div {
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        overflow:hidden;
        transition:opacity 1s;
        opacity:0;
    }

    .slider-1 > .slides > div.active {
        opacity:1;
    }

    .slider-1 > .slides > div > div {
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background-size:cover;
        background-position:center;
        transform:scale(1.5);
    }

    .slider-1 > .slides > div.active > div {
        transform:scale(1);
        transition: transform 3s;
    }

    .slider-1 .nav-bar {
        height:100%;
        position:relative;
        z-index:1;
    }

    .slider-1[data-slider-1-autoplay-status="Y"] .btn-play {
        display:none;
    }

    .slider-1[data-slider-1-autoplay-status="N"] .btn-stop {
        display:none;
    }

    .slider-1 > .nav-bar > .row {
        width:100%;
    }

    .slider-1 > .nav-bar > .row > .cell:first-child {
        width:calc(100% - 50px);
    }

    .slider-1 > .nav-bar > .row > .cell:first-child > .progress-bar {
        border:2px solid red;
        height:10px;
    }

    .slider-1 > .nav-bar > .row > .cell:first-child > .progress-bar > div {
        height:100%;
        width:0;
        background-color:red;
    }

    .slider-1 > .nav-bar > .row > .cell:last-child {
        width:50px;
        text-align:center;
    }
</style>

<script>

    var windowFocusHere = true;

    // 다른 탭으로 이동했을 때
    $(window).on("blur", function() {
        windowFocusHere = false;
    });

    // 다시 해당 윈도우(브라우저로 돌아왔을 때)
    $(window).on("focus", function() {
        windowFocusHere = true;
    });


    function Slider1__init() {
        $('.slider-1 .btn-stop').click(function() {
            alert("그만");
            var $slider = $(this).closest('.slider-1');
            $slider.attr('data-slider-1-autoplay-status', 'N');
        });
        
        $('.slider-1 .btn-play').click(function() {
            var $slider = $(this).closest('.slider-1');
            $slider.attr('data-slider-1-autoplay-status', 'Y');
        });
        
        Slider1__update();
    }

    var Slider1__updateLastTimestamp = 0;

    function Slider1__moveNext($slider) {
        var $current = $slider.find('> .slides > .active');
        var $post = $current.next();
        
        if ( $post.length == 0 ) {
            $post = $slider.find('> .slides > :first-child');
        }
        
        $current.removeClass('active');
        $post.addClass('active');
    }

    function Slider1__update(timestamp) {
        if ( !timestamp ) {
            timestamp = 0;
        }
        
        var delta = timestamp - Slider1__updateLastTimestamp;
        
        $('.slider-1').each(function(index, node) {
            var $slider = $(this);
            
            var $progressBarGage = $slider.find(' > .nav-bar .progress-bar > div');
            
            var autoplayTimeout = parseInt($slider.attr('data-slider-1-autoplay-timeout'));
            var autoplayCurrent = parseInt($slider.attr('data-slider-1-autoplay-current'));
            var autoplayStatus = $slider.attr('data-slider-1-autoplay-status') !== 'N';
            
            if ( autoplayStatus && windowFocusHere ) {
                autoplayCurrent += delta;
            
                if ( autoplayCurrent > autoplayTimeout ) {
                    Slider1__moveNext($slider);
                    
                    autoplayCurrent = 0;
                }
                
                var percent = autoplayCurrent / autoplayTimeout * 100;
                
                $progressBarGage.css('width', percent + '%');

                $slider.attr('data-slider-1-autoplay-current', autoplayCurrent)
            }
        });
        
        Slider1__updateLastTimestamp = timestamp;
        
        requestAnimationFrame(Slider1__update);
    }

    Slider1__init();

</script>

<div class="slider-1" data-slider-1-autoplay-timeout="3000" data-slider-1-autoplay-current="0" data-slider-1-autoplay-status="Y">
    <div class="slides">
        <div class="active">
            <div style="background-image:url(https://placekitten.com/1980/1200);"></div>
        </div>
        <div>
            <div style="background-image:url(https://placekitten.com/1980/1201);"></div>
        </div>
        <div>
            <div style="background-image:url(https://placekitten.com/1980/1202);"></div>
        </div>
    </div>
    
    <div class="nav-bar row con relative">
        <div class="row absolute-bottom absolute-left">
            <div class="cell">
                <div class="progress-bar">
                    <div></div>
                </div>
            </div>
            <div class="cell">
                <button class="btn-play">플레이</button>
                <button class="btn-stop">정지</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="slider-1" data-slider-1-autoplay-timeout="3000" data-slider-1-autoplay-current="0" data-slider-1-autoplay-status="Y">
    <div class="slides">
        <div class="active">
            <div style="background-image:url(https://placekitten.com/1980/1200);"></div>
        </div>
        <div>
            <div style="background-image:url(https://placekitten.com/1980/1201);"></div>
        </div>
        <div>
            <div style="background-image:url(https://placekitten.com/1980/1202);"></div>
        </div>
    </div>
    
    <div class="nav-bar row con relative">
        <div class="row absolute-bottom absolute-left">
            <div class="cell">
                <div class="progress-bar">
                    <div></div>
                </div>
            </div>
            <div class="cell">
                <div class="btn-play">플레이</div>
                <div class="btn-stop">정지</div>
            </div>
        </div>
    </div>
</div> -->

</body>
</html>
