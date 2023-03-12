<? include "./inc/header.php" ?>

<script>
  AOS.init();


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
        })
    })

    bannerInit();

    function bannerInit(){

        setInterval(function(){
            if($(".pro-ani").css("width") == "98px"){
                if(cnt == 5) cnt = 1;
                bannerChange(cnt);
                cnt++;
                
            }
        },500);
    }    

    $(".inn_pause").hover(function(){
        $(".ggbar").css("animation-play-state","paused");
    },function(){
        $(".ggbar").css("animation-play-state","");
    })
});    

function clickPrev(){
    $(".slick-prev").click();
}
function clickNext(){
    $(".slick-next").click();
}
</script>


<div class="mwrap">
  <div class="mwrap_in">
    <div class="mtop">
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
                    <div class="contxt">티앤비우드는 더 우수한 <br>기술개발로 폐자원을 조금이라도 <br>더 많이 재활용 할 수 있도록 <br>노력하는 회사로 발전 해 나가고 <br>있습니다.</div>
                </div>
            </div><!-- left_inner -->
        </div><!-- left -->
        <div class="right">
            <div class="mimg_div">
                <img src="/img/main01.jpg" />
                <img src="/img/main02.jpg" />
                <img src="/img/main03.jpg" />
                <img src="/img/main04.jpg" />
            </div>
        </div><!-- right -->
    </div>
    <div class="mcont1">
      <div class="mct1_in">
        <div class="mct1">
          <h2>친환경 생소재 & 판재 몰딩 전문 생산</h2>
          <p>티앤비 우드가 함께 하겠습니다<br><br>더 좋은 품질  |  더 좋은 환경  | 더 좋은 생활 </p>
        </div><!-- mct1 -->
      </div><!-- mct1_in -->
        <div class="mci1"></div><!-- mct1 -->
    </div><!-- mcont1 -->
    <div class="mcont2">
      <div class="mct2_in">
        <div class="mct2">
          <h4>티앤비우드</h4>
          <ul>
            <li>맞춤 제작 | 친환경 소재 | 균일한 품질 </li>
            <li>환경을 생각하는<br> 친환경 생소재 판재, 몰딩 전문 생산재 업체</li>
            <li>자원빈국, 에너지빈국인 대한민국에서 폐자원을 이용하여<br>
                욕실용 수납장, 하부장등을 제작하는데 필요한 원자재 PS <br>판재 및 액자, 거울테용 몰딩을 생산하고
                있습니다.
            </li>
          </ul>
        </div><!-- mct2 -->
        <div class="mci2">
          <div class="si1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500" ><div></div></div><!-- si1 -->
          <div class="si2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300"><div></div></div><!-- si2 -->
          <div class="si3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="600"><div></div></div><!-- si3 -->
        </div><!-- mci2 -->
      </div><!-- mct2_in -->
    </div><!-- mcont2 -->
    <div class="mcont3">
      <div class="slide_div">
          <div class="slide_box">
              <div class="sb_in">
                <div class="btn">
                    <input type="button" class="sbtn_l" onclick="clickPrev()" />
                    <input type="button" class="sbtn_r" onclick="clickNext()" />
                </div>
                <div class="mct3">
                  <h4>Varies life style</h4>
                  <p>
                      벽과 천정, 바닥 등이 만나는 부분의 마감을 보기  좋고
                      깔끔하게 하기 위해 사용하는 몰딩은
                      공간의 성격에 따라 다양하게 선택할 수 있습니다.
                  </p>
                  <div class="m3_btn">
                    <a href="http://tnbwood.com/product.php">
                      <img src="/img/m3_btn.png" alt="버튼"></a>
                  </div><!-- m3_btn -->
                </div><!-- mct3 -->
              </div><!-- sb_in -->
              <div class="center">
                  <img src="/img/products/Deck/069/T069-023-.png" />
                  <img src="/img/products/Deck/069/T069-096-.png" />
                  <img src="/img/products/Deck/069/T069-112-.png" />
                  <img src="/img/products/Deck/069/T069-164-.png" />
                  <img src="/img/products/Deck/069/T069-GOLD-.png" />
                  <img src="/img/products/Deck/069/T069-SILVER-.png" />
              </div>
          </div>
      </div>
    </div><!-- mcont3 -->
    <div class="mcont4">
      <div class="mct4_in">
        <div class="mct4">
          <h4>T&B WOOD STYLE</h4>
          <p>친환경 생소재 및 판재· 몰딩으로 고객의 니즈에 맞추어 드릴 수 있는 기술을 보유하고 있습니다 </p>
        </div><!-- mct4 -->
        <div class="mct4_box">
          <div class="mcb1" onclick="movePage(1);">
            <ul>
              <li>PRODUCTS</li>
              <li>제품소개</li>
              <li>독자적기술을 바탕으로 제품 제작</li>
              <li>VIEW MORE</li>
            </ul>
          </div><!-- mcb1 -->
          <div class="mcb2" onclick="movePage(2);">
          <ul>
              <li>FACILITY</li>
              <li>제조공정</li>
              <li>제품 생산에 모든 제조 과정</li>
              <li>VIEW MORE</li>
            </ul>
          </div><!-- mcb2 -->
        </div><!-- mct4_box -->
      </div><!-- mct4_in -->
    </div><!-- mcont4 -->
    <div class="mcont5" onclick="movePage(3);">
      <div class="mcb3">
        <div class="mct5">
          <h4>T&B WOOD HISTORY</h4>
          <p>고객이 만족하는 최고의 품질로 행복한 생활공간 창조를 선도하는 기업이 되겠습니다<br><br>
            <span>view more</span>
          </p>
        </div><!-- mct5 -->
      </div><!-- mcb3 -->
    </div><!-- mcont5 -->
  </div><!-- mwrap_in -->
</div><!-- mwrap -->








<? include "./inc/footer.html" ?>
