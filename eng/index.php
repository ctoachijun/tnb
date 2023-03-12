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
                bannerChange_en(1);
            }else if(tidx == 2){
                bannerChange_en(2);
            }else if(tidx == 4){
                bannerChange_en(3);
            }else if(tidx == 6){
                bannerChange_en(4);
            }
        })
    })

    bannerInit();

    function bannerInit(){

        setInterval(function(){
            if($(".pro-ani").css("width") == "98px"){
                if(cnt == 5) cnt = 1;
                bannerChange_en(cnt);
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
                    <div class="title"><h1>Environment</h1><h3>raw material for thinking about</h3></div>
                    <div class="contxt">T&Bwood is developing into a company that strives to recycle even a little more waste resources with better technology development</div>
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
    <div class="mcont1">
      <div class="mct1_in">
        <div class="mct1">
          <h2>Specialized production of eco-friendly raw materials & plate molding</h2>
          <p>T&B Wood will join us.<br><span>better quality  |  a better environment  | a better life</span> </p>
        </div><!-- mct1 -->
      </div><!-- mct1_in -->
        <div class="mci1"></div><!-- mct1 -->
    </div><!-- mcont1 -->
    <div class="mcont2">
      <div class="mct2_in">
        <div class="mct2">
          <h4>T&B WOOD</h4>
          <ul>
            <li> Custom | Green Materials | Uniform Quality </li>
            <li>Environmentally conscious <br> Eco-friendly raw material plate, molding specialized production goods company</li>
            <li>Using waste resources in Korea, which is a resource-poor country and an energy-poor country,<br>
                Raw materials PS <br> needed to produce bathroom cabinets, bottoms, etc. Produce moldings for plates, 
                frames, and mirror frames. I have it.
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
                  It's good to see the end of the wall, ceiling, floor, etc.
                  The molding that you use to make it neat
                  You can choose various things depending on the nature of the space.
                  </p>
                  <div class="m3_btn">
                    <a href="http://tnbwood.com/eng/product.php">
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
          <p>We have technology that can meet customer needs<br>with eco-friendly raw materials, plate materials, and molding.</p>
        </div><!-- mct4 -->
        <div class="mct4_box">
          <div class="mcb1" onclick="movePage(1);">
            <ul>
              <li>PRODUCTS</li>
              <li>product descriptions</li>
              <li>Build products based<br>on proprietary technology</li>
              <li>VIEW MORE</li>
            </ul>
          </div><!-- mcb1 -->
          <div class="mcb2" onclick="movePage(2);">
          <ul>
              <li>FACILITY</li>
              <li>Manufacturing process</li>
              <li>All manufacturing processes<br>in the production of products</li>
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
          <p>We will become a company that leads the creation of a happy living space<br>with the best quality that customers are satisfied with.<br><br>
            <span>view more</span>
          </p>
        </div><!-- mct5 -->
      </div><!-- mcb3 -->
    </div><!-- mcont5 -->
  </div><!-- mwrap_in -->
</div><!-- mwrap -->








<? include "./inc/footer.html" ?>
